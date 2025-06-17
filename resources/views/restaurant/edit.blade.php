@extends('layouts.restaurant')

@section('contact')
<style>
    /* تنسيق عام للصفحة */
    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center;
    }

    /* صندوق الرسائل */
    .alert-success {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 15px 20px;
        border-radius: 5px;
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
    }

    .alert-errors {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 15px 20px;
        border-radius: 5px;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .alert-errors ul {
        margin: 0;
        padding-left: 20px;
    }

    form {
        max-width: 600px;
        margin: 0 auto 40px auto;
        background-color: #fff;
        padding: 30px 40px;
        box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
        border-radius: 10px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #34495e;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea,
    select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #2980b9;
        box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }

    button[type="submit"] {
        background-color: #2980b9;
        color: white;
        font-weight: 700;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #1c5980;
    }

    a.back-link {
        display: block;
        text-align: center;
        margin-top: 25px;
        font-size: 16px;
        text-decoration: none;
        color: #2980b9;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    a.back-link:hover {
        color: #1c5980;
        text-decoration: underline;
    }
</style>

<h1>تعديل بيانات المطعم</h1>

@if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert-errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('restaurant.profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')

    <label for="name">اسم المطعم:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $restaurant->name) }}" required>

    <label for="owner_name">اسم صاحب المطعم:</label>
    <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name', $restaurant->owner_name) }}" required>

    <label for="email">البريد الإلكتروني:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $restaurant->email) }}" required>

    <label for="phone">رقم الهاتف:</label>
    <input type="text" id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}" required>

    <label for="address">العنوان:</label>
    <textarea id="address" name="address" required>{{ old('address', $restaurant->address) }}</textarea>

    <label for="diet_id">النظام الغذائي:</label>
    <select id="diet_id" name="diet_id" required>
        @foreach (\App\Models\Diet::all() as $diet)
            <option value="{{ $diet->id }}" {{ old('diet_id', $restaurant->diet_id) == $diet->id ? 'selected' : '' }}>
                {{ $diet->name }}
            </option>
        @endforeach
    </select>

    <label for="username">اسم المستخدم:</label>
    <input type="text" id="username" name="username" value="{{ old('username', $restaurant->username) }}" required>

    <label for="password">كلمة المرور الجديدة (اتركها فارغة إذا لا تريد التغيير):</label>
    <input type="password" id="password" name="password">

    <label for="password_confirmation">تأكيد كلمة المرور:</label>
    <input type="password" id="password_confirmation" name="password_confirmation">

    <label for="license_file">رخصة مزاولة المهنة (ملف):</label>
    <input type="file" id="license_file" name="license_file" accept=".pdf,.jpg,.jpeg,.png">

    <button type="submit">تحديث البيانات</button>
</form>

<a href="{{ route('restaurant.dashboard') }}" class="back-link">العودة إلى لوحة التحكم</a>
@endsection
