<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use App\Album;

class CmsPhotosController extends Controller
{
  public function create($album_id){
    return view('admin.photos.create')->with('album_id', $album_id);
  }

  public function store(Request $request){
    $this->validate($request, [
      'title' => 'required',
      'photo' => 'image|max:1999'
    ]);

    // Get filename with extension
    $filenameWithExt = $request->file('photo')->getClientOriginalName();

    // Get just the filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    // Get extension
    $extension = $request->file('photo')->getClientOriginalExtension();

    // Create new filename
    $filenameToStore = $filename.'_'.time().'.'.$extension;

    // Uplaod image
    $path= $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

    $albumId = $request->input('album_id');

    if (! empty($request->input('is_cover'))) {
      Album::where('id', $albumId)->update(array('cover_image' => $filenameToStore));
    }

    // Upload Photo
    $photo = new Photo;
    $photo->album_id = $request->input('album_id');
    $photo->title = $request->input('title');
    $photo->photo = $filenameToStore;

    $photo->save();

    return redirect('admin/gallery/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
  }

  public function destroy($id){
    $photo = Photo::find($id);
    $album = Album::find($photo->album_id);

    if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
      $photo->delete();
      if ($album->cover_image == $photo->photo) {
        $album->update(array('cover_image' => ''));
      }

      return redirect('/admin/gallery')->with('success', 'Photo Deleted');
    }
  }
}
