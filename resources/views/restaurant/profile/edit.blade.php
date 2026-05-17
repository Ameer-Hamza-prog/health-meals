@extends('layouts.restaurant')

@section('title', 'الملف الشخصي - مطعمي')

@section('content')
<div class="container-fluid">
    <!-- Page header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">الملف الشخصي</h4>
                    <h6 class="card-subtitle mb-2 text-muted">إدارة معلومات حساب مطعمك</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8">
            
            <!-- Update Profile Information -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">معلومات المطعم</h5>
                    
                    <form method="POST" action="{{ route('restaurant.profile.update') }}">
                        @csrf
                        @method('POST')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">اسم المطعم *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $restaurant->name ?? '') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $restaurant->email ?? '') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone', $restaurant->phone ?? '') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">العنوان</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                       id="address" name="address" value="{{ old('address', $restaurant->address ?? '') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                حفظ التغييرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">تغيير كلمة المرور</h5>
                    
                    <form method="POST" action="{{ route('restaurant.profile.password') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور الجديدة</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-warning">
                                تغيير كلمة المرور
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
        <!-- Sidebar - Restaurant Info -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center" 
                             style="width: 120px; height: 120px;">
                            <i class="ti ti-building-store text-primary" style="font-size: 48px;"></i>
                        </div>
                    </div>
                    
                    <h5 class="card-title">{{ $restaurant->name ?? 'مطعمي' }}</h5>
                    <p class="text-muted">{{ $restaurant->email ?? 'restaurant@example.com' }}</p>
                    
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>حالة الحساب:</span>
                            <span class="badge bg-success">{{ $restaurant->status ?? 'نشط' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>تاريخ التسجيل:</span>
                            <span>{{ $restaurant->created_at ? $restaurant->created_at->format('Y/m/d') : '2024/01/01' }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>رقم الرخصة:</span>
                            <span>#{{ $restaurant->id ?? '001' }}</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-top">
                        <a href="{{ route('restaurant.dashboard') }}" class="btn btn-outline-primary">
                            العودة للرئيسية
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Danger Zone -->
            <div class="card mt-4 border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger">المنطقة الخطرة</h5>
                    <p class="text-muted">حذف حساب المطعم بشكل نهائي</p>
                    <button class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        حذف الحساب
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تأكيد حذف الحساب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف حساب مطعمك؟ هذا الإجراء لا يمكن التراجع عنه.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <form method="POST" action="{{ route('restaurant.profile.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">نعم، احذف الحساب</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
