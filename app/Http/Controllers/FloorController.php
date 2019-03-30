<?php

namespace App\Http\Controllers;

use App\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $floors = Floor::orderBy('code', 'asc')->get();

      return view('floors.index', [
          'floors' => $floors
      ]);
    }

    /**
     * Show the form for creating a new floor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floor = new Floor();

        return view('floors.create', [
            'floor' => $floor,
        ]);
    }

    /**
     * Store a newly created floor in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $floor = new Floor;
        $floor->fill($request->all());
        $floor->save();

        return redirect()->route('floor.index');
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
        $floor = Floor::find($id);
        if(!$floor) throw new ModelNotFoundException;

        return view('floors.show', [
          'floor' => $floor
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
        $floor = Floor::find($id);
        if(!$floor) throw new ModelNotFoundException;

        return view('floors.edit', [
          'floor' => $floor
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
        $floor = Floor::find($id);
        if(!$floor) throw new ModelNotFoundException;

        $floor->fill($request->all());

        $floor->save();

        return redirect()->route('floor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		    $floor = Floor::find($id);
        $floor->delete();
        return redirect()->route('floor.index')
                        ->with('success','Floor deleted successfully');

    }
}
