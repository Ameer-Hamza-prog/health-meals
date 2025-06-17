@extends('layouts.admindashboard')

@section('contact')
<div class="container py-4" style="max-width: 600px;">
    <h2 class="mb-4 text-primary fw-bold text-center">تعديل النظام الغذائي</h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('diets.update', $diet) }}" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">اسم النظام الغذائي <span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control form-control-lg rounded-pill shadow-sm @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name', $diet->name) }}"
                required
                autofocus
                placeholder="أدخل اسم النظام الغذائي"
                aria-describedby="nameHelp"
            />
            <div id="nameHelp" class="form-text">مثال: نظام الكيتو</div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label fw-semibold">الوصف</label>
            <textarea
                class="form-control form-control-lg rounded-3 shadow-sm @error('description') is-invalid @enderror"
                id="description"
                name="description"
                rows="4"
                placeholder="أدخل وصفًا مختصرًا للنظام الغذائي">{{ old('description', $diet->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                تحديث
            </button>
            <a href="{{ route('diets.index') }}" class="btn btn-secondary btn-lg px-5 rounded-pill shadow-sm">
                إلغاء
            </a>
        </div>
    </form>
</div>
@endsection
