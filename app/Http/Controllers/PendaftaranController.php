<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use App\Grup;
use App\Perusahaan;
use App\Unit;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel pendaftaran
        $pendaftarans = Pendaftaran::all();

        \Log::debug('Pendaftaran data:', $pendaftarans->toArray());

        // Kirim data ke view
        return view('unit.daftarImprovement', compact('pendaftarans'));
    }

    public function index2()
    {
        // Ambil semua data dari tabel pendaftaran
        $pendaftarans = Pendaftaran::all();

        \Log::debug('Pendaftaran data:', $pendaftarans->toArray());

        // Kirim data ke view
        return view('superadmin.daftarApproval', compact('pendaftarans'));
    }

    public function index3()
    {
        // Ambil semua data dari tabel pendaftaran
        $pendaftarans = Pendaftaran::all();

        \Log::debug('Pendaftaran data:', $pendaftarans->toArray());

        // Kirim data ke view
        return view('superadmin.daftarImprovementSA', compact('pendaftarans'));
    }

    public function create()
    {
        // Ambil semua data perusahaan dan unit untuk opsi select
        $perusahaans = Perusahaan::all();  // Ambil semua perusahaan
        $units = Unit::all();  // Ambil semua unit

        // Tampilkan form dengan data perusahaan dan unit
        return view('unit.pendaftaran2', compact('perusahaans', 'units'));
    }

    public function store(Request $request)
    {
        // Debug: Log semua data yang diterima dalam request
        // Log::debug('Data request:', $request->all());

        Log::debug('Request Unit:', [$request->unit]);
        // Validasi input tanpa required untuk jabatan
        $request->validate([
            'kreteria_grup' => 'required|string|max:50',
            'pabrik' => 'required|string|max:50',
            'unit' => 'required|string|max:50',
            'nama_grup' => 'required|string|max:100',
            'nomor_tema' => 'required|integer',
            'judul' => 'required|string|max:255',
            'tema' => 'required|string',
            'grup_data' => 'required|json',  // Validasi jika grup_data adalah JSON yang valid
        ]);

        // Pastikan ID unit yang diterima benar
        $unit = Unit::find($request->unit);
        if (!$unit) {
            Log::error("Unit not found with ID: " . $request->unit);
            return back()->withErrors("Unit tidak ditemukan");
        }

        // Menyimpan data pendaftaran ke dalam database
        $pendaftaran = Pendaftaran::create([
            'kreteria_grup' => $request->kreteria_grup,
            'pabrik' => $unit->perusahaan->nama_perusahaan ?? $request->pabrik, // Gunakan nama perusahaan
            'unit' => $unit->nama_unit, // Gunakan nama unit
            'nama_grup' => $request->nama_grup,
            'nomor_tema' => $request->nomor_tema,
            'judul' => $request->judul,
            'tema' => $request->tema,
        ]);

        // Mengonversi grup_data (JSON) menjadi array
        $grupData = json_decode($request->grup_data, true);

        // Menyimpan grup-grup yang terkait dengan pendaftaran
        foreach ($grupData as $grup) {
            $fotoPath = null;

            // Periksa apakah foto di grup_temp adalah objek file (UploadedFile)
            if (isset($request->grup_temp['foto']) && $request->file('grup_temp.foto') instanceof \Illuminate\Http\UploadedFile) {
                // Jika foto adalah objek file, kita menyimpannya
                $fotoFile = $request->file('grup_temp.foto');
                if ($request->hasFile('grup_temp.foto') && $request->file('grup_temp.foto')->isValid()) {
                    // Pastikan file 'foto' adalah file yang valid
                    $fotoFile = $request->file('grup_temp.foto');
                    $fotoPath = $fotoFile->store('uploads/foto', 'public');
                } else {
                    Log::error('Foto tidak valid atau tidak ada');
                }
            }

            // Jika foto ada di grup_data dan bukan "Tidak ada foto", maka gunakan nama file
            if (isset($grup['foto']) && $grup['foto'] !== 'Tidak ada foto') {
                // Gunakan nama file foto yang ada di grup_data
                $fotoPath = $grup['foto'];
            }

            // Menyimpan data grup terkait dengan pendaftaran
            $pendaftaran->grups()->create([
                'jabatan_grup' => $grup['jabatan'],  // Jabatan sekarang tidak wajib
                'perner' => $grup['perner'],
                'nama' => $grup['nama'],
                'foto' => $fotoPath,  // Menyimpan path foto
                'perner_input' => Auth::user()->perner,  // Mengambil perner dari pengguna yang login
                'id_pendaftaran' => $pendaftaran->id,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan.');
    }

    // Method untuk mendapatkan unit berdasarkan id_perusahaan
    public function getUnits(Request $request)
    {
        $units = Unit::where('id_perusahaan', $request->id_perusahaan)->get();

        return response()->json($units);
    }

    // Fungsi untuk mengambil semua grup
    public function getStrukturAnggota($idPendaftaran)
    {
        // Ambil data grup berdasarkan id_pendaftaran
        $grup = Grup::where('id_pendaftaran', $idPendaftaran)
                    ->orderBy('jabatan_grup')
                    ->get();

        // Menambahkan 'perner' ke response
        $grupData = $grup->map(function($item) {
            $item->perner = $item->perner; // Sertakan perner
            return $item;
        });

        return response()->json($grupData);
    }
    public function show($id_pendaftaran)
    {
        $pendaftaran = Pendaftaran::find($id_pendaftaran);

        if (!$pendaftaran) {
            return response()->json(['error' => 'ID Pendaftaran tidak ditemukan']);
        }

        $grupAnggota = Grup::where('id_pendaftaran', $id_pendaftaran)->get();

        return response()->json(['pendaftaran' => $pendaftaran, 'grupAnggota' => $grupAnggota]);
    }

    public function getStatusDetails($id)
    {
        $details = Proses::where('id_pendaftaran', $id)->get();

        return response()->json($details);
    }




}
