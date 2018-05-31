<?php

namespace App\Http\Controllers;

use App\Football;
use Illuminate\Http\Request;

class FootballController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footballs=Football::latest()->paginate(16);
        return view('footballs.index',compact('footballs',$footballs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('footballs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

       'country'=>'required'
       ]);
       Football::create($request->all());
       return redirect('footballs')->with('message','Country Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function show(Football $football)
    {
        return view('footballs.show',compact('football'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function edit(Football $football)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Football $football)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function destroy(Football $football)
    {
        //
    }
}
