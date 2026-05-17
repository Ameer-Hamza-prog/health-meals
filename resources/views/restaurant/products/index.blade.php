@extends('layouts.restaurant')

@section('title', 'منتجاتي')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">منتجات المطعم</h4>
            <p>صفحة إدارة منتجات المطعم - ستتوفر قريباً</p>
            <div class="mt-4">
                <a href="{{ route('restaurant.dashboard') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-left me-2"></i>العودة للرئيسية
                </a>
                <a href="{{ route('restaurant.products.create') }}" class="btn btn-success">
                    <i class="ti ti-plus me-2"></i>إضافة منتج جديد
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
