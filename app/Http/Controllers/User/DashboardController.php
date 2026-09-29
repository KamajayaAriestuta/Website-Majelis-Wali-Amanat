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
        $kegiatan = Kegiatan::orderByDesc('tanggal')->orderByDesc('id')->take(3)->get();
        $pimpinan = AnggotaMWA::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Sekretaris Eksekutif'])
            ->orderByRaw("FIELD(jabatan, 'Ketua', 'Wakil Ketua', 'Sekretaris', 'Sekretaris Eksekutif')")
            ->get();
        $peraturanTerbaru = Peraturan::orderByDesc('tanggal_ditetapkan')->take(4)->get();
        $keputusanTerbaru = Keputusan::orderByDesc('tanggal_ditetapkan')->take(4)->get();

        $statistik = [
            'anggota_mwa' => AnggotaMWA::count(),
            'anggota_ka' => AnggotaKA::count(),
            'produk_hukum' => Peraturan::count() + Keputusan::count(),
            'kegiatan' => Kegiatan::count(),
        ];

        return view('user.dashboard', compact('pimpinan', 'kegiatan', 'peraturanTerbaru', 'keputusanTerbaru', 'statistik'));
    }
    public function about()
    {
        return view('user.about');
    }
    public function mwateam()
    {
        $urutanPimpinan = ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Sekretaris Eksekutif'];

        [$pimpinan, $anggota] = AnggotaMWA::orderBy('id')->get()
            ->partition(fn ($item) => in_array($item->jabatan, $urutanPimpinan));

        $pimpinan = $pimpinan->sortBy(fn ($item) => array_search($item->jabatan, $urutanPimpinan))->values();
        $anggota = $anggota->values();

        return view('user.anggota_mwa', compact('pimpinan', 'anggota'));
    }
    public function kateam()
    {
        $urutanPimpinan = ['Ketua', 'Wakil Ketua', 'Sekretaris'];

        [$pimpinan, $anggota] = AnggotaKA::orderBy('id')->get()
            ->partition(fn ($item) => in_array($item->jabatan, $urutanPimpinan));

        $pimpinan = $pimpinan->sortBy(fn ($item) => array_search($item->jabatan, $urutanPimpinan))->values();
        $anggota = $anggota->values();

        return view('user.anggota_ka', compact('pimpinan', 'anggota'));
    }
    public function kegiatan(Request $request)
    {
        $cari = trim((string) $request->query('q'));
        $kategori = $request->query('kategori');

        $kegiatan = Kegiatan::query()
            ->when($cari !== '', fn ($query) => $query->where('judul', 'like', '%' . $cari . '%'))
            ->when($kategori, fn ($query) => $query->where('kategori', $kategori))
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        $daftarKategori = Kegiatan::whereNotNull('kategori')->distinct()->orderBy('kategori')->pluck('kategori');

        return view('user.kegiatan', compact('kegiatan', 'daftarKategori', 'cari', 'kategori'));
    }
    public function show_kegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatanLain = Kegiatan::whereKeyNot($kegiatan->id)->orderByDesc('tanggal')->orderByDesc('id')->limit(5)->get();
        return view('user.detail_kegiatan', compact('kegiatan', 'kegiatanLain'));
    }
    public function peraturan()
    {
        $peraturan = Peraturan::orderByDesc('tanggal_ditetapkan')->orderByDesc('id')->get();
        return view('user.peraturan', compact('peraturan'));
    }
    public function keputusan()
    {
        $keputusan = Keputusan::orderByDesc('tanggal_ditetapkan')->orderByDesc('id')->get();
        return view('user.keputusan', compact('keputusan'));
    }
    public function kontak()
    {
        return view('user.kontak');
    }
}
