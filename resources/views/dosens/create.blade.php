@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-center text-2xl font-bold mt-10">Tambah Dosen Baru</h2>

    <form action="{{ route('dosens.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="mb-4">
            <label for="nama_dosen" class="block text-gray-700">Nama Dosen</label>
            <input type="text" name="nama_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('nama_dosen') }}">
        </div>
        <div class="mb-4">
            <label for="alamat_dosen" class="block text-gray-700">Alamat Dosen</label>
            <input type="text" name="alamat_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('alamat_dosen') }}">
        </div>
        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No. Telp</label>
            <input type="text" name="no_telp" class="w-full px-4 py-2 border rounded-lg focus:outline-none" value="{{ old('no_telp') }}">
        </div>
        <div class="mb-4">
            <label for="foto_dosen" class="block text-gray-700">Foto Dosen</label>
            <input type="file" name="foto_dosen" id="foto_dosen" class="w-full px-4 py-2 border rounded-lg focus:outline-none" onchange="previewImage(event)">
            <img id="imagePreview" class="mt-2" style="max-width: 200px; max-height: 200px;">
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Simpan</button>
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
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
