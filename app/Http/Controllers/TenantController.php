<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tenants = Tenant::orderBy('name', 'asc')->get();

      return view('tenants.index', [
          'tenants' => $tenants
      ]);
    }

    /**
     * Show the form for creating a new tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenant = new Tenant();

        return view('tenants.create', [
            'tenant' => $tenant,
        ]);
    }

    /**
     * Store a newly created tenant in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tenant = new Tenant;
        $tenant->fill($request->all());
        $tenant->save();

        return redirect()->route('tenant.index');
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

        return view('tenants.show', [
          'tenant' => $tenant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;

        return view('tenants.edit', [
          'tenant' => $tenant
        ]);
    }

    /**
      * Update the specified resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      * @param int $id
      *
      * @return \Illuminate\Http\Response
      */
    public function update(Request $request, $id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;

        $tenant->fill($request->all());

        $tenant->save();

        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		    $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect()->route('tenant.index')
                        ->with('success','Tenant deleted successfully');

    }
}
