<?php

namespace Src\ShoppingCart\Domain;

class Cart{
    protected $items;

    public function __construct(){
        $this->items = [];
    }

    public function addProduct($productId, $quantity, $price, $image){
        $item = new CartItem($productId, $quantity, $price, $image);
        $this->items[] = $item;
    }

    public function updateProduct($productId, $quantity){
        foreach ($this->items as $item) {
            if ($item->getProductId() === $productId) {
                $item->setQuantity($quantity);
                break;
            }
        }
    }

    public function removeProduct($productId){
        $this->items = array_filter($this->items, function ($item) use ($productId) {
            return $item->getProductId() !== $productId;
        });
    }


    public function getItems(){
        return $this->items;
    }

    public function getId($productId){
        $this->items['id'] = $productId;
        return $productId;
    }

    public function confirmPurchase(){
        $cartItems = $this->getItems();
        if (empty($cartItems)) {
            return response()->json(['error' => 'The cart is empty'], 400);
        }
        try {
            echo 'Your transaction has been processed';
            $this->clear();
            return response()->json(['message' => 'Purchase confirmed'], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during purchase confirmation///--'.$e], 500);
        }
    }

    private function clear(){
        $this->items = [];
    }

}
