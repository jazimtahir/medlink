<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'gender' => 'M',
            'is_active' => 1,
            'is_verified' => 1,
            'password' => Hash::make('.')
        ]);
        $user->assignRole(Role::findByName('admin'));

        $user = User::create([
            'first_name' => 'Jazim',
            'last_name' => 'Tahir',
            'username' => 'jazim',
            'email' => 'jazimtahir7@gmail.com',
            'phone' => '03024881647',
            'gender' => 'M',
            'is_active' => 1,
            'is_verified' => 1,
            'password' => Hash::make('.')
        ]);
        $user->assignRole(Role::findByName('admin'));

        $user = User::create([
            'first_name' => 'Doctor',
            'last_name' => 'User',
            'username' => 'doctor',
            'email' => 'doc@example.com',
            'phone' => '03001234567',
            'gender' => 'M',
            'is_active' => 1,
            'is_verified' => 1,
            'password' => Hash::make('.')
        ]);
        $user->assignRole(Role::findByName('doctor'));
        Doctor::create([
            'user_id' => $user->id,
            'salutation' => 'Dr',
            'professional_statement' => 'I am a Doctor practicing from 2010.',
            'fee' => 3000,
            'practicing_from' => '2010-01-01'
        ]);

        $user = User::create([
            'first_name' => 'Patient',
            'last_name' => 'Patient',
            'username' => 'patient',
            'email' => 'pat@example.com',
            'phone' => '03011234567',
            'gender' => 'F',
            'is_active' => 1,
            'is_verified' => 1,
            'password' => Hash::make('.')
        ]);
        $user->assignRole(Role::findByName('patient'));
        Patient::create([
            'user_id' => $user->id
        ]);
    }
}
