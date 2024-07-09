@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between mt-10">
        <div class="flex-1">
            <h2 class="text-center text-2xl font-bold">Tambah Organisasi</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
            <strong>Whoops!</strong> Ada masalah dengan inputan anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organisations.store') }}" method="POST">
        @csrf
        <div class="mt-6">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama Organisasi:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('organisations.index') }}">
                    Kembali
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
