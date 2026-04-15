@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex items-center justify-between mb-4">
            <div class="text-left">
                <h6 class="dark:text-white text-black">DAFTAR KEGIATAN MWA</h6>
            </div>
            <div class="text-right">
              <a href="{{ route('admin.kegiatan.create') }}"> <button class="bg-blue-500 text-white px-4 py-2 rounded text-right" id="tambahKegiatan">Tambah Kegiatan</button></a>
            </div>
          </div>


        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="text-center px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="10%">Judul</th>
                  <th class="text-center px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="30%">Tanggal</th>
                  <th class="text-center px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="30%">Kategori</th>
                  <th class="text-center px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kegiatan as $kegiatanMWA)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                      <div>
                        <img src="{{ asset('storage/'.$kegiatanMWA->thumbnail) }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="user1" />
                      </div>
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-0 text-sm leading-normal"> {{ $kegiatanMWA->judul }} </h6>
                      </div>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1 justify-center">
                      <div class="flex flex-col">
                        <h6 class="mb-0 text-sm leading-normal"> {{ $kegiatanMWA->tanggal }} </h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparen">
                    <div class="flex px-2 py-1 justify-center">
                      <div class="flex flex-col">
                        <h6 class="mb-0 text-sm leading-normal"> {{ $kegiatanMWA->kategori }} </h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    |
                    <a href="{{ route('admin.kegiatan.edit', $kegiatanMWA->id) }}" class="text-xs font-semibold leading-tight text-slate-400"> 
                      <button class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button> 
                    </a>
                    |
                  <form action="{{ route('admin.kegiatan.destroy', $kegiatanMWA->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold leading-tight hover:bg-red-600">
                      Hapus
                    </button>
                  </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection