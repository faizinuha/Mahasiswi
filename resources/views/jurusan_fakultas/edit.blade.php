@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    /* Consistent Button Styles */
    .btn {
        @apply bg-blue-700 text-white font-bold py-2 px-4 rounded;
    }
    .btn:hover {
        @apply bg-blue-800;
    }
    .alert {
        @apply bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative;
    }
    .warna{
        background-color: blue;
            border: 2px solid white; /* Update border color and thickness */
            color: white;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
    }
    .text12{
        font-size: 12px;
        border: 2px solid white;
        color: blue;
        background-color: aqua;
        border-radius: 5px;
        line-height: 1.5;
        padding: 10px;
        margin-bottom: 10px;
    }
    
</style>
    <div class="container mx-auto px-4">
        <div class="flex justify-between mt-10">
            <div class="flex-1">
                <div class="text-center text-2xl font-bold">
                    <h2>Edit Jurusan Fakultas</h2>
                </div>
                <div class="text-right mt-4">
                    <a class="warna" href="{{ route('jurusan_fakultas.index') }}">Kembali</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert text-center">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jurusan_fakultas.update', $Department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-6">
                <div class="mt-6">
                    <label for="nama" class="block text-gray-700 text-bold mb-2"><strong>Nama:</strong></label>
                    <input type="text" name="nama" value="{{ $Department->nama }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Nama">
                    <div class="text-center mt-3">
                        <button type="submit" class="text12">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
