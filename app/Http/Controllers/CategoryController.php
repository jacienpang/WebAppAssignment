<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
      $categories = Category::orderBy('name', 'asc')->get();

      return view('categories.index', [
          'categories' => $categories
      ]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $category = new Category();

        return view('categories.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
        ]);

        $category = new Category;
        $category->fill($request->all());
        $category->save();

        return redirect()->route('category.index');
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
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        return view('categories.show', [
          'category' => $category
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
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        return view('categories.edit', [
          'category' => $category
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
          'name' => 'required',
        ]);

        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        $category->fill($request->all());

        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		    $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');

    }
}
