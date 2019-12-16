<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Model::all();
        return view('models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Model::create($request->validate([
            'name' => 'required',
            //'brand' => 'required'
        ]));

        return redirect(route('models.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Model $model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        return view('models.show', ['model' => $model] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return view('models.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        return view('models.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        return view('models.destroy');
    }
}
