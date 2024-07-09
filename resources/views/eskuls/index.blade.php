@extends('layouts.app')

@section('content')
<style>
    .warna {
        background-color: #4CAF50;
        color: white;
        padding: 11px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
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
        transition: background-color 0.3s;
    }

    .warna-delete:hover {
        background-color: #da190b;
    }

    .warn {
        background-color: aqua;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .warn:hover {
        background-color: #39c0b3;
    }

    .alert {
        margin-top: 20px;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 4px;
    }
    .table{
        background-color: blue;
    }
</style>

<div class="container mx-auto px-4">
    <div class="flex justify-between mt-10">
        <div class="flex-1">
            <h2 class="text-center text-2xl font-bold">Daftar Eskul</h2>
        </div>
        <div class="mt-4">
            <a class="warn rounded mt-5 mb-4" href="{{ route('eskuls.create') }}">Tambah Eskul Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert rounded mt-5 mx-auto max-w-md shadow-md">
        <span class="block sm:inline">{{ $message }}</span>
    </div>
    @endif

    <div class="relative overflow-hidden shadow-md rounded-lg mt-5">
        <table class="table-fixed w-full text-left border border-gray-300 table">
            <thead class="uppercase bg-blue-700 text-white">
                <tr>
                    <th class="py-2 border border-gray-300">ID</th>
                    <th class="py-2 border border-gray-300">Nama Eskul</th>
                    <th class="py-2 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eskuls as $eskul)
                <tr class="bg-white even:bg-gray-100">
                    <td class="py-2 border border-gray-300 text-center">{{ $eskul->id }}</td>
                    <td class="py-2 border border-gray-300 text-center">{{ $eskul->name }}</td>
                    <td class="py-2 border border-gray-300 text-center">
                        <a class="warna rounded" href="{{ route('eskuls.edit', $eskul->id) }}">Edit</a>
                        <form action="{{ route('eskuls.destroy', $eskul->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="warna-delete rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
