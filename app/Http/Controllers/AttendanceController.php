<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\User;
use App\Models\Tamu;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $attendance= Attendance::all();
        $acara = Attendance::where('id_acara', $id)->get()->all();
        return view('attendance.index' , compact('attendance', 'acara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
    // Retrieve the tamu record based on the barcode
        $tamu = Tamu::where('barcode', $request->barcode)->get();
        foreach($tamu as $t){
            $id_tamu = $t->id;
        }
        // Create a new attendance record with the tamu_id
        Attendance::create([
            'acara_id' => $input['acara_id'],
            'tamu_id' => $id_tamu,
        ]);
        // dd($id_tamu);
        // Redirect or return a response
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance= Attendance::all();
        $acara = Attendance::Find($id);
        return view('attendance.index' , compact('attendance', 'acara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
