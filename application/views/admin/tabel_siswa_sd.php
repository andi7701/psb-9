

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Halaman Pendaftar Sekolah Dasar
			<!-- <small>Dashboard</small> -->
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="javascript:void(0);"><i class="fa fa-home"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
       <div class="col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Siswa SD</h3>
              <div class="box-tools pull-right">
                <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
                  <i class="fa fa-expand"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <div class="dropdown btn btn-box-tool">
                  <button class="btn btn-sm btn-default" type="button" id="all_cetak">Cetak Invoice</button>
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Unduh Sebagai Excel
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="<?=base_url()?>Dashboard/Export/SD" target="_new">Semua Pendaftar SD</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/SD/1" target="_new">Kelas 1</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/SD/2" target="_new">Kelas 2</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/SD/4" target="_new">Kelas 4</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Kelas 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Kelas 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Kelas 4</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <table class="table table-hover" id="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lengkap</th>
                      <th>Nama Ayah & Ibu</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir (Umur)</th>
                      <th>Agama</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($siswa->result() as $key) {
                      if ($key->tingkat == '1') {

                      ?>
                      <tr>
                        <td>
                            <?=$i?>
                            <input type="checkbox"  class="id_template" onchange="counting(<?=$key->id?>)" value="<?=$key->id?>">
                            </td>
                        <td><?=$key->namaLengkap?></td>
                        <td><?=$key->ayah_namaLengkap."/ ".$key->ibu_namaLengkap?></td>
                        <td><?=$key->jenisKelamin?></td>
                        <td><?=$key->tanggalLahir?></td>
                        <td><?=$key->agama?></td>
                        <th class="text-primary"><?=$key->statusPendaftaran?></th>
                        <td>
													<div class="btn-group">
														<a type="button" class="btn btn-sm btn-default" href="<?=base_url()?>Dashboard/siswa/detil/<?=$key->id?>">Detail</a>
														<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="<?=base_url()?>Dashboard/siswa/invoice/<?=$key->id?>" target="new">Invoice</a></li>
															<li><a href="<?=base_url()?>Dashboard/siswa/draft/<?=$key->id?>" target="new">Profil</a></li>
														</ul>
													</div>
												</td>
                      </tr>
                      <?php
                      $i++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table class="table table-hover" id="table1">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lengkap</th>
                      <th>Nama Ayah & Ibu</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir (Umur)</th>
                      <th>Agama</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($siswa->result() as $key) {
                      if ($key->tingkat == '2') {

                      ?>
                      <tr>
                        <td>
                            <?=$i?>
                            <input type="checkbox"  class="id_template" onchange="counting(<?=$key->id?>)" value="<?=$key->id?>">
                            </td>
                        <td><?=$key->namaLengkap?></td>
                        <td><?=$key->ayah_namaLengkap."/ ".$key->ibu_namaLengkap?></td>
                        <td><?=$key->jenisKelamin?></td>
                        <td><?=$key->tanggalLahir?></td>
                        <td><?=$key->agama?></td>
                        <th class="text-primary"><?=$key->statusPendaftaran?></th>
                        <td>
													<div class="btn-group">
														<a type="button" class="btn btn-sm btn-default" href="<?=base_url()?>Dashboard/siswa/detil/<?=$key->id?>">Detail</a>
														<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="<?=base_url()?>Dashboard/siswa/invoice/<?=$key->id?>" target="new">Invoice</a></li>
															<li><a href="<?=base_url()?>Dashboard/siswa/draft/<?=$key->id?>" target="new">Profil</a></li>
														</ul>
													</div>
												</td>
                      </tr>
                      <?php
                      $i++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
                <div class="tab-pane" id="tab_3">
                <table class="table table-hover" id="table2">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lengkap</th>
                      <th>Nama Ayah & Ibu</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir (Umur)</th>
                      <th>Agama</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($siswa->result() as $key) {
                      if ($key->tingkat == '4') {

                      ?>
                      <tr>
                        <td>
                            <?=$i?>
                            <input type="checkbox"  class="id_template" onchange="counting(<?=$key->id?>)" value="<?=$key->id?>">
                            </td>
                        <td><?=$key->namaLengkap?></td>
                        <td><?=$key->ayah_namaLengkap."/ ".$key->ibu_namaLengkap?></td>
                        <td><?=$key->jenisKelamin?></td>
                        <td><?=$key->tanggalLahir?></td>
                        <td><?=$key->agama?></td>
                        <th class="text-primary"><?=$key->statusPendaftaran?></th>
                        <td>
													<div class="btn-group">
														<a type="button" class="btn btn-sm btn-default" href="<?=base_url()?>Dashboard/siswa/detil/<?=$key->id?>">Detail</a>
														<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="<?=base_url()?>Dashboard/siswa/invoice/<?=$key->id?>" target="new">Invoice</a></li>
															<li><a href="<?=base_url()?>Dashboard/siswa/draft/<?=$key->id?>" target="new">Profil</a></li>
														</ul>
													</div>
												</td>
                      </tr>
                      <?php
                      $i++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

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
  let id_template = [];
    function counting(val) {
        // alert(val);
        if (!id_template.includes(val)) {
          id_template.push(val);
        }else{
          id_template.splice( id_template.indexOf(val), 1 );
        }
        // $('#checkall_template').prop('checked',false);
        console.log('satuan : ',id_template);
      }
     $( document ).ready(function() {
      $('#all_cetak').on('click',function() {
        // alert('dasd');
        if (id_template.length != 0) {
          window.open('<?=base_url()?>Dashboard/invoice/'+btoa(JSON.stringify(id_template)), '_blank');
        }else{
          alert('Harap pilih data siswa yang Invoice nya ingin dicetak.');
        }

      });
    });
  $('#table').dataTable({
      // responsive: true
        "scrollX": true
    });
  $('#table1').dataTable({
      // responsive: true
        "scrollX": true
    });
  $('#table2').dataTable({
      // responsive: true
        "scrollX": true
    });
	$('.knob').knob();
</script>
