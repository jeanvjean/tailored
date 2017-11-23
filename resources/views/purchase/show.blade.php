@extends('main')

@section('title', '| Order Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-default">
                <div class="panel-body">
                    <p> <strong> {{ Auth::user()->name }} </strong> </p>
                    <p> {{ $purchase->measurement }} </p>
                    <div class="thumbnail col-md-4">
                        <img src="{{url('../') }}/storage/Purchase/{{ $purchase->image }}" width="100px" height="250px" alt="">
                    </div>
                    <div class="">
                        <a href="{{ route('purchase.addToCart',$purchase->id) }}" class="btn btn-primary btn-sm">Proceed To Checkout</a>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['purchases.destroy',$purchase->id], 'method'=>'DELETE']) !!}

                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
