<?php

namespace Database\Seeders;

use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Gera dados 'fake' para teste
     */
    public function run(): void
    {
        $serviceOrders = ServiceOrder::factory()->count(20);
        User::factory()->has($serviceOrders, 'serviceOrders')->count(10)->create();
    }
}
