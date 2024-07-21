<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAppointment;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
        $barbers = User::where('role', 'barber')->latest()->get(['id', 'name', 'shift']);

        return view('dashboard.appointments.create', compact('services', 'barbers'));
    }

    public function store(RequestAppointment $request)
    {
        $isBarberNotAvailable = Appointment::where('barber_id', $request->barber_id)
            ->where('appointment_date', $request->appointment_date)
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'disetujui');
            })
            ->exists();

        if ($isBarberNotAvailable) {
            return back()->with('error', 'Barber tidak tersedia pada tanggal ' . Carbon::parse($request->appointment_date)->translatedFormat('d F Y'))
                ->withInput();
        }

        Appointment::create($request->validated());

        return redirect()->route('appointments.index')->with('success', "Data reservasi berhasil dibuat");
    }

    public function edit(Appointment $appointment)
    {
        $services = Service::latest()->get(['id', 'name']);
        $barbers = User::where('role', 'barber')->latest()->get(['id', 'name', 'shift']);

        return view('dashboard.appointments.edit', compact('appointment', 'services', 'barbers'));
    }

    public function update(Appointment $appointment, RequestAppointment $request)
    {
        $isBarberNotAvailable = Appointment::where('barber_id', $request->barber_id)
            ->where('appointment_date', $request->appointment_date)
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'disetujui');
            })
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($isBarberNotAvailable) {
            return back()->with('error', 'Barber tidak tersedia pada tanggal ' . Carbon::parse($request->appointment_date)->translatedFormat('d F Y'))
                ->withInput();
        }

        $appointment->update($request->validated());

        return redirect()->route('appointments.index')->with('success', "Data reservasi berhasil diubah");
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', "Data reservasi berhasil dihapus");
    }

    public function updateStatus(Appointment $appointment, Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $appointment->status = $request->input('status');
        $appointment->save();

        return back()->with('success', 'Status janji temu berhasil diperbarui.');
    }

    public function printInvoice(Appointment $appointment)
    {
        $invoiceData = [
            'id' => $appointment->id,
            'date' => $appointment->appointment_date,
            'status' => $appointment->status,
            'client_name' => $appointment->customer_name,
            'client_phone' => $appointment->customer_phone,
            'client_email' => $appointment->customer_email,
            'service' => $appointment->service->name,
            'amount' => $appointment->service->price,
        ];

        $pdf = Pdf::loadView('dashboard.appointments.invoice', compact('invoiceData'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('invoice-' . $appointment->id . '.pdf');
    }
}
