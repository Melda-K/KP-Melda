@foreach($wali_kelas as $data)
<div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel_{{$data->id}}">EDIT DATA WALI KELAS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <form method="post" action="{{ route('walikelas.update', $data->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="email" value="EMAIL" />
                            <x-text-input id="email" type="text" name="email" class="mt-1 block w-full" value="{{ old('email', $data->user->email)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nip" value="NIP" />
                            <x-text-input id="nip" type="text" name="nip" class="mt-1 block w-full" value="{{ old('nip', $data->nip)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="NAMA GURU" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru', $data->nama_guru)}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="guru_kelas" value="GURU KELAS" />
                            <x-select-input id="guru_kelas" name="guru_kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Kelas</option>
                                <option value="1" {{ old('guru_kelas', $data->nama_guru) === '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('guru_kelas', $data->nama_guru) === '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('guru_kelas', $data->nama_guru) === '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('guru_kelas', $data->nama_guru) === '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('guru_kelas', $data->nama_guru) === '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('guru_kelas', $data->nama_guru) === '6' ? 'selected' : '' }}>6</option>
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
                        <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
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
