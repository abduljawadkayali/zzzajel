<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function __construct() {
     $this->middleware('permission:Designer');
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Price::all();
     //   dd($data);

        return view('price.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Price::all();
        if (!$data->isEmpty())
        {
            toast(__('Please Delete the existed price firstly'),'warning');
            return redirect()->route('price.index');
        }

        $request->validate([
            'mazot'         =>  'required',
            'barrelMazot'         =>  'required',
            'benzin'         =>  'required',
            'barrelBenzin'         =>  'required'
        ]);



        $form_data = array(
            'mazot' =>$request->mazot ,
            'barrelMazot' =>$request->barrelMazot,
            'benzin' =>$request->benzin ,
            'barrelBenzin' =>$request->barrelBenzin
        );

        Price::create($form_data);
        toast(__('Price Added Successfully'),'success');
        return redirect()->route('price.index');
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
    public function edit($id)
    {
        $data = Price::findOrFail($id);
        return view('price.edit', compact('data'));
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
        $request->validate([
            'mazot'         =>  'required',
            'barrelMazot'         =>  'required',
            'benzin'         =>  'required',
            'barrelBenzin'         =>  'required'
        ]);
        $form_data = array(
            'mazot' =>$request->mazot ,
            'barrelMazot' =>$request->barrelMazot,
            'benzin' =>$request->benzin ,
            'barrelBenzin' =>$request->barrelBenzin
        );

            Price::whereId($id)->update($form_data);
            toast(__('Price Updated Successfuly'),'success');
            return redirect()->route('price.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Price::findOrFail($id);
        $data->delete();
        toast(__('Price Deleted Successfully'),'info');
        return redirect()->route('price.index');
    }
}
