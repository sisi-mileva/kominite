<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Product;
use App\PriceGroup;

class ProductsController extends Controller
{
  public function index() {
    if (isset(Auth::user()->email)) {
      $products = Product::get();
      return view('admin.product.index')->with('products', $products);
    } else {
      return redirect('admin');
    }
  }

  public function create(){
    if (isset(Auth::user()->email)) {
      return view('admin.product.create');
    } else {
      return redirect('admin');
    }
  }

  public function store(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'code' => 'required',
      'image' => 'image|max:1999'
    ]);

    // Get filename with extension
    $filenameWithExt = $request->file('image')->getClientOriginalName();

    // Get just the filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    // Get extension
    $extension = $request->file('image')->getClientOriginalExtension();

    // Create new filename
    $filenameToStore = $filename.'_'.time().'.'.$extension;


    // Create product
    $product = new Product;
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->code = $request->input('code');
    $product->image = $filenameToStore;
    $product->opt_keys = ! empty($request->input('opt_keys')) ? $request->input('opt_keys') : '';
    $product->opt_description = ! empty($request->input('opt_description')) ? $request->input('opt_description') : '';

    $product->save();

    // Uplaod image
    $path= $request->file('image')->storeAs('public/products', $filenameToStore);

    return redirect('admin/products')->with('success', 'Photo Uploaded');
  }

  public function show($id){
    $product = Product::with('priceGroups')->find($id);
    return view('admin.product.show')->with('product', $product);
  }

  public function update(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'code' => 'required',
      'image' => 'image|max:1999'
    ]);

    $id = $request->input('id');

    $product = Product::find($id);

    if ($request->hasFile('image')) {
      // Get filename with extension
      $filenameWithExt = $request->file('image')->getClientOriginalName();

      // Get just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('image')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;

      // Uplaod image
      $path= $request->file('image')->storeAs('public/products/'.$request->input('album_id'), $filenameToStore);

      //Delete old image
      Storage::delete('public/products/'.$product->image);
    } else {
      $filenameToStore = $product->image;
    }



    // Update product
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->code = $request->input('code');
    $product->image = $filenameToStore;
    $product->opt_keys = ! empty($request->input('opt_keys')) ? $request->input('opt_keys') : '';
    $product->opt_description = ! empty($request->input('opt_description')) ? $request->input('opt_description') : '';

    $product->save();

    return redirect('admin/product/' . $product->id)->with('success', 'Product Updated');
  }

  public function destroy($id){
    $product = Product::with('priceGroups')->find($id);

    foreach ($product->priceGroups AS $priceGroupItem) {
      $priceGroup = PriceGroup::find($priceGroupItem->id);
      if(Storage::delete('public/products/'.$priceGroup->image1) && Storage::delete('public/products/'.$priceGroup->image2)){
        $priceGroup->delete();
      }
    }

    if(Storage::delete('public/products/'.$product->image)){
      $product->delete();
    }

    return redirect('/admin/products')->with('success', 'Product Deleted');
  }
}
