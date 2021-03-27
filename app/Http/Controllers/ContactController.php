<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct() {
      //  $this->middleware('permission:Designer')->except(['store']);
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::all();
        return view('contact.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name'=>'required|max:120',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed'=> 'The :attribute field must be confirmed',
        ];
        $this->validate($request, $rules, $customMessages);
        $form_data = array(
            'name' =>$request->name ,
            'subject' =>$request->subject ,
            'phone' =>$request->phone,
            'message' =>$request->message
        );

        Contact::create($form_data);
        toast(__('We Recieved your Message and we will answer you as soon as possible ... Thanks'),'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Contact::findOrFail($id);
        return view('contact.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        toast(__('Message Deleted Successfully'),'info');
        return redirect()->route('contact.index');
    }
}
