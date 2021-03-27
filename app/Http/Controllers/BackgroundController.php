<?php

namespace App\Http\Controllers;

use App\Background;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class BackgroundController extends Controller
{

    public function __construct() {
    //    $this->middleware('permission:Designer');
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = background::all();

        return view('background.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('background.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'         =>  'required|image',
            'title'         =>  'required',
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'image'            =>   $new_name,
            'link' =>$request->link ?? '',
            'link_title' =>$request->link_title ?? '',
            'body' =>$request->body  ?? '',
            'title' =>$request->title  ?? ''
        );

        Background::create($form_data);
        toast(__('Background Image Added Successfully'),'success');
        return redirect()->route('background.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Background::findOrFail($id);
        return view('background.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Background::findOrFail($id);
        return view('background.edit', compact('data'));
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
        if($image != '')
        {
            $request->validate([
                'image'         =>  'image'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $form_data = array(
                'image'            =>   $image_name,
                'link' =>$request->link ?? '',
                'link_title' =>$request->link_title ?? '',
                'body' =>$request->body ?? '',
                'title' =>$request->title ?? ''
            );
            Background::whereId($id)->update($form_data);
            toast(__('You never changed the photo'),'info');
            return redirect()->route('background.index');
        }
        $form_data = array(
            'image'            =>   $image_name,
            'link' =>$request->link ?? '',
            'link_title' =>$request->link_title ?? '',
            'body' =>$request->body ?? '',
            'title' =>$request->title ?? ''
        );

        Background::whereId($id)->update($form_data);
        toast(__('Background Image Updated Successfully'),'success');
        return redirect()->route('background.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Background::findOrFail($id);
        $data->delete();
        toast(__('Background Image Deleted Successfully'),'info');
        return redirect()->route('background.index');
    }
}
