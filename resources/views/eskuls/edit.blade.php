<!-- resources/views/eskuls/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Eskul</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('eskuls.update', $eskul->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Eskul</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $eskul->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('eskuls.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
