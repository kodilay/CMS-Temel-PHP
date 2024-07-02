<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
    <!-- Summernote -->
    <link rel="stylesheet" href="<?=assets('plugins/summernote/summernote.min.css')?>">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?=assets('plugins/sweetalert2/sweetalert2.css')?>">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


 <?= $data['navbar'];?> 
 <?= $data['sidebar'];?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detaylar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Keşfet</a></li>
              <li class="breadcrumb-item"><a href="<?= _link('customer') ?>">Müşteriler</a></li>
              <li class="breadcrumb-item active"><?= $data['customer']['name'] . ' ' . $data['customer']['surname']?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                    <div class="widget-user-image">
                    <!-- <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar"> -->
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?= $data['customer']['name'] . ' ' . $data['customer']['surname']?></h3>
                    <h5 class="widget-user-desc"><?= $data['customer']['company'] ?></h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        Projeler <span class="float-right badge bg-primary"><?= count($data['projects']); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tel:<?= $data['customer']['gsm'] ?>" class="nav-link">
                        Telefon: <span class="float-right"><?= $data['customer']['gsm'] ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="mailto:<?= $data['customer']['email'] ?>" class="nav-link">
                        E-posta: <span class="float-right "><?= $data['customer']['email'] ?></span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                        Followers <span class="float-right ">842</span>
                        </a>
                    </li> -->
                    </ul>
                </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-8">
                <textarea name="summernote" id="summernote"> <?= htmlspecialchars_decode($data['customer']['notes']); ?> </textarea>
                <button style="width: 100%;" class="btn btn-outline-dark" onclick="saveNote()">Kaydet</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Proje</th>
                        <th>Durum</th>
                        <th>İlerleyiş</th>
                        <th>Eylem</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['projects'] as $key => $value):?>
                        <tr id="row_<?= $value['id']; ?>">
                            <td><?= $value['id']?></td>
                            <td><?= $value['title']?></td>
                            <td><?= $value['status'] == 'a' ? 'aktif' : 'pasif';?></td>
                            <td>
                            <?= $value['progress'] ?>%
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: <?= $value['progress'] ?>%"></div>
                            </div>
                            </td>
                            <td>
                            <!-- <span class="badge bg-danger">55%</span> -->
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-sm btn-danger" onclick="confirm(<?= $value['id']; ?>)">Sil</button>
                                <a href="<?= _link('project/edit/' . $value['id']); ?>" class="btn btn-sm btn-info">Güncelle</a>
                            </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot> -->
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=assets('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets('js/adminlte.min.js')?>"></script>
<!-- Summernote -->
<script src="<?=assets('plugins/summernote/summernote.min.js')?>"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.8/dist/axios.min.js" integrity="sha256-KdYARiowaU79FbmEi0ykLReM0GcAknXDWjBYASERQwQ=" crossorigin="anonymous"></script>
<!-- sweetalert2 -->
<script src="<?=assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 135,
            placeholder: 'Müşterilerinizle ilgili notlar alabilirsiniz.'
        });
    });


    function saveNote(){
        const html = $('#summernote').summernote('code');
        console.log(html);

        let formData = new FormData();

        formData.append('html', html);

        axios.post('<?= _link('customer/note/'. $data['customer']['id'] ) ?>', formData)
            .then(res =>{
                console.log(res);


                swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status

                )
            })
            .catch((err) => {
                console.log(err);
            });
    }

</script>
</body>
</html>
