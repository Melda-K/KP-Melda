@include('siswa.create')
@include('siswa.edit')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA SISWA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <button type="button" class="btn btn-outline-secondary m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>
                   <x-table>
                    <x-slot name="header">
                        <tr class="bg-gray-400 text-center">
                            <th>NO</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>JENIS KELAMIN</th>
                            <th>TAHUN PELAJARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>
                    @php $num = 1; @endphp
                        @foreach ($siswas as $data)
                            <tr class="text-center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tahun_pelajaran }}</td>
                                <td>
                                    <button tag="a" type="button" class="btn btn-outline-warning"data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"data-bs-target="#hapusModal_{{ $data->id }}"><i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                   </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>