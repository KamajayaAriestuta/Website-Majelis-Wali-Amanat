<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keputusan as KeputusanModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Keputusan extends Controller
{
    public function index()
    {
        $keputusan = KeputusanModel::all();
        return view('admin.keputusan.show', compact('keputusan'));
    }
    public function create()
    {
        return view('admin.keputusan.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perihal' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'tanggal_ditetapkan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        //Handle upload dokumen
        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $this->uploadDokumen($request->file('dokumen'));
        }
        // Simpan data keputusan ke database
        KeputusanModel::create($validatedData);
        return redirect()->route('admin.keputusan.show')->with('success', 'Keputusan berhasil ditambahkan.');

    }
    public function edit($id)
    {
        $keputusan = KeputusanModel::findOrFail($id);
        return view('admin.keputusan.edit', compact('keputusan'));
    }
    public function update(Request $request, $id)
    {
        $keputusan = KeputusanModel::findOrFail($id);
        $validatedData = $request->validate([
            'perihal' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'tanggal_ditetapkan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:5120', // 5MB max untuk file dokumen
        ]);

        // Handle upload dokumen
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            $this->hapusDokumen($keputusan->dokumen);

            // Upload dokumen baru
            $validatedData['dokumen'] = $this->uploadDokumen($request->file('dokumen'));
        } else {
            // Tidak ada file baru, pertahankan dokumen lama
            unset($validatedData['dokumen']);
        }

        $keputusan->update($validatedData);
        return redirect()->route('admin.keputusan.show')->with('success', 'Keputusan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $keputusan = KeputusanModel::findOrFail($id);
        $this->hapusDokumen($keputusan->dokumen);
        $keputusan->delete();
        return redirect()->route('admin.keputusan.show')->with('success', 'Keputusan berhasil dihapus.');
    }

    private function uploadDokumen($dokumenFile)
    {
        $dokumenName = time() . '_' . Str::slug(pathinfo($dokumenFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $dokumenFile->getClientOriginalExtension();
        return $dokumenFile->storeAs('dokumen-keputusan', $dokumenName, 'public');
    }

    private function hapusDokumen($path)
    {
        if (!empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
