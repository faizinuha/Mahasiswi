@extends('layouts.app')

@section('content')
    <style>
        /* Consistent Button Styles */
        .warna {
            background-color: #4CAF50;
            color: white;
            padding: 11px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .warna:hover {
            background-color: #45a049;
        }

        .warna-delete {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .warna-delete:hover {
            background-color: #da190b;
        }

        /* Alert Style */
        .alert {
            background-color: blue;
            border: 2px solid #2196F3; /* Update border color and thickness */
            color: white;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        /* Table Styles */
        table {
            width: 100%;
            text-align: left;
        }

        thead {
            background-color: #6b7280;
            color: #7f97c6;
        }

        th, td {
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
        }

        /* tr:hover {
            background-color: #f1f5f9;
        } */

        /* Container and Image Styles */
        .container {
            margin-top: 2rem;
        }

        .table-container {
            margin-top: 2rem;
            padding: 2rem;
        }
    </style>

    <div class="container mx-auto px-4">
        <div class="flex justify-between mt-10">
            <div class="flex-1">
                <h2 class="text-center text-2xl font-bold">Jurusan Fakultas</h2>
            </div>
            <div class="mt-4">
                <a class="warna rounded mt-5 mb-4 transition duration-300 ease-in-out" href="{{ route('jurusan_fakultas.create') }}">Buat Jurusan Fakultas Baru</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        <div class="table-container overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="table-fixed text-left">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">No</th>
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Department as $jf)
                        <tr>
                            <td class="py-2 px-4 border text-center">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border text-center">{{ $jf->nama }}</td>
                            <td class="py-2 px-4 border text-center">
                                <a class="warna rounded transition duration-300 ease-in-out" href="{{ route('jurusan_fakultas.edit', $jf->id) }}">Edit</a>
                                <form action="{{ route('jurusan_fakultas.destroy', $jf->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="warna-delete rounded transition duration-300 ease-in-out" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
