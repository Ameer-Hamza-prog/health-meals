@extends('layouts.restaurant')

@section('title', 'Analytics')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">صفحة analytics</h4>
            <p>هذه الصفحة قيد التطوير - ستتوفر قريباً</p>
            <div class="mt-4">
                <a href="{{ route('restaurant.dashboard') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-left me-2"></i>العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
