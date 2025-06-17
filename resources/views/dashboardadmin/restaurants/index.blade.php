@extends('layouts.admindashboard')

@section('contact')
<div class="container my-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h2 class="mb-4 text-center fw-bold" style="color: #2c3e50; font-size: 2.2rem;">
        المطاعم
    </h2>

    @if(session('success'))
        <div class="alert alert-success rounded shadow-sm fs-6 py-2 px-3" style="font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <form method="GET" action="{{ route('restaurants.index') }}" class="d-flex flex-grow-1 w-100 w-md-auto">
            <input type="search" name="search" value="{{ $search ?? '' }}"
                   class="form-control rounded-pill border-1 shadow-sm px-4"
                   placeholder="ابحث باسم المطعم أو البريد الإلكتروني"
                   style="height: 42px; font-size: 1rem; transition: box-shadow 0.3s ease;"
                   onfocus="this.style.boxShadow='0 0 8px rgba(46, 204, 113, 0.5)';"
                   onblur="this.style.boxShadow='none';" />
            <button type="submit"
                    class="btn btn-success rounded-pill px-4 ms-2 shadow-sm fw-semibold"
                    style="height: 42px; font-size: 1rem; letter-spacing: 0.05em; transition: background-color 0.3s ease;">
                بحث
            </button>
        </form>
        <a href="{{ route('restaurants.create') }}"
           class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm"
           style="height: 42px; font-size: 1rem; letter-spacing: 0.05em; white-space: nowrap;">
            إضافة مطعم جديد
        </a>
    </div>

    <div class="table-responsive shadow rounded bg-white">
        <table class="table table-hover align-middle text-center mb-0" style="border-collapse: separate; border-spacing: 0 8px;">
            <thead>
                <tr style="background-color: #2980b9; color: white; border-radius: 12px;">
                    <th class="rounded-start" style="padding: 12px 20px;">اسم المطعم</th>
                    <th style="padding: 12px 20px;">صاحب المطعم</th>
                    <th style="padding: 12px 20px;">البريد الإلكتروني</th>
                    <th style="padding: 12px 20px;">الهاتف</th>
                    <th style="padding: 12px 20px;">النظام الغذائي</th>
                    <th style="padding: 12px 20px;">حالة التفعيل</th>
                    <th style="padding: 12px 20px;">الرخصة</th>
                    <th class="rounded-end" style="padding: 12px 20px;">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($restaurants as $restaurant)
                <tr style="background-color: #f9fbfc; box-shadow: 0 2px 6px rgba(0,0,0,0.05); border-radius: 12px;">
                    <td class="fw-semibold text-primary" style="font-size: 1rem; vertical-align: middle;">
                        {{ $restaurant->name }}
                    </td>
                    <td style="vertical-align: middle;">{{ $restaurant->owner_name }}</td>
                    <td style="vertical-align: middle;">
                        <a href="mailto:{{ $restaurant->email }}" class="text-decoration-none text-info" style="transition: color 0.3s;">
                            {{ $restaurant->email }}
                        </a>
                    </td>
                    <td style="vertical-align: middle;">{{ $restaurant->phone }}</td>
                    <td style="vertical-align: middle;">{{ $restaurant->diet ? $restaurant->diet->name : '-' }}</td>
                    <td style="vertical-align: middle;">
                        @if($restaurant->status == 'pending')
                            <span class="badge bg-warning text-dark px-3 py-1 fw-semibold rounded-pill" style="font-size: 0.85rem;">قيد الانتظار</span>
                        @elseif($restaurant->status == 'approved')
                            <span class="badge bg-success px-3 py-1 fw-semibold rounded-pill" style="font-size: 0.85rem;">مفعل</span>
                        @else
                            <span class="badge bg-danger px-3 py-1 fw-semibold rounded-pill" style="font-size: 0.85rem;">مرفوض</span>
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                        @if($restaurant->license_path)
                            <a href="{{ asset('storage/' . $restaurant->license_path) }}" target="_blank" download
                               class="btn btn-outline-primary btn-sm px-3 py-1 shadow-sm rounded-pill"
                               style="font-size: 0.85rem; transition: background-color 0.3s, color 0.3s;">
                                تحميل
                            </a>
                        @else
                            <span class="text-muted" style="font-size: 0.85rem;">لا يوجد</span>
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                        <a href="{{ route('restaurants.edit', $restaurant) }}"
                           class="btn btn-sm btn-primary px-3 py-1 me-1 rounded-pill shadow-sm"
                           style="font-size: 0.85rem; transition: background-color 0.3s;">
                            تعديل
                        </a>
                        <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المطعم؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-3 py-1 rounded-pill shadow-sm"
                                    type="submit" style="font-size: 0.85rem; transition: background-color 0.3s;">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-muted py-4" style="font-size: 1rem;">لا توجد مطاعم</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $restaurants->withQueryString()->links() }}
    </div>
</div>

<style>
    /* تنعيم الخطوط والألوان */
    body {
        background-color: #f0f4f8;
    }

    a.text-info:hover {
        color: #117a8b !important;
        text-decoration: underline;
    }

    .btn-primary:hover {
        background-color: #21618c;
        border-color: #21618c;
    }

    .btn-danger:hover {
        background-color: #b03a2e;
        border-color: #b03a2e;
    }

    .btn-outline-primary:hover {
        background-color: #1f618d;
        color: #fff;
        border-color: #1f618d;
    }

    table.table tbody tr:hover {
        background-color: #d0e7ff !important;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* إزالة حدود الخلايا وجعلها متباعدة */
    table.table {
        border-collapse: separate !important;
        border-spacing: 0 12px !important;
    }

    /* تقليل تباعد الخلايا الداخلية */
    table.table td, table.table th {
        padding: 12px 16px !important;
        vertical-align: middle !important;
    }
</style>
@endsection
