<aside id="sidebar" class="w-64 bg-[#0B1C48] flex-shrink-0 flex flex-col min-h-screen">

    {{-- HEADER --}}
    <div class="p-6 flex items-center gap-3">
        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
            <i data-lucide="user" class="text-white w-5 h-5"></i>
        </div>
        <h1 class="text-white font-bold text-lg tracking-tight">
            PANEL <span class="text-blue-300 font-light">PEMAGANG</span>
        </h1>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">

        {{-- Dashboard --}}
        <a href="{{ route('pemagang.dashboard.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
           {{ request()->routeIs('pemagang.dashboard.*') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            Dashboard
        </a>

        {{-- Riwayat Absensi --}}
        <a href="{{ route('pemagang.attendance.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
           {{ request()->routeIs('pemagang.attendance.*') ? 'bg-blue-600 text-white' : 'text-blue-200 hover:bg-blue-700 hover:text-white' }}">
            <i data-lucide="clock" class="w-5 h-5"></i>
            Riwayat Absensi
        </a>

    </nav>

    {{-- PROFILE --}}
    <div class="p-6 border-t border-blue-800">
        <div class="flex items-center gap-3">

            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=2563eb&color=fff"
                 class="w-10 h-10 rounded-full">

            <div>
                <p class="text-white text-sm font-semibold">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-blue-300 text-xs uppercase">
                    Pemagang
                </p>
            </div>

        </div>
    </div>

</aside>
