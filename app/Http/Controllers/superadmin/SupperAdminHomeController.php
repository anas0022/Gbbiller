<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SupperAdminHomeController extends Controller
{
    public function home(){

        return view('supperadmin.home.dashboard');
    }
}
