<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Blog;

class CmsBlogController extends Controller
{
  public function index() {
    if (isset(Auth::user()->email)) {
      $blogs = Blog::get();
      return view('admin.blog.index')->with('blogs', $blogs);
    } else {
      return redirect('admin');
    }
  }

  public function create(){
    if (isset(Auth::user()->email)) {
      return view('admin.blog.create');
    } else {
      return redirect('admin');
    }
  }

  public function store(Request $request){
    $this->validate($request, [
      'title' => 'required',
      'datе' => 'required'
    ]);

    if (! empty($request->file('image'))) {
      // Get filename with extension
      $filenameWithExt = $request->file('image')->getClientOriginalName();

      // Get just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('image')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;
    } else {
      $filenameToStore = '';
    }



    // Create advice
    $advice = new Blog;
    $advice->title = $request->input('title');
    $advice->date = $request->input('datе');
    $advice->short_description = ! empty($request->input('short_description')) ? $request->input('short_description') : '';
    $advice->description = ! empty($request->input('description')) ? $request->input('description') : '';
    $advice->image = $filenameToStore;
    $advice->is_ready = ! empty($request->input('is_ready')) ? $request->input('is_ready') : 0;

    $advice->save();

    if (! empty($request->file('image'))) {
      // Uplaod image
      $path= $request->file('image')->storeAs('public/advices', $filenameToStore);
    }

    return redirect('admin/blog')->with('success', 'Advice saved');
  }

  public function show($id){
    $advice = Blog::find($id);
    return view('admin.blog.show')->with('advice', $advice);
  }

  public function update(Request $request){
    $this->validate($request, [
      'title' => 'required',
      'datе' => 'required'
    ]);

    $id = $request->input('id');
    $advice = Blog::find($id);

    if (! empty($request->file('image'))) {
      // Get filename with extension
      $filenameWithExt = $request->file('image')->getClientOriginalName();

      // Get just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('image')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;

      // Uplaod image
      $path= $request->file('image')->storeAs('public/advices', $filenameToStore);

      //Delete old image
      Storage::delete('public/advices/'.$advice->image);
    } else {
      $filenameToStore = $advice->image;
    }

    // Update advice
    $advice->title = $request->input('title');
    $advice->date = $request->input('datе');
    $advice->short_description = ! empty($request->input('short_description')) ? $request->input('short_description') : '';
    $advice->description = ! empty($request->input('description')) ? $request->input('description') : '';
    $advice->image = $filenameToStore;
    $advice->is_ready = ! empty($request->input('is_ready')) ? $request->input('is_ready') : 0;

    $advice->save();

    return redirect('admin/blog')->with('success', 'Advice saved');
  }

  public function destroy($id){
    $advice = Blog::find($id);

    if(Storage::delete('public/advices/'.$advice->image)){
      $advice->delete();
    }

    return redirect('/admin/blog')->with('success', 'Advice Deleted');
  }
}
