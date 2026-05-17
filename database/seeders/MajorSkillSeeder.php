<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Skill;
use App\Models\SkillCategory;

class MajorSkillSeeder extends Seeder 
{
    public function run(): void
    {
        // جلب الفئات لربط الأسماء بالـ IDs
        $categories = SkillCategory::pluck('id', 'name');

        // جلب المهارات وتجميعها حسب الفئة لتسريع البحث
        $skillsByCategory = Skill::all()->groupBy('category_id')->map(function ($group) {
            return $group->pluck('id')->toArray();
        });

        foreach (Major::all() as $major) {
            // تحويل الاسم لصغير لضمان دقة البحث (Case-insensitive)
            $majorName = mb_strtolower($major->name, 'UTF-8');
            $skillIds = [];

            // 1. التقنية والبرمجة (Engineering & IT)
            if (preg_match('/(mühendis|bilgisayar|yazılım|bilişim|teknoloji|yapay zeka|siber|programlama|veri|sistem|otomasyon|mekatronik|elektrik|elektronik)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Bilgisayar ve Yazılım']] ?? [],
                    $skillsByCategory[$categories['Teknik Beceriler']] ?? [],
                    $skillsByCategory[$categories['Analitik Düşünme']] ?? []
                );
            }
            // 2. الطب والعلوم الصحية (Health & Medical)
            elseif (preg_match('/(tıp|tıb|sağlık|hemşire|eczac|veteriner|diş|ebelik|fizyo|laboratuvar|anestezi|diyaliz|rehabilitasyon|optik|acil yardım)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Teknik Beceriler']] ?? [],
                    $skillsByCategory[$categories['Sosyal Beceriler']] ?? []
                );
            }
            // 3. الإدارة والتجارة (Business & Admin)
            elseif (preg_match('/(işletme|yönetim|iktisat|ekonomi|finans|maliye|muhasebe|pazarlama|ticaret|lojistik|banka|sigorta|emlak|gümrük|kamu)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Yönetim ve Liderlik']] ?? [],
                    $skillsByCategory[$categories['Pazarlama ve Satış']] ?? [],
                    $skillsByCategory[$categories['Analitik Düşünme']] ?? []
                );
            }
            // 4. التصميم والفنون (Design & Arts)
            elseif (preg_match('/(tasarım|mimar|sanat|grafik|moda|fotoğraf|film|kurgu|animasyon|iç mekan|çizgi|el sanatları)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Tasarım ve Kreatif']] ?? [],
                    $skillsByCategory[$categories['Bilgisayar ve Yazılım']] ?? []
                );
            }
            // 5. اللغات والترجمة (Languages)
            elseif (preg_match('/(dil|edebiyat|mütercim|tercüman|çevirmen|ingilizce|almanca|arapça|fransızca|ispanyolca|rusça|japonca|kore)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Dil Becerileri']] ?? [],
                    $skillsByCategory[$categories['İletişim Becerileri']] ?? []
                );
            }
            // 6. الإعلام والتواصل (Media & Communication)
            elseif (preg_match('/(iletişim|medya|gazeteci|halkla ilişkiler|reklam|radyo|televizyon|sinema)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['İletişim Becerileri']] ?? [],
                    $skillsByCategory[$categories['Sosyal Beceriler']] ?? [],
                    $skillsByCategory[$categories['Kişisel Gelişim']] ?? []
                );
            }
            // 7. العلوم الأساسية والتعليم (Science & Education)
            elseif (preg_match('/(öğretmen|fen|fizik|kimya|biyoloji|matematik|istatistik|astronomi|tarih|coğrafya|sosyoloji|felsefe|psikoloji)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Analitik Düşünme']] ?? [],
                    $skillsByCategory[$categories['Kişisel Gelişim']] ?? []
                );
            }
            // 8. الزراعة والبيئة والطيران (Specialized Technical)
            elseif (preg_match('/(tarım|bahçe|orman|gıda|havacılık|uçak|pilot|deniz|gemi|yat)/', $majorName)) {
                $skillIds = array_merge(
                    $skillsByCategory[$categories['Teknik Beceriler']] ?? [],
                    $skillsByCategory[$categories['Analitik Düşünme']] ?? []
                );
            }
            // 9. احتياطي (في حال لم يطابق شيء)
            else {
                $skillIds = Skill::inRandomOrder()->take(5)->pluck('id')->toArray();
            }

            // ربط المهارات بالتخصص (تجنب التكرار باستخدام syncWithoutDetaching)
            if (!empty($skillIds)) {
                $major->skills()->syncWithoutDetaching(array_filter(array_unique($skillIds)));
            }
        }
    }
}