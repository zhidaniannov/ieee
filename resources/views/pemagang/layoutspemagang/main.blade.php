<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100 overflow-x-hidden">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <div id="sidebar"
         class="fixed md:relative z-40 w-64 bg-blue-900 text-white
                transform -translate-x-full md:translate-x-0
                transition-transform duration-300 ease-in-out">

        @include('pemagang.layoutspemagang.partials.sidebar')
    </div>

    {{-- OVERLAY (mobile only) --}}
    <div id="overlay"
         class="fixed inset-0 bg-black/40 hidden z-30 md:hidden"
         onclick="toggleSidebar()"></div>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col w-full">

        {{-- HEADER --}}
        <div class="bg-white shadow px-4 py-3 flex items-center justify-between">

            {{-- Hamburger (mobile only) --}}
            <button class="md:hidden text-gray-700"
                    onclick="toggleSidebar()">
                <i data-lucide="menu"></i>
            </button>

            <div class="font-semibold text-gray-700">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded">
                    Logout
                </button>
            </form>

        </div>

        {{-- CONTENT --}}
        <main class="p-4 md:p-8">
            @yield('content')
        </main>

    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

lucide.createIcons();
</script>

</body>
</html>
