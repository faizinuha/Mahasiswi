@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}"> --}}

    <style>
        /* Overrides for Tailwind CSS */

        /* Form fields */
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568; /* text-gray-700 */
            padding-left: 15px; /* pl-4 */
            padding-right: 1rem; /* pr-4 */
            padding-top: .5rem; /* pt-2 */
            padding-bottom: .5rem; /* pb-2 */
            line-height: 1.25; /* leading-tight */
            border-width: 2px; /* border-2 */
            border-radius: .25rem;
            border-color: #edf2f7; /* border-gray-200 */
            background-color: #edf2f7; /* bg-gray-200 */
            margin-left: 1rem; /* Add left margin */
        }

        /* Row Hover */
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff; /* bg-indigo-100 */
        }

        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700; /* font-bold */
            border-radius: .25rem; /* rounded */
            border: 1px solid transparent; /* border border-transparent */
        }

        /* Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important; /* text-white */
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06); /* shadow */
            font-weight: 700; /* font-bold */
            border-radius: .25rem; /* rounded */
            background: #667eea !important; /* bg-indigo-500 */
            border: 1px solid transparent; /* border border-transparent */
        }

        /* Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important; /* text-white */
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06); /* shadow */
            font-weight: 700; /* font-bold */
            border-radius: .25rem; /* rounded */
            background: #667eea !important; /* bg-indigo-500 */
            border: 1px solid transparent; /* border border-transparent */
        }

        /* Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0; /* border-b-1 border-gray-300 */
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /* Change color of responsive icon */
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important; /* bg-indigo-500 */
        }

        /* Additional spacing */
        .container {
            margin-top: 2rem; /* Adjust top margin for better spacing */
        }

        .table-container {
            margin-top: 2rem; /* Adjust top margin for better spacing */
            padding: 2rem; /* Add padding for better spacing */
        }

        .btn-group {
            margin-top: 1rem; /* Add top margin for button group */
        }

        .success-message {
            margin-top: 1.5rem; /* Add top margin for success message */
        }
    </style>

    <div class="container mx-auto px-4">
        <div class="flex justify-between mt-10">
            <div class="flex-1">
                <h2 class="text-center text-2xl font-bold">Daftar Mahasiswa</h2>
            </div>
            <div class="mt-4">
                <a class="bg-green-500 text-white py-2 px-4 rounded mt-5" href="{{ route('mahasiswas.create') }}">Tambah Mahasiswa</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="success-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        <div class="table-container overflow-x-auto bg-white rounded-lg shadow-md">
            <table id="example" class="table-auto min-w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border border-gray-300">No</th>
                        <th class="py-2 px-4 border border-gray-300">Nama</th>
                        <th class="py-2 px-4 border border-gray-300">NIM</th>
                        <th class="py-2 px-4 border border-gray-300">Jurusan</th>
                        <th class="py-2 px-4 border border-gray-300">Organisasi</th>
                        <th class="py-2 px-4 border border-gray-300" width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $mahasiswa->nama }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $mahasiswa->nim }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $mahasiswa->department->nama }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ $mahasiswa->organination->name }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <a class="bg-blue-500 text-white py-2 px-4 rounded" href="{{ route('mahasiswas.edit', $mahasiswa->id) }}"><i class='bx bxs-eyedropper'></i></a>
                                <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class='bx bx-trash-alt'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
