<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PetugasPengajuanController extends Controller
{
    public function index()
    {
        $petugasPengajuan = Pengajuan::orderBy('created_at', 'DESC')->get();
  
        return view('petugasPengajuan.index', compact('petugasPengajuan'));
    }
  
    public function create()
    {
        return view('petugasPengajuan.create');
    }
  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_nasabah' => 'required|string|max:255',
            'kelengkapan_tunjangan' => 'required|string|max:100',
            'tanggungan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'total_potongan' => 'required|string|max:255',
            'total_tunjangan' => 'required|string|max:255',
        ]);

        // Menentukan hasil berdasarkan logika yang diberikan
        $hasil = $this->determineHasil($validated['pekerjaan'], $validated['total_tunjangan'], $validated['tanggungan']);

        $petugasPengajuan = new Pengajuan();
        $petugasPengajuan->nama_nasabah = $validated['nama_nasabah'];
        $petugasPengajuan->kelengkapan_tunjangan = $validated['kelengkapan_tunjangan'];
        $petugasPengajuan->tanggungan = $validated['tanggungan'];
        $petugasPengajuan->pekerjaan = $validated['pekerjaan'];
        $petugasPengajuan->total_potongan = $validated['total_potongan'];
        $petugasPengajuan->total_tunjangan = $validated['total_tunjangan'];
        $petugasPengajuan->hasil = $hasil; // Menggunakan hasil yang telah ditentukan
        $petugasPengajuan->status = 'Dalam Pemeriksaan Petugas'; // Mengisi status secara otomatis

        $petugasPengajuan->save();

        return redirect()->route('petugasPengajuan.index')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }
  
    public function show(string $id)
    {
        $petugasPengajuan = Pengajuan::findOrFail($id);
  
        return view('petugasPengajuan.show', compact('petugasPengajuan'));
    }
  
    public function edit(string $id)
    {
        $petugasPengajuan = Pengajuan::findOrFail($id);
  
        return view('petugasPengajuan.edit', compact('petugasPengajuan'));
    }
  
    public function update(Request $request, string $id)
    {
        $petugasPengajuan = Pengajuan::findOrFail($id);
  
        $validated = $request->validate([
            'nama_nasabah' => 'required|string|max:255',
            'kelengkapan_tunjangan' => 'required|string|max:100',
            'tanggungan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'total_potongan' => 'required|string|max:255',
            'total_tunjangan' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        // Menentukan hasil berdasarkan logika yang diberikan
        $hasil = $this->determineHasil($validated['pekerjaan'], $validated['total_tunjangan'], $validated['tanggungan']);

        $petugasPengajuan->update(array_merge($validated, [
            'hasil' => $hasil, // Mengisi status secara otomatis
        ]));

        return redirect()->route('petugasPengajuan')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }
  
    public function destroy(string $id)
    {
        $petugasPengajuan = Pengajuan::findOrFail($id);
  
        $petugasPengajuan->delete();
  
        return redirect()->route('petugasPengajuan')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }

    /**
     * Metode untuk menentukan hasil berdasarkan pekerjaan, total tunjangan, dan tanggungan
     */
    private function determineHasil($pekerjaan, $total_tunjangan, $tanggungan)
    {
        if ($pekerjaan == 'rendah') {
            return 'Tidak Mencapai';
        } elseif ($pekerjaan == 'tinggi') {
            return 'Mencapai';
        } elseif ($pekerjaan == 'sedang') {
            if ($total_tunjangan == 'rendah') {
                return 'Tidak Mencapai';
            } elseif ($total_tunjangan == 'sedang') {
                if ($tanggungan == 'rendah') {
                    return 'Mencapai';
                } elseif ($tanggungan == 'tinggi') {
                    return 'Tidak Mencapai';
                }
            } elseif ($total_tunjangan == 'tinggi') {
                return 'Mencapai';
            }
        }

        return 'Tidak Mencapai'; // Default jika tidak ada kondisi yang terpenuhi
    }
}
