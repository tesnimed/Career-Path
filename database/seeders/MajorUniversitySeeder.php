<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorUniversitySeeder extends Seeder
{
    public function run(): void
    {
        // Veritabanındaki tüm üniversiteleri ve bölümleri al
        $universities = University::all();
        $majors = Major::all();

        // Eğer üniversite veya bölüm yoksa, uyarı ver ve işlemi durdur
        if ($universities->isEmpty() || $majors->isEmpty()) {
            $this->command->warn(
                'Önce UniversitySeeder ve MajorSeeder çalıştırmalısın!'
            );
            return;
        }

        $data = [];

        foreach ($universities as $university) {

            // Her üniversite için rastgele 20–50 bölüm seç
            $randomMajors = $majors->random(rand(20, 50));

            foreach ($randomMajors as $major) {

                // Bölüm türüne göre ücret belirleme
                if (str_contains(strtoupper($major->name), 'TIP') ||
                    str_contains(strtoupper($major->name), 'DİŞ')) {

                    // Tıp ve Diş bölümleri daha pahalıdır
                    $price = rand(15000, 25000);

                } elseif ($major->degree_type === 'lisans') {

                    // Lisans (Bachelor) bölümleri
                    $price = rand(3000, 8000);

                } else {

                    // Ön Lisans (Associate) bölümleri
                    $price = rand(1500, 4000);
                }

                // Pivot tablo için veri hazırla
                $data[] = [
                    'major_id' => $major->id,
                    'university_id' => $university->id,
                    'tuition_usd' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Bellek taşmasını önlemek için 500 kayıtlık parçalar halinde kaydet
            if (count($data) >= 500) {
                DB::table('major_university')->upsert(
                    $data,
                    ['major_id', 'university_id'], // Unique alanlar
                    ['tuition_usd', 'updated_at']  // Güncellenecek alanlar
                );
                $data = [];
            }
        }

        // Kalan verileri kaydet
        if (!empty($data)) {
            DB::table('major_university')->upsert(
                $data,
                ['major_id', 'university_id'],
                ['tuition_usd', 'updated_at']
            );
        }
    }
}