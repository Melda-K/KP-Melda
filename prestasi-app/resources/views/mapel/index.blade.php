<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA MATA PELAJARAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <h1>Laporan Nilai Siswa</h1>
                            @foreach (App\Models\Siswa::all() as $data)
                            <p>Nama Siswa: {{ $data->nama_siswa }}</p>
                            <p>Kelas: {{ $data->kelas }}</p>
                            @endforeach
                            <p>Tahun Pelajaran: 2023-2024</p>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai Pengetahuan</th>
                                        <th>Huruf</th>
                                        <th>Nilai Keterampilan</th>
                                        <th>Huruf</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>