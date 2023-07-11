<?php

namespace Src\ShoppingCart\Domain;

interface CartRepository{
    public function addItem(CartItem $item);
    public function updateItem(CartItem $item);
    public function removeItem($productId);
    public function getItems(): array;
    public function getCart(): Cart;
    public function clear();
    public function save(Cart $cart): void;
}
