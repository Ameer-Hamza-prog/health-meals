<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // عرض قائمة المستخدمين مع خاصية البحث
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('dashboardadmin.users.index', compact('users', 'search'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('dashboardadmin.users.create');
    }

    // حفظ مستخدم جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:admin,user'],
        ], [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصًا.',
            'name.max' => 'حقل الاسم لا يجب أن يتجاوز 255 حرفًا.',

            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
            'email.max' => 'حقل البريد الإلكتروني لا يجب أن يتجاوز 255 حرفًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',

            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف.',

            'role.required' => 'حقل نوع المستخدم مطلوب.',
            'role.in' => 'نوع المستخدم غير صالح.',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    // عرض نموذج تعديل مستخدم
    public function edit(User $user)
    {
        return view('dashboardadmin.users.edit', compact('user'));
    }

    // تحديث بيانات مستخدم
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', "unique:users,email,{$user->id}"],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:admin,user'],
        ], [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصًا.',
            'name.max' => 'حقل الاسم لا يجب أن يتجاوز 255 حرفًا.',

            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
            'email.max' => 'حقل البريد الإلكتروني لا يجب أن يتجاوز 255 حرفًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',

            'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف.',

            'role.required' => 'حقل نوع المستخدم مطلوب.',
            'role.in' => 'نوع المستخدم غير صالح.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم');
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم');
    }
}
