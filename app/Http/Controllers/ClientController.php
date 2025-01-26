<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function appointments()
{
    $appointments = Appointment::with('service', 'barber')->get(); 
    return Inertia::render('Client/Appointments', [
        'appointments' => $appointments,
        'user' => auth()->user(),
    ]);
}
}
