<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $admin = Berkas::orderBy('created_at', 'DESC')->get();
  
        return view('admin.index', compact('admin'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
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

        $admin = new Berkas();
        $admin->nama = $validated['nama'];

        if ($request->hasFile('slip_gaji')) {
            $slipGaji = $request->file('slip_gaji');
            $namaSlip = time() . '_slip.' . $slipGaji->getClientOriginalExtension();
            $slipGaji->move(public_path('slip_gaji'), $namaSlip);
            $admin->slip_gaji = $namaSlip;
        }

        if ($request->hasFile('data_riwayat')) {
            $dataRiwayat = $request->file('data_riwayat');
            $namaDataRiwayat = time() . '_riwayat.' . $dataRiwayat->getClientOriginalExtension();
            $dataRiwayat->move(public_path('data_riwayat'), $namaDataRiwayat);
            $admin->data_riwayat = $namaDataRiwayat;
        }

        if ($request->hasFile('rincian_gaji')) {
            $rincianGaji = $request->file('rincian_gaji');
            $namaRincianGaji = time() . '_rincian.' . $rincianGaji->getClientOriginalExtension();
            $rincianGaji->move(public_path('rincian_gaji'), $namaRincianGaji);
            $admin->rincian_gaji = $namaRincianGaji;
        }

        $admin->save();

        return redirect()->route('admin')->with('success', 'DATA BERHASIL DITAMBAHKAN!');
    }

  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Berkas::findOrFail($id);
  
        return view('admin.show', compact('admin'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Berkas::findOrFail($id);
  
        return view('admin.edit', compact('admin'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Berkas::findOrFail($id);
  
        $admin->update($request->all());
  
        return redirect()->route('admin')->with('warning', 'DATA BERHASIL DI UPDATE !');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Berkas::findOrFail($id);
  
        $admin->delete();
  
        return redirect()->route('admin')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }

    public function download(string $id)
    {
         $admin = Berkas::findOrFail($id);

    if ($admin->image) {
        $filePath = 'public/' . $admin->image;  // Pastikan path ini sesuai dengan lokasi penyimpanan file Anda

        Log::info('Trying to download file at path: ' . $filePath);

        if (Storage::exists($filePath)) {
            $fileContents = Storage::get($filePath);
            $fileName = basename($filePath);
            $mimeType = File::mimeType(storage_path('app/' . $filePath));

            return Response::make($fileContents, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
            ]);
        } else {
            return redirect()->route('admin')->with('error', 'File tidak ditemukan di storage! Path: ' . $filePath);
        }
    }

    return redirect()->route('admin')->with('error', 'Path file tidak ditemukan di database!');
    }

}   