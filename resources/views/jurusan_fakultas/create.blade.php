@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 margin-tb">
                <div class="text-center underline">
                    <h2>Tambah Create</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('jurusan_fakultas.index') }}"> Kembali</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jurusan_fakultas.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
