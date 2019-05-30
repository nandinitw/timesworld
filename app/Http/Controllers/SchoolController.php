<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlexAttribute as FlexAttribute;
use App\Models\FlexAttributeSchool;
use App\Models\RatingAgent;
use App\Models\RatingAgentSchool as Rating;
use App\Models\Classe as Classe;
use App\Models\ClassSchool as Fee;
use App\Models\School as School;
use DB;

class SchoolController extends Controller{

    var $school;

    public function __construct(
        School $school,
        FlexAttribute $flex_attribute,
        RatingAgent $agent,
        Rating $rating,
        FlexAttributeSchool $flex_attribute_school,
        Classe $class,
        Fee $fee
        ){
        $this->school = $school;
        $this->flex_attribute = $flex_attribute;
        $this->flex_attribute_school = $flex_attribute_school;
        $this->agent = $agent;
        $this->rating = $rating;
        $this->class = $class;
        $this->fee = $fee;
    }

    /**
     * Listing Page
     */
    public function index()
    {
        $schools = $this->school->getAllSchools();
        $attributes = $this->flex_attribute->getAllFlexAttributes();
        $ratingAgents = $this->agent->getAllAgents();
        $classeRange = $this->class->getClassRange();
        $feeRange = [];

        //flex attributes
        foreach($attributes as $attribute){
            foreach($schools as $school){
                $attribute_values[$school->id]['attributes'][$attribute->id] = $attribute->attribute_name;
                $attribute_values_collection = $this->flex_attribute_school->getAttributeValues($school->id,$attribute->id);
                $attribute_values[$school->id]['attribute_value'][$attribute->id] = isset($attribute_values_collection[0]) ? $attribute_values_collection[0]->flex_attribute_value : "";
            }
        }

        //ratings
        foreach($ratingAgents as $ratingAgent){
            foreach($schools as $school){
                $rating_collection = $this->rating->getRatings($school->id,$ratingAgent->id);
                $ratings[$school->id][$ratingAgent->agent_name] = isset($rating_collection[0]) ? $rating_collection[0]->rating : "";
            }
        }

        //fee range
        foreach($schools as $school){
            $feeRange[$school->id] = $this->fee->getFeeRange($school->id);
        }

        return view('school',[
                                'schools'           => $schools,
                                'attributes'        => $attributes,
                                'attribute_values'  => $attribute_values,
                                'ratings'           => $ratings,
                                'classeRange'       => $classeRange,
                                'feeRange'          => $feeRange
                            ]
                    );
    }
}
