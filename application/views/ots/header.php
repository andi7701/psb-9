
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url()?>assets/img/logo-sai-lead1.png">

    <title>Penerimaan Siswa Baru SAI</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/bs4/dist/asd/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/dist/css/introjs.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->
    <style type="text/css">
        body {
          padding-top: 3.5rem;
           font-family: "Roboto", sans-serif;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <script src="<?=base_url()?>assets/bs4/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/bs4/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/dist/js/intro.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    
    <script src="<?=base_url();?>assets/dist/js/bootstrap-datepicker.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white " style="color:white;background-color: #EA660D" >
      <!-- <a class="navbar-brand text-warning" href="#" >Penerimaaan Siswa Baru SAI</a> -->
      <a class="navbar-brand ml-2" href="<?=base_url()?>">
          <img src="<?=base_url()?>assets/img/logo-sai-lead1.png" alt="" class="ml-3" style="width: 50%;">
          <!-- <img src="http://placehold.it/150x50?text=Logo" alt=""> -->
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #EA660D">
        <span class="navbar-toggler-icon" style="background-color: #EA660D"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto text-uppercase font-weight-bold ">
          <li class="nav-item <?php if($this->uri->segment(2)==''){echo "active";}?> text-warning">
            <a class="nav-link text-warning " href="<?=base_url()?>">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='daftar'){echo "active";}?>">
            <a class="nav-link text-warning" href="<?= base_url()?>Welcome/daftar">Daftar Baru</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="<?= base_url()?>Welcome/login">Masuk</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='informasi'){echo "active";}?>">
            <a class="nav-link text-warning" href="<?= base_url()?>Welcome/informasi">Informasi Pendaftaran</a>
          </li> 
        </ul>
          <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item <?php if($this->uri->segment(2)==''){echo "active";}?>">
                <a class="nav-link text-warning" href="https://wa.me/+6281298981113/?text="><i data-feather="phone-call"></i> Wulan (0812-9898-1113) <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)==''){echo "active";}?>">
                <a class="nav-link text-warning" href="telp:+622177835721"><i data-feather="twitter"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)==''){echo "active";}?>">
                <a class="nav-link text-warning" href="telp:+622177835721"><i data-feather="facebook"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)==''){echo "active";}?>">
                <a class="nav-link text-warning" href="telp:+622177835721"><i data-feather="instagram"></i><span class="sr-only">(current)</span></a>
            </li>
          </div>
      </div>

    </nav>