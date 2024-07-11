@extends('layouts.app')

@section('title', 'Daftar Eskul')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Eskul</h2>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">{{ $message }}</strong>
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('eskuls.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Eskul
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead class="bg-blue-700">
                <tr>
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Nama Eskul</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eskul as $index => $eskul)
                    <tr>
                        <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border">{{ $eskul->name }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('eskuls.edit', $eskul->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 m-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('eskuls.destroy', $eskul->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus eskul ini?')">
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
@endsection
