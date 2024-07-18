<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RequestStoreOrUpdateUser;
use Illuminate\Support\Facades\Hash;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barbers = User::orderByDesc('id')->where('role', 'barber');
        $barbers = $barbers->paginate(50);

        return view('dashboard.barbers.index', compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barbers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateUser $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if($request->hasFile('avatar')){
            $fileName = time() . '.' . $request->avatar->extension();
            $validated['avatar'] = $fileName;

            // move file
            $request->avatar->move(public_path('uploads/images'), $fileName);
        }

        $validated['password'] = Hash::make($validated['password']);

        $barber = User::create($validated);

        return redirect(route('barbers.index'))->with('success', 'Data barber berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barber = User::findOrFail($id);

        return view('dashboard.barbers.edit', compact('barber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateUser $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $barber = User::findOrFail($id);

        $validated['avatar'] = $barber->avatar;

        if($request->hasFile('avatar')){
            $fileName = time() . '.' . $request->avatar->extension();
            $validated['avatar'] = $fileName;

            // move file
            $request->avatar->move(public_path('uploads/images'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/images/'.$barber->avatar);
            if(file_exists($oldPath) && $barber->avatar != 'avatar.png'){
                unlink($oldPath);
            }
        }

        $barber->update($validated);

        return redirect(route('barbers.index'))->with('success', 'Data barber berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barber = User::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/'.$barber->avatar);
        if(file_exists($oldPath) && $barber->avatar != 'avatar.png'){
            unlink($oldPath);
        }
        $barber->delete();

        return redirect(route('barbers.index'))->with('success', 'Data barber berhasil dihapus.');
    }
}
