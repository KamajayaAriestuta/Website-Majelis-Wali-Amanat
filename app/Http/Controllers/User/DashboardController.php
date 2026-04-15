<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnggotaMWA;
use App\Models\AnggotaKA;
use App\Models\Kegiatan;
use App\Models\Peraturan;
use App\Models\Keputusan;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $pimpinan = AnggotaMWA::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Sekretaris Eksekutif'])->get();
        return view('user.dashboard', compact('pimpinan', 'kegiatan'));
    }
    public function about()
    {
        return view('user.about');
    }
    public function mwateam()
    {
        $pimpinan = AnggotaMWA::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Sekretaris Eksekutif'])->get();
        $anggota = AnggotaMWA::whereIn('jabatan', ['Anggota'])->get();
        return view('user.anggota_mwa', compact('pimpinan', 'anggota'));
    }
    public function kateam()
    {
        $anggota = AnggotaKA::all();
        return view('user.anggota_ka', compact('anggota'));
    }
    public function kegiatan()
    {
        $kegiatan = Kegiatan::all();
        return view('user.kegiatan', compact('kegiatan'));
    }
    public function show_kegiatan($id)
    {
        $semuaKegiatan = Kegiatan::all();
        $kegiatan = Kegiatan::findOrFail($id);
        return view('user.detail_kegiatan', compact('kegiatan', 'semuaKegiatan'));
    }
    public function peraturan()
    {
        $peraturan = Peraturan::all();
        return view('user.peraturan', compact('peraturan'));
    }
    public function keputusan()
    {
        $keputusan = Keputusan::all();
        return view('user.keputusan', compact('keputusan'));
    }
    public function kontak()
    {
        return view('user.kontak');
    }
}
