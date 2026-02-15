<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/4adad7f6a7.js" crossorigin="anonymous"></script>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body class="bg-light overflow-x-hidden">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    @include('admin.layoutsadmin.partials.sidebar')

    {{-- MAIN --}}
    <main class="flex-1 flex flex-col min-w-0 h-screen">

        {{-- HEADER --}}
        @include('admin.layoutsadmin.partials.header')

        {{-- CONTENT --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-10 space-y-8">
            @yield('content')
        </div>

    </main>
</div>

{{-- ================= JS SECTION ================= --}}

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- Custom JS --}}
<script src="{{ asset('js/script.js') }}"></script>

<script>
    lucide.createIcons();
</script>

@yield('scripts')
@stack('scripts')

</body>
</html>
