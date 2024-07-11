@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-center text-2xl font-bold mt-10">Edit Dosen</h2>
    <style>
        .tes {
            background-color: aqua;
            border: 2px solid #2196F3; /* Perbaiki typo dari "sollid" menjadi "solid" */
        }
    </style>
    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_dosen" class="block text-gray-700">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
            @error('nama_dosen')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="alamat_dosen" class="block text-gray-700">Alamat Dosen</label>
            <input type="text" name="alamat_dosen" id="alamat_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('alamat_dosen', $dosen->alamat_dosen) }}">
            @error('alamat_dosen')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No. Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('no_telp', $dosen->no_telp) }}">
            @error('no_telp')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="foto_dosen" class="block text-gray-700">Foto Dosen</label>
            <input type="file" name="foto_dosen" id="foto_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" onchange="previewImage(event)">
            <img src="{{ asset('storage/' . $dosen->foto_dosen) }}" alt="{{ $dosen->nama_dosen }}" class="foto-dosen" id="previewImage">
        </div>
        <div class="mt-4">
            <button type="submit" class="tes bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
