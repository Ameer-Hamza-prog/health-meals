@extends('layouts.admindashboard')

@section('contact')
<div class="container my-5" style="max-width: 700px;">
    <h2 class="mb-4 text-primary fw-bold text-center">تعديل بيانات المطعم</h2>

    @if ($errors->any())
        <div class="alert alert-danger rounded shadow-sm">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">اسم المطعم</label>
            <input type="text" class="form-control form-control-lg rounded-3" id="name" name="name" value="{{ old('name', $restaurant->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="owner_name" class="form-label fw-semibold">اسم صاحب المطعم</label>
            <input type="text" class="form-control form-control-lg rounded-3" id="owner_name" name="owner_name" value="{{ old('owner_name', $restaurant->owner_name) }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">البريد الإلكتروني</label>
            <input type="email" class="form-control form-control-lg rounded-3" id="email" name="email" value="{{ old('email', $restaurant->email) }}" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="form-label fw-semibold">رقم الهاتف</label>
            <input type="text" class="form-control form-control-lg rounded-3" id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}" required>
        </div>

        <div class="mb-4">
            <label for="address" class="form-label fw-semibold">العنوان</label>
            <textarea class="form-control form-control-lg rounded-3" id="address" name="address" rows="3" required>{{ old('address', $restaurant->address) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="license" class="form-label fw-semibold">رفع رخصة مزاولة المهنة (اختياري)</label>
            <input type="file" class="form-control form-control-lg rounded-3" id="license" name="license" >
            @if($restaurant->license_path)
                <small class="text-muted d-block mt-1">الرخصة الحالية:
                    <a href="{{ asset('storage/' . $restaurant->license_path) }}" target="_blank" class="text-decoration-none">عرض الرخصة</a>
                </small>
            @endif
        </div>

        <div class="mb-4">
            <label for="diet_id" class="form-label fw-semibold">النظام الغذائي</label>
            <select class="form-select form-select-lg rounded-3" id="diet_id" name="diet_id" required>
                <option value="" disabled {{ old('diet_id', $restaurant->diet_id) ? '' : 'selected' }}>اختر النظام الغذائي</option>
                @foreach($diets as $diet)
                    <option value="{{ $diet->id }}" @selected(old('diet_id', $restaurant->diet_id) == $diet->id)>{{ $diet->name }}</option>
                @endforeach
            </select>
        </div>

        <hr class="my-4">

        <h5 class="mb-3 fw-bold text-secondary">تحديث بيانات الدخول</h5>

        <div class="mb-4">
            <label for="username" class="form-label fw-semibold">اسم المستخدم</label>
            <input type="text" class="form-control form-control-lg rounded-3" id="username" name="username" value="{{ old('username', $restaurant->username) }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">كلمة المرور (اتركها فارغة إذا لا تريد التغيير)</label>
            <input type="password" class="form-control form-control-lg rounded-3" id="password" name="password" autocomplete="new-password">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">تأكيد كلمة المرور</label>
            <input type="password" class="form-control form-control-lg rounded-3" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
        </div>

        <div class="mb-4">
            <label for="status" class="form-label fw-semibold">حالة التفعيل</label>
            <select name="status" id="status" class="form-select form-select-lg rounded-3" required>
                <option value="pending" @selected(old('status', $restaurant->status) == 'pending')>قيد الانتظار</option>
                <option value="approved" @selected(old('status', $restaurant->status) == 'approved')>مفعل</option>
                <option value="rejected" @selected(old('status', $restaurant->status) == 'rejected')>مرفوض</option>
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">تحديث</button>
            <a href="{{ route('restaurants.index') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">إلغاء</a>
        </div>
    </form>
</div>
@endsection
