<aside id="sidebar" class="sidebar w-64 flex-shrink-0 flex flex-col z-50">

    <div class="p-6 flex items-center gap-3">
        <div class="w-10 h-10 bg-primary-blue rounded-lg flex items-center justify-center shadow-lg">
            <i data-lucide="users" class="text-white"></i>
        </div>
        <h1 class="text-white font-bold text-xl tracking-tight">
            PANEL <span class="text-secondary-blue font-light">SISTEM</span>
        </h1>
    </div>

    <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto custom-scrollbar">

        {{-- ================= ADMIN MENU ================= --}}
        @if(Auth::user()->role === 'admin')

            <a href="{{ route('admin.peserta.index') }}"
               class="sidebar-item {{ request()->routeIs('admin.peserta.*') ? 'active' : '' }}
               flex items-center gap-3 px-4 py-3 rounded-xl">
                <i data-lucide="users-2" class="w-5 h-5"></i>
                <span class="text-sm font-medium">Lihat Pengguna</span>
            </a>

            <a href="{{ route('admin.attendance.qrcode') }}"
               class="sidebar-item {{ request()->routeIs('admin.attendance.*') ? 'active' : '' }}
               flex items-center gap-3 px-4 py-3 rounded-xl">
                <i data-lucide="calendar-check" class="w-5 h-5"></i>
                <span class="text-sm font-medium">Absen</span>
            </a>

        @endif


        {{-- ================= PEMAGANG MENU ================= --}}
        @if(Auth::user()->role === 'pemagang')

            <a href="{{ route('pemagang.attendance.index') }}"
               class="sidebar-item {{ request()->routeIs('pemagang.attendance.*') ? 'active' : '' }}
               flex items-center gap-3 px-4 py-3 rounded-xl">
                <i data-lucide="clock" class="w-5 h-5"></i>
                <span class="text-sm font-medium">Riwayat Absensi</span>
            </a>

        @endif

    </nav>

    <div class="p-6">
        <div class="profile-card p-4 rounded-2xl flex items-center gap-3 border border-white/10">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                 class="w-10 h-10 rounded-full border-2 border-primary-blue">
            <div>
                <p class="text-white text-xs font-bold">{{ Auth::user()->name }}</p>
                <p class="text-blue-300/50 text-[10px] uppercase font-bold">
                    {{ ucfirst(Auth::user()->role) }}
                </p>
            </div>
        </div>
    </div>

</aside>
