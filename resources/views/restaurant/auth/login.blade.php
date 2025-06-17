<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تسجيل الدخول | منصة المطاعم</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- الجسم -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('build/assets/images/logos/logo-light.svg') }}" alt="Logo" />
                                </a>
                                <p class="text-center fs-4 mb-4">تسجيل الدخول للمطاعم</p>

                                <!-- تنبيه بحالة الحساب -->
                                <div class="alert alert-warning text-center">
                                    لم تتم الموافقة على حسابك بعد. يرجى الانتظار حتى يتم تفعيل الحساب من قبل الإدارة.
                                </div>

                                <form action="{{ route('restaurant.login.submit') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="username" class="form-label">اسم المستخدم أو البريد
                                            الإلكتروني</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            placeholder="example@email.com" value="{{ old('username') }}" required />
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">كلمة المرور</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="••••••••" required />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberMe"
                                                name="remember" />
                                            <label class="form-check-label" for="rememberMe">تذكرني</label>
                                        </div>
                                        <a href="{{ url('/forgot-password') }}" class="text-primary fw-bold">نسيت كلمة
                                            المرور؟</a>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-3 fs-5">تسجيل الدخول</button>

                                    <div class="text-center mt-3">
                                        <span class="text-muted">لا تملك حساباً؟</span>
                                        <a href="{{ route('restaurants.join.request') }}"
                                            class="text-primary fw-bold ms-2">طلب تسجيل مطعم</a>
                                    </div>
                                </form>


                                <div class="text-center mt-4">
                                    <small class="text-muted">
                                        بعد إرسال طلب التسجيل، ستقوم الإدارة بمراجعة طلبك ومن ثم إرسال اسم المستخدم
                                        وكلمة المرور الخاصة بك عبر البريد الإلكتروني عند الموافقة.
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
