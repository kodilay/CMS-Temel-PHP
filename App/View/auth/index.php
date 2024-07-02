<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=assets('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=assets('css/adminlte.min.css')?>">
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="<?=assets('plugins/sweetalert2/sweetalert2.css')?>">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="" class="h1"><b>CMS</b>Project</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg"><code style="color: #2f2f2f;">Sign in to start your session</code></p>

          <form id="login" action="" method="post">
            <div class="input-group mb-3">
              <input type="email" id="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" id="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=assets('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets('js/adminlte.min.js')?>"></script>
<!-- sweetalert2 -->
<script src="<?=assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.8/dist/axios.min.js" integrity="sha256-KdYARiowaU79FbmEi0ykLReM0GcAknXDWjBYASERQwQ=" crossorigin="anonymous"></script>

<script>

  const login = document.getElementById('login');
  login.addEventListener('submit', (e) => {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    console.log(email, password);
    axios.post('<?= $form_link ?>', formData)
      .then(res =>{
        console.log(res);


        swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status

        )

        if (res.data.redirect) {
          window.location.href = res.data.redirect;
        }
      })
      .catch((err) => {
        console.log(err);
      });
    e.preventDefault();
  });

</script>
</body>
</html>
