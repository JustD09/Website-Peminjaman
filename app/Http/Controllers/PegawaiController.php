<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $pegawai = Berkas::orderBy('created_at', 'DESC')->get();
  
        return view('pegawai.index', compact('pegawai'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'slip_gaji' => 'required|image|max:2048',
            'data_riwayat' => 'required|image|max:2048',
            'rincian_gaji' => 'required|image|max:2048',
    ]);

    // Menambahkan nilai 'hasil' dan 'status' secara manual ke dalam array $validated
        

        $pegawai = new Berkas();
        $pegawai->nama = $validated['nama'];

        if ($request->hasFile('slip_gaji')) {
            $slipGaji = $request->file('slip_gaji');
            $namaSlip = time() . '_slip.' . $slipGaji->getClientOriginalExtension();
            $slipGaji->move(public_path('slip_gaji'), $namaSlip);
            $pegawai->slip_gaji = $namaSlip;
        }

        if ($request->hasFile('data_riwayat')) {
            $dataRiwayat = $request->file('data_riwayat');
            $namaDataRiwayat = time() . '_riwayat.' . $dataRiwayat->getClientOriginalExtension();
            $dataRiwayat->move(public_path('data_riwayat'), $namaDataRiwayat);
            $pegawai->data_riwayat = $namaDataRiwayat;
        }

        if ($request->hasFile('rincian_gaji')) {
            $rincianGaji = $request->file('rincian_gaji');
            $namaRincianGaji = time() . '_rincian.' . $rincianGaji->getClientOriginalExtension();
            $rincianGaji->move(public_path('rincian_gaji'), $namaRincianGaji);
            $pegawai->rincian_gaji = $namaRincianGaji;
        }

        $pegawai->save();

        return redirect()->route('pegawai')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Berkas::findOrFail($id);
  
        return view('pegawai.show', compact('pegawai'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Berkas::findOrFail($id);
  
        return view('pegawai.edit', compact('pegawai'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Berkas::findOrFail($id);
  
        $pegawai->update($request->all());
  
        return redirect()->route('pegawai')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Berkas::findOrFail($id);
  
        $pegawai->delete();
  
        return redirect()->route('pegawai')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }
}
