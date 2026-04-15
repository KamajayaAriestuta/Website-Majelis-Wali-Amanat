@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <h5 class="text-white">Edit Keputusan MWA</h5>
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <form action="{{ route('admin.keputusan.update', $keputusan->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="perihal" class="text-sm font-medium text-gray-700 mt-3">Perihal</label>
                  <input type="text" name="perihal" id="perihal" class="w-full border rounded px-3 py-2 mt-1" value="{{ old('perihal', $keputusan->perihal) }}" required>
              </div>
              <br>
              <div class="mb-3">
                <label for="nomor" class="text-sm font-medium text-gray-700 mt-3">Nomor Keputusan</label>
                <input type="text" name="nomor" id="nomor" class="w-full border rounded px-3 py-2 mt-1" value="{{ old('nomor', $keputusan->nomor) }}" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="tanggal_ditetapkan" class="text-sm font-medium text-gray-700 mt-3">Tanggal Ditetapkan</label>
                  <input type="date" name="tanggal_ditetapkan" id="tanggal_ditetapkan" class="w-full border rounded px-3 py-2 mt-1" value="{{ old('tanggal_ditetapkan', $keputusan->tanggal_ditetapkan) }}" required>
              </div>
              <br>
              <div class="mb-3">
                  <label for="dokumen" class="text-sm font-medium text-gray-700 mt-3">File Keputusan</label>
                  <input type="file" name="dokumen" id="dokumen" class="w-full border rounded px-3 py-2 mt-1">
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