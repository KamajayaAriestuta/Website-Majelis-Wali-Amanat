<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peraturan as PeraturanModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            $dokumenFile = $request->file('dokumen');
            $dokumenName = time() . '_' . Str::slug(pathinfo($dokumenFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $dokumenFile->getClientOriginalExtension();
            $dokumenPath = $dokumenFile->storeAs('dokumen-peraturan', $dokumenName, 'public');
            $validatedData['dokumen'] = $dokumenPath;
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
        //
        $request->validate([
            'perihal' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'tanggal_ditetapkan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file dokumen
        ]);

        // Handle upload dokumen
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            if (!empty($peraturan->dokumen) && Storage::disk('public')->exists($peraturan->dokumen)) {
                Storage::disk('public')->delete($peraturan->dokumen);
            }

            // Upload dokumen baru
            $dokumenFile = $request->file('dokumen');
            $dokumenName = time() . '_' . Str::slug(pathinfo($dokumenFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $dokumenFile->getClientOriginalExtension();
            $dokumenPath = $dokumenFile->storeAs('dokumen-peraturan', $dokumenName, 'public');
            $validatedData['dokumen'] = $dokumenPath;
        }

        $peraturan = PeraturanModel::findOrFail($id);
        $peraturan->update($request->all());
        return redirect()->route('admin.peraturan.show')->with('success', 'Peraturan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $peraturan = PeraturanModel::findOrFail($id);
        $peraturan->delete();
        return redirect()->route('admin.peraturan.show')->with('success', 'Peraturan berhasil dihapus.');
    }
};
