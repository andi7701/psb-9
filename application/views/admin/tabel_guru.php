

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard Administrator
			<small>Dashboard</small>
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="javascript:void(0);"><i class="fa fa-home"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	   <?php
     if ($this->session->flashdata('info')) {
      echo $this->session->flashdata('info');
     }
     ?>
		<div class="row">

       <div class="col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Guru</h3>
              <div class="box-tools pull-right">
                <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
                  <i class="fa fa-expand"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button btn-sm btn-primary" class="btn btn-box-tool" data-toggle="modal" data-target="#tambah" >
                  <i class="fa fa-plus"></i> Tambah Data Guru
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover" id="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lengkap</th>
                      <th>Nomor Seluler</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($guru->result() as $key) {
                      ?>
                      <tr>
                        <td><?=$i?></td>
                        <td><?=$key->namaLengkap?></td>
                        <td><?=$key->nomorSeluler?></td>
                        <td><?php if($key->status == 'super'){echo 'admin';}else{echo $key->status;}?></td>
                        <td>
                          <div class="btn-group">
                                          <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ubah <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a href="<?=base_url()?>dashboard/grafik">Hapus</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?=base_url()?>dashboard/grafik/teknologi">Ubah</a></li>
                                            <li><a href="<?=base_url()?>dashboard/guru/interview/<?=$key->id?>"><?php if($key->isInterviewer == 0){echo 'Jadikan Pewawancara';}else{echo "Nonaktifkan Pewawancara";}?></a></li>
                                            <li><a href="<?=base_url()?>dashboard/guru/notulensi/<?=$key->id?>"><?php if($key->isNotulen == 0){echo 'Jadikan Notulensi';}else{echo "Nonaktifkan Notulensi";}?></a></li>
                                          </ul>
                                        </div>
                        </td>
                      </tr>
                      <?php
                    $i++;
                    }
                    ?>
                  </tbody>
                </table>
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
  $('#table').dataTable();
	$('.knob').knob();
</script>
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Guru</h4>
      </div>
      <div class="modal-body">
        <!-- <div class="container"> -->
            <form action="<?= base_url();?>Dashboard/guru/add" method="POST">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="namaLengkap" class="form-control" required="true">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon Seluler</label>
                    <input type="text" name="nomorSeluler" class="form-control" required="true">
                </div>
                <div class="form-group col-sm-6">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
                </div>
								<div class="form-group col-sm-6">
									<label>Tugas</label>
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="isNotulen">Notulensi</label>
                  </div>
									<div class="checkbox">
										<label><input type="checkbox" value="1" name="isInterviewer">Pewawancara</label>
									</div>
                </div>
                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" class="form-control" required="true">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" class="form-control" required="true">
                </div>
								<div class="form-group">
                    <label>Password</label>
                    <input type="text" name="tanggalLahir" class="form-control" required="true">
                </div>
								<div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="text" name="tanggalLahir" class="form-control" required="true">
                </div>

                <input type="submit" class="btn btn-primary">
            </form>
        <!-- </div> -->
      </div>
    </div>

  </div>
</div>
