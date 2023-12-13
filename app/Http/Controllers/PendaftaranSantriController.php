<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\StaticInfo;
use Illuminate\Http\Request;
use App\Models\PendaftaranSantri;
use App\Models\PeriodePendaftaran;

class PendaftaranSantriController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data formulir jika diperlukan
        // $request->validate([
        //     'nama' => 'required',
        //     'strata_id' => 'required',
        //     // ... (sesuaikan dengan atribut formulir Anda)
        // ]);

        $data = array_map(function ($value) {
            return empty($value) ? null : $value;
        }, $request->all());

                // Cek isian periodependaftaran_id
                $periodependaftaranId = $request->input('periodependaftaran_id');

                // Cari data periode pendaftaran berdasarkan periodependaftaran_id
                $periode = PeriodePendaftaran::find($periodependaftaranId);
                
        // Tangani file foto
        



        // Jika data periode ditemukan, ambil tahun dan strata_id
        if ($periode) {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $extension = $file->getClientOriginalExtension();
                $fileName = $data['nama'] . '_' . $periode->tahun . '_' . $periode->strata_id . '.' . $extension;
                $filePath = 'images/';
                $file->move(public_path($filePath), $fileName);
                $data['foto'] = $fileName; // Simpan hanya nama file di database
            }
            $data['tahun'] = $periode->tahun;
            $data['strata_id'] = $periode->strata_id;

            // Simpan data ke basis data menggunakan model
            PendaftaranSantri::create($data);

            // Redirect atau lakukan tindakan lain setelah penyimpanan berhasil
            return redirect('/pendaftaran')->with('success', 'Pendaftaran berhasil disimpan!');
        } else {
            // Jika data periode tidak ditemukan
            return redirect('/pendaftaran')->with('error', 'Data periode tidak ditemukan!');
        }
    }

    // bagian yang mengatur tampilan pada form
    public function showForm()
    {
        $today = now();
        $periodes = PeriodePendaftaran::where('mulai', '<=', $today)
            ->where('sampai', '>=', $today)
            ->get();

        $latestPosts = (new Post())->getLatestPosts();
        $staticInfo = (new StaticInfo())->getStaticInfo();

        return view('pendaftaran', compact('periodes', 'today', 'latestPosts', 'staticInfo'));
    }
}
