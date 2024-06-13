<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Visit::create($request->all());
        return redirect()->route('hospital.show',$request->patients_id);
    }

}
