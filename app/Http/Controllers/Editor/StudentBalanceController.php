<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\StudentBalance;
use Illuminate\Http\Request;

class StudentBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentBalance::all();
        return view('/Editor/pages/studentBalance.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Editor/pages/studentBalance/create');
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
            'monthNumber' => 'required|unique:App\StudentBalance,monthNumber',
            'balance' => 'required'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'monthNumber' => $request->monthNumber,
            'balance' => $request->balance
        );

        StudentBalance::create($form_data);
        toast(__('StudentBalance Added Successfully'), 'success');
        return redirect()->route('StudentBalance.index');
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
        $data = StudentBalance::findOrFail($id);
        $data->delete();
        toast(__('Student Balance Deleted Successfully'),'info');
        return redirect()->route('StudentBalance.index');
    }
}
