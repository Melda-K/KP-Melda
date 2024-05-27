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
                   <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>NO</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>GURU KELAS</th>
                            <th>JENIS KELAMIN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>
                    @php $num = 1; @endphp
                        @foreach ($walikelas as $data)
                            <tr class="text-center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->nama_guru }}</td>
                                <td>{{ $data->guru_kelas }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                   </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>