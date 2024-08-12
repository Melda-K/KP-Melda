<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA NON AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('nonakademik.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    <div class="gap-4 flex items-center mb-4">
                        <label class="block text-gray-700 w-40">NIS</label>
                        <input type="text" name="nis" value="{{ old('nis', $siswa->nis ?? '') }}" class="w-62 border border-gray-300 rounded mt-1 p-2">
                        <button type="submit" class="p-2 bg-gray-500 text-white rounded hover:bg-gray-600 font-bold">CARI</button>
                    </div>

                    <div class="gap-4 flex items-center mb-4">
                        <label class="block text-gray-700 w-40">NAMA SISWA</label>
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama_siswa ?? '') }}" class="w-62 border border-gray-300 rounded mt-1 p-2">
                    </div>

                    <div class="gap-4 flex items-center mb-4">
                        <label class="block text-gray-700 w-40">KELAS</label>
                        <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas ?? '') }}" class="w-62 border border-gray-300 rounded mt-1 p-2">
                    </div>

                    <div class="gap-4 flex items-center mb-4">
                        <label class="block text-gray-700 w-40">TAHUN PELAJARAN</label>
                        <input type="text" name="tahun_pelajaran" value="{{ old('tahun_pelajaran', $siswa->tahun_pelajaran ?? '') }}" class="w-62 border border-gray-300 rounded mt-1 p-2">
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <p class="font-bold">CAPAIAN KOMPETENSI</p>
                                <br>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 border-b">Mata Pelajaran</th>
                                    <th class="py-2 px-4 bg-gray-100 border-b">Nilai Pengetahuan</th>
                                    <th class="py-2 px-4 bg-gray-100 border-b">Huruf</th>
                                    <th class="py-2 px-4 bg-gray-100 border-b">Nilai Keterampilan</th>
                                    <th class="py-2 px-4 bg-gray-100 border-b">Huruf</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Pendidikan Agama dan Budi Pekerti</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">PPKN</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Bahasa Indonesia</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Matematika</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">IPA</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">IPS</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">PJOK</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Seni Budaya</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Basa Sunda</td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                    <td class="py-2 px-4 border-b"><input type="text" class="w-full p-1 border border-gray-300 rounded"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

﻿

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->