@extends('layouts.mainLayout')
    @section('title', 'cart')
    @section('content')
    <div class="cart">
        <h3 class="cart__title">Cart</h3>
        <div class="row">       
        @foreach($cartList as $cartPoint)
            
            <div class="col-md-2"></div>
            
                <div class="col-md-1">
                    <p><a href="{{ route('showImage', ['imageId' => $cartPoint['image_id']]) }}"><img src="{{ URL::asset('img/works/' . $cartPoint['path']) }}" alt="{{ $cartPoint['name'] }}" class="cart__info-img"></a></p>
                </div>
                <div class="col-md-6">
                    <p class="cart__info">
                        <span class="cart__info-str">Title: {{ $cartPoint['name'] }}</span>
                        <span class="cart__info-str">Width: {{ $cartPoint['width'] }}</span>
                        <span class="cart__info-str">Height: {{ $cartPoint['height'] }}</span>
                        <span class="cart__info-str">Price: {{ $cartPoint['price'] }} $</span>
                    </p>
                </div>
                <div class="col-md-1">
                
                    @if($cartPoint['paid'] == 0)
                        <button class="btn btn-primary"><a href="{{ route('buy', ['imageId' => $cartPoint['image_id']]) }}" class="cart__info-link">Buy</a></button>
                    @else
                        <button class="btn btn-primary"><a href="{{ route('download', ['imageId' => $cartPoint['image_id']]) }}" class="cart__info-link">Download</a></button>
                    @endif

                </div>

            <div class="col-md-2"></div>
        @endforeach
        </div>
    </div>
    @endsection