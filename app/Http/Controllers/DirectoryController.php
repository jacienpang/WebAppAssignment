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
    public function index(Request $request)
    {

        $tenants = Tenant::with('zone:id,code')
        ->when($request->query('zone_id'), function($query) use ($request) {
              return $query->where('zone_id', $request->query('zone_id'));
          })
        ->when($request->query('floor_id'), function($query) use ($request) {
              return $query->where('floor_id', $request->query('floor_id'));
          })
        ->when($request->query('category_id'), function($query) use ($request) {
              return $query->where('category_id', $request->query('category_id'));
          })
        ->paginate(20);

        return view('directory.index', [
            'tenants' => $tenants,
            'request' => $request,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;

        return view('directory.show', [
          'tenant' => $tenant
        ]);
    }
}
