@foreach($akademiks as $data)
<div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel_{{$data->id}}">EDIT DATA AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('akademik.update', $data->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')
                    <div class="max-w-xl">
                        @php
                        $user_id = Auth::id();
                        $wali_kelas = \App\Models\Siswa::where('id_wali_kelas', $user_id -1)->get();
                        @endphp
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <select id="id_siswa" name="id_siswa" class="block rounded-lg w-full" required>
                            <option value="">Pilih Nama Siswa</option>
                            @foreach ($wali_kelas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="id_rapot" value="JUMLAH NILAI RAPOT" />
                        <x-text-input id="id_rapot" type="number" name="jumlah_nilai_rapot" class="mt-1 block w-full"
                            value="" required />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="ranking" value="RANKING" />
                        <x-text-input id="ranking" type="text" name="ranking" class="mt-1 block w-full" value="{{ old('ranking')}}" />
                        <x-input-error class="mt-2" :messages="$errors->get('ranking')" />
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