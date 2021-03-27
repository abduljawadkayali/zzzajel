<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Jorney;
use Illuminate\Http\Request;

class JorneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Jorney::all();

        return view('main.journey.index', compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.journey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'adres' => 'required'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'name' => $request->name,
            'adres' => $request->adres,
            'lan' => $request->lan ?? '',
            'lat' => $request->lat ?? ''
        );

        Jorney::create($form_data);
        toast(__('Journey Added Successfully'), 'success');
        return redirect()->route('journey.index');
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
        $journey  = Jorney::findOrFail($id);
        return view('/main/journey/edit', compact('journey'));
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
        $rules = [
            'name' => 'required',
            'adres' => 'required'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'name' => $request->name,
            'adres' => $request->adres,
            'lan' => $request->lan ?? '',
            'lat' => $request->lat ?? ''
        );


        Jorney::whereId($id)->update($form_data);
        toast(__('Journey Updated Successfully'), 'success');
        return redirect()->route('journey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jorney::findOrFail($id);
        $data->delete();
        toast(__('Journey Deleted Successfully'),'info');
        return redirect()->route('journey.index');
    }
}
