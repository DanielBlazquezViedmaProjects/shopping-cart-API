<?php

namespace Src\ShoppingCart\Infraestructure;

use App\Models\Orders as CartModel;
use Src\ShoppingCart\Domain\Cart;
use Src\ShoppingCart\Domain\CartItem;
use Src\ShoppingCart\Domain\CartRepository;

class EloquentCartRepository implements CartRepository {

    public function addItem(CartItem $item){
        $cart = new CartModel();
        $cart->product_id = $item->getProductId();
        $cart->quantity = $item->getQuantity();
        $cart->price = $item->getPrice($cart->quantity);
        $cart->image = $item->getImage();
dd('yyyy');
        $cart->save();

    }

    public function updateItem(CartItem $item){
        $cart = CartModel::where('product_id', $item->getProductId())->first();

        if($cart){
            $cart->quantity = $item->getQuantity();

            $cart->save();
        }
    }

    public function removeItem($productId){
        $cart = CartModel::where('product_id', $productId)->first();
        if($cart){

            $cart->delete();
        }
    }

    public function getItems(): array{
        $cartItems = CartModel::all();
        $items = $cartItems->map(function ($cartItem) {
            return [
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'image' => $cartItem->image,
            ];
        });

        return $items->toArray();
    }

    public function clear(){
        CartModel::truncate();
    }

    public function getCart(): Cart{
        $cart = CartModel::find('product_id');
        $cart->getItems();

        return $cart;
    }

    /**
     * @param Cart $cart
     */
    public function save(Cart $cart): void{
        $this->save($cart);
    }
}
