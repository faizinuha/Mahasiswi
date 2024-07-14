@extends('layouts.app')

@section('content')
<style>
    
</style>
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
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-">Tambah Mahasiswa</h1>
        <form action="{{ route('mahasiswas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM:</label>
                <input type="text" id="nim" name="nim"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
                <input type="text" id="alamat" name="alamat"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">No Telp:</label>
                <input type="text" id="no_telp" name="no_telp"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="department_id" class="block text-gray-700 text-sm font-bold mb-2">Jurusan:</label>
                <select id="department_id" name="department_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="organination_id" class="block text-gray-700 text-sm font-bold mb-2">Organisasi:</label>
                <select id="organination_id" name="organination_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($organinations as $organination)
                        <option value="{{ $organination->id }}">{{ $organination->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="eskul_id" class="block text-gray-700 text-sm font-bold mb-2">Eskul:</label>
                <select id="eskul_id" name="eskul_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($eskuls as $eskul)
                        <option value="{{ $eskul->id }}">{{ $eskul->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
        </form>
    </div>
@endsection
