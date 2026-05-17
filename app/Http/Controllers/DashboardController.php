<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Major;
use App\Models\University;
use App\Models\SkillCategory;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'skillsCount' => Skill::count(),
            'majorsCount' => Major::count(),
            'universitiesCount' => University::count(),
            'categoriesCount' => SkillCategory::count(),
            'usersCount' => User::count(),
        ]);
    }
}