<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\PriceGroup;

class PriceGroupController extends Controller
{
  public function create($productId){
    if (isset(Auth::user()->email)) {
      return view('admin.price-group.create')->with('productId', $productId);
    } else {
      return redirect('admin');
    }
  }

  public function store(Request $request){
    $this->validate($request, [
      'image1' => 'image|max:1999',
      'image2' => 'image|max:1999',
      'price_table' => 'required'
    ]);

    // Get filename with extension
    $filenameWithExt1 = $request->file('image1')->getClientOriginalName();
    $filenameWithExt2 = $request->file('image2')->getClientOriginalName();

    // Get just the filename
    $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
    $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);

    // Get extension
    $extension1 = $request->file('image1')->getClientOriginalExtension();
    $extension2 = $request->file('image2')->getClientOriginalExtension();

    // Create new filename
    $filenameToStore1 = $filename1.'_'.time().'.'.$extension1;
    $filenameToStore2 = $filename2.'_'.time().'.'.$extension2;

    // Create price group
    $priceGroup = new PriceGroup;
    $priceGroup->product_id = $request->input('product_id');
    $priceGroup->price_table = $request->input('price_table');
    $priceGroup->image1 = $filenameToStore1;
    $priceGroup->image2 = $filenameToStore2;

    $priceGroup->save();

    // Uplaod image
    $path1= $request->file('image1')->storeAs('public/products', $filenameToStore1);
    $path2= $request->file('image2')->storeAs('public/products', $filenameToStore2);

    return redirect('admin/product/' . $request->input('product_id'))->with('success', 'Photo Uploaded');
  }

  public function show($id){
    $priceGroup = PriceGroup::find($id);
    return view('admin.price-group.show')->with('priceGroup', $priceGroup);
  }

  public function update(Request $request){
    $this->validate($request, [
      'image1' => 'image|max:1999',
      'image2' => 'image|max:1999',
      'price_table' => 'required'
    ]);

    $id = $request->input('id');

    $priceGroup = PriceGroup::find($id);

    if ($request->hasFile('image1')) {
      // Get filename with extension
      $filenameWithExt1 = $request->file('image1')->getClientOriginalName();

      // Get just the filename
      $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);

      // Get extension
      $extension1 = $request->file('image1')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore1 = $filename1.'_'.time().'.'.$extension1;

      // Uplaod image
      $path1= $request->file('image1')->storeAs('public/products', $filenameToStore1);

      //Delete old image
      Storage::delete('public/products/'.$priceGroup->image1);
    } else {
      $filenameToStore1 = $priceGroup->image1;
    }

    if ($request->hasFile('image2')) {
      // Get filename with extension
      $filenameWithExt2 = $request->file('image2')->getClientOriginalName();

      // Get just the filename
      $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);

      // Get extension
      $extension2 = $request->file('image2')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore2 = $filename2.'_'.time().'.'.$extension2;

      // Uplaod image
      $path2= $request->file('image2')->storeAs('public/products', $filenameToStore2);

      //Delete old image
      Storage::delete('public/products/'.$priceGroup->image2);
    } else {
      $filenameToStore2 = $priceGroup->image2;
    }

    $priceGroup->product_id = $request->input('product_id');
    $priceGroup->price_table = $request->input('price_table');
    $priceGroup->image1 = $filenameToStore1;
    $priceGroup->image2 = $filenameToStore2;

    $priceGroup->save();

    return redirect('admin/product/' . $request->input('product_id'))->with('success', 'Photo Uploaded');;
  }

  public function destroy($id){
    $priceGroup = PriceGroup::find($id);

    if(Storage::delete('public/products/'.$priceGroup->image1) && Storage::delete('public/products/'.$priceGroup->image2)){
      $priceGroup->delete();

      return redirect('admin/product/' . $priceGroup->product_id)->with('success', 'Photo Deleted');
    }
  }
}