<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/permintaan/index', [
            'title' => 'Data Permintaan',
            'permintaan' => Permintaan::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users_id' => 'required',
            'nama_barang' => 'required|max:255',
            'jumlah' => 'required',
            'alasan' => 'required',
            'status' => 'required'
        ]);
        
        Permintaan::create($validatedData);
        return redirect('admin/permintaan')->with('Success','New Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $permintaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $permintaanId)
    {
        $validatedData = $request->validate([
            'users_id' => 'required',
            'nama_barang' => 'required|max:255',
            'jumlah' => 'required',
            'alasan' => 'required',
            'status' => 'required'
        ]);

        $permintaan = Permintaan::findOrFail($permintaanId);
        $permintaan->update($validatedData);
        return redirect()->intended('admin/permintaan')->with('Success', 'Data has been updated!');
    }

    public function generateLaporan()
    {
        // Ambil data dari database
        $permintaan = Permintaan::all();

        // Generate PDF
        $pdf = PDF::loadView('admin/permintaan/laporan', ['permintaan' => $permintaan]);

        // Download the PDF
        return $pdf->download('laporan-permintaan.pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permintaan $permintaan)
    {
        Permintaan::destroy($permintaan->id);
        return redirect('/admin/permintaan')->with('Success','Data has been deleted!');
    }
}
