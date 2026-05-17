@extends('layouts.restaurant')

@section('title', 'إضافة منتج جديد')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">إضافة منتج جديد</h4>
            <p>صفحة إضافة منتج جديد - ستتوفر قريباً</p>
            <div class="mt-4">
                <a href="{{ route('restaurant.products.index') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-left me-2"></i>العودة للقائمة
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
