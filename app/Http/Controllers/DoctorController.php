<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $doctor = auth()->user()->doctor;
        $appointments = Appointment::where('doctor_id', $doctor->id)
            ->with('patient')
            ->orderBy('date')
            ->get();
        return view('doctor.dashboard', compact('appointments'));
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled',
        ]);

        $appointment->update(['status' => $request->status]);
        return redirect()->route('doctor.dashboard')->with('success', 'Appointment updated.');
    }
}