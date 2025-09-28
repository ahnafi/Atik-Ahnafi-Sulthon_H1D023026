<?php

namespace Database\Seeders;

use App\Models\Children;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        // $medic = Role::create(['name' => 'medic']);
        $parent = Role::create(['name' => 'parent']);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $userAdmin->assignRole($admin);

        // $userMedic = User::create([
        //     'name' => 'Medic',
        //     'email' => 'medic@example.com',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => Carbon::now(),
        // ]);

        // $userMedic->assignRole($medic);

        $userParent = User::create([
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $userParent->assignRole($parent);

        // children

        $userParent->childrens()->createMany([
            [
                'name' => 'yupi',
                'date_of_birth' => Carbon::create(2023, 1, rand(1, 31)),
                'gender' => 'P',
            ],
            [
                'name' => 'ucup',
                'date_of_birth' => Carbon::create(2023, 9, rand(1, 31)),
                'gender' => 'L',
            ]]
        );

    }
}
