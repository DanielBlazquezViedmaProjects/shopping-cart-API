<?php

namespace Src\ShoppingCart\Aplication;

use Src\ShoppingCart\Domain\CartRepository;

class UpdateProductInCart{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository){
        $this->cartRepository = $cartRepository;
    }

    public function execute($productId, $quantity){
        foreach ($this->cartRepository as $item) {
            if ($item->getProductId() === $productId) {
                $item->setQuantity($quantity);
                break;
            }
        }
    }

}
