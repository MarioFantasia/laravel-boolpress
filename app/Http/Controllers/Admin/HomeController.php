<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() //dopo il login vengo indirizzato in questa pagina
    {
        return view("admin.home");
    }
}
