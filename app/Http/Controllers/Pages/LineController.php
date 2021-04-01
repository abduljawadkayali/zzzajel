<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Jorney;
use App\Line;
use Illuminate\Http\Request;

class LineController extends Controller
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
        $lines = Line::all();

        return view('main.line.index', compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jorneys = Jorney::all();
        return view('/main/line/create', compact('jorneys'));
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
            'price' => 'required',
            'duration' => 'required',
            'startingTime' => 'required',
            'image'         =>  'required|image|max:2048',
            'jorney_id' => 'required'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration  ,
            'startingTime' => $request->startingTime  ,
            'status' => $request->status  ?? 'off' ,
            'image'            =>   $new_name,
            'jorney_id' => $request->jorney_id
        );

        Line::create($form_data);
        toast(__('Line Added Successfully'), 'success');
        return redirect()->route('line.index');
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
        $jorneys = Jorney::all();
        $line = Line::findOrFail($id);
        return view('/main/line/edit', compact('jorneys', 'line'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != '') {
            $rules = [
                'name' => 'required',
                'price' => 'required',
                'duration' => 'required',
                'startingTime' => 'required',
                'image'         =>  'required|image|max:2048',
                'jorney_id' => 'required'
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);


        }
        else{
            $rules = [
                'name' => 'required',
                'price' => 'required',
                'duration' => 'required',
                'startingTime' => 'required',
                'jorney_id' => 'required'
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
        }

        $form_data = array(
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration  ,
            'startingTime' => $request->startingTime  ,
            'status' => $request->status  ?? 'off' ,
            'image'            =>   $image_name,
            'jorney_id' => $request->jorney_id
        );

        Line::whereId($id)->update($form_data);
        toast(__('Line Updated Successfully'), 'success');
        return redirect()->route('line.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Line::findOrFail($id);
        $data->delete();
        toast(__('Line Deleted Successfully'),'info');
        return redirect()->route('line.index');
    }
}
