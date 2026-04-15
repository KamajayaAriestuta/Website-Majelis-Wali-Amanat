@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <h5 class="text-white">Tambah Kegiatan MWA</h5>
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="judul" class="text-sm font-medium text-gray-700 mt-3">Judul</label>
                  <input type="text" name="judul" id="judul" class="w-full border rounded px-3 py-2 mt-1" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="tanggal" class="text-sm font-medium text-gray-700 mt-3">Tanggal</label>
                  <input type="date" name="tanggal" id="tanggal" class="w-full border rounded px-3 py-2 mt-1" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="kategori" class="text-sm font-medium text-gray-700 mt-3">Kategori</label>
                    <select id="kategori" name="kategori"  class="w-full border rounded px-3 py-2 mt-1" required>
                      <option value="">Pilih Kategori</option>
                      <option value="Kegiatan">Kegiatan</option>
                      <option value="Pengumuman">Pengumuman</option>
                    </select>
              </div>
              <br>
              <div class="mb-3">
                  <label for="thumbnail" class="text-sm font-medium text-gray-700 mt-3">Thumbnail</label>
                  <input type="file" name="thumbnail" id="thumbnail" class="w-full border rounded px-3 py-2 mt-1">
              </div>
              <br>
              <div class="mb-3">
                  <label for="text" class="text-sm font-medium text-gray-700 mt-3">Teks</label>
                  <textarea name="text" id="text" class="w-full border rounded px-3 py-2 mt-1"></textarea>
              </div>
              <br>
              <div class="text-right mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded m-5">Simpan</button> 
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection