<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf
                   <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="nip" value="NIS" />
                            <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="NAMA GURU" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                            <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                                <option value="">Pilih Tahun Pelajaran</option>
                                <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                                <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            </x-select-input>
                        </div>
                    </form>
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
