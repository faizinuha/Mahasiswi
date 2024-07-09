@extends('layouts.app')

@section('content')
    <style>
        .text {
            background-color: #da190b;
            background-color: blue;
            border: 2px solid #2196F3;
            /* Update border color and thickness */
            color: white;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .text1{
            background-color: #da190b;
            border: 2px solid red; /* Update border color and thickness */
            color: white;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
    <div class="container mx-auto px-4">
        <div class="flex justify-between mt-10">
            <div class="flex-1">
                <h2 class="text-center text-2xl font-bold">Edit Organisasi</h2>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                <strong>Whoops!</strong> Ada masalah dengan inputan anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('organisations.update', $organisasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-6">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nama Organisasi:</label>
                    <input type="text" name="name" id="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="{{ $organisasi->name }}">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="text  bg-blue-500 py-2 px-4 rounded">Simpan</button>
                    <a class="text1 inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                        href="{{ route('organisations.index') }}">
                        Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
