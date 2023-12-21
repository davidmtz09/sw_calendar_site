<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\Appointment as AppointmentRequest;
use App\Http\Requests\Appointment\Put;
use App\Http\Resources\Appoinment as AppointmentResource;

//use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Auth\AuthController;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Appointment::all();
        return response()->json(AppointmentResource::collection($events));
    }

    public function index2()
    {
        $appointments = Appointment::paginate(5);
  
        return inertia("Agenda/Index", compact("appointments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        Appointment::create([
            'reason' => $request->title,
            'desc' => $request->desc,
            'begin' => $request->start,
            'end' => $request->end,
            'session' => $request->session,
            'date_at' => $request->date_at,//quitar
            'date_end' => $request->date_end,//quitar
            'hour' => $request->hour,//quitar
            'hour_end' => $request->hour_end//quitar
        ]);

        return redirect()->back()->with('success', 'Reservado con exito');
        //return response()->json(['success' => true, 'message' => 'Reservado con éxito']);

        //  dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return inertia("Agenda/Edit", compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Put $request, Appointment $appointment)
    {
       $appointment->reason = $request->input('title');
       $appointment->desc = $request->input('desc');
       $appointment->date_at = $request->input('date_at');
       $appointment->hour = $request->input('hour');
       $appointment->date_end = $request->input('date_end');
       $appointment->hour_end = $request->input('hour_end');
       $appointment->session = $request->input('session');
       $appointment->begin = $request->input('start');
       $appointment->end = $request->input('end');
       $appointment->save();
       return redirect()->route('appointments.index2');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index2');
    }
}
