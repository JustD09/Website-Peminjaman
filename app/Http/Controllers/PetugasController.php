<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
class PetugasController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $petugas = Pengajuan::orderBy('created_at', 'DESC')->get();
  
        return view('petugas.index', compact('petugas'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nama_nasabah' => 'required|string|max:255',
            'kelengkapan_tunjangan' => 'required|string|max:100',
            'tanggungan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'total_potongan' => 'required|string|max:255',
            'total_tunjangan' => 'required|string|max:255',
            'hasil' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $petugas = new Pengajuan();
        $petugas->nama_nasabah = $validated['nama_nasabah'];
        $petugas->kelengkapan_tunjangan = $validated['kelengkapan_tunjangan'];
        $petugas->tanggungan = $validated['tanggungan'];
        $petugas->pekerjaan = $validated['pekerjaan'];
        $petugas->total_potongan = $validated['total_potongan'];
        $petugas->total_tunjangan = $validated['total_tunjangan'];
        $petugas->hasil = $validated['hasil'];
        $petugas->status = $validated['status'];

        $petugas->save();

        return redirect()->route('petugas')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugas = Pengajuan::findOrFail($id);
  
        return view('petugas.show', compact('petugas'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Pengajuan::findOrFail($id);
  
        return view('petugas.edit', compact('petugas'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = Pengajuan::findOrFail($id);
  
        $petugas->update($request->all());
  
        return redirect()->route('petugas')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Pengajuan::findOrFail($id);
  
        $petugas->delete();
  
        return redirect()->route('petugas')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }
}
