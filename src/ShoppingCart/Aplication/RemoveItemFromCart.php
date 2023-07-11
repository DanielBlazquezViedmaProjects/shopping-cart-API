<?php

namespace Src\ShoppingCart\Aplication;

use Src\ShoppingCart\Domain\CartRepository;

class RemoveItemFromCart{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository){
        $this->cartRepository = $cartRepository;
    }

    public function execute($productId){
        $this->cartRepository->items = array_filter($this->cartRepository->items, function ($item) use ($productId) {
            return $item->getProductId() !== $productId;
        });
    }

}
