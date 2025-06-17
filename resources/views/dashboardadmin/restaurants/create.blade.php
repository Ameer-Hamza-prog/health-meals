@extends('layouts.admindashboard')

@section('contact')
<style>
    /* Container tweaks */
    .container.my-4 {
        max-width: 700px;
        background: #fff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
        text-align: center;
        font-size: 1.8rem;
    }

    label.form-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    input.form-control,
    textarea.form-control,
    select.form-select {
        border: 1.8px solid #ced4da;
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: none;
        outline: none;
        background-color: #fafafa;
        color: #444;
    }

    input.form-control:focus,
    textarea.form-control:focus,
    select.form-select:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 8px rgba(74, 144, 226, 0.3);
        background-color: #fff;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 60px;
    }

    .mb-3 {
        margin-bottom: 20px;
        position: relative; /* لإظهار أيقونة إظهار كلمة المرور */
    }

    hr {
        margin: 30px 0;
        border: none;
        border-top: 1.5px solid #eee;
    }

    h5 {
        font-weight: 700;
        color: #444;
        margin-bottom: 20px;
        font-size: 1.2rem;
        border-left: 5px solid #4a90e2;
        padding-left: 10px;
    }

    button.btn-primary {
        background: #4a90e2;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        box-shadow: 0 5px 12px rgba(74, 144, 226, 0.4);
        transition: background-color 0.3s ease;
        margin-right: 10px;
    }

    button.btn-primary:hover {
        background-color: #357ABD;
        box-shadow: 0 8px 16px rgba(53, 122, 189, 0.6);
    }

    a.btn-secondary {
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        color: #555;
        background: #f0f0f0;
        border: 1.5px solid #ddd;
        transition: background-color 0.3s ease, color 0.3s ease;
        text-decoration: none;
    }

    a.btn-secondary:hover {
        background-color: #ddd;
        color: #444;
    }

    .alert-danger {
        background-color: #fdecea;
        color: #b71c1c;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 2px 10px rgba(183, 28, 28, 0.2);
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
        font-size: 0.95rem;
    }

    /* أيقونة إظهار/إخفاء كلمة المرور */
    .password-toggle {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.2rem;
        color: #888;
        user-select: none;
    }

    .password-toggle:hover {
        color: #4a90e2;
    }
</style>

<div class="container my-4">
    <h2>إضافة مطعم جديد</h2>

    @if ($errors->any())
        <div class="alert alert-danger rounded">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">اسم المطعم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="owner_name" class="form-label">اسم صاحب المطعم</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ old('owner_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">العنوان</label>
            <textarea class="form-control" id="address" name="address" rows="2" required>{{ old('address') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="license" class="form-label">رفع رخصة مزاولة المهنة (PDF أو صورة)</label>
            <input type="file" class="form-control" id="license" name="license" required>
        </div>

        <div class="mb-3">
            <label for="diet_id" class="form-label">النظام الغذائي</label>
            <select class="form-select" id="diet_id" name="diet_id" required>
                <option value="">اختر النظام الغذائي</option>
                @foreach($diets as $diet)
                    <option value="{{ $diet->id }}" @selected(old('diet_id') == $diet->id)>{{ $diet->name }}</option>
                @endforeach
            </select>
        </div>

        <hr>

        <h5>بيانات الدخول (يحددها الادمن)</h5>

        <div class="mb-3">
            <label for="username" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3 position-relative">
            <label for="password" class="form-label">كلمة المرور</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <span class="password-toggle" onclick="togglePassword('password')" title="إظهار/إخفاء كلمة المرور">👁️</span>
        </div>

        <div class="mb-3 position-relative">
            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            <span class="password-toggle" onclick="togglePassword('password_confirmation')" title="إظهار/إخفاء كلمة المرور">👁️</span>
        </div>

        <button type="submit" class="btn btn-primary">إضافة</button>
        <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
@endsection
