<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Src\ShoppingCart\Aplication\AddProductToCart;
use Src\ShoppingCart\Aplication\ConfirmPurchase;
use Src\ShoppingCart\Aplication\RemoveItemFromCart;
use Src\ShoppingCart\Aplication\UpdateProductInCart;
use Src\ShoppingCart\Domain\Cart;
use Src\ShoppingCart\Domain\CartRepository;

class ShoppingCartController extends Controller{

    protected $addProductToCart;
    protected $updateProductInCart;
    protected $removeProductFromCart;
    protected $confirmPurchase;
    protected $cartRepository;

    public function __construct(
        AddProductToCart $addProductToCart,
        UpdateProductInCart $updateProductInCart,
        RemoveItemFromCart $removeProductFromCart,
        ConfirmPurchase $confirmPurchase,
        CartRepository $cartRepository
    ) {
        $this->addProductToCart = $addProductToCart;
        $this->updateProductInCart = $updateProductInCart;
        $this->removeProductFromCart = $removeProductFromCart;
        $this->confirmPurchase = $confirmPurchase;
        $this->cartRepository = $cartRepository;

    }

    public function shoppingCart(Request $request){
        $products = Product::all();
        $items = isset($items) ? $this->cartRepository->getItems():[];
        return view('shoppingCart',compact('items','products'));
    }

    public function addProduct(Request $request){

        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $image = $request->input('image');

        $cart = new Cart();
        $cart->addProduct($productId,$quantity,$price,$image);

        $order = new Orders();
        $order->product_id = $productId;
        $order->quantity = $quantity;
        $order->price = $price;
        $order->image = $image;
        $order->save();

        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function updateProduct(Request $request, $productId){
        $quantity = $request->input('quantity');
        $this->updateProduct($productId, $quantity);
        return response()->json(['message' => 'Product updated']);
    }

    public function removeProduct($productId){
        $this->removeProduct($productId);
        return response()->json(['message' => 'Product removed from cart']);
    }

    public function confirmPurchase(){
        $this->confirmPurchase();
        return response()->json(['message' => 'Purchase confirmed']);
    }

    public function getCartItems(){
        return response()->json(['items' => $this->cartRepository->getItems()]);
    }

}
