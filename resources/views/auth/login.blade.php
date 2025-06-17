<!doctype html>
<html lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SeoDash تسجيل دخول</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
  <style>
    /* تنسيق زر إظهار/إخفاء كلمة السر */
    .password-wrapper {
      position: relative;
    }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      user-select: none;
      font-size: 1.2rem;
      color: #6c757d;
    }
  </style>
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
                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('build/assets/images/logos/logo-light.svg') }}" alt="">
                </a>
                <p class="text-center"> تسجيل دخول </p>

                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" id="email" required autofocus />
                  </div>
                  <div class="mb-4 password-wrapper">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password" />
                    <span class="toggle-password" id="togglePassword" title="إظهار/إخفاء كلمة السر">&#128065;</span>
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" name="remember" id="remember" />
                      <label class="form-check-label text-dark" for="remember">
                        تذكر هذا الجهاز
                      </label>
                    </div>
                    @if (Route::has('password.request'))
                      <a class="text-primary fw-bold" href="{{ route('password.request') }}">
                        هل نسيت كلمة المرور؟
                      </a>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-3 fs-4 mb-4">تسجيل الدخول</button>
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

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
    });
  </script>
</body>

</html>
