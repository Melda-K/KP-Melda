<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <x-primary-button tag="a" href="{{ route('nonakademik.create')}}">TAMBAH DATA </x-primary-button>
                   <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>TANGGAL</th>
                            <th>KATEGORI LOMBA</th>
                            <th>TINGKAT LOMBA</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>
                    @php $num = 1; @endphp
                        @foreach ($non_akademiks as $data)
                            <tr class="text-center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->kategori_lomba }}</td>
                                <td>{{ $data->tingkat_lomba }}</td>
                                <td>
                                <x-primary-button tag="a" href="{{ route('nonakademik.create')}}">EDIT DATA <i class="fa-duotone fa-file-pen"></i> </x-primary-button>
                                <x-primary-button tag="a" href="{{ route('nonakademik.create')}}">HAPUS DATA <i class="fa-duotone fa-trash-can"></i> </x-primary-button>
                                </td>
                            </tr>
                        @endforeach
                   </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>