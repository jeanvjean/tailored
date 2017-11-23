@extends('main')

@section('title',"| Profile")

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a></li>
        <li><a href="{{ url('/editProfile') }}/{{ Auth::user()->slug }}">Edit profile</a></li>
    </ol>
    @if ($user->account_type == 'customer')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ucwords( $user->name )}}'s Profile</div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <h3 align="center">{{ ucwords($user->name) }}</h3>
                            <img src="{{Storage::url($user->img) }}" width="100px" height="100px"  class="img-rounded">
                            <div class="caption">
                                <p align="center"></p>
                                @if (Auth::id()==$user->id)
                                    <p align="center"> <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm" role="button">Edit Profile</a>
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>About</h4>
                        <p>{{ $user->profile->about }}</p>
                    </div>
                </div>
            </div>
            <div class="">

            </div>
        </div>
    @else
        <div class="about agileinfo">
    		<div class="container">
    			<h3 class="agileits-title">{{ $user->name }}'s Profile</h3>
    			<div class="col-md-8 about-w3left">
    				<h4>About Me</h4>
    				<p>{{ $user->profile->about }}</p>
    			</div>
    			<div class="col-md-4 about-w3right">
    				<img src="{{Storage::url($user->img) }}" width="100px" height="250px" style="border-radius:50%"><br><br>
                    @if (Auth::id()==$user->id)
                    <p align="center"> <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm" role="button">Edit Profile</a>
                    @endif
    			</div>
    			<div class="clearfix"> </div>
    		</div>
	   </div>
	<div class="team">
		<div class="container">
			<h3 class="agileits-title">{{ $user->name }}'s Designs</h3>
			<div class="team-row w3ls-team-row">
                @forelse ($designs as $design)
                    <div class="col-md-3 col-sm-3 col-xs-6 team-wthree-grids">
                            <div class="w3ls-effect">
                                <img src="{{ url('../') }}/storage/designs/{{ $design->design_img }}" alt="img">
                                <div class="w3layouts-caption">
                                    <h4>{{ $design->name }}</h4>
                                    <p>{{ $design->description }}</p>
                                    <p>{{ $design->category->name }}</p>
                                </div>
                                <div class="wthree-icon social-icon">
                                    <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>
                                </div>
                             </div>
                        @if (Auth::id()==$user->id)
                            <div class="">
                                {!! Form::open(['route'=>['designs.destroy',$design->id], 'method'=>'DELETE']) !!}

                                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block','style'=>'margin-top:10px']) !!}

                                {!! Form::close() !!}
                            </div>
                            <br><br>
                        @endif
                    </div>
                @empty
                    <div class="text-center">
                        @if (Auth::id()==$user->id)
                        <h3>Upload New Designs In Ur profile </h3>
                        @else
                            <h3>No New Design </h3>
                        @endif
                    </div>
                @endforelse
                <div class="clearfix"> </div>
			</div>
            @if (Auth::id()==$user->id)
                <div class="col-md-8 col-md-offset-2">
                    <div style="margin-top:20px">
                        <form class="" action="{{ route('designs.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ Form::label('design_img','Image:') }}
                            <input type="file" name="design_img[]" multiple="true">

                            {{ Form::label('name', 'Design Name:') }}
                            {{ Form::text('name',null,['class'=>'form-control']) }}

                            {{ Form::label('category_id','Category:') }}
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {{ Form::label('description','Design information:') }}
                            {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'3']) }}

                            {{ Form::submit('Upload Design',['class'=>'btn btn-primary btn-sm','style'=>'margin-top:5px']) }}
                        </form>
                    </div>
                    <hr>
                    <div class="col-md-2">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                    </div>
                    <br>
                </div>
            @endif
		</div>
        <div class="clearfix"> </div>
        @if (Auth::id()==$user->id)
            <div class="col-md-6 col-md-offset-3">
                @foreach ($products as $product)
                <div class="">
                    <ol>
                        <li>{{ $product->name }} <a href="{{ route('products.show',$product->id) }}">View</a></li>
                    </ol>
                </div>
            @endforeach
            </div>
        @endif
	</div>
    @endif
</div>
@endsection
