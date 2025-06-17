@extends('layouts.admindashboard')

@section('contact')
<div class="container py-5">
    <h2 class="mb-5 text-center fw-bold text-primary">قائمة المستخدمين</h2>

    {{-- الرسائل --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> يوجد بعض الأخطاء:
            <ul class="mb-0 mt-2 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    {{-- بحث --}}
    <form method="GET" action="{{ route('users.index') }}" class="d-flex justify-content-center mb-4 gap-2 flex-wrap">
        <input type="search" name="search" value="{{ $search }}" class="form-control shadow-sm rounded-pill px-4" placeholder="ابحث باسم المستخدم أو البريد الإلكتروني" style="max-width: 350px;" />
        <button type="submit" class="btn btn-primary shadow-sm rounded-pill px-4">
            <i class="bi bi-search me-1"></i> بحث
        </button>
    </form>

    {{-- زر الإضافة --}}
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
        <a href="{{ route('users.create') }}" class="btn btn-success shadow-sm rounded-pill px-4 fw-semibold d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> إضافة مستخدم جديد
        </a>
        <small class="text-muted">إجمالي المستخدمين: <span class="fw-bold">{{ $users->total() }}</span></small>
    </div>

    {{-- جدول --}}
    <div class="table-responsive shadow rounded" style="overflow-x:auto;">
        <table class="table align-middle text-center mb-0" style="min-width: 600px;">
            <thead class="table-primary text-primary fs-6 text-uppercase">
                <tr>
                    <th scope="col" class="fw-semibold">الاسم</th>
                    <th scope="col" class="fw-semibold">البريد الإلكتروني</th>
                    <th scope="col" class="fw-semibold">الدور</th>
                    <th scope="col" class="fw-semibold">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="align-middle">
                    <td class="text-truncate" style="max-width: 180px;">{{ $user->name }}</td>
                    <td class="text-truncate" style="max-width: 250px;">{{ $user->email }}</td>
                    <td>
                        @if($user->role === 'admin')
                            <span class="badge bg-danger px-3 py-2 fs-6">أدمن</span>
                        @else
                            <span class="badge bg-secondary px-3 py-2 fs-6">مستخدم</span>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-primary shadow-sm rounded-circle p-2" title="تعديل">
                            <i class="bi bi-pencil-fill"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف المستخدم؟');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm rounded-circle p-2" title="حذف">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted py-4 fs-5">لا يوجد مستخدمين</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- التصفح --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $users->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- إضافة بعض الـ CSS المخصصة لتحسين اللمسات --}}
<style>
    /* تأثير عند تمرير الفأرة على صف الجدول */
    table.table tbody tr:hover {
        background-color: #f1f9ff;
        transition: background-color 0.3s ease;
    }
    /* input البحث */
    input.form-control {
        border: 2px solid #0d6efd;
        transition: border-color 0.3s ease;
    }
    input.form-control:focus {
        border-color: #0a58ca;
        box-shadow: 0 0 6px #0a58caaa;
    }
    /* أزرار دائرية */
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
        box-shadow: 0 2px 8px #0d6efd80;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
        box-shadow: 0 2px 8px #dc354580;
    }
</style>
@endsection
