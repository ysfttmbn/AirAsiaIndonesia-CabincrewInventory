<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-request']);
        Permission::create(['name'=>'edit-request']);
        Permission::create(['name'=>'konfirmasi-diterima']);
        Permission::create(['name'=>'edit-profile']);

        Permission::create(['name'=>'tambah-inventory']);
        Permission::create(['name'=>'edit-inventory']);
        Permission::create(['name'=>'hapus-inventory']);
        Permission::create(['name'=>'konfirmasi-request']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'cabincrew']);
        Role::create(['name'=>'management']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-inventory');
        $roleAdmin->givePermissionTo('edit-inventory');
        $roleAdmin->givePermissionTo('hapus-inventory');
        $roleAdmin->givePermissionTo('konfirmasi-request');

        $roleCabincrew = Role::findByName('cabincrew');
        $roleCabincrew->givePermissionTo('tambah-request');
        $roleCabincrew->givePermissionTo('edit-request');
        $roleCabincrew->givePermissionTo('konfirmasi-diterima');
        $roleCabincrew->givePermissionTo('edit-profile');
    }
}
