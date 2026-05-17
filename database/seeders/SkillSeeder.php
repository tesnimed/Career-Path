<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\SkillCategory;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // Tüm 100 beceri, SkillCategorySeeder'daki 10 ana kategoriye dağıtıldı.
        $data = [
            'Teknik Beceriler' => [
                // Mühendislik ve Sağlık Bilimleri Becerileri (40 Beceri)
                'İleri Matematik', 'Genel Fizik', 'Statik ve Dinamik Analiz', 'Termodinamik Prensipleri', 
                'Elektreksel Devre Tasarımı', 'Malzeme Bilimi', 'Akışkanlar Mekaniği', 'Kontrol Sistemleri', 
                'Mikroişlemciler', 'Kimyasal Süreç Yönetimi', 'İnsan Anatomisi', 'Fizyoloji', 
                'Tıbbi Biyokimya', 'Farmakoloji', 'Patoloji', 'Klinik Mikrobiyoloji', 
                'Histoloji ve Embriyoloji', 'Diş Morfolojisi', 'Restoratif Diş Tedavisi', 'Epidemiyoloji', 
                'İmmünoloji', 'Genetik ve Kalıtım', 'Radyolojik Görüntüleme', 'Hematoloji', 
                'Cerrahi Teknikler', 'Nörolojik Bilimler', 'Ortodonti Prensipleri'
            ],
            'Bilgisayar ve Yazılım' => [
                'Algoritma Geliştirme', 'Veri Yapıları', 'Yapay Zeka Mantığı', 'Yazılım Mimarisi', 
                'Gömülü Sistemler', 'Web Tasarımı', 'UX Tasarımı', 'Bilgisayar Onarımı', 
                'Dijital Sanat Teknikleri', 'Animasyon Teknikleri'
            ],
            'İletişim Becerileri' => [
                // Eğitim ve Sosyal Bilimler Becerileri
                'Sınıf Yönetimi', 'Halkla İlişkiler', 'Rehberlik ve Psikolojik Danışmanlık', 
                'Türkçe Dil Bilgisi', 'Yabancı Dil Öğretimi', 'Medya Analizi', 
                'Büro Yönetimi', 'Kabin Hizmetleri', 'Halk Sağlığı Analizi'
            ],
            'Tasarım ve Kreatif' => [
                // Sanat ve Mimarlık Becerileri (20 Beceri)
                'Mimari Proje Tasarımı', 'İç Mimari Restorasyon', 'Grafiksel Görselleştirme', 
                'Şehir Bölge Planlama', 'Perspektif ve Eskiz', 'Sanat Tarihi Analizi', 
                'Peyzaj Tasarımı', 'Endüstriyel Modelleme', 'Tekstil ve Moda Tasarımı', 
                'Sinema Kurgusu', 'Fotoğrafçılık Teknikleri', 'Tipografi', 'Müzik Teorisi', 
                'Sahne ve Dekor Tasarımı', 'Estetik Kuramları', 'Restorasyon', 
                'Seramik ve Heykel', 'Materyal Tasarımı', 'Yaratıcı Drama'
            ],
            'Yönetim ve Liderlik' => [
                // Uygulamalı Bilimler Becerileri
                'Lojistik Yönetimi', 'İnsan Kaynakları', 'Havacılık Yönetimi', 'İş Sağlığı ve Güvenliği', 
                'E-Ticaret Yönetimi', 'Okul Yönetimi', 'Turizm İşletmeciliği', 'Gastronomi Teknikleri'
            ],
            'Pazarlama ve Satış' => [
                'Dış Ticaret Mevzuatı', 'Bankacılık ve Sigorta', 'Pazarlama Stratejileri', 
                'Gayrimenkul Değerleme', 'Finansal Muhasebe', 'Uluslararası İlişkiler'
            ],
            'Sosyal Beceriler' => [
                'Eğitim Psikolojisi', 'Özel Eğitim Yöntemleri', 'Erken Çocukluk Gelişimi', 
                'Eğitim Sosyolojisi', 'Kapsayıcı Eğitim'
            ],
            'Analitik Düşünme' => [
                'Sayısal Analiz', 'Yöneylem Araştırması', 'Olasılık ve İstatistik', 
                'Ölçme ve Değerlendirme', 'Hukuk Prensipleri'
            ],
            'Dil Becerileri' => [
                'Akademik İngilizce', 'Teknik Çeviri', 'Okuma-Yazma Öğretimi'
            ],
            'Kişisel Gelişim' => [
                'Hayat Boyu Öğrenme', 'Tıbbi Etik', 'Program Geliştirme', 
                'Öğretim Teknolojileri', 'Eğitim Tarihi'
            ]
        ];

        foreach ($data as $categoryName => $skills) {
            // Kategoriyi isme göre bul (Yeni oluşturmaz, SkillCategorySeeder'dakileri kullanır)
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