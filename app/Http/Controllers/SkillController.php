<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory; // الموديل الصحيح حسب الكود الخاص بك
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // عرض كل المهارات
    public function index()
    {
        // نستخدم 'category' (اسم الفانكشن في الموديل) وليس اسم الموديل نفسه
        $skills = Skill::with('category')->get(); 
        return view('dashboard.skills.index', compact('skills'));
    }

    // صفحة إضافة مهارة جديدة
    public function create()
    {
        // عدلناها من Category إلى SkillCategory لتطابق الاستيراد (use) في الأعلى
        $categories = SkillCategory::all(); 
        return view('dashboard.skills.create', compact('categories'));
    }

    // صفحة تعديل مهارة موجودة
    public function edit($id)
    {
        $skill = Skill::findOrFail($id); 
        $categories = SkillCategory::all();   
        
        return view('dashboard.skills.edit', compact('skill', 'categories'));
    }

    // عرض تفاصيل مهارة واحدة
    public function show($id)
    {
        $skill = Skill::with('category', 'majors')->findOrFail($id);
        $categories = SkillCategory::all(); 
        return view('dashboard.skills.show', compact('skill', 'categories'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'category_id' => 'required|exists:skill_categories,id', // التأكد من وجود التصنيف
    ]);

    Skill::create([
        'name'        => $request->name,
        'category_id' => $request->category_id,
    ]);

    return redirect()->back()->with('success', 'başarıyla eklendi');
}
}