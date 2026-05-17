<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Varsayılan bir kullanıcı oluşturun (isteğe bağlı).
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'careerpath',
                'password' => Hash::make('123456789'),
            ]
        );

        // 2. Seeders onları doğru sırayla çalıştırın.
        $this->call([
            // Önce becerilerinizi yazın (resminizdeki gibi).
            SkillCategorySeeder::class,
            SkillSeeder::class,
            
            // Proje için temel verileri doldurun.
            UniversitySeeder::class,   //44 üniversitenin doldurulması
            MajorSeeder::class,        // Bölümler alanlarını doldurma (Lisans ve Ön Lisans)
            
            // Dış tabloların (Pivot Tablolar) planlanması
            MajorUniversitySeeder::class, 
            MajorSkillSeeder::class,
        ]);
    }
}