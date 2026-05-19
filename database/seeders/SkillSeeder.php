<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\SkillCategory;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // تم تحديث وتوزيع المهارات لتتناسق تماماً مع تخصصات البكالوريوس والدبلوم الجديدة
        $data = [
            'Teknik Beceriler' => [
                // مهارات هندسية، طبية، وصحية تقنية
                'İleri Matematik', 'Genel Fizik', 'Statik ve Dinamik Analiz', 'Termodinamik Prensipleri', 
                'Elektriksel Devre Tasarımı', 'Malzeme Bilimi', 'Akışkanlar Mekaniği', 'Kontrol Sistemleri', 
                'Kimyasal Süreç Yönetimi', 'İnsan Anatomisi', 'Fizyoloji', 'Tıbbi Biyokimya', 
                'Farmakoloji', 'Patoloji', 'Klinik Mikrobiyoloji', 'Histoloji ve Embriyoloji', 
                'Diş Morfolojisi', 'Restoratif Diş Tedavisi', 'Epidemiyoloji', 'İmmünoloji', 
                'Genetik ve Kalıtım', 'Radyolojik Görüntüleme', 'Cerrahi Teknikler', 'Anestezi Uygulamaları',
                'İlk Yardım ve Acil Müdahale', 'Ortodonti Prensipleri', 'Biyomedikal Cihaz Teknolojisi',
                'Optisyenlik ve Cam Montajı', 'Diş Protez Teknolojisi', 'Diyaliz Ekipman Yönetimi'
            ],
            'Bilgisayar ve Yazılım' => [
                // مهارات الحاسوب، البرمجة، والذكاء الاصطناعي والأمن السيبراني
                'Algoritma Geliştirme', 'Veri Yapıları', 'Yapay Zeka Mantığı', 'Yazılım Mimarisi', 
                'Gömülü Sistemler', 'Web Tasarımı ve Front-end', 'UX/UI Tasarımı', 'Siber Güvenlik ve Ağ Savunması',
                'Veri Tabanı Yönetimi', 'Mobil Uygulama Geliştirme (iOS/Android)', 'Bulut Bilişim', 
                'Bilgisayar Ağları ve Sunucu Yönetimi', 'Adli Bilişim Analizi', 'Dijital Oyun Tasarımı'
            ],
            'İletişim Becerileri' => [
                'Sınıf Yönetimi', 'Halkla İlişkiler', 'Rehberlik ve Danışmanlık', 'Büro Yönetimi', 
                'Kabin Hizmetleri ve Yolcu İlişkileri', 'Medya Analizi', 'Gazetecilik ve Haber Yazımı', 
                'Kurumsal İletişim', 'Diksiyon ve Hitabet'
            ],
            'Tasarım ve Kreatif' => [
                'Mimari Proje Tasarımı', 'İç Mimari Restorasyon', 'Grafiksel Görselleştirme', 
                'Şehir Bölge Planlama', 'Perspektif ve Eskiz', 'Peyzaj Tasarımı', 
                'Endüstriyel Modelleme', 'Tekstil ve Moda Tasarımı', 'Sinema Kurgusu ve Montaj', 
                'Fotoğrafçılık Teknikleri', 'Tipografi', 'Müzik Teorisi', 'Sahne ve Dekor Tasarımı', 
                'Seramik ve Cam Tasarımı', '3D Modelleme ve Animasyon'
            ],
            'Yönetim ve Liderlik' => [
                'Lojistik Yönetimi', 'İnsan Kaynakları', 'Havacılık Yönetimi', 'İş Sağlığı ve Güvenliği', 
                'E-Ticaret Yönetimi', 'Turizm ve Otel İşletmeciliği', 'Havalimanı Yer Hizmetleri Yönetimi',
                'Stratejik Yönetim', 'Proje Yönetimi', 'Kriz ve Afet Yönetimi'
            ],
            'Pazarlama ve Satış' => [
                'Dış Ticaret Mevzuatı', 'Bankacılık ve Sigorta', 'Pazarlama Stratejileri', 
                'Dijital Pazarlama ve Reklamcılık', 'Finansal Muhasebe', 'Uluslararası İlişkiler', 
                'Müşteri İlişkileri Yönetimi (CRM)', 'Sağlık Turizmi Pazarlaması'
            ],
            'Sosyal Beceriler' => [
                'Eğitim Psikolojisi', 'Özel Eğitim Yöntemleri', 'Erken Çocukluk Gelişimi', 
                'Eğitim Sosyolojisi', 'Sosyal Hizmet ve Toplumsal Destek', 'Sosyal Medya Yönetimi'
            ],
            'Analitik Düşünme' => [
                'Sayısal Analiz', 'Yöneylem Araştırması', 'Olasılık ve İstatistik', 
                'Ölçme ve Değerlendirme', 'Hukuk Prensipleri', 'Büyük Veri Analitiği', 'Finansal Analiz'
            ],
            'Dil Becerileri' => [
                'Akademik İngilizce', 'Teknik Çeviri (İngilizce)', 'Arapça Çevirmenlik ve Tercüme', 
                'Alman Dili Analizi', 'Rusça Akademik Çeviri', 'Fransızca Dil Yapısı'
            ],
            'Kişisel Gelişim' => [
                'Hayat Boyu Öğrenme', 'Tıbbi Etik ve Deontoloji', 'Program Geliştirme', 
                'Öğretim Teknolojileri', 'Gastronomi ve Mutfak Teknikleri', 'Pastacılık ve Ekmekçilik'
            ]
        ];

        foreach ($data as $categoryName => $skills) {
            // Kategoriyi isme göre bul
            $category = SkillCategory::where('name', $categoryName)->first();

            if ($category) {
                foreach ($skills as $skillName) {
                    Skill::updateOrCreate([
                        'name' => $skillName,
                        'category_id' => $category->id
                    ]);
                }
            }
        }
    }
}