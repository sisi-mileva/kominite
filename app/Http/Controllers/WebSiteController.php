<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\PriceGroup;
use App\Album;
use App\GeneralInfo;

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

  public function getAboutUs() {
    $about = GeneralInfo::where('type', '1')->get();
    $albums = Album::with('Photos')->get();
    return view('site.about', ['about' => $about[0]['page_content'], 'albums' => $albums]);
  }

  public function getContacts() {
    $contacts = GeneralInfo::where('type', '2')->get();
    $albums = Album::with('Photos')->get();
    return view('site.contacts', ['contacts' => $contacts[0]['page_content'], 'albums' => $albums]);
  }
}
