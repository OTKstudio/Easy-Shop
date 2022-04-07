<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $statut = Auth::user()->role;

        // statut:definit le statut de l'utilisateur

        // 1 : Admin
       if($statut=='1'){
           return view('admin');
       }

        // 2 : User
       if($statut=='2'){
        return view('dashboard');
       }
    }
}
