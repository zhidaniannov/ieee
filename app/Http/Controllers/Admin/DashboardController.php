<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // =====================
        // BASIC STATISTICS
        // =====================

        $totalPemagang = Participant::count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalAbsensiHariIni = Attendance::whereDate('date', Carbon::today())->count();

        // =====================
        // GREETING
        // =====================

        $hour = Carbon::now('Asia/Jakarta')->hour;

        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = 'Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = 'Selamat Sore';
        } else {
            $greeting = 'Selamat Malam';
        }

        // =====================
        // GENDER CHART
        // =====================

        $genderCounts = Participant::query()
            ->select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->pluck('total', 'jenis_kelamin');

        $genderChartData = [
            'labels' => [
                'Laki-laki',
                'Perempuan'
            ],
            'series' => [
                $genderCounts->get('L', 0),
                $genderCounts->get('P', 0),
            ],
        ];

        // =====================
        // RETURN VIEW
        // =====================

        return view('admin.dashboard.index', compact(
            'totalPemagang',
            'totalAdmin',
            'totalAbsensiHariIni',
            'greeting',
            'genderChartData'
        ));
    }
}
