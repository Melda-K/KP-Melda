<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="tambahModalLabel">KELOLA NILAI RAPOT SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('rapot.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="nis" value="NIS/NISN" />
                        </div>
                        <div class="w-2/3 flex">
                            <select id="nis" name="nis" class="block w-72 rounded-lg" required>
                                <option value="">Pilih NIS</option>
                                @foreach(App\Models\Siswa::all() as $siswa)
                                <option value="{{ $siswa->nis }}">{{ $siswa->nis }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-1" :messages="$errors->get('nis')" />
                            <button type="button" route="{{ 'searchSiswa' }}" id="searchButton" class="btn btn-secondary m-2">Cari</button>
                        </div>
                    </div>

                    <!-- Pencarian Data Berdasarkan NIS -->
                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="block w-72" value="{{ old('nama_siswa')}}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('nama_siswa')" />
                        </div>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="kelas" value="KELAS" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="kelas" type="text" name="kelas" class="block w-72" value="{{ old('kelas')}}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('kelas')" />
                        </div>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="tahun_pelajaran" value="TAHUN PELAJARAN" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="tahun_pelajaran" type="text" name="tahun_pelajaran" class="block w-72" value="{{ old('tahun_pelajaran')}}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('tahun_pelajaran')" />
                        </div>
                    </div>

                    <div class="container">
                        <p class="font-bold">CAPAIAN KOMPETENSI</p>
                        <p>Pendidikan Agama dan Budi Pekerti</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>PPKN</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Bahasa Indonesia</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text"  name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Matematika</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text"  name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>IPA</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="nilai_pengetahuan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>IPS</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan"id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>PJOK</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Seni Budaya</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Basa Sunda</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                            <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        let nis = document.getElementById('nis').value;

        if (!nis) {
            alert('Silakan pilih NIS/NISN terlebih dahulu.');
            return;
        }

        fetch(`/siswa/${nis}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('nama_siswa').value = data.nama_siswa || '';
                document.getElementById('kelas').value = data.kelas || '';
                document.getElementById('tahun_pelajaran').value = data.tahun_pelajaran || '';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data.');
            });
    });

    // Fungsi untuk mengkonversi nilai ke huruf
    function convertToLetterGrade(nilai) {
        if (nilai > 85) {
            return 'A';
        } else if (nilai > 75) {
            return 'B';
        } else {
            return 'C';
        }
    }

    // Event listener untuk input nilai pengetahuan dan otomatis mengisi huruf
    document.querySelectorAll('#nilai_pengetahuan').forEach(function(input) {
        input.addEventListener('input', function() {
            const nilai = parseFloat(input.value);
            const hurufInput = input.closest('.row').querySelector('#huruf_pengetahuan');
            if (!isNaN(nilai)) {
                hurufInput.value = convertToLetterGrade(nilai);
            } else {
                hurufInput.value = '';
            }
        });
    });

    // Event listener untuk input nilai keterampilan dan otomatis mengisi huruf
    document.querySelectorAll('#nilai_keterampilan').forEach(function(input) {
        input.addEventListener('input', function() {
            const nilai = parseFloat(input.value);
            const hurufInput = input.closest('.row').querySelector('#huruf_keterampilan');
            if (!isNaN(nilai)) {
                hurufInput.value = convertToLetterGrade(nilai);
            } else {
                hurufInput.value = '';
            }
        });
    });
</script>