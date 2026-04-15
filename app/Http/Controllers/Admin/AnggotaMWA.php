<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnggotaMWA as AnggotaMWAModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnggotaMWA extends Controller
{
    public function index()
    {
        $anggota = AnggotaMWAModel::all();
        return view('admin.anggotaMWA.show', compact('anggota'));
    }
    public function create()
    {
        return view('admin.anggotaMWA.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unsur' => 'required|string|max:255',
            'nomor_sk' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sk_pengangkatan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file SK
        ]);
        
        // Handle upload foto
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoName = time() . '_' . Str::slug(pathinfo($fotoFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $fotoFile->getClientOriginalExtension();
            $fotoPath = $fotoFile->storeAs('foto-anggota-mwa', $fotoName, 'public');
            $validatedData['foto'] = $fotoPath;
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            $skFile = $request->file('sk_pengangkatan');
            $skOriginalName = pathinfo($skFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $skFile->getClientOriginalExtension();
            $skFilename = Str::slug($skOriginalName) . '.' . $extension;

            $skPath = $skFile->storeAs('sk-pengangkatan-mwa', $skFilename, 'public');
            $validatedData['sk_pengangkatan'] = $skPath;
        }

        // Simpan data ke database
        AnggotaMWAModel::create($validatedData);

        return redirect()->route('admin.anggotaMWA')->with('success', 'Anggota MWA berhasil ditambahkan.');
    }
    public function show($id)
    {
        //   
        return view('admin.anggotaMWA.show', compact('id'));
    }
    public function edit($id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        return view('admin.anggotaMWA.edit', compact('anggotaMWA'));
    }
    public function update(Request $request, $id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unsur' => 'required|string|max:255',
            'nomor_sk' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sk_pengangkatan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file SK
        ]);

       // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (!empty($anggotaMWA->foto) && Storage::disk('public')->exists('foto-anggota-mwa/' . $anggotaMWA->foto)) {
                Storage::disk('public')->delete('foto-anggota-mwa/' . $anggotaMWA->foto);
            }

            // Upload foto baru
            $fotoFile = $request->file('foto');
            $fotoName = time() . '_' . Str::slug(pathinfo($fotoFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $fotoFile->getClientOriginalExtension();
            $fotoPath = $fotoFile->storeAs('foto-anggota-mwa', $fotoName, 'public');
            $validatedData['foto'] = $fotoPath;
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            // Hapus SK lama jika ada
            if (!empty($anggotaMWA->sk_pengangkatan) && Storage::disk('public')->exists('sk-pengangkatan-mwa/' . $anggotaMWA->sk_pengangkatan)) {
                Storage::disk('public')->delete('sk-pengangkatan-mwa/' . $anggotaMWA->sk_pengangkatan);
            }

            // Upload SK baru
            $skFile = $request->file('sk_pengangkatan');
            $skOriginalName = pathinfo($skFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $skFile->getClientOriginalExtension();
            $skFilename = time() . '_' . Str::slug($skOriginalName) . '.' . $extension;

            $skFile->storeAs('sk-pengangkatan', $skFilename, 'public');
            $skPath = $skFile->storeAs('sk-pengangkatan-mwa', $skFilename, 'public');
            $validatedData['sk_pengangkatan'] = $skPath;
        }

        // Update data di database
        $anggotaMWA->update($validatedData);

        return redirect()->route('admin.anggotaMWA')->with('success', 'Anggota MWA berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        $anggotaMWA->delete();

        return redirect()->route('admin.anggotaMWA')->with('success', 'Anggota MWA berhasil dihapus.');
    }
}
