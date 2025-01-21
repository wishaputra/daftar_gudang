<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanGudang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LaporanGudangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporanGudangList = Auth::user()->laporanGudang;
        return view('laporan-gudang.index', compact('laporanGudangList'));
    }

    public function create()
    {
        return view('company.laporan-gudang');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nib' => 'required',
            'nama_perusahaan' => 'required',
            'nomor_ktp_paspor' => 'required',
            'email_perusahaan' => 'required|email',
            'alamat_perusahaan' => 'required',
            'kelurahan_perusahaan' => 'required',
            'kecamatan_perusahaan' => 'required',
            'nomor_telepon' => 'required',
            'alamat_gudang' => 'required',
            'kelurahan_gudang' => 'required',
            'kecamatan_gudang' => 'required',
            'kab_kota_gudang' => 'required',
            'provinsi_gudang' => 'required',
            'koordinat_lat' => 'required',
            'koordinat_long' => 'required',
            'luas_bangunan' => 'required|numeric',
            'kapasitas_gudang' => 'required|numeric',
            'golongan_gudang' => 'required',
            'fasilitas' => 'required',
            'jenis_barang' => 'required|array',
            'jenis_barang.*' => 'required|string',
        ]);

        $laporanGudang = new LaporanGudang($validated);
        $laporanGudang->user_id = Auth::id();
        $laporanGudang->id_gudang = $request->id_gudang;
        $laporanGudang->id_permohonan_izin = $request->id_permohonan_izin;
        $laporanGudang->status_verifikasi = $request->status_verifikasi;
        $laporanGudang->nomor_tdg = $request->nomor_tdg;
        $laporanGudang->tanggal_terbit_tdg = $request->tanggal_terbit_tdg;
        $laporanGudang->catatan = $request->catatan;
        $laporanGudang->save();

        return redirect()->route('laporan-gudang.index')->with('success', 'Laporan Gudang berhasil disimpan.');
    }

    public function show($id)
    {
        $laporan = LaporanGudang::findOrFail($id);
        
        $this->authorize('view', $laporan);

        $pdf = PDF::loadView('laporan-gudang.pdf', compact('laporan'));
        
        return $pdf->stream('laporan-gudang-' . $laporan->id . '.pdf');
    }

    public function edit($id)
    {
        $laporan = LaporanGudang::findOrFail($id);
        $this->authorize('update', $laporan);
        return view('laporan-gudang.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanGudang::findOrFail($id);
        $this->authorize('update', $laporan);

        // Validation and update logic here
    }

    public function destroy($id)
    {
        $laporan = LaporanGudang::findOrFail($id);
        $this->authorize('delete', $laporan);

        $laporan->delete();
        return redirect()->route('laporan-gudang.index')->with('success', 'Laporan Gudang berhasil dihapus.');
    }
}