@extends('layouts.app')

@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
<style>
    .warna {
        background-color: #4CAF50;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .warna:hover {
        background-color: #45a049;
    }

    .warna-delete {
        background-color: #f44336;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .warna-delete:hover {
        background-color: #da190b;
    }

    .war {
        background-color: #4CAF50;
    }

    .warn {
        position: relative;
        top: -5px;
        background-color: aqua;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .warn:hover{
        background-color: #00cccc;
    }

    .text {
        position: relative;
        top: 1px;
        /* background-color: aqua; */
        /* color: white; */
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
    }

    .alert {
        background-color: blue;
            border: 2px solid #2196F3; /* Update border color and thickness */
            color: white;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
    }

    .foto-dosen {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }
    thead {
        background-color: #2196F3   ;
        color: white;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<div class="container mx-auto px-4">
    <div class="flex justify-between mt-10">
        <div class="flex-1">
            <h2 class="text text-center text-2xl font-bold">Daftar Dosen</h2>
        </div>
        <div class="mt-4">
            <a class="warn rounded mt-5 mb-4 transition duration-300 ease-in-out" href="{{ route('dosens.create') }}">Tambah Dosen Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="war rounded mt-5 mx-auto max-w-md shadow-md alert">
        <span class="block sm:inline">{{ $message }}</span>
    </div>
    @endif

    <div class="relative overflow-hidden shadow-md rounded-lg mt-5">
        <table class="table-fixed w-full text-left">
            <thead class="thead">
                <tr>
                    <th class="py-0 border font-bold p-2 text-xs">ID</th>
                    <th class="py-0 border font-bold p-2 text-xs">Nama Dosen</th>
                    <th class="py-0 border font-bold p-2 text-xs">Alamat Dosen</th>
                    <th class="py-0 border font-bold p-2 text-xs">No Telepon</th>
                    <th class="py-0 border font-bold p-2 text-xs">Foto Dosen</th>
                    <th class="py-0 border font-bold p-2 text-xs">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                <tr class="py-2">
                    <td class="py-2 border text-center p-2 text-xs">{{ $loop->iteration }}</td>
                    <td class="py-2 border text-center p-2 text-xs">{{ $dosen->nama_dosen }}</td>
                    <td class="py-2 border text-center p-2 text-xs">{{ $dosen->alamat_dosen }}</td>
                    <td class="py-2 border text-center p-2 text-xs">{{ $dosen->no_telp }}</td>
                    <td class="py-2 border text-center p-2">
                        @if($dosen->foto_dosen)
                        <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="{{ $dosen->nama_dosen }}" class="foto-dosen">
                        @else
                        <span class="text-gray-500 text-xs">Tidak ada foto</span>
                        @endif
                    </td>
                    <td class="py-2 border text-center p-2 text-xs">
                        <a class="warna rounded transition duration-300 ease-in-out" href="{{ route('dosens.edit', $dosen->id) }}">Edit</a>
                        <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tes warna-delete rounded transition duration-300 ease-in-out" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
