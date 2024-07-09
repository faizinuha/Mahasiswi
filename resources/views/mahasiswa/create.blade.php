@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container">
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="form-group">
            <label for="alamat">alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="no_telp">no_telp:</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <div class="form-group">
            <label for="jurusan_fakultas_id">Jurusan:</label>
            <select class="form-control" id="jurusan_fakultas_id" name="department_id" required>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Organination_id">Organisasi:</label>
            <select class="form-control" id="Organination_id" name="organination_id" required>
                @foreach($organinations as $organination)
                <option value="{{ $organination->id }}">{{ $organination->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
