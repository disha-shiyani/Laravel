<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $user=Auth::user();
    //     return $user;
        
        $patients = Hospital::paginate(5);
        return view('hospital.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = $request->validate([
            'name' => 'required',
            'mobileno' => 'required|numeric',
            'dicese' => 'required|alpha_num',
            'medicin' => 'required|alpha_num',
            'user_id' => 'required'
        ]);
        
        return $request->all();

        // Hospital::create($request->all());
        $myblog= new Myblog();
        $myblog->title=$request->title;
        $myblog->subtitle=$request->subtitle;
        $myblog->body_content=$request->body_content;
        $myblog->user_id=$request->user_id;
        // $myblog->slug=Str::$request->user_id;
        return redirect()->route('hospital.index');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view('hospital.show',compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        return view('hospital.edit',compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {   
            $var = $request->validate([
                'name' => 'required',
                'mobileno' => 'required|numeric',
                'dicese' => 'required|alpha_num',
                'medicin' => 'required|alpha_num',
                'user_id' => 'required'
            ]);
            
        // return $request->all();
         
        $hospital->update($request->all());
        return redirect()->route('hospital.index');
        // $user = $request->user();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('hospital.index');
    }
}
