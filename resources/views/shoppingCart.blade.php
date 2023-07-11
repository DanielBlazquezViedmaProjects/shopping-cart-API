@extends('layouts.app')

@section('title','Shopping Cart')

@section('rowOne')
<div class="row">
{{--    @php--}}
{{--        $items = [['id'=>1,'name'=>'T-shirt', 'price'=> 99.99, 'image'=> '324-3244863_kobe-bryant-png-3675867105'],['id'=>2,'name'=>'Short', 'price'=> 99.99, 'image'=> 'Q8041AJ5617_728_PHSFH001_2000-4143750491']];--}}
{{--    @endphp--}}

    @foreach($products as $product)
        <div class="col align-content-lg-center">
            <img src="{{ asset('/images/'.$product['image']) }}" class="rounded mx-auto d-block w-25" alt="...">
                <form action="{{ route('add') }}" method="POST">
                    @csrf
                    <div class="text-center mx-auto"> {{ $product['price'] }} €
                        <input type="hidden" name="productId" value="{{ $product['id'] }}">
                        <input type="hidden" name="price" value="{{ $product['price'] }}">
                        <input type="hidden" name="image" value="{{ $product['image'] }}">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" value="{{ $product['id'] }}" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
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
                        @foreach ($items as $item)
                            <form action="{{ route('remove', ['productId' => $item['id']]) }}" method="POST">
                                <div class="row">
                                @csrf
                                @method('DELETE')
                                    <div class="col-6">
                                        <img src="{{ asset('/images/'.$item['image']) }}" class="rounded mx-auto d-block w-25" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <div class="col-6 d-inline">
                                            <input class="w-25" type="number" name="quantity" value="1" min="1">
                                        </div>
                                        <button type="submit" class="btn btn-danger">Delete Item</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="{{ route('confirm') }}" class="btn btn-primary">Confirm Purchase</button>
                    </div>
                </div>
            </div>
        </div>
{{--//End Shopping Cart Modal//--}}
    @endforeach
</div>
@endsection
