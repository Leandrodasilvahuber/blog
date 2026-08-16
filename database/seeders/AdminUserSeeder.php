<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@leandrohuber.com.br');
        $password = env('ADMIN_PASSWORD');

        $generated = false;
        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::updateOrCreate(
            ['email' => $email],
            ['name' => 'Leandro Hüber', 'password' => Hash::make($password)]
        );

        if ($generated) {
            $this->command?->warn("Usuário admin criado: {$email} / senha: {$password}");
        } else {
            $this->command?->info("Usuário admin criado/atualizado: {$email}");
        }
    }
}
