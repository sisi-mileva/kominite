<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Album;
use App\Photo;

class CmsAlbumsController extends Controller
{
  public function index() {
    if (isset(Auth::user()->email)) {
      $albums = Album::with('Photos')->get();
      return view('admin.album.index')->with('albums', $albums);
    } else {
      return redirect('admin');
    }
  }

  public function create(){
    if (isset(Auth::user()->email)) {
      return view('admin.album.create');
    } else {
      return redirect('admin');
    }
  }

  public function store(Request $request){
    $this->validate($request, [
      'name' => 'required'
    ]);

    // Create album
    $album = new Album;
    $album->name = $request->input('name');
    $album->description = $request->input('description');
    $album->cover_image = '';

    $album->save();

    return redirect('/admin/gallery')->with('success', 'Album Created');
  }

  public function show($id){
    $album = Album::with('Photos')->find($id);
    return view('admin.album.showAlbum')->with('album', $album);
  }

  public function destroy($id){
    $album = Album::with('Photos')->find($id);

    foreach ($album->photos AS $photoItem) {
      $photo = Photo::find($photoItem->id);
      if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
        $photo->delete();
      }
    }

    $album->delete();


    return redirect('/admin/gallery')->with('success', 'Photo Deleted');
  }
}
