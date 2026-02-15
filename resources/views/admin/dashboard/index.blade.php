@extends('admin.layoutsadmin.main')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="stat-card bg-white p-6 rounded-3xl border border-gray-50">
        <p class="text-gray-400 text-xs font-bold uppercase">Total Pemagang</p>
        <h4 class="text-xl font-black text-deep-navy mt-2">
            {{ $totalPemagang ?? 0 }}
        </h4>
    </div>

    <div class="stat-card bg-white p-6 rounded-3xl border border-gray-50">
        <p class="text-gray-400 text-xs font-bold uppercase">Total Penugasan</p>
        <h4 class="text-xl font-black text-deep-navy mt-2">
            {{ $totalPenugasan ?? 0 }}
        </h4>
    </div>

    <div class="stat-card bg-white p-6 rounded-3xl border border-gray-50">
        <p class="text-gray-400 text-xs font-bold uppercase">Pending</p>
        <h4 class="text-xl font-black text-deep-navy mt-2">
            {{ $permohonanPending ?? 0 }}
        </h4>
    </div>

    <div class="stat-card bg-white p-6 rounded-3xl border border-gray-50">
        <p class="text-gray-400 text-xs font-bold uppercase">Total User</p>
        <h4 class="text-xl font-black text-deep-navy mt-2">
            {{ $totalPengguna ?? 0 }}
        </h4>
    </div>

</div>

@endsection
