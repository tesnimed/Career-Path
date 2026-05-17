<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillCategory;

class SkillCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teknik Beceriler',          
            'Sosyal Beceriler',          
            'Dil Becerileri',           
            'Bilgisayar ve Yazılım',    
            'Tasarım ve Kreatif',        
            'Yönetim ve Liderlik',       
            'Pazarlama ve Satış',        
            'Analitik Düşünme',          
            'İletişim Becerileri',       
            'Kişisel Gelişim'            
        ];

        foreach ($categories as $category) {
            SkillCategory::updateOrCreate(
                ['name' => $category]
            );
        }
    }
}