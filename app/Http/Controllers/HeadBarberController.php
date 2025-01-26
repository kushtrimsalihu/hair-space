<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class HeadBarberController extends Controller
{
    public function index()
{
    // Fetch data for the dashboard
    $appointments = Appointment::with(['service', 'barber', 'client'])
        ->where('status', 'completed')
        ->orderBy('date', 'desc')
        ->get();

    $earnings = $appointments->sum('service.price');

    return inertia('HeadBarber/Dashboard', [
        'appointments' => $appointments,
        'earnings' => $earnings,
    ]);
}

public function reports()
{
    // Example: fetch additional reporting data
    $dailyEarnings = Appointment::where('status', 'completed')
        ->selectRaw('DATE(date) as day, SUM(service.price) as total')
        ->groupBy('day')
        ->get();

    return inertia('HeadBarber/Reports', ['dailyEarnings' => $dailyEarnings]);
}
}
