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
     ->when($request->query('name'), function($query) use ($request) {
     return $query->where('name', 'like', '%'.$request->query('name').'%');
     })
     ->when($request->query('lot_number'), function($query) use ($request) {
     return $query->where('lot_number', $request->query('lot_number'));
     })
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
     * Show the application dashboard.
     * @param \Illuminate\Http\Request $request
     *
     *
     *
     */
    public function group($request, $tenants)
    {   $id = mysqli_real_escape_string($mysql, $request);
        $tenants = $tenants->where('zone_id', $id->input('zone_id'));

        return view('directory.index', [
            'tenants' => $tenants,
        ]);

    }
}
