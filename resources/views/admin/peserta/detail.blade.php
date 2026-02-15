@extends('admin.layoutsadmin.main')
@section('title', 'Detail Peserta')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Peserta
        </h1>

        <div class="flex gap-3">
            <a href="{{ route('admin.peserta.edit', $participant) }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                Edit
            </a>

            <a href="{{ route('admin.peserta.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    {{-- INFO CARD --}}
    <div class="bg-white shadow rounded-2xl p-6">
        <h2 class="text-lg font-semibold mb-4">Informasi Peserta</h2>

        <div class="grid md:grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">Nama</p>
                <p class="font-medium">{{ $participant->nama }}</p>
            </div>

            <div>
                <p class="text-gray-500">NISN / NIM</p>
                <p class="font-medium">{{ $participant->nisnim }}</p>
            </div>

            <div>
                <p class="text-gray-500">Jenis Kelamin</p>
                <p class="font-medium">
                    {{ $participant->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Jurusan</p>
                <p class="font-medium">{{ $participant->jurusan ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500">Tahun Aktif</p>
                <p class="font-medium">{{ $participant->tahun_aktif }}</p>
            </div>

            <div>
                <p class="text-gray-500">Kontak</p>
                <p class="font-medium">{{ $participant->kontak_peserta ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500">Email Login</p>
                <p class="font-medium">{{ $participant->user->email ?? '-' }}</p>
            </div>

        </div>
    </div>

    {{-- RIWAYAT ABSENSI --}}
    <div class="bg-white shadow rounded-2xl p-6">
        <h2 class="text-lg font-semibold mb-4">
            Riwayat Absensi ({{ $participant->attendances->count() }})
        </h2>

        @if($participant->attendances->isEmpty())
            <p class="text-gray-500">Belum ada riwayat absensi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Check-in</th>
                            <th class="px-4 py-2 text-left">Check-out</th>
                            <th class="px-4 py-2 text-left">IP Masuk</th>
                            <th class="px-4 py-2 text-left">IP Pulang</th>
                            <th class="px-4 py-2 text-left">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participant->attendances->sortByDesc('date') as $absen)
                            <tr class="border-t">
                                <td class="px-4 py-2">
                                    {{ \Carbon\Carbon::parse($absen->date)->format('d M Y') }}
                                </td>

                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 text-xs rounded
                                        @if($absen->status == 'Hadir') bg-green-100 text-green-700
                                        @elseif($absen->status == 'Izin') bg-yellow-100 text-yellow-700
                                        @elseif($absen->status == 'Sakit') bg-blue-100 text-blue-700
                                        @else bg-gray-100 text-gray-700
                                        @endif">
                                        {{ $absen->status }}
                                    </span>
                                </td>

                                <td class="px-4 py-2">
                                    {{ $absen->check_in_time ?? '-' }}
                                </td>

                                <td class="px-4 py-2">
                                    {{ $absen->check_out_time ?? '-' }}
                                </td>

                                <td class="px-4 py-2">
                                    {{ $absen->check_in_ip_address ?? '-' }}
                                </td>

                                <td class="px-4 py-2">
                                    {{ $absen->check_out_ip_address ?? '-' }}
                                </td>

                                <td class="px-4 py-2">
                                    {{ $absen->note ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

@endsection
