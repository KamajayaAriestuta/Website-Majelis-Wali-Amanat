<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peraturan as PeraturanModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Peraturan extends Controller
{
    public function index()
    {
        $peraturan = PeraturanModel::all();
        return view('admin.peraturan.show', compact('peraturan'));
    }
    public function create()
    {
        return view('admin.peraturan.create');
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
        // Simpan data peraturan ke database
        PeraturanModel::create($validatedData);
        return redirect()->route('admin.peraturan.show')->with('success', 'Peraturan berhasil ditambahkan.');

    }
    public function edit($id)
    {
        $peraturan = PeraturanModel::findOrFail($id);
        return view('admin.peraturan.edit', compact('peraturan'));
    }
    public function update(Request $request, $id)
    {
        $peraturan = PeraturanModel::findOrFail($id);
        $validatedData = $request->validate([
            'perihal' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'tanggal_ditetapkan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:5120', // 5MB max untuk file dokumen
        ]);

        // Handle upload dokumen
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            $this->hapusDokumen($peraturan->dokumen);

            // Upload dokumen baru
            $validatedData['dokumen'] = $this->uploadDokumen($request->file('dokumen'));
        } else {
            // Tidak ada file baru, pertahankan dokumen lama
            unset($validatedData['dokumen']);
        }

        $peraturan->update($validatedData);
        return redirect()->route('admin.peraturan.show')->with('success', 'Peraturan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $peraturan = PeraturanModel::findOrFail($id);
        $this->hapusDokumen($peraturan->dokumen);
        $peraturan->delete();
        return redirect()->route('admin.peraturan.show')->with('success', 'Peraturan berhasil dihapus.');
    }

    private function uploadDokumen($dokumenFile)
    {
        $dokumenName = time() . '_' . Str::slug(pathinfo($dokumenFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $dokumenFile->getClientOriginalExtension();
        return $dokumenFile->storeAs('dokumen-peraturan', $dokumenName, 'public');
    }

    private function hapusDokumen($path)
    {
        if (!empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
