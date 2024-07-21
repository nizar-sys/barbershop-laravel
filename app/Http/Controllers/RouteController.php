<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function dashboard()
    {
        $data = [
            'barber_count' => User::where('role', 'barber')->count(),
            'service_count' => Service::count(),
            'appointment_count' => Appointment::count(),
        ];

        return view('dashboard.index', compact('data'));
    }
}
