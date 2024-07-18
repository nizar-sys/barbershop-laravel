<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\RequestStoreOrUpdateService;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderByDesc('id');
        $services = $services->paginate(50);

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateService $request)
    {
        $validated = $request->validated() + [
            'price_show' => intval($request->price / 1000),
            'created_at' => now(),
        ];

        Service::create($validated);

        return redirect(route('services.index'))->with('success', 'Data layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Service::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateService $request, $id)
    {
        $validated = $request->validated() + [
            'price_show' => intval($request->price / 1000),
            'updated_at' => now(),
        ];

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect(route('services.index'))->with('success', 'Data layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect(route('services.index'))->with('success', 'Data layanan berhasil dihapus.');
    }
}
