<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencatatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class PencatatanController extends Controller
{
    public function index()
    {
        $pencatatanList = Pencatatan::with('details')->get();
        return view('pencatatan.index', compact('pencatatanList'));
    }

    public function show($id)
    {
        $pencatatan = Pencatatan::with('details')->findOrFail($id);
        
        $pdf = PDF::loadView('pencatatan.pdf', compact('pencatatan'));
        
        return $pdf->stream('pencatatan-' . $pencatatan->id . '.pdf');
    }

    public function edit($id)
    {
        $pencatatan = Pencatatan::with('details')->findOrFail($id);
        return view('pencatatan.edit', compact('pencatatan'));
    }

    public function update(Request $request, $id)
    {
        $pencatatan = Pencatatan::findOrFail($id);
        
        $validatedData = $request->validate([
            'nomor' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'alamat_penanggung_jawab' => 'required|string',
            'alamat_gudang' => 'required|string',
            'periode_bulan' => 'required|date_format:Y-m',
            'penerimaan_nama.*' => 'required|string',
            'penerimaan_jumlah.*' => 'required|numeric',
            'pengeluaran_nama.*' => 'required|string',
            'pengeluaran_jumlah.*' => 'required|numeric',
            'stok_nama.*' => 'required|string',
            'stok_jumlah.*' => 'required|numeric',
            'keterangan.*' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        // Handle file upload if a new header is provided
        if ($request->hasFile('company_header')) {
            $validatedData['company_header'] = $request->file('company_header')->store('company_headers', 'public');
        }

        $pencatatan->update($validatedData);

        // Update or create details
        $pencatatan->details()->delete(); // Remove old details
        for ($i = 0; $i < count($validatedData['penerimaan_nama']); $i++) {
            $pencatatan->details()->create([
                'penerimaan_nama' => $validatedData['penerimaan_nama'][$i],
                'penerimaan_jumlah' => $validatedData['penerimaan_jumlah'][$i],
                'pengeluaran_nama' => $validatedData['pengeluaran_nama'][$i],
                'pengeluaran_jumlah' => $validatedData['pengeluaran_jumlah'][$i],
                'stok_nama' => $validatedData['stok_nama'][$i],
                'stok_jumlah' => $validatedData['stok_jumlah'][$i],
                'keterangan' => $validatedData['keterangan'][$i] ?? null,
            ]);
        }

        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pencatatan = Pencatatan::findOrFail($id);
        $pencatatan->details()->delete();
        $pencatatan->delete();

        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan berhasil dihapus!');
    }

    public function showForm()
    {
        return view('company.pencatatan');
    }

    public function submitForm(Request $request)
{
    try {
        $validatedData = $request->validate([
            'company_header' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomor' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'alamat_penanggung_jawab' => 'required|string',
            'alamat_gudang' => 'required|string',
            'periode_bulan' => 'required|date',
            'penerimaan_nama.*' => 'required|string',
            'penerimaan_jumlah.*' => 'required|numeric',
            'pengeluaran_nama.*' => 'required|string',
            'pengeluaran_jumlah.*' => 'required|numeric',
            'stok_nama.*' => 'required|string',
            'stok_jumlah.*' => 'required|numeric',
            'keterangan.*' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        // Handle file upload
        if ($request->hasFile('company_header')) {
            $headerPath = $request->file('company_header')->store('company_headers', 'public');
            $validatedData['company_header'] = $headerPath;
        }

        // Add user_id to validated data
        $validatedData['user_id'] = Auth::id();

        // Create new Pencatatan record
        $pencatatan = Pencatatan::create($validatedData);

        // Save the table data
        $detailsData = [];
        for ($i = 0; $i < count($request->input('penerimaan_nama', [])); $i++) {
            $detailsData[] = [
                'penerimaan_nama' => $request->input('penerimaan_nama')[$i],
                'penerimaan_jumlah' => $request->input('penerimaan_jumlah')[$i],
                'pengeluaran_nama' => $request->input('pengeluaran_nama')[$i],
                'pengeluaran_jumlah' => $request->input('pengeluaran_jumlah')[$i],
                'stok_nama' => $request->input('stok_nama')[$i],
                'stok_jumlah' => $request->input('stok_jumlah')[$i],
                'keterangan' => $request->input('keterangan')[$i] ?? null,
            ];
        }
        $pencatatan->details()->createMany($detailsData);

        return redirect()->route('pencatatan.index')->with('success', 'Laporan Gudang berhasil disimpan.');
    } catch (\Exception $e) {
        Log::error('Error submitting Pencatatan form: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while submitting the form. Please try again.')->withInput();
    }
}
}

