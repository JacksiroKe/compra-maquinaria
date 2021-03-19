<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modell;
use App\Models\Category;
use App\Models\Make;
use App\Http\Requests\ModelRequest;

class ModellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Modell $modell)
    {
        $this->authorize('manage-Models', User::class);

        return view('Modell.index', ['items' => $modell->with(['make', 'category'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Make $make, Category $category)
    {
        return view('Modell.create', ['makes' => $make->all(), 'categories' => $category->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request, Modell $modell)
    {   
        $modell->create($request->merge(['user' => auth()->user()->id ])->all());

        return redirect()->route('Modell.index')->withStatus(__('Modell data successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modell $modell, Make $make, Category $category)
    {
        $data['Modell'] = $modell;
        $data['makes'] = $make->all();
        $data['categories'] = $category->all();
        return view('Modell.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modell $modell)
    {
        $modell->update($request->merge(['user' => auth()->user()->id])->all());

        return redirect()->route('Modell.index')->withStatus(__('Modell Data successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modell $modell)
    {
        $modell->delete();

        return redirect()->route('Modell.index')->withStatus(__('Modell data successfully deleted.'));
    }
}
