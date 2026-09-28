<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan as KegiatanModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Kegiatan extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanModel::all();
        return view('admin.kegiatan.show', compact('kegiatan'));
    }
    public function create()
    {
        return view('admin.kegiatan.create');
    }
    public function store(Request $request)
    {
        // Logic to store new kegiatan
        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|max:2048',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
            'text' => 'required|string',
        ]);
        //Handle upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $this->uploadThumbnail($request->file('thumbnail'));
        }
        // Simpan data kegiatan ke database
        KegiatanModel::create($validatedData);
        return redirect()->route('admin.kegiatan.show')->with('success', 'Kegiatan berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update kegiatan
        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|max:2048',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
            'text' => 'required|string',
        ]);
        $kegiatan = KegiatanModel::findOrFail($id);
        //Handle upload thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($kegiatan->thumbnail) {
                Storage::disk('public')->delete($kegiatan->thumbnail);
            }
            // Upload thumbnail baru
            $validatedData['thumbnail'] = $this->uploadThumbnail($request->file('thumbnail'));
        } else {
            // Tidak ada file baru, pertahankan thumbnail lama
            unset($validatedData['thumbnail']);
        }
        // Update data kegiatan
        $kegiatan->update($validatedData);
        return redirect()->route('admin.kegiatan.show')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Logic to delete kegiatan
        $kegiatan = KegiatanModel::findOrFail($id);
        // Hapus thumbnail jika ada
        if ($kegiatan->thumbnail) {
            Storage::disk('public')->delete($kegiatan->thumbnail);
        }
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.show')->with('success', 'Kegiatan berhasil dihapus.');
    }

    private function uploadThumbnail($thumbnailFile)
    {
        $thumbnailName = time() . '_' . Str::slug(pathinfo($thumbnailFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $thumbnailFile->getClientOriginalExtension();
        return $thumbnailFile->storeAs('thumbnails', $thumbnailName, 'public');
    }
}
