

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Halaman Orang Tua Siswa
			<!-- <small>Dashboard</small> -->
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
      <div class="col-sm-7">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Status Penerimaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
              <i class="fa fa-expand"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    <?= date('d-M-Y h:i:s',strtotime($this->session->userdata('ots')->created_at));?>
                  </span>
            </li>
            <?php
            if ($formulir == TRUE) {
              ?>
              <li>
                <i class="fa fa-file-text-o bg-green"></i>

                <div class="timeline-item">
                  <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                  <h3 class="timeline-header" style="color:green;" ><a href="<?=base_url()?>Welcome/ots/formulir">Anda Sudah Mengisi Formulir</a></h3>

                  <div class="timeline-body">
                    Mengisi Formulir Pendaftaran Tahap Selanjutnya yang terdiri informasi keluarga dan informasi pribadi Calon Peserta Didik.
                  </div>
                </div>
              </li>
              <li>
                <i class="fa fa-envelope bg-red"></i>

                <div class="timeline-item">
                  <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                  <h3 class="timeline-header" style="color:green;" >Menunggu Verifikasi Berkas</h3>

                  <div class="timeline-body">
                    Menunggu tahap verifikasi berkas sebagai bagian dari proses Seleksi
                  </div>
                </div>
              </li>
              <?php
            }else{
              ?><li>
              <i class="fa fa-file-text-o bg-red"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="<?=base_url()?>Welcome/ots/formulir">Klik Mengisi Formulir Pendaftaran</a></h3>

                <div class="timeline-body">
                  Mengisi Formulir Pendaftaran Tahap Selanjutnya yang terdiri informasi keluarga dan informasi pribadi Calon Peserta Didik.
                </div>
              </div>
            </li><?php
            }
            ?>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-sm-5">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Alur Penerimaan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
              <i class="fa fa-expand"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <img src="<?=base_url()?>assets/upload/alur.jpeg" class="img-responsive">

        </div>
        <!-- /.box-body -->
      </div>
    </div>
    </div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
	var columns = [];
</script>



<script>
	/* jQueryKnob */
	$('.knob').knob();
</script>
