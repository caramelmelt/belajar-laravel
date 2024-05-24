<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\Category;
use App\Models\User;
use PDF;
// use App\Http\Requests\StoreinventarisRequest;
use App\Http\Requests\UpdateinventarisRequest;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin/index', [
            'title' => 'Dashboard',
            'inventaris' => Inventaris::all()
        ]);
    }
    public function showInventaris()
    {
        return view ('admin/inventaris/index', [
            'title' => 'Data Inventaris',
            'inventaris' => Inventaris::all(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'kode_barang' => 'required|max:10|unique:inventaris,kode_barang',
            'nama_barang' => 'required|max:255',
            'category_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required|max:255',
            'users_id' => 'required',
            'tgl_akuisisi' => 'max:255',
            'image-inventaris' => 'image|file|max:1024'
        ]);

        if($request->file('image-inventaris')){
            $validatedData['image'] = $request->file('image-inventaris')->store('image-inventaris');
        }

        inventaris::create($validatedData);

        return redirect('/admin/inventaris')->with('Success', 'New Inventaris has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inventaris $inventaris)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $inventarisId)
    {
        $rules = [
            'nama_barang' => 'required|max:255',
            'category_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required|max:255',
            'users_id' => 'required',
            'tgl_akuisisi' => 'max:255'
        ];
    
        // Ambil data inventaris berdasarkan ID yang diberikan
        $inventaris = inventaris::findOrFail($inventarisId);
    
        // Periksa apakah kode_barang telah berubah
        if ($request->kode_barang != $inventaris->kode_barang) {
            $rules['kode_barang'] = 'required|max:10|unique:inventaris,kode_barang';
        }
    
        // Validasi data yang diterima dari form
        $validatedData = $request->validate($rules);
    
        // Lakukan pembaruan data inventaris
        $inventaris->update($validatedData);
    
        // Redirect kembali ke halaman admin dengan pesan sukses
        return redirect()->intended('/admin/inventaris/')->with('Success', 'Inventaris data has been updated!');
    }

    public function generateLaporan()
    {
        // Ambil data dari database
        $inventaris = inventaris::all();

        // Generate PDF
        $pdf = PDF::loadView('admin/inventaris/laporan', ['inventaris' => $inventaris]);

        // Download the PDF
        return $pdf->download('laporan-inventaris.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventaris $inventaris)
    {
        inventaris::destroy($inventaris->id);
        return redirect('/admin/inventaris/')->with('Success','Inventaris has been deleted!');
    }
}
