<?php

namespace App\Http\Controllers;
use App\Models\KBLI;
use App\Models\LaporanGudang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CombinedFormsController extends Controller
{
    public function showForms()
    {
        $kecamatanData = $this->getColumnData('kecamatan_gudang');
        $kabKotaData = $this->getColumnData('kab_kota_gudang');
        $provinsiData = $this->getColumnData('provinsi_gudang');

        return view('company.combined-forms', compact('kecamatanData', 'kabKotaData', 'provinsiData'));
    }

    private function getColumnData($column)
    {
        return LaporanGudang::select($column, DB::raw('count(*) as total'))
            ->groupBy($column)
            ->orderBy('total', 'desc')
            ->get()
            ->map(function ($item) use ($column) {
                return [
                    'label' => $item->$column,
                    'value' => $item->total
                ];
            });
    }
}

