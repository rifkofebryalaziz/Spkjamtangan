<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;


class HitungController extends Controller
{
    public function perhitungan()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Langkah 1: Normalisasi Matriks
        $normalisasi = $this->normalisasi($alternatifs, $kriterias);

        // Langkah 2: Matriks Normalisasi Terbobot
        $normalisasiTerbobot = $this->normalisasiTerbobot($normalisasi, $kriterias);

        // Langkah 3: Solusi Ideal Positif dan Negatif
        $solusiIdeal = $this->solusiIdeal($normalisasiTerbobot, $kriterias);

        // Langkah 4: Jarak Solusi Ideal Positif dan Negatif
        $jarakIdeal = $this->jarakIdeal($normalisasiTerbobot, $solusiIdeal);

        // Langkah 5: Nilai Preferensi
        $preferensi = $this->nilaiPreferensi($jarakIdeal);

        return view('penilaian', compact(
            'alternatifs', 'kriterias', 
            'normalisasi', 'normalisasiTerbobot', 
            'solusiIdeal', 'jarakIdeal', 
            'preferensi'
        ));
    }
    public function hasilakhir()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Langkah 1: Normalisasi Matriks
        $normalisasi = $this->normalisasi($alternatifs, $kriterias);

        // Langkah 2: Matriks Normalisasi Terbobot
        $normalisasiTerbobot = $this->normalisasiTerbobot($normalisasi, $kriterias);

        // Langkah 3: Solusi Ideal Positif dan Negatif
        $solusiIdeal = $this->solusiIdeal($normalisasiTerbobot, $kriterias);

        // Langkah 4: Jarak Solusi Ideal Positif dan Negatif
        $jarakIdeal = $this->jarakIdeal($normalisasiTerbobot, $solusiIdeal);

        // Langkah 5: Nilai Preferensi
        $preferensi = $this->nilaiPreferensi($jarakIdeal);

        return view('hasilakhir', compact(
            'alternatifs', 'kriterias', 
            'normalisasi', 'normalisasiTerbobot', 
            'solusiIdeal', 'jarakIdeal', 
            'preferensi'
        ));
    }

    private function normalisasi($alternatifs, $kriterias)
    {
        $normalisasi = [];
        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->flag;
            $pembagi = sqrt($alternatifs->sum(function($alternatif) use ($kode) {
                return pow($alternatif->$kode, 2);
            }));
    
            if ($pembagi == 0) {
                $pembagi = 1; // Menghindari pembagian dengan nol
            }
    
            foreach ($alternatifs as $alternatif) {
                $normalisasi[$alternatif->id][$kode] = $alternatif->$kode / $pembagi;
            }
        }
        return $normalisasi;
    }
    

    private function normalisasiTerbobot($normalisasi, $kriterias)
    {
        $normalisasiTerbobot = [];
        foreach ($normalisasi as $id => $nilai) {
            foreach ($nilai as $kode => $v) {
                $bobot = $kriterias->firstWhere('flag', $kode)->bobot;
                $normalisasiTerbobot[$id][$kode] = $v * $bobot;
            }
        }
        return $normalisasiTerbobot;
    }
    
    private function solusiIdeal($normalisasiTerbobot, $kriterias)
    {
        $Aplus = [];
        $Amin = [];
        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->flag;
            $nilai = array_column($normalisasiTerbobot, $kode);
            if (strtolower($kriteria->label) === 'cost') {
                $Aplus[$kode] = min($nilai); // Mengubah menjadi nilai minimum untuk A+
                $Amin[$kode] = max($nilai); // Mengubah menjadi nilai maksimum untuk A-
            } else {
                $Aplus[$kode] = max($nilai); // Mengubah menjadi nilai maksimum untuk A+
                $Amin[$kode] = min($nilai); // Mengubah menjadi nilai minimum untuk A-
            }
        }
        return compact('Aplus', 'Amin');
    }
    
    
    

    private function jarakIdeal($normalisasiTerbobot, $solusiIdeal)
    {
        $Dplus = [];
        $Dmin = [];
        foreach ($normalisasiTerbobot as $id => $nilai) {
            $Dplus[$id] = sqrt(array_sum(array_map(function($a, $b) {
                return pow($a - $b, 2);
            }, $nilai, $solusiIdeal['Aplus'])));
            $Dmin[$id] = sqrt(array_sum(array_map(function($a, $b) {
                return pow($a - $b, 2);
            }, $nilai, $solusiIdeal['Amin'])));
        }
        return compact('Dplus', 'Dmin');
    }
    

    private function nilaiPreferensi($jarakIdeal)
    {
        $preferensi = [];
        foreach ($jarakIdeal['Dplus'] as $id => $Dplus) {
            $Dmin = $jarakIdeal['Dmin'][$id];
            if (($Dmin + $Dplus) == 0) {
                $preferensi[$id] = 0; // Menghindari pembagian dengan nol
            } else {
                $preferensi[$id] = $Dmin / ($Dmin + $Dplus);
            }
        }
        arsort($preferensi);
        return $preferensi;
    }

}
