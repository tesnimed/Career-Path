<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory; 
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    public function index() 
    {
        $categories = SkillCategory::all();
        return view('dashboard.skill_categories.index', compact('categories'));
    }

    public function create() 
    {
        return view('dashboard.skill_categories.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    SkillCategory::create(['name' => $request->name]);

    return redirect()->back()->with('success', 'başarıyla eklendi');
}

    public function edit($id) 
    {
        $category = SkillCategory::findOrFail($id);
        return view('dashboard.skill_categories.edit', compact('category'));
    }
    public function show($id)
{
    $category = SkillCategory::findOrFail($id);
    return view('dashboard.skill_categories.show', compact('category'));
}

}