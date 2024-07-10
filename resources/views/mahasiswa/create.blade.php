@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM:</label>
            <input type="text" id="nim" name="nim" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
            <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">No Telp:</label>
            <input type="text" id="no_telp" name="no_telp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="jurusan_fakultas_id" class="block text-gray-700 text-sm font-bold mb-2">Jurusan:</label>
            <select id="jurusan_fakultas_id" name="department_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="Organination_id" class="block text-gray-700 text-sm font-bold mb-2">Organisasi:</label>
            <select id="Organination_id" name="organination_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($organinations as $organination)
                <option value="{{ $organination->id }}">{{ $organination->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
    </form>
</div>
@endsection
