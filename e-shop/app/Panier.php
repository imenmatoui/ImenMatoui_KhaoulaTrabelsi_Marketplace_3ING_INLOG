<?php

namespace App;
use Auth;
use Illuminate\Http\Request;

class Panier {

    public $items = [];
    public $totalQ = 0;
    public $totalP = 0;

    public function __construct($currentCart){
        if($currentCart){
            $this->items = $currentCart->items;
            $this->totalQ = $currentCart->totalQ;
            $this->totalP = $currentCart->totalP;
        }

    }

    public function add($id, $item){
        $storedItem = ['quantite' => 0, 'prix' => $item->Prix, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['quantite']++;
        $storedItem['prix'] = $storedItem['quantite'] * $item->Prix;
        $this->items[$id] = $storedItem;
        $this->totalQ++;
        $this->totalP += $item->Prix;
    }

    public function reduceByOne($id){
        $this->items[$id]['quantite']--;
        $this->items[$id]['prix'] -= $this->items[$id]['item']->Prix;
        $this->totalQ --;
        $this->totalP -= $this->items[$id]['item']->Prix;

        if($this->items[$id]['quantite'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function delete($id){
        $this->totalQ -= $this->items[$id]['quantite'];
        $this->totalP -= $this->items[$id]['prix'];
        unset($this->items[$id]);
    }
}