<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $zones = Zone::orderBy('code', 'asc')->get();

      return view('zones.index', [
          'zones' => $zones
      ]);
    }

    /**
     * Show the form for creating a new zone.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zone = new Zone();

        return view('zones.create', [
            'zone' => $zone,
        ]);
    }

    /**
     * Store a newly created zone in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'code' => 'required',
        ]);
        $zone = new Zone;
        $zone->fill($request->all());
        $zone->save();

        return redirect()->route('zone.index');
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
        $zone = Zone::find($id);
        if(!$zone) throw new ModelNotFoundException;

        return view('zones.show', [
          'zone' => $zone
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
        $zone = Zone::find($id);
        if(!$zone) throw new ModelNotFoundException;

        return view('zones.edit', [
          'zone' => $zone
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
        $request->validate([
          'code' => 'required',
        ]);
        
        $zone = Zone::find($id);
        if(!$zone) throw new ModelNotFoundException;

        $zone->fill($request->all());

        $zone->save();

        return redirect()->route('zone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		    $zone = Zone::find($id);
        $zone->delete();
        return redirect()->route('zone.index')
                        ->with('success','Zone deleted successfully');

    }

}
