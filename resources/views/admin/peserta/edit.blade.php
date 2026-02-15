@extends('admin.layoutsadmin.main')
@section('title', 'Edit Peserta')
@section('peserta-active', 'active')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Peserta
        </h1>
        <p class="text-sm text-gray-500">
            Perbarui data peserta di bawah ini.
        </p>
    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-2xl p-6">

        <form action="{{ route('admin.peserta.update', $participant) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- IDENTITAS --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Identitas</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama"
                               value="{{ old('nama', $participant->nama) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    {{-- NIK --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nik"
                               value="{{ old('nik', $participant->nik) }}"
                               maxlength="16"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- DATA AKADEMIK --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Data Akademik</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NISN/NIM --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            NISN/NIM
                        </label>
                        <input type="text" name="nisnim"
                               value="{{ old('nisnim', $participant->nisnim) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_kelamin"
                                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                            <option value="L" @selected(old('jenis_kelamin', $participant->jenis_kelamin) == 'L')>
                                Laki-laki
                            </option>
                            <option value="P" @selected(old('jenis_kelamin', $participant->jenis_kelamin) == 'P')>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- Jurusan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Jurusan
                        </label>
                        <input type="text" name="jurusan"
                               value="{{ old('jurusan', $participant->jurusan) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    {{-- Tahun Aktif --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Tahun Aktif <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="tahun_aktif"
                               value="{{ old('tahun_aktif', $participant->tahun_aktif) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- KONTAK --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Kontak</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Kontak Peserta
                        </label>
                        <input type="text" name="kontak_peserta"
                               value="{{ old('kontak_peserta', $participant->kontak_peserta) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- KETERANGAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Keterangan
                </label>
                <textarea name="keterangan"
                          rows="3"
                          class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">{{ old('keterangan', $participant->keterangan) }}</textarea>
            </div>

            {{-- BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.peserta.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Kembali
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</div>

@endsection
