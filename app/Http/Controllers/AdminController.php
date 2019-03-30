<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $admins = Admin::all();
        return view('admins.index', [
          'admins' => $admins,
        ]);
    }
    public function store(Request $request) {
        $admins = new Admin;
        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->phone = $request->input('phone');
        $admins->save();
        return redirect()->route('admins.index');
    }
}
