@extends('pemagang.layoutspemagang.main')
@section('title', 'Dashboard')
@section('dashboard-active', 'active')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    {{-- GREETING --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            {{ $greeting }}, {{ $user->name }} 👋
        </h1>
        <p class="text-gray-500 text-sm">
            Berikut ringkasan aktivitas Anda hari ini.
        </p>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- STATUS ABSENSI HARI INI --}}
        <div class="bg-white shadow rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Status Absensi Hari Ini</p>

                    <div class="mt-2 text-lg font-semibold">
                        @if ($todayAttendance)
                            <span class="text-green-600">Sudah Absen</span>
                        @else
                            <span class="text-red-600">Belum Absen</span>
                        @endif
                    </div>
                </div>

                <div class="bg-blue-100 p-3 rounded-full">
                    <i data-lucide="calendar-check" class="w-6 h-6 text-blue-600"></i>
                </div>
            </div>
        </div>

        {{-- TOTAL RIWAYAT ABSENSI --}}
        <div class="bg-white shadow rounded-2xl p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total Riwayat Absensi</p>
                    <div class="mt-2 text-lg font-semibold text-gray-800">
                        {{ $attendanceCount }} Hari
                    </div>
                </div>

                <div class="bg-green-100 p-3 rounded-full">
                    <i data-lucide="clock" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
