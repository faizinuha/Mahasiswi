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
        margin-right: 10px; /* Menambahkan margin ke kanan untuk jarak antar tombol */
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
        margin-top: 20px; /* Menambahkan margin atas untuk jarak dari elemen sebelumnya */
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

    /* Container and Image Styles */
    .container {
        margin-top: 2rem;
    }

    .table-container {
        margin-top: 2rem;
        padding: 2rem;
        overflow-x: auto;
    }

    .foto-mahasiswa {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .thead {
        background-color: #2196F3;
        color: white !important;
    }

    /* the animation buttons  */
    .warn {
        position: relative;
        display: inline-block;
        background-color: #2196F3;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        overflow: hidden;
        transition: border-radius 0.4s ease, background-color 0.4s ease;
        margin-top: 10px; /* Menambahkan margin atas untuk jarak antara tombol tambah mahasiswa dan elemen lainnya */
    }

    .warn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: #45a049;
        transition: left 0.4s ease;
        z-index: 0;
    }

    .warn:hover::before {
        left: 0;
    }

    .warn span {
        position: relative;
        z-index: 1;
    }

    .warn:hover {
        color: white;
        border-radius: 20px;
    }
</style>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mt-10">
        <h2 class="text-center text-2xl font-bold">Daftar Mahasiswa</h2>
        <div class="mt-4">
            <a class="warn rounded transition duration-300 ease-in-out" href="{{ route('mahasiswas.create') }}">
                <span>Tambah Mahasiswa</span>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="table-container bg-white rounded-lg shadow-md">
        <table class="table-fixed text-left">
            <thead class="thead">
                <tr>
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">NIM</th>
                    <th class="py-2 px-4 border">Alamat</th>
                    <th class="py-2 px-4 border">No_Telp</th>
                    <th class="py-2 px-4 border">Jurusan</th>
                    <th class="py-2 px-4 border">Organisasi</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->nama }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->nim }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->alamat}}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->no_telp}}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->Department->nama }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->organination->name }}</td>
                        <td class="py-2 px-4 border text-center">
                            <a class="warna rounded transition duration-300 ease-in-out" href="{{ route('mahasiswas.edit', $mahasiswa->id) }}">Edit</a>
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" class="delete-form" style="display:inline; margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="warna-delete rounded transition duration-300 ease-in-out delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const form = button.closest('.delete-form');

                Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                }).fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                });
            });
        });
    });
</script>
@endsection
