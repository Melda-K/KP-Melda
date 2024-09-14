<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="tambahModalLabel">TAMBAH DATA AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('akademik.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf
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
                        <x-text-input id="id_rapot" type="text" name="jumlah_nilai_rapot" class="mt-1 block w-full"
                            value="" required />
                    </div>
                    
                    <div class="modal-footer ">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#id_siswa').on('change', function() {
            var siswaID = $(this).val();
            if (siswaID) {
                $.ajax({
                    url: '/getrapot/' + siswaID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $('#id_rapot').val(data);
                        } else {
                            $('#id_rapot').val(data);
                        }
                    }
                });
            } else {
                $('#course').empty();
            }
        });
    });
</script>