<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Major; 
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('dashboard.majors.index', compact('majors'));
    }

    public function show($id)
{
    $major = Major::findOrFail($id);
    return view('dashboard.majors.show', compact('major'));
}

    // صفحة إضافة مهارة جديدة
    public function create()
{
    $categories = SkillCategory::all(); 
    // حذف compact('major') لأننا في صفحة إضافة جديدة وليس تعديل
    return view('dashboard.majors.create', compact('categories')); 
}

    // صفحة تعديل مهارة موجودة
    public function edit($id)
{
    // 1. جلب التخصص المطلوب تعديله (بدلاً من Skill)
    $major = Major::findOrFail($id); 
    
    // 2. جلب التصنيفات إذا كنت تستخدمها في القائمة المنسدلة داخل الصفحة
    $categories = SkillCategory::all(); 
    
    // 3. تمرير المتغيرات الصحيحة التي تتوقعها صفحة الـ Blade
    return view('dashboard.majors.edit', compact('major', 'categories'));
}
    public function showPublic($id)
    {
        // جلب بيانات التخصص مع الجامعات المرتبطة به من الداتابيز
        $major = Major::with('universities')->findOrFail($id);

        // البحث عن كل اللغات المتوفرة لنفس اسم التخصص ودمجها بنص واحد (مثلاً: TR / EN)
        $availableLanguages = Major::where('name', $major->name)
                               ->pluck('education_language')
                               ->implode(' / ');
        
        // عرض الصفحة العامة الجديدة
        return view('major_details_public', compact('major', 'availableLanguages'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        // باقي التحققات الخاصة بك
    ]);

    $major = Major::findOrFail($id);
    $major->update($request->all());

    return redirect()->route('dashboard.majors.index')->with('success', 'تم تحديث القسم بنجاح');
}
public function store(Request $request)
{
    $request->validate([
        'name'               => 'required|string|max:255',
        'description'        => 'required|string',
        'degree_type'        => 'required|in:on_lisans,lisans', // القيم المحددة في الـ Migration
        'education_language' => 'required|string',
    ]);

    Major::create($request->all());

    return redirect()->route('dashboard.majors.index')->with('success', '-başarıyla eklendi');
}
}