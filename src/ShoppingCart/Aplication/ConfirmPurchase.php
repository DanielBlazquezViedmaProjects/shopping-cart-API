<?php

namespace Src\ShoppingCart\Aplication;

use Src\ShoppingCart\Domain\CartRepository;

class ConfirmPurchase{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository){
        $this->cartRepository = $cartRepository;
    }

    public function execute(){
        $cartItems = $this->cartRepository->getItems();
        if (empty($cartItems)) {
            return response()->json(['error' => 'The cart is empty'], 400);
        }
        try {
            echo 'Your transaction has been processed';
            $this->cartRepository->clear();
            return response()->json(['message' => 'Purchase confirmed'], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during purchase confirmation///--'.$e], 500);
        }
    }
}
