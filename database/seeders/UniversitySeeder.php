<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        // İstanbul'daki Vakıf Üniversiteleri (Mevcut listeniz aynen korundu)
        $vakifUniversities = [
            ['name' => 'Bahçeşehir Üniversitesi', 'district' => 'Beşiktaş', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Küresel eğitim ağı ve Beşiktaş sahilindeki kampüsüyle bilinen, yenilikçi bir üniversitedir.'],
            ['name' => 'Yeditepe Üniversitesi', 'district' => 'Ataşehir', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Atatürkçü düşüncelerin ışığında, geniş kampüs olanaklarıyla eğitim veren köklü bir vakıf üniversitesidir.'],
            ['name' => 'Beykent Üniversitesi', 'district' => 'Sarıyer', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Eğitimde mükemmeliyeti hedefleyen, modern teknolojiyle donatılmış kampüslere sahip bir kurumdur.'],
            ['name' => 'İstanbul Bilgi Üniversitesi', 'district' => 'Eyüpsultan', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => '"Okul için değil, yaşam için öğrenmeli" ilkesiyle sosyal bilimler ve sanatta öncüdür.'],
            ['name' => 'İstanbul Aydın Üniversitesi', 'district' => 'Küçükçekmece', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Türkiye’nin en çok tercih edilen vakıf üniversitelerinden biri olup, uygulamalı eğitime odaklanır.'],
            ['name' => 'Koç Üniversitesi', 'district' => 'Sarıyer', 'side' => 'Avrupa', 'langs' => ['EN'], 'desc' => 'Uluslararası standartlarda eğitim veren, araştırma odaklı dünyanın saygın üniversitelerinden biridir.'],
            ['name' => 'İstanbul Gelişim Üniversitesi', 'district' => 'Avcılar', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Uluslararası akreditasyonlara sahip programlarıyla küresel başarıyı hedefleyen bir üniversitedir.'],
            ['name' => 'İstanbul Okan Üniversitesi', 'district' => 'Tuzla', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'İş dünyasına en yakın üniversite sloganıyla, sanayi iş birlikleriyle tanınan bir eğitim kurumudur.'],
            ['name' => 'Üsküdar Üniversitesi', 'district' => 'Üsküdar', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Davranış bilimleri ve sağlık alanında uzmanlaşmış, Türkiye’nin ilk tematik üniversitesidir.'],
            ['name' => 'İstanbul Kültür Üniversitesi', 'district' => 'Bakırköy', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Akademik başarıyı ve kültürel birikimi önemseyen, köklü bir eğitim vakfı üniversitesidir.'],
            ['name' => 'Sabancı Üniversitesi', 'district' => 'Tuzla', 'side' => 'Anadolu', 'langs' => ['EN'], 'desc' => 'Disiplinlerarası eğitim sistemi ve güçlü araştırma altyapısı ile global bir başarı merkezidir.'],
            ['name' => 'Özyeğin Üniversitesi', 'district' => 'Çekmeköy', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Girişimci ve araştırma odaklı eğitim modeliyle fark yaratan, modern kampüslü bir üniversitedir.'],
            ['name' => 'Maltepe Üniversitesi', 'district' => 'Maltepe', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => '"Düşüncelerde özgür, eğitimde çağdaş" felsefesiyle geniş akademik yelpazeye sahiptir.'],
            ['name' => 'İstanbul Sabahattin Zaim Üniversitesi', 'district' => 'Küçükçekmece', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Tarihi kampüsü ve değerler odaklı eğitim anlayışıyla dikkat çeken bir yükseköğretim kurumudur.'],
            ['name' => 'Kadir Has Üniversitesi', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Haliç kıyısındaki tarihi binasında, yenilikçi ve proje odaklı eğitim sunan bir üniversitedir.'],
            ['name' => 'Haliç Üniversitesi', 'district' => 'Beyoğlu', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Sanat, spor and sağlık alanlarındaki başarılarıyla bilinen, İstanbul’un merkezinde bir kurumdur.'],
            ['name' => 'Doğuş Üniversitesi', 'district' => 'Ümraniye', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Kaliteli eğitim kadrosuyla iş dünyasına donanımlı mezunlar yetiştiren bir vakıf üniversitesidir.'],
            ['name' => 'Altınbaş Üniversitesi', 'district' => 'Bağcılar', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Özellikle tıp ve mühendislik alanlarında uluslararası odaklı eğitim veren dinamik bir kurumdur.'],
            ['name' => 'Fatih Sultan Mehmet Vakıf Üniversitesi', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Geleneksel sanatlar ve sosyal bilimlerde derinleşmiş bir vakıf kültür mirası kurumudur.'],
            ['name' => 'Acıbadem Mehmet Ali Aydınlar Üniversitesi', 'district' => 'Ataşehir', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Sağlık bilimleri alanında Türkiye’nin en gelişmiş simülasyon merkezlerine sahip uzman üniversitesidir.'],
            ['name' => 'Piri Reis Üniversitesi', 'district' => 'Tuzla', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Denizcilik alanında uzmanlaşmış, uluslararası standartlarda denizci yetiştiren bir üniversitedir.'],
            ['name' => 'İstanbul Galata Üniversitesi', 'district' => 'Beyoğlu', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sanat ve tasarımı teknolojiyle buluşturan, İstanbul’un tarihi merkezinde butik bir üniversitedir.'],
            ['name' => 'MEF Üniversitesi', 'district' => 'Sarıyer', 'side' => 'Avrupa', 'langs' => ['EN'], 'desc' => '"Flipped Learning" eğitim modelini dünyada ilk kez tüm bölümlerinde uygulayan yenilikçi üniversitedir.'],
            ['name' => 'Bezmialem Vakıf Üniversitesi', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sağlık alanında köklü bir geçmişe sahip, tıp ve eczacılıkta uzman bir araştırma kurumudur.'],
            ['name' => 'İstanbul Ayvansaray Üniversitesi', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Tasarım ve uygulama odaklı eğitimiyle sanat ve teknoloji bölümlerine odaklanmıştır.'],
            ['name' => 'İstanbul Kent Üniversitesi', 'district' => 'Beyoğlu', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Engelsiz eğitim anlayışıyla modern ve yenilikçi bir şehir üniversitesidir.'],
            ['name' => 'Beykoz Üniversitesi', 'district' => 'Beykoz', 'side' => 'Anadolu', 'langs' => ['TR'], 'desc' => 'Lojistik ve havacılık başta olmak üzere mesleki yetkinliğe önem veren bir eğitim kurumudur.'],
            ['name' => 'İstanbul 29 Mayıs Üniversitesi', 'district' => 'Ümraniye', 'side' => 'Anadolu', 'langs' => ['TR'], 'desc' => 'Sosyal bilimler ve ilahiyat alanında derinlemesine araştırma odaklı bir vakıf üniversitesidir.'],
            ['name' => 'Fenerbahçe Üniversitesi', 'district' => 'Ataşehir', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Spor bilimleri ve sağlıkta fark yaratan, dijital dönüşümü eğitimine entegre etmiş bir kurumdur.'],
            ['name' => 'Biruni Üniversitesi', 'district' => 'Zeytinburnu', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Adını bilim insanı El-Biruni’den alan, tamamen sağlık bilimlerine odaklı bir ihtisas üniversitesidir.'],
            ['name' => 'İstanbul Gedik Üniversitesi', 'district' => 'Pendik', 'side' => 'Anadolu', 'langs' => ['TR'], 'desc' => 'Sanayi tecrübesini eğitime aktaran, mühendislik ve mimarlıkta güçlü bir vakıf kurumudur.'],
            ['name' => 'Işık Üniversitesi', 'district' => 'Şile', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Feyziye Mektepleri Vakfı güvencesiyle, köklü bir eğitim geleneğine sahip modern üniversitedir.'],
            ['name' => 'İstanbul Arel Üniversitesi', 'district' => 'Büyükçekmece', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Geniş burs imkanları ve sektörel iş birlikleriyle öğrenci odaklı eğitim veren bir kurumdur.'],
            ['name' => 'İstanbul Esenyurt Üniversitesi', 'district' => 'Esenyurt', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Bölgesel kalkınmaya destek veren, sosyal ve teknik bilimlerde gelişim odaklı bir üniversitedir.'],
            ['name' => 'İstanbul Sağlık ve Teknoloji Üniversitesi', 'district' => 'Zeytinburnu', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sağlık ve mühendisliği harmanlayan, yeni nesil bir teknoloji ve araştırma üniversitesidir.'],
            ['name' => 'İstanbul Rumeli Üniversitesi', 'district' => 'Silivri', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Uygulamalı eğitim modeliyle bölgenin sosyal ve ekonomik gelişimine katkı sağlayan bir kurumdur.'],
            ['name' => 'Nişantaşı Üniversitesi', 'district' => 'Sarıyer', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'NeoTech Campus ile teknolojik eğitimi iş dünyasının merkezine taşıyan dinamik bir üniversitedir.'],
            ['name' => 'İstanbul Yeni Yüzyıl Üniversitesi', 'district' => 'Zeytinburnu', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sağlık başta olmak üzere birçok alanda geniş akademik birime sahip bir şehir üniversitesidir.'],
            ['name' => 'İstanbul Medipol Üniversitesi', 'district' => 'Beykoz', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Güçlü sağlık altyapısı ve bilişim teknolojileri araştırmalarıyla öne çıkan bir kurumdur.'],
            ['name' => 'İstanbul Ticaret Üniversitesi', 'district' => 'Beyoğlu', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'İstanbul Ticaret Odası desteğiyle, ticaret ve ekonomi eğitiminde uzman bir üniversitedir.'],
            ['name' => 'İstanbul Atlas Üniversitesi', 'district' => 'Kağıthane', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Yüksek teknoloji laboratuvarları ve modern tıp fakültesi ile sağlık odaklı bir kurumdur.'],
            ['name' => 'İstinye Üniversitesi', 'district' => 'Zeytinburnu', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'MLP Care grubunun tecrübesiyle kurulan, sağlıkta mükemmeliyeti hedefleyen bir araştırma üniversitesidir.'],
            ['name' => 'İbn-i Haldun Üniversitesi', 'district' => 'Başakşehir', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Sosyal bilimlerde dünya çapında bir araştırma merkezi olma vizyonuna sahip butik bir üniversitedir.'],
            ['name' => 'Demiroğlu Bilim Üniversitesi', 'district' => 'Şişli', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Türkiye’nin ilk sağlık tematik üniversitesi olarak tıp eğitiminde uzmanlaşmıştır.'],
        ];

        // YENİ: İstanbul'daki Tüm Devlet Üniversiteleri
        $devletUniversities = [
            ['name' => 'İstanbul Üniversitesi', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Türkiye’nin en eski, köklü ve tarihi yarımadanın merkezinde yer alan lider devlet üniversitesidir.'],
            ['name' => 'İstanbul Teknik Üniversitesi', 'district' => 'Sarıyer', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Mühendislik ve mimarlık alanında dünya çapında tanınan, Türkiye’nin en köklü teknik üniversitesidir.'],
            ['name' => 'Boğaziçi Üniversitesi', 'district' => 'Beşiktaş', 'side' => 'Avrupa', 'langs' => ['EN'], 'desc' => 'Seçkin akademik kadrosu ve araştırma odaklı eğitim kalitesiyle bilinen prestijli bir devlet üniversitesidir.'],
            ['name' => 'Yıldız Teknik Üniversitesi', 'district' => 'Esenler', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Fen bilimleri, mühendislik ve sosyal bilimlerde uygulamalı ve yenilikçi eğitim veren köklü bir kurumdur.'],
            ['name' => 'Marmara Üniversitesi', 'district' => 'Kadıköy', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Çok dilli eğitim modeliyle öne çıkan, Türkiye’nin en büyük ve en köklü üniversitelerinden biridir.'],
            ['name' => 'Mimar Sinan Güzel Sanatlar Üniversitesi', 'district' => 'Beyoğlu', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sanat, mimarlık ve kültür alanlarında Türkiye’nin ilk ve en öncü devlet yükseköğretim kurumudur.'],
            ['name' => 'İstanbul Medeniyet Üniversitesi', 'district' => 'Kadıköy', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Uluslararası vizyona sahip, araştırma odaklı ve hızla gelişen yeni nesil bir devlet üniversitesidir.'],
            ['name' => 'Türk-Alman Üniversitesi', 'district' => 'Beykoz', 'side' => 'Anadolu', 'langs' => ['EN', 'TR'], 'desc' => 'Türkiye ile Almanya iş birliğinde kurulan, çok dilli ve çok kültürlü devlet araştırma üniversitesidir.'],
            ['name' => 'Galatasaray Üniversitesi', 'district' => 'Beşiktaş', 'side' => 'Avrupa', 'langs' => ['EN', 'TR'], 'desc' => 'Fransızca ve Türkçe eğitim veren, uluslararası anlaşmalarıyla seçkinleşmiş butik bir devlet üniversitesidir.'],
            ['name' => 'Sağlık Bilimleri Üniversitesi', 'district' => 'Üsküdar', 'side' => 'Anadolu', 'langs' => ['TR', 'EN'], 'desc' => 'Mekteb-i Tıbbiye-i Şahane’nin mirası üzerine kurulan, sağlık alanında uzmanlaşmış tematik devlet üniversitesidir.'],
            ['name' => 'İstanbul Üniversitesi-Cerrahpaşa', 'district' => 'Avcılar', 'side' => 'Avrupa', 'langs' => ['TR', 'EN'], 'desc' => 'Tıp, mühendislik ve veterinerlik gibi alanlarda köklü bir geçmişe ve yüksek araştırma kapasitesine sahip kurumdur.'],
            ['name' => 'Milli Savunma Üniversitesi', 'district' => 'Beşiktaş', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Askeri eğitim ve savunma sanayi alanında nitelikli subay ve profesyoneller yetiştiren devlet kurumudur.'],
            ['name' => 'Türk-Japon Bilim ve Teknoloji Üniversitesi', 'district' => 'Pendik', 'side' => 'Anadolu', 'langs' => ['EN'], 'desc' => 'Türkiye ve Japonya ortaklığıyla bilim ve ileri teknoloji araştırmaları için kurulmuş özel statülü devlet üniversitesidir.'],
        ];

        // Vakıf Meslek Yüksekokulları
        $vakifVocationalSchools = [
            ['name' => 'İstanbul Sağlık ve Sosyal Bilimler Meslek Yüksekokulu', 'district' => 'Fatih', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Sağlık ve sosyal hizmetler alanında yetkin teknik eleman yetiştiren uzmanlaşmış bir meslek yüksekokuludur.'],
            ['name' => 'Ataşehir Adıgüzel Meslek Yüksekokulu', 'district' => 'Ataşehir', 'side' => 'Anadolu', 'langs' => ['TR'], 'desc' => 'İş dünyasının ihtiyaç duyduğu nitelikli mesleki eğitimi sunan, modern bir teknik eğitim kurumudur.'],
            ['name' => 'İstanbul Şişli Meslek Yüksekokulu', 'district' => 'Şişli', 'side' => 'Avrupa', 'langs' => ['TR'], 'desc' => 'Şehrin merkezinde, farklı sektörlere yönelik uygulamalı mesleki eğitim veren köklü bir yüksekokuldur.'],
        ];

        // Vakıf Üniversitelerini İşleme
        foreach ($vakifUniversities as $uni) {
            University::updateOrCreate(
                ['name' => $uni['name']],
                [
                    'description' => $uni['desc'],
                    'type' => 'vakif',
                    'district' => $uni['district'],
                    'side' => $uni['side'],
                    'education_languages' => $uni['langs'],
                ]
            );
        }

        // Devlet Üniversitelerini İşleme (Yeni Eklenen Döngü)
        foreach ($devletUniversities as $uni) {
            University::updateOrCreate(
                ['name' => $uni['name']],
                [
                    'description' => $uni['desc'],
                    'type' => 'devlet',
                    'district' => $uni['district'],
                    'side' => $uni['side'],
                    'education_languages' => $uni['langs'],
                ]
            );
        }

        // Vakıf Meslek Yüksekokullarını İşleme
        foreach ($vakifVocationalSchools as $school) {
            University::updateOrCreate(
                ['name' => $school['name']],
                [
                    'description' => $school['desc'],
                    'type' => 'vakif',
                    'district' => $school['district'],
                    'side' => $school['side'],
                    'education_languages' => $school['langs'],
                ]
            );
        }
    }
}