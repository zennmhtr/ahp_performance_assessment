@extends('dashboard.layouts.app')

@section('container')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ $judul }} <span class="text-purple-600 dark:text-purple-300">{{ $subKriteria->nama }}</span>
        </h2>
    </div>

    <div>
        <section class="mt-3">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-5 pl-10">
                    <form
                        action="{{ route('matriks_perbandingan_kriteria.hitung', ['kriteria_id' => $matriksPerbandingan->first()->kriteria_id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="kriteria_id" value="{{ $matriksPerbandingan->first()->kriteria_id }}" hidden>
                        <input type="number" name="kategori_id" value="{{ $subKriteria->kategori_id }}" hidden>

                        @foreach ($matriksPerbandingan as $item)
                            @php
                                $labelAsli = strtoupper($item->nama_kategori_banding);
                                switch ($labelAsli) {
                                    case 'CUKUP':
                                        $labelTampil = 'Sangat Baik';
                                        break;
                                    case 'SANGAT BAIK':
                                        $labelTampil = 'Cukup';
                                        break;
                                    default:
                                        $labelTampil = $item->nama_kategori_banding;
                                        break;
                                }
                            @endphp

                            <div class="form-control w-full max-w-md mb-3">
                                <label class="label">
                                    <span class="label-text font-semibold">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            {{ $item->nama_sub_kriteria }}
                                        </span>
                                        <i class="ri-arrow-right-line dark:text-gray-400 text-lg"></i>
                                        <span class="text-purple-600 dark:text-purple-300">
                                            {{ $labelTampil }}
                                        </span>
                                    </span>
                                </label>

                                @if ($item->kategori_id == $item->kategori_id_banding)
                                    <input type="number"
                                           name="{{ $item->kategori_id_banding }}"
                                           class="input input-bordered w-full max-w-md text-gray-800"
                                           value="{{ $item->nilai }}" required readonly />
                                @else
                                    <input type="number"
                                           max="9" step="any"
                                           name="{{ $item->kategori_id_banding }}"
                                           class="input input-bordered w-full max-w-md text-gray-800"
                                           value="{{ $item->nilai }}" required />
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('perhitungan_kriteria.ubah', ['kriteria_id' => $matriksPerbandingan->first()->kriteria_id]) }}"
                                class="btn normal-case bg-gray-300 hover:bg-gray-400 hover:border-gray-400 hover:text-white">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
