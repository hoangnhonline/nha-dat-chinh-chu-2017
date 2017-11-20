<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.member.index');
    }

    public function registerLand(Request $request)
    {
        return view('frontend.member.register_land');
    }
}
