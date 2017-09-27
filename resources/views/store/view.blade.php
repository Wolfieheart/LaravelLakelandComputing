<!DOCTYPE html>
@extends ('layouts.master')
<html>
<head>
    <title>Lakeland Computers</title>
</head>
<body>
@section('content')

	<div id="product-image">
        {{ Html::image($product->image, $product->title) }}
    </div><!-- end product-image -->
    <div id="product-details">
        <h1>{{ $product->title }}</h1>
        <p>{{ $product->description }}</p>

        <hr />

        {{ Form::open(array('url'=>'/store/addtocart')) }}
            {{ Form::label('quantity', 'Qty') }}
            {{ Form::text('quantity', 1, array('maxlength'=>'2')) }}
            {{ Form::hidden('id', $product->id) }}

            <button type="submit" class="secondary-cart-btn">
                {{ Html::image('img/white-cart.gif', 'Add to Cart')}}
                 ADD TO CART
            </button>
        {{ Form::close() }}
    </div><!-- end product-details -->
    <div id="product-info">
        <p class="price">${{ $product->price }}</p>
        </p>
        <p>Product Code: <span>{{ $product->id }}</span></p>
    </div><!-- end product-info -->

@stop