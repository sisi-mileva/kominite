<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\GeneralInfo;

class GeneralInfoController extends Controller
{
  public function about() {
    if (isset(Auth::user()->email)) {
      $generalInfo = GeneralInfo::where('type', '1')->get();
      return view('admin.general-info.index')->with('generalInfo', $generalInfo[0]);
    } else {
      return redirect('admin');
    }
  }

  public function contacts() {
    if (isset(Auth::user()->email)) {
      $generalInfo = GeneralInfo::where('type', '2')->get();
      return view('admin.general-info.index')->with('generalInfo', $generalInfo[0]);
    } else {
      return redirect('admin');
    }
  }

  public function update(Request $request) {
    $id = $request->input('id');
    $type = $request->input('type');
    $url = '';
    if ($type == '1') {
      $url = 'about-us';
    } else {
      $url = 'contacts';
    }

    $generalInfo = GeneralInfo::find($id);

    $generalInfo->page_content = $request->input('page_content');

    $generalInfo->save();

    return redirect('admin/' . $url)->with('success', 'General Info Updated');
  }
}
