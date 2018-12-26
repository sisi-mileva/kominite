<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\PriceGroup;
use App\Album;

class WebSiteController extends Controller
{
  public function getProducts() {
    $products = Product::get();
    $albums = Album::with('Photos')->get();
    return view('site.products', ['products' => $products, 'albums' => $albums]);
  }

  public function getProductGroup($id) {
    $product = Product::with('priceGroups')->find($id);
    $albums = Album::with('Photos')->get();
    return view('site.product-group', ['product' => $product, 'albums' => $albums]);
  }
}
