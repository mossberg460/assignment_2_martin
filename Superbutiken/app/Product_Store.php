<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Store extends Model {
  protected $table = 'product_store'; //TODO: stort S?

  public function getProductsAttribute() {
    return $this->belongsTo('App\Product')->get();
  }

  public function getStoresAttribute() {
    return $this->belongsTo('App\Store')->get();
  }

  public function store_id() {
    return $this->belongsTo('App\Store', 'id');
  }

  public function product_id() {
    return $this->belongsTo('App\Product', 'id');
  }
}
