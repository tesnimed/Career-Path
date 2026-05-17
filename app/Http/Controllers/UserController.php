<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض قائمة المستخدمين في جدول
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'Kullanıcı başarıyla eklendi.');
    }

    // عرض صفحة تعديل بيانات المستخدم
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم في قاعدة البيانات
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // تحديث كلمة المرور فقط إذا تم إدخالها في الحقل
        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:8']);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('dashboard.users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    // حذف مستخدم نهائياً
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}