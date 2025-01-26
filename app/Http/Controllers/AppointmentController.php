<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function create()
{
    $barbers = Barber::where('is_available', true)->get(); // Fetch only available barbers
    return Inertia::render('Appointments/Create', [
        'barbers' => $barbers,
    ]);
}


    public function store(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'barber_id' => $request->barber_id,
            'client_id' => auth()->id(),
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);

        return redirect()->route('client.appointments')->with('success', 'Appointment booked successfully!');
    }

    public function getAvailability($barberId)
    {
        $appointments = Appointment::where('barber_id', $barberId)
            ->pluck('appointment_date', 'appointment_time');

        return response()->json($appointments);
    }
}
