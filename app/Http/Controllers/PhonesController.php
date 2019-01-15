<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phones;
use Illuminate\Support\Facades\Input;

class PhonesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

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

    public function search()
    {
        $q = Input::get('query');
        if ($q != "") {
            $phones = Phones::where('productionYear', 'LIKE', '%' . $q . '%')
                ->orWhere('model', 'LIKE', '%' . $q . '%')
                ->orWhere('manufacturer', 'LIKE', '%' . $q . '%')->get()->all();
            if (count($phones) > 0) {
                return view('phones.index')->with(['phones' => $phones, 'query' => $q]);
            } else {
                return view('phones.index')->with(['message', "No phones found for this search!"]);
            }
        }
        else{
            return view('phones.index')->with(['message', "Your search is empty!"]);
        }
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
            //'yearOfProduction' => 'required',
            'phone_image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        // File handlind
        if($request->hasFile('phone_image')){
            $fileNameAndExtension = $request->file('phone_image')->getClientOriginalName();

            //Get only filename
            $fileName = pathinfo($fileNameAndExtension, PATHINFO_FILENAME);

            //Get only extension
            $extension = $request->file('phone_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameStored = $fileName.'_'.time().'.'.$extension;

            //Upload image
            $path = $request->file('phone_image')->storeAs('public/phone_images', $fileNameStored);

        } else{
            $fileNameStored = 'default_image.jpg';
        }

        $phone = new Phones;
        $phone->name = $request->input('name');
        $phone->model = $request->input('model');
        $phone->manufacturer = $request->input('manufacturer');
        $phone->productionYear = $request->input('productionYear');
        $phone->user_id = auth()->user()->id;
        $phone->phone_image = $fileNameStored;
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

        //Protection against other people editing other people phones.
        if(auth()->user()->id !==$phone->user_id) {
            return redirect('/phones')->with('error', 'This page cant be displayed.');
        }
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

        if($request->hasFile('phone_image')){
            $fileNameAndExtension = $request->file('phone_image')->getClientOriginalName();

            //Get only filename
            $fileName = pathinfo($fileNameAndExtension, PATHINFO_FILENAME);

            //Get only extension
            $extension = $request->file('phone_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameStored = $fileName.'_'.time().'.'.$extension;

            //Upload image
            $path = $request->file('phone_image')->storeAs('public/phone_images', $fileNameStored);

        }

        $phone = Phones::find($id);
        $phone->name = $request->input('name');
        $phone->model = $request->input('model');
        $phone->manufacturer = $request->input('manufacturer');
        $phone->productionYear = $request->input('productionYear');
        $phone->user_id = auth()->user()->id;

        //Saves the image if we don't choose a new one when update.
        if($request->hasFile('phone_image')){
            $phone->phone_image = $fileNameStored;
        }
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

        //Protection against other people editing other people phones.
        if(auth()->user()->id !==$phone->user_id) {
            return redirect('/phones')->with('error', 'This page cant be displayed.');
        }
        $phone->delete();
        return redirect('/phones')->with('success', 'Phone deleted!');
    }
}
