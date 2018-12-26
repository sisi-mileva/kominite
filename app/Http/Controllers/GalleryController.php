<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Album;

class GalleryController extends Controller
{
  public function index() {
    $albums = Album::with('Photos')->get();
    return view('site.gallery')->with('albums', $albums);
  }

  public function show($id){
    $album = Album::with('Photos')->find($id);
    return view('site.album')->with('album', $album);
  }
}