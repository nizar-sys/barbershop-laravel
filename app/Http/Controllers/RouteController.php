<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
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

    public function index()
    {
        $barbers = User::where('role', 'barber')->get(['id', 'name', 'avatar']);
        $services = Service::latest()->get(['id', 'name', 'price_show'])->chunk(3);


        return view('frontends.index', compact('barbers', 'services'));
    }

    public function createAppointment(Request $request)
    {
        $isBarberAvailable = !Appointment::where('barber_id', $request->barber_id)
            ->where('appointment_date', $request->appointment_date)
            ->whereIn('status', ['pending', 'disetujui'])
            ->exists();

        if (!$isBarberAvailable) {
            $formattedDate = Carbon::parse($request->appointment_date)->translatedFormat('d F Y');
            return response()->json([
                'status' => 'error',
                'message' => "Barber tidak tersedia pada tanggal $formattedDate"
            ]);
        }

        Appointment::create($request->all());

        $barber = User::findOrFail($request->barber_id);
        $barberName = $barber->name ?? 'Barber';
        $barberPhoneNumber = $this->formatPhoneNumber($barber->phone_number ?? '6282124721853');

        $formattedDate = Carbon::parse($request->appointment_date)->translatedFormat('d F Y');
        $textForWhatsApp = sprintf(
            "Halo, saya telah melakukan reservasi pada tanggal %s dengan %s. Mohon tunggu konfirmasi selanjutnya.",
            $formattedDate,
            $barberName
        );

        $messageApiWhatsApp = "https://wa.me/$barberPhoneNumber?text=" . urlencode($textForWhatsApp);

        $message = sprintf(
            "Data reservasi berhasil dibuat.<br>Mohon tunggu konfirmasi selanjutnya.<br><a target='_blank' href='%s'>Klik disini</a> untuk menghubungi barber.",
            $messageApiWhatsApp
        );

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    private function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        if (strpos($phoneNumber, '62') !== 0) {
            $phoneNumber = '62' . ltrim($phoneNumber, '0');
        }

        return $phoneNumber;
    }
}
