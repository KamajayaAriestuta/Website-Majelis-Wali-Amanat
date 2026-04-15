@extends('admin.layouts.base')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0">
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex items-center justify-between mb-4">
            <div class="text-left">
                <h6 class="dark:text-white text-black">DAFTAR KEPUTUSAN MWA</h6>
            </div>
            <div class="text-right">
              <a href="{{ route('admin.keputusan.create') }}"> <button class="bg-blue-500 text-white px-4 py-2 rounded text-right" id="tambahKeputusan">Tambah Keputusan</button></a>
            </div>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="text-center px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Perihal</th>
                  <th class="text-center px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nomor</th>
                  <th class="text-center px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Ditetapkan</th>
                  <th class="text-center px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($keputusan as $item)
                <tr>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->perihal }}</p>
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->nomor }}</p>
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ \Carbon\Carbon::parse($item->tanggal_ditetapkan)->format('d M Y') }}</p>
                  </td>
                  <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href="{{ asset('storage/'.$item->dokumen) }}" target="_blank" class="text-xs font-semibold leading-tight text-slate-400"> 
                      <button class="bg-green-500 text-white px-2 py-1 rounded">File Keputusan</button> 
                    </a>
                    |
                    <a href="{{ route('admin.keputusan.edit', $item->id) }}" class="text-xs font-semibold leading-tight text-slate-400"> 
                      <button class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button> 
                    </a>
                    |
                  <form action="{{ route('admin.keputusan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline">
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