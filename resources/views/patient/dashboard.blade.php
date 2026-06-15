@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">My Appointments</h1>
        <p class="text-gray-500 text-sm mt-1">Track and manage your upcoming visits</p>
    </div>
    <a href="{{ route('appointments.create') }}" class="bg-teal-600 text-white px-5 py-2 rounded-lg hover:bg-teal-700 font-medium flex items-center gap-2">
        + Book Appointment
    </a>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
@endif

@if($appointments->isEmpty())
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-12 text-center">
        <p class="text-gray-400 text-lg">No appointments yet.</p>
        <a href="{{ route('appointments.create') }}" class="mt-4 inline-block bg-teal-600 text-white px-5 py-2 rounded-lg hover:bg-teal-700">Book your first appointment</a>
    </div>
@else
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b bg-gray-50">
                    <th class="px-6 py-4 font-medium">Doctor</th>
                    <th class="px-6 py-4 font-medium">Specialty</th>
                    <th class="px-6 py-4 font-medium">Date</th>
                    <th class="px-6 py-4 font-medium">Time</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $appointment->doctor->user->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $appointment->doctor->specialty }}</td>
                    <td class="px-6 py-4">{{ $appointment->date }}</td>
                    <td class="px-6 py-4">{{ $appointment->time }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $appointment->status === 'confirmed' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $appointment->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($appointment->status !== 'cancelled')
                        <form method="POST" action="{{ route('appointments.destroy', $appointment) }}">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm font-medium">Cancel</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection