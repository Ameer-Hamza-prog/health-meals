<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request): RedirectResponse
{
    $messages = [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصًا.',
        'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفًا.',

        'email.required' => 'حقل البريد الإلكتروني مطلوب.',
        'email.string' => 'يجب أن يكون البريد الإلكتروني نصًا.',
        'email.email' => 'يجب إدخال بريد إلكتروني صحيح.',
        'email.max' => 'البريد الإلكتروني لا يجب أن يتجاوز 255 حرفًا.',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',

        'password.required' => 'حقل كلمة المرور مطلوب.',
        'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
        'password.min' => 'كلمة المرور يجب أن تكون على الأقل :min حروف.',

        'role.required' => 'حقل نوع المستخدم مطلوب.',
        'role.in' => 'نوع المستخدم غير صالح.',
    ];

    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', 'min:8'], // يمكنك تعديل قواعد كلمة المرور حسب الحاجة
        'role' => ['required', 'string', 'in:admin,user'],
    ], $messages);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('dashboard', absolute: false));
}


}
