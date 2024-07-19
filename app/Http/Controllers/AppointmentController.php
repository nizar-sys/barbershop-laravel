<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->paginate(10);

        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $services = Service::latest()->get(['id', 'name']);
        $barbers = User::where('role', 'barber')->latest()->get(['id', 'name']);

        return view('dashboard.appointments.create', compact('services', 'barbers'));
    }
}
