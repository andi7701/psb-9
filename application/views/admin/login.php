

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - SAI Studio Alam - <?=$this->config->item('site_title')?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="<?=base_url()?>assets/img/logo-sai-lead.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/styles/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="<?=base_url()?>"><b>Sekolah Alam Indonesia - </b> Studio Alam</a> -->
  <img src="<?=base_url()?>assets/img/logo-sai-lead.png" style="width: 70%;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
      <?php 
      if ($this->session->flashdata('info')) {
        echo $this->session->flashdata('info');
      }
      ?>
      <h3><strong>Login Admin</strong></h3>
          </p>

    <form action="<?=base_url()?>Auth/login/" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email yang Didaftarkan">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
       
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/jQuery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
    {
        // $("#nim").attr('maxlength','9');
    });
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
