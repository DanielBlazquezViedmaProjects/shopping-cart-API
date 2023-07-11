<?php

namespace Src\ShoppingCart\Domain;

class CartItem{
    protected $productId;
    protected $quantity;
    protected $price;
    protected $image;

    public function __construct($productId, $quantity, $price, $image){
        $this->quantity = $quantity;
        $this->productId = $productId;
        $this->price = $price;
        $this->image= $image;
    }

    /**
     * @return mixed
     */
    public function getQuantity(){
        return $this->quantity;
    }

    /**
     * @param $quantity
     */
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getProductId(){
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void{
        $this->productId = $productId;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void{
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice($quantity){
        return $this->price * $quantity;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void{
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void{
        $this->image = $image;
    }
}
