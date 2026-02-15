<header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-6 lg:px-10">

    <div>
        <h2 class="text-xl font-black text-deep-navy">
            Selamat Datang, {{ Auth::user()->name }} 👋
        </h2>
        <p class="text-gray-400 text-sm">Berikut ringkasan sistem hari ini.</p>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600">
            Logout
        </button>
    </form>

</header>
