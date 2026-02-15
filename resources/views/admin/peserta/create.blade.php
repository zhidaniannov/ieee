@extends('admin.layoutsadmin.main')
@section('title', 'Tambah Peserta')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Peserta
        </h1>
        <p class="text-sm text-gray-500">
            Tambahkan data peserta dan akun login pemagang.
        </p>
    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg">
            <p class="font-semibold mb-2">Periksa kembali input berikut:</p>
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="bg-white shadow rounded-2xl p-8">

        <form action="{{ route('admin.peserta.store') }}" method="POST" class="space-y-8">
            @csrf

            {{-- ================= IDENTITAS ================= --}}
            <div>
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">
                    Identitas
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Nama *
                        </label>
                        <input type="text"
                               name="nama"
                               value="{{ old('nama') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 @error('nama') border-red-500 @enderror">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            NIK *
                        </label>
                        <input type="text"
                               name="nik"
                               value="{{ old('nik') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 @error('nik') border-red-500 @enderror">
                    </div>

                </div>
            </div>

            {{-- ================= DATA AKADEMIK ================= --}}
            <div>
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">
                    Data Akademik
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            NISN / NIM
                        </label>
                        <input type="text"
                               name="nisnim"
                               value="{{ old('nisnim') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Jenis Kelamin *
                        </label>
                        <select name="jenis_kelamin"
                                class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Jurusan
                        </label>
                        <input type="text"
                               name="jurusan"
                               value="{{ old('jurusan') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Tahun Aktif *
                        </label>
                        <input type="text"
                               name="tahun_aktif"
                               value="{{ old('tahun_aktif') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- ================= KONTAK ================= --}}
            <div>
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">
                    Kontak
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Kontak Peserta
                        </label>
                        <input type="text"
                               name="kontak_peserta"
                               value="{{ old('kontak_peserta') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- ================= AKUN LOGIN ================= --}}
            <div>
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">
                    Akun Login Pemagang
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Email *
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Password *
                        </label>
                        <input type="password"
                               name="password"
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    </div>

                </div>
            </div>

            {{-- ================= KETERANGAN ================= --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Keterangan
                </label>
                <textarea name="keterangan"
                          rows="3"
                          class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">{{ old('keterangan') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('admin.peserta.index') }}"
                   class="px-5 py-2 bg-gray-500 text-white rounded-lg">
                    Kembali
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
