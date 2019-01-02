<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phones;

class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Order by name.
        //$phones = Phones::orderBy('name', 'asc')->get();

        $phones = Phones::all();
        return view('phones.index')->with('phones', $phones);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'model' => 'required',
           'manufacturer' => 'required',
        ]);

        $phone = new Phones;
        $phone->name = $request->input('name');
        $phone->model = $request->input('model');
        $phone->manufacturer = $request->input('manufacturer');
        $phone->productionYear = $request->input('productionYear');
        $phone->user_id = auth()->user()->id;
        $phone->save();

        return redirect('/phones')->with('success', 'Phone added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phones::find($id);
        return view('phones.show')->with('phone', $phone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phones::find($id);
        return view('phones.edit')->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'model' => 'required',
            'manufacturer' => 'required',
        ]);

        $phone = Phones::find($id);
        $phone->name = $request->input('name');
        $phone->model = $request->input('model');
        $phone->manufacturer = $request->input('manufacturer');
        $phone->productionYear = $request->input('productionYear');
        $phone->user_id = auth()->user()->id;
        $phone->save();

        return redirect('/phones')->with('success', 'Phone updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phones::find($id);
        $phone->delete();

        return redirect('/phones')->with('success', 'Phone deleted!');
    }
}
