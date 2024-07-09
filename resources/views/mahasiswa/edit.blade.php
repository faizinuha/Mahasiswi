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
            <label for="alamat" class="form-label">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon:</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $mahasiswa->no_telp }}" required>
        </div>
        <div class="mb-3">
            <label for="department_id" class="form-label">Jurusan:</label>
            <select class="form-control" id="department_id" name="department_id" required>
                @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $department->id == $mahasiswa->department_id ? 'selected' : '' }}>{{ $department->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="organination_id" class="form-label">Organisasi:</label>
            <select class="form-control" id="organination_id" name="organination_id" required>
                @foreach($organinations as $organination)
                <option value="{{ $organination->id }}" {{ $organination->id == $mahasiswa->organination_id ? 'selected' : '' }}>{{ $organination->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
