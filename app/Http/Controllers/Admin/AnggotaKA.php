<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnggotaKA as AnggotaKAModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnggotaKA extends Controller
{
    public function index()
    {
        $anggota = AnggotaKAModel::all();
        return view('admin.anggotaKA.show', compact('anggota'));
    }
    public function create()
    {
        return view('admin.anggotaKA.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_sk' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sk_pengangkatan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file SK
        ]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoOriginalName = pathinfo($fotoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fotoName = time() . '_' . Str::slug($fotoOriginalName) . '.' . $fotoFile->getClientOriginalExtension();
            $fotoPath = $fotoFile->storeAs('foto-anggota-ka', $fotoName, 'public');
            $validatedData['foto'] = $fotoPath;
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            $skFile = $request->file('sk_pengangkatan');
            $skOriginalName = pathinfo($skFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $skFile->getClientOriginalExtension();
            $skFilename = Str::slug($skOriginalName) . '.' . $extension;

            $skPath = $skFile->storeAs('sk-pengangkatan-ka', $skFilename, 'public');
            $validatedData['sk_pengangkatan'] = $skPath;
        }

        // Simpan data ke database
        AnggotaKAModel::create($validatedData);

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil ditambahkan.');
    }
    public function show($id)
    {
        //   
        return view('admin.anggotaKA.show', compact('id'));
    }
    public function edit($id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        return view('admin.anggotaKA.edit', compact('anggotaKA'));
    }
    public function update(Request $request, $id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_sk' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sk_pengangkatan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file SK
        ]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (!empty($anggotaKA->foto) && Storage::disk('public')->exists('foto-anggota-ka/' . $anggotaKA->foto)) {
                Storage::disk('public')->delete('foto-anggota-ka/' . $anggotaKA->foto);
            }

            // Upload foto baru
            $fotoFile = $request->file('foto');
            $fotoName = time() . '_' . Str::slug(pathinfo($fotoFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $fotoFile->getClientOriginalExtension();
            $fotoPath = $fotoFile->storeAs('foto-anggota-ka', $fotoName, 'public');
            $validatedData['foto'] = $fotoPath;
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            // Hapus SK lama jika ada
            if (!empty($anggotaKA->sk_pengangkatan) && Storage::disk('public')->exists('sk-pengangkatan-ka/' . $anggotaKA->sk_pengangkatan)) {
                Storage::disk('public')->delete('sk-pengangkatan-ka/' . $anggotaKA->sk_pengangkatan);
            }

            // Upload SK baru
            $skFile = $request->file('sk_pengangkatan');
            $skOriginalName = pathinfo($skFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $skFile->getClientOriginalExtension();
            $skFilename = time() . '_' . Str::slug($skOriginalName) . '.' . $extension;

            $skFile->storeAs('sk-pengangkatan', $skFilename, 'public');
            $skPath = $skFile->storeAs('sk-pengangkatan-ka', $skFilename, 'public');
            $validatedData['sk_pengangkatan'] = $skPath;
        }

        // Update data di database
        $anggotaKA->update($validatedData);

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        $anggotaKA->delete();

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil dihapus.');
    }
}
