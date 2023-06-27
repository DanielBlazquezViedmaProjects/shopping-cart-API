@extends('layouts.app')

@section('title','Shopping Cart')

@section('rowOne')
<div class="row">
    @php
    $products=[['id'=>1,'name'=>'T-shirt', 'price'=> 99.99, 'image'=> '324-3244863_kobe-bryant-png-3675867105'],['id'=>2,'name'=>'Short', 'price'=> 99.99, 'image'=> 'Q8041AJ5617_728_PHSFH001_2000-4143750491']];
    $items = [['id'=>1,'name'=>'T-shirt', 'price'=> 99.99, 'image'=> '324-3244863_kobe-bryant-png-3675867105'],['id'=>2,'name'=>'Short', 'price'=> 99.99, 'image'=> 'Q8041AJ5617_728_PHSFH001_2000-4143750491']];
    @endphp

    @foreach($products as $product)
        <div class="col align-content-lg-center">
            <img src="{{ asset('/images/'.$product['image']) }}" class="rounded mx-auto d-block w-25" alt="...">
            <div class="text-center mx-auto"> {{ $product['price'] }} €
                <form action="" method="Post">
                    @csrf

                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit" value="Add To Cart" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>

{{--//Shopping Cart Modal//--}}
        <div class="modal" id="shopping-cart" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Shoping Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="col-6">
                                    <img src="{{ asset('/images/'.$item['image']) }}" class="rounded mx-auto d-block w-25" alt="...">
                                </div>
                                <div class="col-6">
                                    <div class="col-6 d-inline">
                                        <input class="w-25" type="number" name="quantity" value="1" min="1">
                                    </div>

                                    <button type="button" class="btn btn-danger">Delete Item</button>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Confirm Purchase</button>
                    </div>
                </div>
            </div>
        </div>
{{--//End Shopping Cart Modal//--}}
    @endforeach
</div>
@endsection
