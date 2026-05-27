<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller 
{
  public function showRegister(){ return view('auth.register'); }
  public function showLogin(){ return view('auth.login'); }

  public function register(Request $r){
    $r->validate(['name'=>'required','email'=>'required|email|unique:users','password'=>'required|confirmed|min:6']);
    $user = User::create(['name'=>$r->name,'email'=>$r->email,'password'=>Hash::make($r->password)]);

    // إطلاق حدث التسجيل لإرسال إيميل التحقق تلقائياً
    //event(new Registered($user));

    Auth::login($user);
    return redirect()->route('quiz');
  }

  public function login(Request $r){
    $credentials = $r->only('email','password');
    if(Auth::attempt($credentials)){
      $r->session()->regenerate();
      return redirect()->intended(route('quiz'));
    }
    return back()->withErrors(['email'=>'Yanlış Billgiler']);
  }

  public function logout(Request $r){
    Auth::logout();
    $r->session()->invalidate();
    $r->session()->regenerateToken();
    return redirect()->route('home');
  }

  
  // الدالة الجديدة: معالجة تفعيل الإيميل بشكل مرن بدون اشتراط تسجيل الدخول مسبقاً
  public function verifyEmail(Request $request, $id){
      // 1. التحقق من أن التوقيع الرقمي للرابط صحيح وغير منتهي
      if (! $request->hasValidSignature()) {
          abort(403, 'رابط التفعيل غير صالح أو منتهي الصلاحية.');
      }
      // 2. جلب المستخدم من الـ id الممرر في الرابط مباشرة
      $user = User::findOrFail($id);
      // 3. إذا لم يكن الإيميل مفعلاً من قبل، يتم تفعيله الآن
      if (! $user->hasVerifiedEmail()) {
          $user->markEmailAsVerified();
      }
      // 4. تسجيل دخول المستخدم تلقائياً بعد التفعيل لسهولة الاستخدام
      Auth::login($user);
      // 5. توجيهه مباشرة إلى صفحة الكويز
      return redirect()->route('quiz')->with('success', 'تم تفعيل حسابك بنجاح!');
  }

}
