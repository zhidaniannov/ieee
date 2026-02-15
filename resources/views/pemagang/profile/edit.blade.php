@extends('pemagang.layoutspemagang.main')
@section('title', 'Profil Saya')

@section('content')

<div class="mx-auto px-4 py-8" style="max-width: 900px;">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Profil Saya</h2>
        <p class="text-gray-500 text-sm">Kelola informasi akun dan data pribadi Anda.</p>
    </div>

    {{-- ================= PROFIL CARD ================= --}}
    <div class="bg-white shadow rounded-2xl p-8 mb-6">

        <form method="POST" action="{{ route('pemagang.profile.update') }}">
            @csrf
            @method('patch')

            {{-- INFORMASI AKUN --}}
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-blue-600 mb-4">Informasi Akun</h4>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nama</label>
                        <input type="text"
                               name="name"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                               value="{{ old('name', $user->name) }}"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email"
                               name="email"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                               value="{{ old('email', $user->email) }}"
                               required>
                    </div>

                </div>
            </div>

            {{-- DATA DIRI --}}
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-blue-600 mb-4">Data Diri Peserta</h4>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">NIK</label>
                        <input type="text"
                               name="nik"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('nik', $user->participant->nik ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                                class="w-full border rounded-lg px-3 py-2">
                            <option value="">Pilih...</option>
                            <option value="L"
                                @selected(old('jenis_kelamin', $user->participant->jenis_kelamin ?? '') == 'L')>
                                Laki-laki
                            </option>
                            <option value="P"
                                @selected(old('jenis_kelamin', $user->participant->jenis_kelamin ?? '') == 'P')>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Jurusan / Program Studi</label>
                        <input type="text"
                               name="jurusan"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('jurusan', $user->participant->jurusan ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nomor Telepon / WA</label>
                        <input type="text"
                               name="kontak_peserta"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('kontak_peserta', $user->participant->kontak_peserta ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Tahun Masuk / Angkatan</label>
                        <input type="number"
                               name="tahun_aktif"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('tahun_aktif', $user->participant->tahun_aktif ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Alamat Asal</label>
                        <input type="text"
                               name="alamat_asal"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('alamat_asal', $user->participant->alamat_asal ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nama Wali</label>
                        <input type="text"
                               name="nama_wali"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('nama_wali', $user->participant->nama_wali ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Kontak Wali</label>
                        <input type="text"
                               name="kontak_wali"
                               class="w-full border rounded-lg px-3 py-2"
                               value="{{ old('kontak_wali', $user->participant->kontak_wali ?? '') }}">
                    </div>

                </div>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    {{-- PASSWORD --}}
    <div class="bg-white shadow rounded-2xl p-8">
        <h4 class="text-lg font-semibold text-blue-600 mb-4">Ubah Password</h4>
        @include('profile.partials.update-password-form')
    </div>

</div>

@endsection
