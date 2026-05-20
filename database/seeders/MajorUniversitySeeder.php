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
        $universities = University::all();
        $majors = Major::all();

        if ($universities->isEmpty() || $majors->isEmpty()) {
            $this->command->warn('Önce UniversitySeeder ve MajorSeeder çalıştırmalısın!');
            return;
        }

        $data = [];
        $timestamp = now();

        foreach ($majors as $major) {
            $majorNameLower = mb_strtolower($major->name, 'UTF-8');
            
            $isMedical = preg_match('/(tıp|diş|hemşire|sağlık|optik|anestezi|diyaliz|eczac|laboratuvar|protez)/', $majorNameLower);
            $isTech = preg_match('/(bilgisayar|yazılım|mühendis|bilişim|teknoloji|programlama|siber)/', $majorNameLower);

            foreach ($universities as $university) {
                $uniNameLower = mb_strtolower($university->name, 'UTF-8');
                
                // --------- الفلتر الذهبي لمنع الأخطاء الأكاديمية ---------
                $isMYO = str_contains($uniNameLower, 'meslek yüksekokulu');

                // 1. إذا كان المعهد (MYO) والتخصص بكالوريوس (lisans) -> تخطى فوراً ولا تربط!
                if ($isMYO && $major->degree_type === 'lisans') {
                    continue;
                }

                // 2. إذا كانت جامعة عادية والتخصص دبلوم (ön_lisans) -> نربط فقط إذا كانت الجامعة تضم معاهد (وهو الغالب في تركيا) ولكن بنسبة مدروسة
                // ---------------------------------------------------------

                $shouldAttach = false;

                // أ) إلزام تخصصات البرمجة والصحة بالظهور في جامعة بيروني (Biruni)
                if (str_contains($uniNameLower, 'biruni')) {
                    if ($isMedical || $isTech || rand(1, 100) <= 60) {
                        $shouldAttach = true;
                    }
                }
                // ب) الجامعات الطبية المتخصصة
                elseif (preg_match('/(sağlık|bezmialem|medipol|acıbadem|bilim)/', $uniNameLower)) {
                    if ($isMedical) {
                        $shouldAttach = true;
                    } else {
                        $shouldAttach = (rand(1, 100) <= 20);
                    }
                }
                // ج) الجامعات التقنية والهندسية
                elseif (str_contains($uniNameLower, 'teknik') || str_contains($uniNameLower, 'itü') || str_contains($uniNameLower, 'yıldız')) {
                    if ($isTech) {
                        $shouldAttach = true;
                    } else {
                        $shouldAttach = (rand(1, 100) <= 25);
                    }
                }
                // د) التوزيع العام المنطقي للبقية
                else {
                    $shouldAttach = (rand(1, 100) <= 60); 
                }

                if ($shouldAttach) {
                    $price = 0;

                    if ($university->type === 'devlet') {
                        if ($isMedical) {
                            $price = rand(4000, 9000);
                        } elseif ($major->degree_type === 'lisans') {
                            $price = rand(800, 2500);
                        } else {
                            $price = rand(400, 1200);
                        }
                    } else {
                        if ($isMedical) {
                            $price = rand(14000, 24000);
                        } elseif ($major->degree_type === 'lisans') {
                            $price = rand(3000, 8500);
                        } else {
                            $price = rand(1500, 3500);
                        }
                    }

                    $data[] = [
                        'major_id'      => $major->id,
                        'university_id' => $university->id,
                        'tuition_usd'   => $price,
                        'created_at'    => $timestamp,
                        'updated_at'    => $timestamp,
                    ];
                }

                if (count($data) >= 1000) {
                    DB::table('major_university')->upsert(
                        $data,
                        ['major_id', 'university_id'],
                        ['tuition_usd', 'updated_at']
                    );
                    $data = [];
                }
            }
        }

        if (!empty($data)) {
            DB::table('major_university')->upsert(
                $data,
                ['major_id', 'university_id'],
                ['tuition_usd', 'updated_at']
            );
        }
    }
}