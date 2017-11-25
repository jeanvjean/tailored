@extends('main')

@section('title', ' My Cart')

@section('content')
    <div class="row" style="margin-top:50px">
        @if (Session::has('cart'))
            <div class="col-md-8">
                        <div class="col-md-5">
                                @foreach ($products as $product)
                                    <div class="thumbnail clearfix">
                                        <div class="">
                                            {{ $product['qty'] }}
                                        </div>
                                        <strong>{{ $product->name }}</strong>
                                        <div class="">
                                            <img height="150px" width="200px" src="{{ url('../') }}/storage/image/{{ $product->image }}" alt=""/>
                                        </div>
                                        <span class="label label-success">#{{ $product->price }}</span>
                                        <div class="btn-group pull-right" style="margin-top:10px">
                                            <button type="button" class="btn btn-info btn-xs
                                            dropdown-toggle" data-toggle="dropdown" name="button">
                                            Remove <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('product.reduceByOne', ['id' => $product['id']]) }}">Remove one</a></li>
                                                <li><a href="{{ route('product.remove', ['id' => $product['id']]) }}">Remove all</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="col-md-3">
                                        <a href="{{ route('clearCart') }}" class="btn btn-info btn-sm">Clear Cart</a>
                                        <a href="{{ route('checkout') }}" class="btn btn-success btn-sm" style="margin-top:10px">Checkout</a>
                                    </div>
                        </div>
            </div>
                @else
                    <div class="well">
                        <h2 align="center">Cart is empty..!!</h2>
                    </div>
            @endif
            </div>
    </div>

@endsection
