<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function showQrCode(): View
    {
        $now = Carbon::now('Asia/Jakarta');

        // QR berlaku sampai akhir hari (23:59:59)
        $endOfDay = $now->copy()->endOfDay();

        $currentQrType = 'Check-In';

        $currentQrUrl = URL::temporarySignedRoute(
            'pemagang.attendance.record',
            $endOfDay,
            ['type' => 'check-in']
        );

        $currentQrStart = $now->copy()->startOfDay();
        $currentQrEnd = $endOfDay;

        return view(
            'admin.attendance.qrcode',
            compact(
                'currentQrType',
                'currentQrUrl',
                'currentQrStart',
                'currentQrEnd'
            )
        );
    }
}
