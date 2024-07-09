@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Jurusan Fakultas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('jurusan_fakultas.index') }}">Kembali</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jurusan_fakultas.update', $Department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="nama" class="form-label"><strong>Nama:</strong></label>
                        <input type="text" name="nama" value="{{ $Department->nama }}" class="form-control" placeholder="Nama">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
