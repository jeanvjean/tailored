@extends('main')

@section('title','| Request A Product')

    @section('content')

        <div class="container">
            <div class="text-center">
                <h3> <strong>MAKE YOUR REQUEST</strong> </3>
                </div>
            <div class="">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <h2>Key</h2><br>
                        <h4>Male</h4>
                        <ol>
                            <li>sh: Shoulder size</li>
                            <li>leg: Leg Lenght</li>
                            <li>arm-len: Arm Lenght</li>
                            <li>weist: Weist</li>
                        </ol>
                        <h4>Female</h4>
                        <ol>
                            <li>B: Boob</li>
                            <li>weist: Weist</li>
                            <li>hip: Hip</li>
                            <li>sh: Shoulder</li>
                            <li>slv: Sleeve lenght</li>
                            <li>rs: Rounded Sleeves</li>
                            <li>hl: weist to knee</li>
                            <li>l: weist to heels</li>
                        </ol>
                    </div>
                    <div class="col-md-7">
                        <div class="panel-default">
                            <div class="panel-body">
                                {!! Form::open(['route'=>'purchases.store','files'=>'true','method'=>'post']) !!}

                                {{ Form::label('gender','Gender:') }}
                                <select class="form-control" name="gender" style="margin-top:5px">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <label for="age_group">Age Group</label>
                                <select class="form-control" name="age_group">
                                    <option value=""></option>
                                    <option value="child">Child</option>
                                    <option value="adult">Adult</option>
                                </select>

                                {{ Form::label('size','Size:') }}
                                <select class="form-control" name="size" style="margin-top:5px">
                                    <option value=""></option>
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                    <option value="extra-large">Extra-Large</option>
                                </select>

                                {{ Form::label('measurement','Measurement(sh,leg,arm-len,weist,l,):') }}
                                <input type="text" name="measurement"class="form-control">

                                {{ Form::label('image','Upload Your Design:') }}
                                <input type="file" name="image" alt="">

                                {{ Form::submit('Create Request',['class'=>'btn btn-primary btn-sm','style'=>'margin-top:10px']) }}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
