<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class LogoController extends Controller
{
    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }
    
    public function index(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'view')) {
            return view('frontend.member.nopermission');
        }

        return view('frontend.member.logo.index');
    }

    public function create(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'add')) {
            return view('frontend.member.nopermission');
        }

        return view('frontend.member.logo.create', compact('arrListCate','arrListCity'));
    }

    public function store()
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'add')) {
            return view('frontend.member.nopermission');
        }
    }

    public function edit($id)
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'edit')) {
            return view('frontend.member.nopermission');
        }

        return view('frontend.member.logo.edit', compact('arrListCate','arrListCity'));
    }

    public function update(Request $request, $id)
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'edit')) {
            return view('frontend.member.nopermission');
        }
    }
}
