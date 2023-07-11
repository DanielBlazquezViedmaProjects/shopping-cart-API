<?php

namespace Src\ShoppingCart\Aplication;

use Src\ShoppingCart\Domain\CartItem;
use Src\ShoppingCart\Domain\CartRepository;

class AddProductToCart{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository ){
        $this->cartRepository = $cartRepository;
    }

    /**
     * @param $productId
     * @param $quantity
     */
    public function execute($cartRepository){
        $this->cartRepository->save($cartRepository);
    }
}
