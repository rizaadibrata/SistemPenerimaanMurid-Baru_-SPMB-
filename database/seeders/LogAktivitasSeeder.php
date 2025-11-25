<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogAktivitas;
use App\Models\Pengguna;

class LogAktivitasSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Pengguna::where('role', 'admin')->first();
        $verifikator = Pengguna::where('role', 'verifikator_adm')->first();
        $keuangan = Pengguna::where('role', 'keuangan')->first();
        $kepsek = Pengguna::where('role', 'kepsek')->first();
        $pendaftar = Pengguna::where('role', 'pendaftar')->first();

        $logs = [
            // Admin login
            [
                'user_id' => $admin->id ?? 1,
                'aksi' => 'LOGIN',
                'objek' => 'ADMIN_LOGIN',
                'objek_data' => json_encode(['role' => 'admin', 'email' => $admin->email ?? 'admin@smkbn.sch.id']),
                'waktu' => now()->subHours(2),
                'ip' => '127.0.0.1'
            ],
            // Verifikator login
            [
                'user_id' => $verifikator->id ?? 2,
                'aksi' => 'LOGIN',
                'objek' => 'ADMIN_LOGIN',
                'objek_data' => json_encode(['role' => 'verifikator_adm', 'email' => $verifikator->email ?? 'verifikator@smkbn.sch.id']),
                'waktu' => now()->subHours(1),
                'ip' => '127.0.0.1'
            ],
            // Keuangan login
            [
                'user_id' => $keuangan->id ?? 3,
                'aksi' => 'LOGIN',
                'objek' => 'ADMIN_LOGIN',
                'objek_data' => json_encode(['role' => 'keuangan', 'email' => $keuangan->email ?? 'keuangan@smkbn.sch.id']),
                'waktu' => now()->subMinutes(30),
                'ip' => '127.0.0.1'
            ],
            // Kepsek login
            [
                'user_id' => $kepsek->id ?? 4,
                'aksi' => 'LOGIN',
                'objek' => 'ADMIN_LOGIN',
                'objek_data' => json_encode(['role' => 'kepsek', 'email' => $kepsek->email ?? 'kepsek@smkbn.sch.id']),
                'waktu' => now()->subMinutes(15),
                'ip' => '127.0.0.1'
            ],
            // User login
            [
                'user_id' => $pendaftar->id ?? 5,
                'aksi' => 'LOGIN',
                'objek' => 'USER_LOGIN',
                'objek_data' => json_encode(['email' => $pendaftar->email ?? 'user@example.com']),
                'waktu' => now()->subMinutes(10),
                'ip' => '127.0.0.1'
            ]
        ];

        foreach ($logs as $log) {
            LogAktivitas::create($log);
        }
    }
}