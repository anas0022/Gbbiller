<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpiryController extends Controller
{
    public function expired(){
        
        return view('supperadmin.subexpiry.expiry');
    }
}
