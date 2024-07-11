@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between mt-6 space-x-6">
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Mahasiswa</h5>
                        <p class="mt-2 text-gray-700">{{ $mahasiswaCount }}</p>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Dosen</h5>
                        <p class="mt-2 text-gray-700">{{ $dosenCount }}</p>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Organisasi</h5>
                        <p class="mt-2 text-gray-700">{{ $OrganinationCount }}</p>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Department</h5>
                        <p class="mt-2 text-gray-700">{{ $departmentsCount }}</p>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Eskul</h5>
                        <p class="mt-2 text-gray-700">{{ $Eskulcount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection