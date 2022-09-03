<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialization::create([
            'name' => 'Allergist'
        ]);
        Specialization::create([
            'name' => 'Dermatologist'
        ]);
        Specialization::create([
            'name' => 'Ophthalmologist'
        ]);
        Specialization::create([
            'name' => 'Gynecologist'
        ]);
        Specialization::create([
            'name' => 'Cardiologist'
        ]);
        Specialization::create([
            'name' => 'Endocrinologist'
        ]);
        Specialization::create([
            'name' => 'Gastroenterologist'
        ]);
        Specialization::create([
            'name' => 'Nephrologist'
        ]);
        Specialization::create([
            'name' => 'Urologist'
        ]);
        Specialization::create([
            'name' => 'Pulmonologist'
        ]);
        Specialization::create([
            'name' => 'Otolaryngologist'
        ]);
        Specialization::create([
            'name' => 'Neurologist'
        ]);
        Specialization::create([
            'name' => 'Psychiatrist'
        ]);
        Specialization::create([
            'name' => 'Oncologist'
        ]);
        Specialization::create([
            'name' => 'Radiologist'
        ]);
        Specialization::create([
            'name' => 'Rheumatologist'
        ]);
        Specialization::create([
            'name' => 'Anesthesiologist'
        ]);
    }
}
