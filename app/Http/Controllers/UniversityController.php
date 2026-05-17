<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('dashboard.universities.index', compact('universities'));
    }

    public function create()
{
    $categories = SkillCategory::all();
    return view('dashboard.universities.create', compact('categories'));
}

    // صفحة تعديل مهارة موجودة
    public function edit($id)
{
    // 2. جلب بيانات الجامعة باستخدام المعرف (id)
    $university = University::findOrFail($id);
    
    // 3. جلب الفئات إذا كنت تحتاجها في قائمة منسدلة مثلاً
    $categories = SkillCategory::all();

    // 4. تمرير متغير university للواجهة
    return view('dashboard.universities.edit', compact('university', 'categories'));
}
    public function show($id)
    {
        // البحث عن الجامعة، إذا لم يجدها سيظهر صفحة 404 تلقائياً
        $university = University::findOrFail($id);
        
        // عرض صفحة التفاصيل
        return view('dashboard.universities.show', compact('university'));
    }
    
    // تأكد من وجود دالة manageMajors إذا كنت تستخدمها في الروابط
    public function manageMajors($id) {
        // كود الربط بين التخصصات والجامعات
    }
    public function showPublic($id) {
    $university = University::findOrFail($id);
    return view('university_details', compact('university')); 
}
public function store(Request $request)
{
    $request->validate([
        'name_tr'            => 'required|string|max:255',
        'description_tr'     => 'required|string',
        'district'           => 'required|string',
        'side'               => 'required|string', // (Avrupa / Anadolu)
        'education_languages'=> 'required|array', 
    ]);

    University::create([
        'name_tr'            => $request->name_tr,
        'description_tr'     => $request->description_tr,
        'district'           => $request->district,
        'side'               => $request->side,
        'education_languages'=> $request->education_languages,
    ]);

    return redirect()->route('dashboard.universities.index')->with('success', 'başarıyla eklendi');
}
}