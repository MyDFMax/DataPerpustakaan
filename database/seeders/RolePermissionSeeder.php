<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
  public function run(): void
  {
    $data = [
      '0' => [
        'role' => 'admin',
        'permissions' => [
          'view all book',
          'borrow book',
          'approval borrow book ',
          'approval published book',
          'approval pullout published book',
        ],
      ],
      '1' => [
        'role' => 'publisher',
        'permissions' => [
          'view all book',
          'create owen book',
          'edit owen book',
          'delete owen book',
          'published owen book',
          'pullout published owen book',
          'borrow book',
        ],
      ],
      '2' => [
        'role' => 'user',
        'permissions' => [
          'view all book',
          'borrow book',
        ]
      ]
    ];

    foreach ($data as $item) {
      $role = Role::create(['name' => $item['role']]);
      foreach ($item['permissions'] as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
      }
      $role->givePermissionTo($item['permissions']);
    }
  }
}
