@extends('layouts.master')

@section('content')
@if(count($schools))
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th><?php print_r(session()->getId())?></th>
                @if(count($schools))
                    @foreach($schools as $school)
                        <td class="school_name">
                            {{$school->school_name}}
                        </td>
                    @endforeach
                @endif
            </tr>
            <tr>
                <th>Management</th>
                @if(count($schools))
                    @foreach($schools as $school)
                        <th>
                            {{$school->management['management_name']}}
                        </th>
                    @endforeach
                @endif
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Curriculum</th>
                    @foreach($schools as $school)
                        <td>
                            <?php $cuuriculum_arr = [];?>
                            @foreach($school->curriculums as $school_curriculum)
                                <?php $cuuriculum_arr[] = $school_curriculum->curriculum_name;
                                    $curriculum = implode(',',$cuuriculum_arr);
                                ?>
                            @endforeach
                            {{$curriculum}}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>Government Rating</th>
                    @if(count($ratings))
                        @foreach($ratings as $agent => $rating)
                            <?php $rating_arr = []; ?>
                            @foreach($rating as $key => $value)
                                <?php $val = !empty($value) ? $value : "Not Specified";?>
                                <?php $rating_arr[] = $key . ":" .$val;   ?>
                            @endforeach
                            <td>{{implode(',',$rating_arr)}} </td>
                        @endforeach
                    @else
                        Not Specified
                    @endif
                </tr>
                <tr>
                    <th>Founded</th>
                    @foreach($schools as $school)
                        <td>{{$school->founded_on}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Gender</th>
                    @foreach($schools as $school)
                        <td>{{$school->gender}}</td>
                    @endforeach

                </tr>
                <tr>
                    <th>Fees</th>
                    @foreach($schools as $school)
                        @if($feeRange[$school->id] && ($feeRange[$school->id]!="-"))
                            <td>$ {{$feeRange[$school->id]}}</td>
                        @else
                            <td>Not Specified</td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th>Grade or Year Groups</th>
                    @foreach($schools as $school)
                        <td>{{$classeRange}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Timings</th>
                    @foreach($schools as $school)
                        <td>
                            <?php $timings_arr = []; ?>
                            @foreach($school->timings as $school_timing)
                                <?php $timings_arr[] = $school_timing->first_working_day.
                                "-". $school_timing->last_working_day.
                                "(".$school_timing->start_time." to ". $school_timing->end_time.")";
                                    $timings = implode(',',$timings_arr);
                                ?>
                            @endforeach
                            {{$timings}}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>Address</th>
                    @foreach($schools as $school)
                        <td>{{$school->address}}</td>
                    @endforeach

                </tr>
                <tr>
                    <th>Amenities</th>
                    @foreach($schools as $school)
                        <td>
                            <?php $amenities_arr = [];?>
                            @foreach($school->amenities as $school_amenity)
                                <?php $amenities_arr[] = $school_amenity->amenity_name;
                                    $amenities = implode(',',$amenities_arr);
                                ?>
                            @endforeach
                            {{$amenities}}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>Extra Curricular Activities</th>
                    @foreach($schools as $school)
                        <td>
                            <?php $extra_curricular_arr = [];?>
                            @foreach($school->activities as $school_activity)
                                <?php $extra_curricular_arr[] = $school_activity->activity_name;
                                    $extra_curricular = implode(',',$extra_curricular_arr);
                                ?>
                            @endforeach
                            {{$extra_curricular}}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>City</th>
                    @foreach($schools as $school)
                        <td>{{$school->city}}</td>
                    @endforeach

                </tr>
                <tr>
                    <th>Zipcode</th>
                    @foreach($schools as $school)
                        <td>{{$school->zipcode}}</td>
                    @endforeach
                </tr>
                @foreach($attributes as $attribute)
                    <tr>
                        <th>{{$attribute->attribute_name}}</th>
                        @foreach($attribute_values as $attribute_value)
                            @if($attribute_value['attribute_value'][$attribute->id])
                                <td>{{$attribute_value['attribute_value'][$attribute->id]}}</td>
                            @else
                                <td>Not Specified</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else

    @endif
@endsection
