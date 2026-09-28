@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <h5 class="text-white">Tambah Anggota MWA</h5>
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <form action="{{ route('admin.anggotaMWA.update', $anggotaMWA->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nama" class="text-sm font-medium text-gray-700 mt-3">Nama</label>
                  <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2 mt-1" value="{{ old('nama', $anggotaMWA->nama) }}" required>
              </div>
              <br>
            <div class="mb-3">
            <label for="jabatan" class="text-sm font-medium text-gray-700 mt-3">Jabatan</label>
            <select 
                id="jabatan" 
                name="jabatan"  
                class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-300" 
                required>
                <option value="">Pilih Jabatan</option>
                <option value="Ketua" {{ old('jabatan', $anggotaMWA->jabatan) == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ old('jabatan', $anggotaMWA->jabatan) == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Sekretaris" {{ old('jabatan', $anggotaMWA->jabatan) == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                <option value="Sekretaris Eksekutif" {{ old('jabatan', $anggotaMWA->jabatan) == 'Sekretaris Eksekutif' ? 'selected' : '' }}>Sekretaris Eksekutif</option>
                <option value="Anggota" {{ old('jabatan', $anggotaMWA->jabatan) == 'Anggota' ? 'selected' : '' }}>Anggota</option>
            </select>
            </div>

              <br>
              <div class="mb-3">
                  <label for="unsur" class="text-sm font-medium text-gray-700 mt-3">Unsur</label>
                    <select id="unsur" name="unsur"  class="w-full border rounded px-3 py-2 mt-1" required>
                      <option value="">Pilih unsur</option>
                      <option value="Tokoh Masyarakat" {{ old('unsur', $anggotaMWA->unsur) == 'Tokoh Masyarakat' ? 'selected' : '' }}>Tokoh Masyarakat</option>
                      <option value="Rektor" {{ old('unsur', $anggotaMWA->unsur) == 'Rektor' ? 'selected' : '' }}>Rektor</option>
                      <option value="Ketua SAU" {{ old('unsur', $anggotaMWA->unsur) == 'Ketua SAU' ? 'selected' : '' }}>Ketua SAU</option>
                      <option value="Anggota SAU" {{ old('unsur', $anggotaMWA->unsur) == 'Anggota SAU' ? 'selected' : '' }}>Anggota SAU</option>
                      <option value="Wakil Alumni" {{ old('unsur', $anggotaMWA->unsur) == 'Wakil Alumni' ? 'selected' : '' }}>Wakil Alumni</option>
                      <option value="Wakil Dosen" {{ old('unsur', $anggotaMWA->unsur) == 'Wakil Dosen' ? 'selected' : '' }}>Wakil Dosen</option>
                      <option value="Tenaga Kependidikan" {{ old('unsur', $anggotaMWA->unsur) == 'Tenaga Kependidikan' ? 'selected' : '' }}>Tenaga Kependidikan</option>
                      <option value="Wakil Mahasiswa" {{ old('unsur', $anggotaMWA->unsur) == 'Wakil Mahasiswa' ? 'selected' : '' }}>Wakil Mahasiswa</option>
                    </select>
              </div>
              <br>
              <div class="mb-3">
                  <label for="nomor_sk" class="text-sm font-medium text-gray-700 mt-3">Nomor SK</label>
                  <input type="text" name="nomor_sk" id="nomor_sk" class="w-full border rounded px-3 py-2 mt-1" value="{{ old('nomor_sk', $anggotaMWA->nomor_sk) }}" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="foto" class="text-sm font-medium text-gray-700 mt-3">Foto</label>
                  <input type="file" name="foto" id="foto" accept="image/*" class="w-full border rounded px-3 py-2 mt-1">
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