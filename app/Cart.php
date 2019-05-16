<?php


namespace App;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $totalQty = 0;
    public $totalPrice = 0;
    public $items = null;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }


    public function add($id)
    {
        $product = Product::findOrFail($id);
        $storeNewItem = ['qty' => 0, 'price' => $product->price, 'item' => $product];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeNewItem = $this->items[$id];
            }
        }

        $storeNewItem['qty']++;
        $storeNewItem['price'] = $storeNewItem['qty'] * $product->price;

        $this->items[$id] = $storeNewItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    public function update($newQty, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::get('cart');
        $oldItem = $oldCart->items[$id];
        $itemUpdate = $this->items[$id];
        $itemUpdate['qty'] = $newQty;
        $itemUpdate['price'] = $newQty * $product->price;
        $this->items[$id] = $itemUpdate;
        $this->totalQty = $this->totalQty - $oldItem['qty'] + $itemUpdate['qty'];
        $this->totalPrice = $this->totalPrice - $oldItem['price'] + $itemUpdate['price'];
    }

}