@extends('layouts.admindashboard')

@section('contact')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold">النظم الغذائية</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <form method="GET" action="{{ route('diets.index') }}" class="d-flex flex-grow-1" role="search" aria-label="بحث النظم الغذائية">
            <input
                type="search"
                name="search"
                value="{{ $search }}"
                class="form-control rounded-pill shadow-sm border-0"
                placeholder="ابحث باسم النظام الغذائي أو الوصف"
                aria-label="بحث"
            />
            <button type="submit" class="btn btn-primary ms-2 px-4 rounded-pill shadow-sm">بحث</button>
        </form>

        <a href="{{ route('diets.create') }}" class="btn btn-success px-4 rounded-pill shadow-sm flex-shrink-0">
            إضافة نظام غذائي جديد
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-hover align-middle text-center mb-0" style="min-width: 320px;">
            <thead class="table-light text-primary">
                <tr>
                    <th scope="col" class="fw-semibold">الاسم</th>
                    <th scope="col" class="fw-semibold">الوصف</th>
                    <th scope="col" class="fw-semibold">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diets as $diet)
                <tr>
                    <td class="fw-semibold text-truncate" style="max-width: 180px;">{{ $diet->name }}</td>
                    <td class="text-muted text-truncate" style="max-width: 300px;">{{ $diet->description ?? '-' }}</td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('diets.edit', $diet) }}" class="btn btn-sm btn-outline-primary px-3 rounded-pill" title="تعديل">
                            تعديل
                        </a>
                        <form
                            action="{{ route('diets.destroy', $diet) }}"
                            method="POST"
                            onsubmit="return confirm('هل أنت متأكد من حذف النظام الغذائي؟')"
                        >
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger px-3 rounded-pill" type="submit" title="حذف">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-muted fst-italic">لا يوجد نظم غذائية</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $diets->withQueryString()->links() }}
    </div>
</div>
@endsection
