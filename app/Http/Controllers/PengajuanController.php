<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::orderBy('created_at', 'DESC')->get();

        return view('pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('pengajuan.create');
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

        $pengajuan = new Pengajuan();
        $pengajuan->nama_nasabah = $validated['nama_nasabah'];
        $pengajuan->kelengkapan_tunjangan = $validated['kelengkapan_tunjangan'];
        $pengajuan->tanggungan = $validated['tanggungan'];
        $pengajuan->pekerjaan = $validated['pekerjaan'];
        $pengajuan->total_potongan = $validated['total_potongan'];
        $pengajuan->total_tunjangan = $validated['total_tunjangan'];
        $pengajuan->hasil = $hasil; // Menggunakan hasil yang telah ditentukan
        $pengajuan->status = 'Dalam Pemeriksaan Petugas'; // Mengisi status secara otomatis

        $pengajuan->save();

        return redirect()->route('pengajuan')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }

    public function show(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        return view('pengajuan.show', compact('pengajuan'));
    }

    public function edit(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        return view('pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

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

        $pengajuan->update(array_merge($validated, [
            'hasil' => $hasil, // Mengisi status secara otomatis
        ]));

        return redirect()->route('pengajuan')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }

    public function destroy(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $pengajuan->delete();

        return redirect()->route('pengajuan')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }

    /**
     * Metode untuk menentukan hasil berdasarkan pekerjaan, total tunjangan, dan tanggungan
     */
    private function determineHasil($pekerjaan, $total_tunjangan, $tanggungan)
    {
        // Logika utama untuk menentukan hasil berdasarkan kondisi yang lebih terperinci
        Log::info("Pekerjaan: $pekerjaan, Total Tunjangan: $total_tunjangan, Tanggungan: $tanggungan");

        if (strcasecmp($pekerjaan, 'tinggi') == 0) {
            Log::info("Hasil: Mencapai");
            return 'Mencapai';
        } elseif (strcasecmp($pekerjaan, 'sedang') == 0) {
            if (strcasecmp($total_tunjangan, 'tinggi') == 0) {
                Log::info("Hasil: Mencapai");
                return 'Mencapai';
            } elseif (strcasecmp($total_tunjangan, 'sedang') == 0) {
                if (strcasecmp($tanggungan, 'rendah') == 0) {
                    Log::info("Hasil: Mencapai");
                    return 'Mencapai';
                } else {
                    Log::info("Hasil: Tidak Mencapai");
                    return 'Tidak Mencapai';
                }
            } else {
                Log::info("Hasil: Tidak Mencapai");
                return 'Tidak Mencapai';
            }
        } elseif (strcasecmp($pekerjaan, 'rendah') == 0) {
            Log::info("Hasil: Tidak Mencapai");
            return 'Tidak Mencapai';
        }

        // Asumsi default jika pekerjaan tidak 'tinggi', 'sedang', atau 'rendah'
        Log::info("Hasil: Tidak Mencapai (default)");
        return 'Tidak Mencapai';
    }
}