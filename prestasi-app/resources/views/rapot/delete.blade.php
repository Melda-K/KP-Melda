@foreach ($siswa as $data)
<div class="modal fade" id="hapusModal_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-bold" id="exampleModalLabel_{{ $data->id }}">HAPUS DATA RAPOT SISWA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('rapot.destroy', $data->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')  
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data {{ $data->nama_siswa }}?
                </div>
                <div class="modal-footer">
                    <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                    <x-primary-button value="true">Hapus</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach




