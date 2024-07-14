@extends('layouts.app')

@section('content')

<style>
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
        margin-top: 10px;
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

    <div class="table-container rounded-lg shadow-md">
        <table class="table-fixed text-left">
            <thead class="thead bg-blue-600 ">
                <tr>
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">NIM</th>
                    <th class="py-2 px-4 border">Alamat</th>
                    <th class="py-2 px-4 border">No_Telp</th>
                    <th class="py-2 px-4 border">Jurusan</th>
                    <th class="py-2 px-4 border">Organisasi</th>
                    <th class="py-2 px-4 border">Eskul</th> <!-- Tambahkan kolom Eskul -->
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->nama }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->nim }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->alamat }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->no_telp }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->department->nama }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->organination->name }}</td>
                        <td class="py-2 px-4 border text-center">{{ $mahasiswa->eskul->name}}</td> <!-- Tambahkan kolom Eskul -->
                        <td class="py-2 px-4 border text-center">
                            <a class="warna rounded transition duration-300 ease-in-out" href="{{ route('mahasiswas.edit', $mahasiswa->id) }}">Edit</a>
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline; margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class=" war warna-delete rounded transition duration-300 ease-in-out m-2 delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .warna{
        background-color: #FF6B6B;
        color: white;
        border: none;
        cursor: pointer;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
    }
    .war{
        background-color: blue;
        color: white;
        border: none;
        cursor: pointer;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const form = button.closest('form');
                Swal.mixin({
                    customClass: {
                        confirmButton: 'btn bg-green-500 text-white font-bold py-2 m-2 px-4 rounded hover:bg-green-700',
                        cancelButton: 'btn bg-red-500 text-white font-bold py-2 m-2 px-4 rounded hover:bg-red-700'
                    },
                    buttonsStyling: false
                }).fire({
                    title: 'Anda yakin ingin menghapus data ini?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batalkan!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Dibatalkan',
                            'Data anda aman :)',
                            'error'
                        )
                    }
                });
            });
        });
    });
</script>

@endsection
