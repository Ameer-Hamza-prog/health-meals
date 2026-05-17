@extends('layouts.restaurant')

@section('title', 'لوحة تحكم المطعم')

@section('content')
<div class="container-fluid">
    <!-- Page header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">مرحباً بك في لوحة تحكم مطعمك</h4>
                            <h6 class="card-subtitle mb-2 text-muted">إدارة عمليات مطعمك بسهولة</h6>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary">
                                <i class="ti ti-plus me-2"></i>إضافة منتج جديد
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats cards -->
    <div class="row mt-4">
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle p-3 me-3">
                            <i class="ti ti-package text-white fa-2x"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">24</h2>
                            <p class="text-muted mb-0">المنتجات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-success rounded-circle p-3 me-3">
                            <i class="ti ti-shopping-cart text-white fa-2x"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">156</h2>
                            <p class="text-muted mb-0">طلبات اليوم</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning rounded-circle p-3 me-3">
                            <i class="ti ti-users text-white fa-2x"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">1,234</h2>
                            <p class="text-muted mb-0">العملاء</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-info rounded-circle p-3 me-3">
                            <i class="ti ti-coin text-white fa-2x"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">$4,560</h2>
                            <p class="text-muted mb-0">الإيرادات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent orders and charts -->
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">الطلبات الأخيرة</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>العميل</th>
                                    <th>التاريخ</th>
                                    <th>المبلغ</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-001</td>
                                    <td>أحمد محمد</td>
                                    <td>10 دقيقة</td>
                                    <td>$45.00</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-002</td>
                                    <td>سارة علي</td>
                                    <td>25 دقيقة</td>
                                    <td>$32.50</td>
                                    <td><span class="badge bg-warning">قيد الانتظار</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-003</td>
                                    <td>خالد حسن</td>
                                    <td>1 ساعة</td>
                                    <td>$67.80</td>
                                    <td><span class="badge bg-primary">قيد التجهيز</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">المنتجات الأكثر طلباً</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            برجر لحم
                            <span class="badge bg-primary rounded-pill">42</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            بيتزا بيتزا
                            <span class="badge bg-primary rounded-pill">38</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            سلطة سيزر
                            <span class="badge bg-primary rounded-pill">31</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            مشروبات غازية
                            <span class="badge bg-primary rounded-pill">28</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
