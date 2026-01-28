<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan Cache Spatie secara paksa di awal
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Matikan pengecekan Foreign Key & Kosongkan Tabel
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        Role::truncate();
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 3. Buat Permissions dan simpan ke dalam variabel
        $p1 = Permission::create(['name' => 'kelola paket']);
        $p2 = Permission::create(['name' => 'upload foto']);
        $p3 = Permission::create(['name' => 'pesan jasa']);
        $p4 = Permission::create(['name' => 'download foto']);

        // 4. Buat Role Admin dan beri izin menggunakan objeknya langsung (bukan nama string)
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->syncPermissions([$p1, $p2]);

        // 5. Buat Role Klient dan beri izin menggunakan objeknya langsung
        $roleKlient = Role::create(['name' => 'klient']);
        $roleKlient->syncPermissions([$p3, $p4]);
    }
}
