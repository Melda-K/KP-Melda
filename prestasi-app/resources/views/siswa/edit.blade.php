@foreach($siswas as $data)
<div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel_{{$data->id}}">EDIT DATA SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <form method="post" action="{{ route('siswa.update', $data->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                      
                        <div class="max-w-xl">
                            <x-input-label for="nis" value="NIS" />
                            <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis', $data->nis)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_siswa" value="NAMA SISWA" />
                            <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa', $data->nama_siswa)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas" value="KELAS" />
                            <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Kelas</option>
                                <option value="I" {{ old('kelas', $data->kelas) === 'I' ? 'selected' : '' }}>I</option>
                                <option value="II" {{ old('kelas', $data->kelas) === 'II' ? 'selected' : '' }}>II</option>
                                <option value="III" {{ old('kelas', $data->kelas) === 'III' ? 'selected' : '' }}>III</option>
                                <option value="IV" {{ old('kelas', $data->kelas) === 'IV' ? 'selected' : '' }}>IV</option>
                                <option value="V" {{ old('kelas', $data->kelas) === 'V' ? 'selected' : '' }}>V</option>
                                <option value="VI" {{ old('kelas', $data->kelas) === 'VI' ? 'selected' : '' }}>VI</option>
                            </x-select-input>
                        </div>   
                        <div class="max-w-xl">
                            <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                            <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="P" {{ old('jenis_kelamin',  $data->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                                <option value="L" {{ old('jenis_kelamin',  $data->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tahun_pelajaran" value="TAHUN PELAJARAN" />
                            <x-select-input id="tahun_pelajaran" name="tahun_pelajaran" class="mt-1 block w-full" required autocomplete>
                                <option value="">Pilih Tahun Pelajaran</option>
                                <option value="2024" {{ old('tahun_pelajaran',  $data->tahun_pelajaran) === '2024' ? 'selected' : '' }}>2024</option>
                                <option value="2025" {{ old('tahun_pelajaran',  $data->tahun_pelajaran) === '2025' ? 'selected' : '' }}>2025</option>
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="id_wali_kelas" value="WALI KELAS" />
                            <x-select-input id="id_wali_kelas" name="id_wali_kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih wali kelas</option>
                                <option value="1" {{ old('id_wali_kelas') === '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('id_wali_kelas') === '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('id_wali_kelas') === '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('id_wali_kelas') === '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('id_wali_kelas') === '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('id_wali_kelas') === '6' ? 'selected' : '' }}>6</option>
                            </x-select-input>
                        </div>   
                        <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection


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
