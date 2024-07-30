<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    $data = [
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'password' => Hash::make('admin1234'),
    ];
    $user = User::create($data);
    $user->assignRole('admin');
  }
}
