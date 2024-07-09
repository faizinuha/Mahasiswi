<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="flex justify-between mt-6">
            <div class="flex flex-col space-y-6">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Mahasiswa</h5>
                    <p class="mt-2 text-gray-700">{{ $mahasiswaCount }}</p>
                </div>
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Dosen</h5>
                    <p class="mt-2 text-gray-700">{{ $dosenCount }}</p>
                </div>
            </div>
            <div class="flex flex-col space-y-6">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Organisasi</h5>
                    <p class="mt-2 text-gray-700">{{ $OrganinationCount }}</p>
                </div>
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Total Department</h5>
                    <p class="mt-2 text-gray-700">{{ $departmentsCount }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
