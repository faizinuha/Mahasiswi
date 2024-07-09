@extends('layouts.app')

@section('content')
<style>
    .warna {
        background-color: #4CAF50;
        color: white;
        padding: 11px 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .warna:hover {
        background-color: #45a049;
    }

    .warna-delete {
        background-color: #f44336;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
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
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }
    .warn:hover{
        
    }

    .text {
        position: relative;
        top: 1px;
        background-color: aqua;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
    }

    .alert {
        margin-top: 20px;
    }

    .foto-dosen {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<div class="container mx-auto px-4">
    <div class="flex justify-between mt-10">
        <div class="flex-1">
            <h2 class=" text text-center text-2xl font-bold">Daftar Dosen</h2>
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
            <thead class="uppercase bg-[#6b7280] text-[#7f97c6]" style="background-color: #6b7280; color: #7f97c6;">
                <tr>
                    <th class="py-0 border font-bold p-4">-ID</th>
                    <th class="py-0 border font-bold p-4">-Nama Dosen</th>
                    <th class="py-0 border font-bold p-4">-Alamat Dosen</th>
                    <th class="py-0 border font-bold p-4">-No Telepon</th>
                    <th class="py-0 border font-bold p-4">-Foto Dosen</th>
                    <th class="py-0 border font-bold p-4">-Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                <tr class="py-2">
                    <td class="py-2 border text-center p-4">{{ $loop->iteration }}</td>
                    <td class="py-2 border text-center p-4">{{ $dosen->nama_dosen }}</td>
                    <td class="py-2 border text-center p-4">{{ $dosen->alamat_dosen }}</td>
                    <td class="py-2 border text-center p-4">{{ $dosen->no_telp }}</td>
                    <td class="py-2 border text-center p-4">
                        @if($dosen->foto_dosen)
                        <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="{{ $dosen->nama_dosen }}" class="foto-dosen">
                        @else
                        <span class="text-gray-500">Tidak ada foto</span>
                        @endif
                    </td>
                    <td class="py-2 border text-center p-4">
                        <a class="warna rounded transition duration-300 ease-in-out" href="{{ route('dosens.edit', $dosen->id) }}">Edit</a>
                        <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="warna-delete rounded transition duration-300 ease-in-out" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
