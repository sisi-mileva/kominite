<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class AdminPanelController extends Controller
{
    public function index() {
      if (isset(Auth::user()->email)) {
        return redirect('admin/cms');
      } else {
        return view('admin/login');
      }
    }

    public function checkLogin(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password'  => 'required|alphaNum|min:3'
      ]);

      $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
      );

      if(Auth::attempt($user_data))
      {
        return redirect('admin/cms');
      }
      else
      {
        return back()->with('error', 'Грешен имейл или парола!');
      }

    }

    public function successLogin()
    {
      if (isset(Auth::user()->email)) {
        return view('admin/cms');
      } else {
        return redirect('admin');
      }
    }

    public function logout()
    {
      Auth::logout();
      return redirect('admin');
    }
}
