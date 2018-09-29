<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\PriceGroup;

class WebSiteController extends Controller
{
  public function getProducts() {
    $products = Product::with('priceGroups')->get();
    return view('site.products')->with('products', $products);
  }
}
