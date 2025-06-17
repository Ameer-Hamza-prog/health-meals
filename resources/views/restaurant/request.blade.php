<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>طلب تسجيل مطعم جديد</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Wrapper الجسم -->
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

                                <p class="text-center fs-4 mb-4">طلب تسجيل مطعم جديد</p>

                                {{-- عرض رسالة نجاح --}}
                                @if (session('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                {{-- عرض الأخطاء --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="post" action="{{ route('restaurants.join.submit') }}"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">اسم المطعم</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="owner_name" class="form-label">اسم صاحب المطعم</label>
                                        <input type="text" class="form-control" id="owner_name" name="owner_name"
                                            value="{{ old('owner_name') }}" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone') }}" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">العنوان التفصيلي</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="license" class="form-label">رفع رخصة مزاولة المهنة</label>
                                        <input type="file" class="form-control" id="license" name="license"
                                            accept=".pdf,.jpg,.jpeg,.png" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="diet_id" class="form-label">النظام الغذائي</label>
                                        <select class="form-control" id="diet_id" name="diet_id" required>
                                            <option value="">اختر النظام الغذائي</option>
                                            @foreach ($diets as $diet)
                                                <option value="{{ $diet->id }}" @selected(old('diet_id') == $diet->id)>
                                                    {{ $diet->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-3 fs-5">إرسال الطلب</button>
                                </form>

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
