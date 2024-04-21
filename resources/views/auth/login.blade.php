<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
       .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
    </style>
</head>
<body>


    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
        <!-- Tautan ke halaman pendaftaran -->
        <p>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar sekarang</a></p>

    </form> --}}


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                  <div class="mb-md-5 mt-md-4 pb-5">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{session('danger')}}
                    </div>
                @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-5">Please enter your login and password!</p>




{{--
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>

                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>

                        <button type="submit">Login</button>
                        <!-- Tautan ke halaman pendaftaran -->
                        <p>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar sekarang</a></p> --}}


                    <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label"  for="email">Email</label>
                      <input type="email" name="email" id="email" required class="form-control form-control-lg" placeholder="email" />

                    </div>

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label"for="password">Password</label>
                      <input type="password"name="password" id="password" required class="form-control form-control-lg" placeholder="password maneh" />

                    </div>

<br>

                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>


                  </div>

                  <div>
                    <p class="mb-0">Don't have an account? <a href="{{ route('auth.register') }}" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>



      </section>
</body>
</html>
