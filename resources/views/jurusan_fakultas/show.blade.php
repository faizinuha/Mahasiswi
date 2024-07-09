@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Detail Jurusan Fakultas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('jurusan_fakultas.index') }}">Kembali</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    {{ $Department->nama }}
                </div>
            </div>
        </div>
    </div>
@endsection
