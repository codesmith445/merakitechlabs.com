<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Cristian Quiñones',
            'email' => 'cristian.quinones@merakitechlabs.com',
            'password' => Hash::make('#Krad44ken.admin.1997')
        ]);
    }
}