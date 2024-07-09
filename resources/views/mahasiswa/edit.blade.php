@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container">
    <h1>Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan_fakultas_id" class="form-label">Jurusan:</label>
            <select class="form-control" id="jurusan_fakultas_id" name="jurusan_fakultas_id" required>
                @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $department->id == $mahasiswa->jurusan_fakultas_id ? 'selected' : '' }}>{{ $department->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="organisasi_id" class="form-label">Organisasi:</label>
            <select class="form-control" id="organisasi_id" name="organisasi_id" required>
                @foreach($organinations as $organinasi)
                <option value="{{ $organinasi->id }}" {{ $organinasi->id == $mahasiswa->organisasi_id ? 'selected' : '' }}>{{ $organinasi->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
