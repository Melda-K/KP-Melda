@foreach ($rapot as $data)
<div class="modal fade" id="openModel_{{ $data->id_siswa }}" tabindex="-1"
    aria-labelledby="openModalLabel_{{ $data->id_siswa }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="openModalLabel_{{ $data->id_siswa }}">INFORMASI DATA NILAI
                    RAPOT SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>

            <div class="w-full p-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <form action="{{ route('searchSiswa') }}" method="GET">
                        <table>
                            <tr>
                                <td style="padding-right: 10px;">NIS</td>
                                <td>:</td>
                                <td>
                                    <p style="margin-left: 10px;">{{ $data->siswa->nis }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;">NAMA SISWA</td>
                                <td>:</td>
                                <td>
                                    <p style="margin-left: 10px;">{{ $data->siswa->nama_siswa }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;">KELAS</td>
                                <td>:</td>
                                <td>
                                    <p style="margin-left: 10px;">{{  $data->siswa->kelas }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;">TAHUN PELAJARAN</td>
                                <td>:</td>
                                <td>
                                    <p style="margin-left: 10px;">{{  $data->siswa->tahun_pelajaran }}</p>
                                </td>
                            </tr>
                        </table>
                        <br>

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                    <p class="font-bold">CAPAIAN KOMPETENSI</p>
                                    <br>
                                    <tr>
                                        <th class="py-2 px-4 bg-gray-100 border-b ">No.</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Mata Pelajaran</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Nilai Pengetahuan</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Huruf</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Nilai Keterampilan</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Huruf</th>
                                    </tr>

                                    <div class="flex-auto">
                                        @php
                                        $i = 1;
                                        @endphp
                                        @if(Auth::check())
                                        @php
                                        $user_id = Auth::id();
                                        $siswa = \App\Models\Siswa::where('id', $user_id)->first();
                                        @endphp
                                        @endif
                                        @if($siswa)
                                        @foreach ($rapot as $item)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td class="py-2 px-4 border-r">
                                                <div class="font-bold">
                                                    
                                                    <label>{{ $item->mapel[0]->nama_mapel }}</label>
                                                </div>
                                            </td>
                                            <td class="py-2 px-4 border-r">{{ $item->nilai_pengetahuan }}</td>
                                            <td class="py-2 px-4 border-r">{{ $item->huruf_pengetahuan }}</td>
                                            <td class="py-2 px-4 border-r">{{ $item->nilai_keterampilan }}</td>
                                            <td class="py-2 px-4 border-r">{{ $item->huruf_keterampilan }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </div>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;" colspan="2"
                                            class="py-2 px-4 bg-gray-100 border-b">Jumlah</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b text-center">
                                            {{ $rapot->sum('nilai_pengetahuan') }}
                                        </th>
                                        <th class="py-2 px-4 bg-gray-100 border-b"></th>
                                        <th class="py-2 px-4 bg-gray-100 border-b text-center">
                                            {{ $rapot->sum('nilai_keterampilan') }}
                                        </th>
                                        <th class="py-2 px-4 bg-gray-100 border-b"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;" colspan="2"
                                            class="py-2 px-4 bg-gray-100 border-b">Total</th>
                                        <th colspan="3" class="py-2 px-4 bg-gray-100 border-b"></th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">
                                            {{ $rapot->sum('nilai_pengetahuan') + $rapot->sum('nilai_keterampilan') }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach