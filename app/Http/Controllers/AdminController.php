<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $doctors = Doctor::with('user')->get();
        $appointments = Appointment::with('patient', 'doctor.user')->get();
        return view('admin.dashboard', compact('users', 'doctors', 'appointments'));
    }

    public function makeDoctor(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'specialty' => 'required|string',
            'phone'     => 'nullable|string',
            'bio'       => 'nullable|string',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->update(['role' => 'doctor']);

        Doctor::create([
            'user_id'   => $user->id,
            'specialty' => $request->specialty,
            'phone'     => $request->phone,
            'bio'       => $request->bio,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Doctor added successfully.');
    }
}