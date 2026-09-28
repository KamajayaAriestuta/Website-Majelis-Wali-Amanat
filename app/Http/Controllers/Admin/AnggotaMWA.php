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
        return view('admin.AnggotaMWA.show', compact('anggota'));
    }
    public function create()
    {
        return view('admin.AnggotaMWA.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules());

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $this->uploadFile($request->file('foto'), 'foto-anggota-mwa');
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            $validatedData['sk_pengangkatan'] = $this->uploadFile($request->file('sk_pengangkatan'), 'sk-pengangkatan-mwa');
        }

        // Simpan data ke database
        AnggotaMWAModel::create($validatedData);

        return redirect()->route('admin.AnggotaMWA')->with('success', 'Anggota MWA berhasil ditambahkan.');
    }
    public function show($id)
    {
        // Tidak ada halaman detail, kembali ke daftar anggota
        return redirect()->route('admin.AnggotaMWA');
    }
    public function edit($id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        return view('admin.AnggotaMWA.edit', compact('anggotaMWA'));
    }
    public function update(Request $request, $id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        $validatedData = $request->validate($this->rules());

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            $this->hapusFile($anggotaMWA->foto);
            $validatedData['foto'] = $this->uploadFile($request->file('foto'), 'foto-anggota-mwa');
        } else {
            unset($validatedData['foto']);
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            // Hapus SK lama jika ada
            $this->hapusFile($anggotaMWA->sk_pengangkatan);
            $validatedData['sk_pengangkatan'] = $this->uploadFile($request->file('sk_pengangkatan'), 'sk-pengangkatan-mwa');
        } else {
            unset($validatedData['sk_pengangkatan']);
        }

        // Update data di database
        $anggotaMWA->update($validatedData);

        return redirect()->route('admin.AnggotaMWA')->with('success', 'Anggota MWA berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $anggotaMWA = AnggotaMWAModel::findOrFail($id);
        $this->hapusFile($anggotaMWA->foto);
        $this->hapusFile($anggotaMWA->sk_pengangkatan);
        $anggotaMWA->delete();

        return redirect()->route('admin.AnggotaMWA')->with('success', 'Anggota MWA berhasil dihapus.');
    }

    private function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unsur' => 'required|string|max:255',
            'nomor_sk' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sk_pengangkatan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max untuk file SK
        ];
    }

    private function uploadFile($file, $folder)
    {
        $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $fileName, 'public');
    }

    private function hapusFile($path)
    {
        if (!empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
