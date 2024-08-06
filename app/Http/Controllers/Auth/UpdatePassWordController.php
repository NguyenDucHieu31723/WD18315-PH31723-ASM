<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePassWordController extends Controller
{
    public function showFormUpdate(){
        return view('auth.show-form-update');
    }
}
