@extends('layouts.app')

@section('content')

<!-- Stats -->
<div class="grid grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Total Users</p>
        <p class="text-3xl font-bold text-teal-600">{{ $users->count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Doctors</p>
        <p class="text-3xl font-bold text-teal-600">{{ $doctors->count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <p class="text-sm text-gray-500 mb-1">Appointments</p>
        <p class="text-3xl font-bold text-teal-600">{{ $appointments->count() }}</p>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
@endif

<!-- Assign Doctor -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
        <span class="w-2 h-6 bg-teal-500 rounded-full inline-block"></span>
        Assign Doctor Role
    </h2>
    <form method="POST" action="{{ route('admin.makeDoctor') }}" class="grid grid-cols-2 gap-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">User</label>
            <select name="user_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                <option value="">Select a user</option>
                @foreach($users as $user)
                    @if($user->role === 'patient')
                    <option value="{{ $user->id }}">{{ $user->name }} — {{ $user->email }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Specialty</label>
            <input type="text" name="specialty" placeholder="e.g. Cardiology" class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
            <input type="text" name="bio" class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>
        <div class="col-span-2">
            <button type="submit" class="bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700 font-medium">
                Assign as Doctor
            </button>
        </div>
    </form>
</div>

<!-- All Appointments -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
        <span class="w-2 h-6 bg-teal-500 rounded-full inline-block"></span>
        All Appointments
    </h2>
    @if($appointments->isEmpty())
        <p class="text-gray-400 text-sm">No appointments yet.</p>
    @else
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-3 font-medium">Patient</th>
                    <th class="pb-3 font-medium">Doctor</th>
                    <th class="pb-3 font-medium">Date</th>
                    <th class="pb-3 font-medium">Time</th>
                    <th class="pb-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="py-3">{{ $appointment->patient->name }}</td>
                    <td class="py-3">{{ $appointment->doctor->user->name }}</td>
                    <td class="py-3">{{ $appointment->date }}</td>
                    <td class="py-3">{{ $appointment->time }}</td>
                    <td class="py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            {{ $appointment->status === 'confirmed' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $appointment->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection