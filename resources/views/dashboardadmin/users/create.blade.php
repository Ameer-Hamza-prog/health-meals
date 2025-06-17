@extends('layouts.admindashboard')

@section('contact')
<div class="container">
    <h2>إضافة مستخدم جديد</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
            />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">الدور</label>
            <select
                name="role"
                id="role"
                class="form-control @error('role') is-invalid @enderror"
                required
            >
                <option value="">اختر الدور</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم عادي</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>أدمن</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">كلمة المرور</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                required
            />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
            <input
                type="password"
                class="form-control"
                id="password_confirmation"
                name="password_confirmation"
                required
            />
        </div>

        <button type="submit" class="btn btn-primary">إضافة</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
