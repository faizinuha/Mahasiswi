@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required>
        </div>
        <div class="mb-4">
            <label for="nim" class="block text-sm font-medium text-gray-700">NIM:</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}" required>
        </div>
        <div class="mb-4">
            <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telepon:</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="no_telp" name="no_telp" value="{{ $mahasiswa->no_telp }}" required>
        </div>
        <div class="mb-4">
            <label for="department_id" class="block text-sm font-medium text-gray-700">Jurusan:</label>
            <select id="department_id" name="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $department->id == $mahasiswa->department_id ? 'selected' : '' }}>{{ $department->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="organination_id" class="block text-sm font-medium text-gray-700">Organisasi:</label>
            <select id="organination_id" name="organination_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                @foreach($organinations as $organination)
                <option value="{{ $organination->id }}" {{ $organination->id == $mahasiswa->organination_id ? 'selected' : '' }}>{{ $organination->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="eskul_id" class="block text-gray-700 text-sm font-bold mb-2">Eskul:</label>
            <select id="eskul_id" name="eskul_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($eskuls as $eskul)
                <option value="{{ $eskul->id }}">{{ $eskul->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
