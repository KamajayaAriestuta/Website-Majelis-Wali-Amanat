@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <h5 class="text-white">Tambah Anggota MWA</h5>
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <form action="{{ route('admin.anggotaMWA.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="nama" class="text-sm font-medium text-gray-700 mt-3">Nama</label>
                  <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2 mt-1" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="jabatan" class="text-sm font-medium text-gray-700 mt-3">Jabatan</label>
                    <select id="jabatan" name="jabatan"  class="w-full border rounded px-3 py-2 mt-1" required>
                      <option value="">Pilih Jabatan</option>
                      <option value="Ketua">Ketua</option>
                      <option value="Wakil Ketua">Wakil Ketua</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Sekretaris Eksekutif">Sekretaris Eksekutif</option>
                      <option value="Anggota">Anggota</option>
                    </select>
              </div>
              <br>
              <div class="mb-3">
                  <label for="unsur" class="text-sm font-medium text-gray-700 mt-3">Unsur</label>
                    <select id="unsur" name="unsur"  class="w-full border rounded px-3 py-2 mt-1" required>
                      <option value="">Pilih unsur</option>
                      <option value="Tokoh Masyarakat">Tokoh Masyarakat</option>
                      <option value="Menteri">Menteri</option>
                      <option value="Rektor">Rektor</option>
                      <option value="Ketua SAU">Ketua SAU</option>
                      <option value="Anggota SAU">Anggota SAU</option>
                      <option value="Wakil Alumni">Wakil Alumni</option>
                      <option value="Wakil Dosen">Wakil Dosen</option>
                      <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                      <option value="Wakil Mahasiswa">Wakil Mahasiswa</option>
                    </select>
              </div>
              <br>
              <div class="mb-3">
                  <label for="nomor_sk" class="text-sm font-medium text-gray-700 mt-3">Nomor SK</label>
                  <input type="text" name="nomor_sk" id="nomor_sk" class="w-full border rounded px-3 py-2 mt-1">
              </div>
              <br>
              <div class="mb-3">
                  <label for="foto" class="text-sm font-medium text-gray-700 mt-3">Foto</label>
                  <input type="file" name="foto" id="foto" class="w-full border rounded px-3 py-2 mt-1">
              </div>
              <br>
              <div class="mb-3">
                  <label for="sk_pengangkatan" class="text-sm font-medium text-gray-700 mt-3">SK Pengangkatan</label>
                  <input type="file" name="sk_pengangkatan" id="sk_pengangkatan" class="w-full border rounded px-3 py-2 mt-1">
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