<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class logindash extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(["index", "NotLogin"]);
        $this->middleware('isAdmin')->only(["AdminDashbored"]);
    }

    public function index()
   {


       if (Auth::check()){
           //$this->middleware(['isAdmin']);
           if (Auth::user()->hasPermissionTo('isAdmin'))
               return (logindash::AdminDashbored());
           elseif (Auth::user()->hasPermissionTo('Designer'))
               return (logindash::DesignerDashbored());
           elseif (Auth::user()->hasPermissionTo('Editor'))
               return (logindash::EditorDashbored());
           else {
               Auth::logout();
               return (logindash::NotLogin());
           }
       }
       else
           return (logindash::NotLogin());


   }

   public function NotLogin()
   {
       return redirect()->action('HomeController@index');
   }

   public function AdminDashbored()
   {
       return redirect()->route('users.index');
      // dd("admin");
       //return view('users');
   }

   public function DesignerDashbored()
   {

       return redirect()->route('crud.create');
   }
   public function EditorDashbored()
   {

       return redirect()->route('bus.index');
   }
}
