@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-center text-2xl font-bold mt-10">Edit Dosen</h2>
    <style>
          .tes{
        background-color: aqua;
        border: 2px sollid #2196F3;
    }
    </style>
    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_dosen" class="block text-gray-700">Nama Dosen</label>
            <input type="text" name="nama_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ $dosen->nama_dosen }}">
        </div>
        <div class="mb-4">
            <label for="alamat_dosen" class="block text-gray-700">Alamat Dosen</label>
            <input type="text" name="alamat_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ $dosen->alamat_dosen }}">
        </div>
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No. Telp</label>
            <input type="text" name="no_telp" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ $dosen->no_telp }}">
        </div>
        <div class="mb-4">
            <label for="foto_dosen" class="block text-gray-700">Foto Dosen</label>
            <input type="file" name="foto_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
        </div>
        <div class="mt-4">
            <button type="submit" class="tes bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
