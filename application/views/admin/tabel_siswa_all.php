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
   <style type="text/css">
.data-table{width:300px; overflow-x: scroll; overflow-y:hidden; }
</style>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Data Seluruh Siswa</h3>
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
                           <li><a href="<?=base_url()?>Dashboard/Export/" target="_new">Semua Data Pendaftar</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/SD" target="_new">Sekolah Dasar</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/TK" target="_new">Taman Kanak Kanak</a></li>
                           <li><a href="<?=base_url()?>Dashboard/Export/KB" target="_new">Kelompok Bermain</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <table class="table table-stripped table-responsive" id="table">
                     <thead>
                        <tr>
                           <th>
                            <!-- <input type="checkbox" id="checkall_template"> -->
                          </th>
                           <th>Nama Lengkap</th>
                           <th>Nama Ayah & Ibu</th>
                           <th>Jenis Kelamin</th>
                           <th>Tanggal Lahir (Umur)</th>
                           <th>Agama</th>
                           <th>Jenjang</th>
                           <th>Status</th>
                           <th>Detail</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $i=1;
                           foreach ($siswa->result() as $key) {
                           
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
                           <td><?=$key->jenjangPendidikan.'-'.$key->tingkat?></td>
                           <th class="text-primary"><?=$key->statusPendaftaran?>
                                <?php 
                                if ($key->verifikasiBerkas == 1) {
                                  echo "- Lolos";
                                }elseif ($key->verifikasiBerkas == 2) {
                                  echo "- Tidak Lolos";
                                }
                                ?>
                              </th>
                           <td>
                              <a href="<?=base_url()?>Dashboard/siswa/detil/<?=$key->id?>" class="btn btn-default">Detail</a>
                              <a href="<?=base_url()?>Dashboard/siswa/invoice/<?=$key->id?>" target="blank" class="btn btn-warning">Invoice</a>
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
   $('.knob').knob();
</script>