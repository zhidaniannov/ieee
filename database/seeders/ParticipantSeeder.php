<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Facades\Hash;

class ParticipantSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $user = User::create([
                'name' => 'Pemagang '.$i,
                'email' => 'pemagang'.$i.'@mail.com',
                'password' => Hash::make('password'),
                'role' => 'pemagang',
            ]);

            Participant::create([
                'user_id' => $user->id,
                'nama' => 'Pemagang '.$i,
                'nisnim' => '20260'.$i,
                'jenis_kelamin' => $i % 2 == 0 ? 'L' : 'P',
                'jurusan' => 'Teknik Informatika',
                'kontak_peserta' => '08123456789',
                'tahun_aktif' => 2026,
            ]);
        }
    }
}
