<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PegawaiPengajuanController extends Controller
{
    public function index()
    {
        $pegawaiPengajuan = Pengajuan::orderBy('created_at', 'DESC')->get();
  
        return view('pegawaiPengajuan.index', compact('pegawaiPengajuan'));
    }
  
    public function create()
    {
        return view('pegawaiPengajuan.create');
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

        $pegawaiPengajuan = new Pengajuan();
        $pegawaiPengajuan->nama_nasabah = $validated['nama_nasabah'];
        $pegawaiPengajuan->kelengkapan_tunjangan = $validated['kelengkapan_tunjangan'];
        $pegawaiPengajuan->tanggungan = $validated['tanggungan'];
        $pegawaiPengajuan->pekerjaan = $validated['pekerjaan'];
        $pegawaiPengajuan->total_potongan = $validated['total_potongan'];
        $pegawaiPengajuan->total_tunjangan = $validated['total_tunjangan'];
        $pegawaiPengajuan->hasil = $hasil; // Menggunakan hasil yang telah ditentukan
        $pegawaiPengajuan->status = 'Dalam Pemeriksaan Petugas'; // Mengisi status secara otomatis

        $pegawaiPengajuan->save();

        return redirect()->route('pegawaiPengajuan.index')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }
  
    public function show(string $id)
    {
        $pegawaiPengajuan = Pengajuan::findOrFail($id);
  
        return view('pegawaiPengajuan.show', compact('pegawaiPengajuan'));
    }
  
    public function edit(string $id)
    {
        $pegawaiPengajuan = Pengajuan::findOrFail($id);
  
        return view('pegawaiPengajuan.edit', compact('pegawaiPengajuan'));
    }
  
    public function update(Request $request, string $id)
    {
        $pegawaiPengajuan = Pengajuan::findOrFail($id);
  
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

        $pegawaiPengajuan->update(array_merge($validated, [
            'hasil' => $hasil, // Mengisi status secara otomatis
        ]));

        return redirect()->route('pegawaiPengajuan')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }
  
    public function destroy(string $id)
    {
        $pegawaiPengajuan = Pengajuan::findOrFail($id);
  
        $pegawaiPengajuan->delete();
  
        return redirect()->route('pegawaiPengajuan')->with('danger', 'DATA BERHASIL DIHAPUS !');
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
