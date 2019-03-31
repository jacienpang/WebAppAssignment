<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::orderBy('name', 'asc')->get();

        return view('directory.index', [
            'tenants' => $tenants
        ]);
    }
}
