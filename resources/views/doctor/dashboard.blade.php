@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Doctor Dashboard</h1>
    <p class="text-gray-500 text-sm mt-1">Manage your patient appointments</p>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
@endif

<!-- Stats -->
<div class="grid grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Total</p>
        <p class="text-3xl font-bold text-teal-600">{{ $appointments->count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Pending</p>
        <p class="text-3xl font-bold text-yellow-500">{{ $appointments->where('status', 'pending')->count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Confirmed</p>
        <p class="text-3xl font-bold text-green-500">{{ $appointments->where('status', 'confirmed')->count() }}</p>
    </div>
</div>

@if($appointments->isEmpty())
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-12 text-center">
        <p class="text-gray-400 text-lg">No appointments yet.</p>
    </div>
@else
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b bg-gray-50">
                    <th class="px-6 py-4 font-medium">Patient</th>
                    <th class="px-6 py-4 font-medium">Date</th>
                    <th class="px-6 py-4 font-medium">Time</th>
                    <th class="px-6 py-4 font-medium">Notes</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $appointment->patient->name }}</td>
                    <td class="px-6 py-4">{{ $appointment->date }}</td>
                    <td class="px-6 py-4">{{ $appointment->time }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $appointment->notes ?? '—' }}</td>
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
                        <form method="POST" action="{{ route('doctor.appointment.update', $appointment) }}" class="flex gap-2">
                            @csrf @method('PATCH')
                            <button name="status" value="confirmed" class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs hover:bg-green-700 font-medium">Confirm</button>
                            <button name="status" value="cancelled" class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-red-600 font-medium">Cancel</button>
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