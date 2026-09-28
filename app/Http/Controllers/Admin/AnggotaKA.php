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
        $validatedData = $request->validate($this->rules());

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $this->uploadFile($request->file('foto'), 'foto-anggota-ka');
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            $validatedData['sk_pengangkatan'] = $this->uploadFile($request->file('sk_pengangkatan'), 'sk-pengangkatan-ka');
        }

        // Simpan data ke database
        AnggotaKAModel::create($validatedData);

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil ditambahkan.');
    }
    public function show($id)
    {
        // Tidak ada halaman detail, kembali ke daftar anggota
        return redirect()->route('admin.anggotaKA');
    }
    public function edit($id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        return view('admin.anggotaKA.edit', compact('anggotaKA'));
    }
    public function update(Request $request, $id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        $validatedData = $request->validate($this->rules());

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            $this->hapusFile($anggotaKA->foto);
            $validatedData['foto'] = $this->uploadFile($request->file('foto'), 'foto-anggota-ka');
        } else {
            unset($validatedData['foto']);
        }

        // Handle upload SK Pengangkatan
        if ($request->hasFile('sk_pengangkatan')) {
            // Hapus SK lama jika ada
            $this->hapusFile($anggotaKA->sk_pengangkatan);
            $validatedData['sk_pengangkatan'] = $this->uploadFile($request->file('sk_pengangkatan'), 'sk-pengangkatan-ka');
        } else {
            unset($validatedData['sk_pengangkatan']);
        }

        // Update data di database
        $anggotaKA->update($validatedData);

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $anggotaKA = AnggotaKAModel::findOrFail($id);
        $this->hapusFile($anggotaKA->foto);
        $this->hapusFile($anggotaKA->sk_pengangkatan);
        $anggotaKA->delete();

        return redirect()->route('admin.anggotaKA')->with('success', 'Anggota KA berhasil dihapus.');
    }

    private function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_sk' => 'required|string|max:255',
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
