<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Non Akademik') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('nonakademik.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="title" value="NAMA" />
                            <x-text-input id="title" type="text" name="title" class="mt-1 block w-full" value="{{ old('title')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas" value="KELAS" />
                            <x-text-input id="kelas" type="text" name="kelas" class="mt-1 block w-full" value="{{ old('kelas')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tanggal" value="TANGGAL" />
                            <x-text-input id="tanggal" type="number" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kategori_lomba" value="KATEGORI LOMBA" />
                            <x-text-input id="kategori_lomba" type="text" name="kategori_lomba" class="mt-1 block w-full" value="{{old('kategori_lomba')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_lomba')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tingkat_lomba" value="TINGKAT LOMBA" />
                            <x-text-input id="tingkat_lomba" type="text" name="tingkat_lomba" class="mt-1 block w-full" value="{{ old('tingkat_lomba')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tingkat_lomba')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="prestasi" value="Kategori Prestasi" />
                            <x-select-input id="prestasi" name="id_prestasi" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach($prestasi as $key => $value)
                                    @if(old('id_prestasi') == $key)
                                        <option value="{{ $key }}" selected>{{$value }}</option>
                                    @else
                                        <option value="{{ $key }}" selected>{{ $value}}</option>
                                    @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <x-secondary-button tag="a" href="{{ route('nonakademik') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>