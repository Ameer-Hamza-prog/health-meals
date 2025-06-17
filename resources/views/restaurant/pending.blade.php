<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>بانتظار الموافقة | منصة المطاعم</title>

  <!-- روابط الملفات من build -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0 text-center p-4">
              <div class="card-body">
                <img src="{{ asset('build/assets/images/logos/logo-light.svg') }}" alt="Logo" class="mb-4" style="max-width: 120px;" />
                <h4 class="mb-3 text-warning">طلبك قيد المراجعة</h4>
                <p class="mb-4 fs-5 text-muted">
                  تم إرسال طلب تسجيل مطعمك بنجاح.<br>
                  سيتم مراجعته من قبل الإدارة في أقرب وقت ممكن.
                </p>
                <div class="alert alert-info">
                  سنقوم بإرسال اسم المستخدم وكلمة المرور إلى بريدك الإلكتروني عند الموافقة.
                </div>
                <a href="#" class="btn btn-secondary mt-4 w-100 py-2">عودة إلى الصفحة الرئيسية</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- سكربتات من build -->
  <script src="{{ asset('build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
