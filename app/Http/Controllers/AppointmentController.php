<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('patient_id', auth()->id())
            ->with('doctor.user')
            ->orderBy('date')
            ->get();
        return view('patient.dashboard', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('patient.book', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date'      => 'required|date|after:today',
            'time'      => 'required',
            'notes'     => 'nullable|string',
        ]);

         $conflict = Appointment::where('doctor_id', $request->doctor_id)
             ->where('date', $request->date)
             ->where('time', $request->time)
             ->where('status', '!=', 'cancelled')
             ->exists();

        if ($conflict) {
            return back()->withErrors(['time' => 'This time slot is already booked. Please choose another time.']);
        }

        Appointment::create([
            'patient_id' => auth()->id(),
            'doctor_id'  => $request->doctor_id,
            'date'       => $request->date,
            'time'       => $request->time,
            'notes'      => $request->notes,
            'status'     => 'pending',
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Appointment booked successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('patient.dashboard')->with('success', 'Appointment cancelled.');
    }
}