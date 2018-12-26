<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Detail Siswa : <?=$siswa->result()[0]->namaLengkap?>
         <small>Detail Siswa</small>
      </h1>
      <ol class="breadcrumb">
         <li class="active"><a href="<?=base_url()?>Dashboard/siswa"><i class="fa fa-arrow-left"></i> Kembali</a></li>
      </ol>
   </section>
   <style type="text/css">
      .nav-tabs-custom .nav-tabs li.active {
      border-top-color: #FF851B;
      }
   </style>
   <!-- Main content -->
   <section class="content">
      <?php
         // echo $this->uri->segment(4);
          if ($this->session->flashdata('info')) {
            # code...
           echo $this->session->flashdata('info');
          }
          ?>
      <div class="row">
         <div class="col-sm-12">
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Progress Penerimaan</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
                     <i class="fa fa-expand"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                     <i class="fa fa-minus"></i>
                     </button>
                     <a data-href="<?=base_url()?>Dashboard/siswa/verif/<?=$siswa->result()[0]->id?>" data-toggle="modal" data-target="#verifikasi" class="btn btn-box-tool">
                     <i class="fa fa-check-circle-o "></i> Verifikasi Berkas
                     </a>
                     <a href="<?=base_url()?>Dashboard/siswa/draft/<?=$siswa->result()[0]->id?>" target="blank" class="btn btn-box-tool">
                     <i class="fa fa-download"></i> Profil
                     </a>
                     <a href="<?=base_url()?>Dashboard/siswa/invoice/<?=$siswa->result()[0]->id?>" target="blank" class="btn btn-box-tool">
                     <i class="fa fa-download"></i> Invoice
                     </a>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <h3>Status Penerimaan : <span class="text-warning"> <?=strtoupper($siswa->result()[0]->statusPendaftaran)?></span></h3>
               </div>
               <!-- /.box-body -->
            </div>
         </div>
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_0" data-toggle="tab">Formulir Pendaftaran <?php if($siswa->result()[0]->pasFoto != NULL && $siswa->result()[0]->kartuKeluarga != NULL && $siswa->result()[0]->aktaKelahiran != NULL){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a> </li>
                  <li><a href="#tab_1" data-toggle="tab">Riwayat Penyakit <?php if(count($penyakit->result()) != 0){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a> </li>
                  <li><a href="#tab_2" data-toggle="tab">Riwayat Kelahiran <?php if(count($kelahiran->result()) != 0){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a></li>
                  <li><a href="#tab_3" data-toggle="tab">Data Keluarga <?php if($siswa->result()[0]->jumlahPengeluaran != NULL){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a></li>
                  <li><a href="#tab_4" data-toggle="tab">Data Perkembangan Anak <?php if($siswa->result()[0]->dataPerkembangan != NULL){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a></li>
                  <li><a href="#tab_5" data-toggle="tab">Informasi Tambahan <?php if($siswa->result()[0]->pertanyaan1 != NULL){echo '<i class="glyphicon glyphicon-ok"></i>';}?></a></li>
                  <li><a href="#tab_6" data-toggle="tab">Data Sit In</a></li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane" id="tab_6">
                     Ongoing
                  </div>
                  <div class="tab-pane active" id="tab_0">
                     <form id="f_tab_0" method="POST" action="<?=base_url()?>Dashboard/save/pendaftaran/<?=$this->uri->segment(4);?>" enctype="multipart/form-data">
                        <div class="box box-solid box-success" data-widget="box-widget">
                           <div class="box-header">
                              <h3 class="box-title">Panduan Pengisian</h3>
                              <div class="box-tools">
                                 <a class="btn btn-box-tool" onclick="edit('f_tab_0')" data-toggle="tooltip" title="Edit">Edit</a>
                                 <!-- This will cause the box to be removed when clicked -->
                                 <a class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                 <!-- This will cause the box to collapse when clicked -->
                                 <a class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></a>
                              </div>
                           </div>
                           <div class="box-body">
                              <p>
                              <ul>
                                 <li>Isi Kolom Input dibawah ini yang masih kosong.</li>
                                 <li>Kolom Input dengan Label bertanda * ,wajib untuk disi.</li>
                                 <li>Unggah berkas yang dibutuhkan (Pasfoto, Akta Kelahiran, Kartu Keluarga) sesuai ketentuan dibawah.</li>
                              </ul>
                              </p>
                           </div>
                        </div>
                        <h3>Berkas</h3>
                        <div class="row">
                           <?php
                              if ($siswa->result()[0]->pasFoto != NULL) {
                              ?>
                           <div class="col-sm-4" >
                              <img src="<?=$siswa->result()[0]->pasFoto?>" style="max-height: 200px;" class="img-responsive" alt="Cinque Terre">
                           </div>
                           <?php
                              }else{echo ' <div class="col-sm-4" ></div>';}
                              if ($siswa->result()[0]->aktaKelahiran != NULL) {
                              ?>
                           <!-- <div class="col-sm-4" ><a href="btn btn-warning btn-block" href="<?=base_url()?>assets/upload/aktaKelahiran/<?=$siswa->result()[0]->aktaKelahiran?>">Periksa</a>
                              </div> -->
                           <div class="col-sm-4" >
                              <img src="<?=$siswa->result()[0]->aktaKelahiran?>" style="max-height: 200px;" class="img-responsive" alt="Cinque Terre">
                           </div>
                           <?php
                              }else{echo ' <div class="col-sm-4" ></div>';}
                              if ($siswa->result()[0]->kartuKeluarga != NULL) {
                              ?>
                           <!-- <div class="col-sm-4" ><a href="btn btn-warning btn-block" href="<?=base_url()?>assets/upload/kartuKeluarga/<?=$siswa->result()[0]->kartuKeluarga ?>">Periksa</a>
                              </div> -->
                           <div class="col-sm-4" >
                              <img src="<?=$siswa->result()[0]->kartuKeluarga?>" style="max-height: 200px;" class="img-responsive" alt="Cinque Terre">
                           </div>
                           <?php
                              }else{echo ' <div class="col-sm-4" ></div>';}
                              ?>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-4">
                              <label>Unggah Pasfoto berukuran 3x4. Format Berkas/file .JPG. maksimal 1 Mb (Megabyte)</label>
                              <input type="file" name="pasFoto" id="pasFoto" onchange="uploads('pasFoto')" class="form-control" >
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Unggah Akta Kelahiran. Format Berkas/file .JPG. maksimal 1 Mb (Megabyte)</label>
                              <input type="file" name="aktaKelahiran" id="aktaKelahiran" onchange="uploads('pasFoto')" class="form-control">
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Unggah Kartu Keluarga. Format Berkas/file .JPG. maksimal 1 Mb (Megabyte)</label>
                              <input type="file" name="kartuKeluarga" id="kartuKeluarga" onchange="uploads('pasFoto')" class="form-control">
                           </div>
                        </div>
                        <h3>Biodata Anak</h3>
                        <div class="row" data-step="2" data-intro="Bagian Formulir ini berisi informasi seputar Anak Didik/ Calon Siswa." data-position='right'>
                           <div class="form-group col-sm-6">
                              <label>Nama Lengkap</label>
                              <input type="text" name="namaLengkap" value="<?=$siswa->result()[0]->namaLengkap?>" placeholder="Nama Lengkap" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tanggal Lahir</label>
                              <input type="text" name="tanggalLahir" value="<?=date('d/m/Y',strtotime($siswa->result()[0]->tanggalLahir))?>" class="form-control datepicker" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tempat Lahir</label>
                              <input type="text" name="tempatLahir" value="<?=$siswa->result()[0]->tempatLahir?>" placeholder="Kota Kelahiran" class="form-control" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Nama Panggilan</label>
                              <input type="text" name="namaPanggilan" value="<?=$siswa->result()[0]->namaPanggilan?>" placeholder="Nama Panggilan" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Anak ke</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->anakKe?>" min="0" name="anakKe" class="form-control" required placeholder="1">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Jumlah Saudara Kandung</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->dariKe-$siswa->result()[0]->anakKe?>" min="0" name="dariKe" class="form-control" required placeholder="Jumlah Saudara Kandung">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Suku</label>
                              <input type="text" name="suku" value="<?=$siswa->result()[0]->suku?>" class="form-control" required placeholder="Suku">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Jenis Kelamin</label>
                              <select name="jenisKelamin" id="jenisKelamin" class="form-control" required>
                                 <option disabled selected>-- PILIH --</option>
                                 <option <?php if($siswa->result()[0]->jenisKelamin == 'Laki-Laki'){echo "selected";}?> value="Laki-Laki">Laki-Laki</option>
                                 <option <?php if($siswa->result()[0]->jenisKelamin == 'Perempuan'){echo "selected";}?> value="Perempuan">Perempuan</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Golongan Darah</label>
                              <select name="golonganDarah" id="golonganDarah" class="form-control" required>
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="A" <?php if($siswa->result()[0]->golonganDarah == 'A'){echo "selected";}?>>A</option>
                                 <option value="B" <?php if($siswa->result()[0]->golonganDarah == 'B'){echo "selected";}?>>B</option>
                                 <option value="AB" <?php if($siswa->result()[0]->golonganDarah == 'AB'){echo "selected";}?>>AB</option>
                                 <option value="O" <?php if($siswa->result()[0]->golonganDarah == 'O'){echo "selected";}?>>O</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Agama</label>
                              <input type="text" name="agama" value="<?=$siswa->result()[0]->agama?>" placeholder="Agama" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Kewarganegaraan</label>
                              <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required="">
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="WNI" <?php if($siswa->result()[0]->kewarganegaraan == 'WNI'){echo "selected";} ?>>Warga Negara Indonesia</option>
                                 <option value="WNA" <?php if($siswa->result()[0]->kewarganegaraan == 'WNA'){echo "selected";} ?>>Warga Negara Asing</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-7">
                              <label>Alamat Tempat Tinggal</label>
                              <input type="text" name="alamat1" value="<?=$siswa->result()[0]->alamat1?>" placeholder="Nama Jalan,Kota" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-2">
                              <label>Kode POS</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->pos1?>" name="pos1" placeholder="16516" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Nomor Telepon</label>
                              <input type="number" onkeypress="return isNumber(event)" name="telpon1" placeholder="Nomor Telepon" value="<?=$siswa->result()[0]->telpon1?>" class="form-control" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-4">
                              <label>Hobi</label>
                              <textarea rows="2" class="form-control"  name="hobi" placeholder="Hobi yang tampak" name="hobi"><?=$siswa->result()[0]->hobi?></textarea>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Bakat yang Tampak</label>
                              <textarea rows="2" class="form-control" name="bakat" placeholder="Bakat yang tampak" name="bakat"><?=$siswa->result()[0]->bakat?></textarea>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Asal Sekolah</label>
                              <input type="text" name="asalSekolah" value="<?=$siswa->result()[0]->asalSekolah?>" class="form-control" placeholder="Asal Sekolah" required>
                           </div>
                        </div>
                        <h3>Data Orang Tua Kandung - <b>Ayah</b></h3>
                        <div class="row" data-step="3" data-intro="Selanjutnya adalah Isian mengenai Informasi Ayah atau Wali. Apabila Ayah atau Wali tidak bekerja, isi dengan tanda '-' Pada kolom isian" data-position='right'>
                           <div class="form-group col-sm-6">
                              <label>Nama Lengkap</label>
                              <input type="text" name="ayah_namaLengkap" value="<?=$siswa->result()[0]->ayah_namaLengkap?>" placeholder="Nama Lengkap" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tanggal Lahir</label>
                              <input type="text" name="ayah_tanggalLahir" value="<?=date('d/m/Y',strtotime($siswa->result()[0]->ayah_tanggalLahir))?>" id="ayah_tanggalLahir" class="form-control datepicker" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tempat Lahir</label>
                              <input type="text" name="ayah_tempatLahir" value="<?=$siswa->result()[0]->ayah_tempatLahir?>" placeholder="Kota Kelahiran" class="form-control" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-7">
                              <label>Alamat Rumah</label>
                              <input type="text" name="ayah_alamat" value="<?=$siswa->result()[0]->ayah_alamat?>" placeholder="Nama jalan,Kota" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-2">
                              <label>Nomor HP</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ayah_phone?>" name="ayah_phone" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Nomor Telepon</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ayah_telepon?>" name="ayah_telepon" placeholder="Nomor Telepon" class="form-control">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Alamat Email</label>
                              <input type="email" name="ayah_email" value="<?=$siswa->result()[0]->ayah_email?>" placeholder="Alamat Email" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Kewarganegaraan</label>
                              <select name="ayah_kewarganegaraan" id="ayah_kewarganegaraan" class="form-control" required>
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="WNI" <?php if($siswa->result()[0]->ayah_kewarganegaraan == "WNI"){echo 'selected';}?>>Warga Negara Indonesia</option>
                                 <option value="WNA" <?php if($siswa->result()[0]->ayah_kewarganegaraan == "WNA"){echo 'selected';}?>>Warga Negara Asing</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Suku</label>
                              <input type="text" name="ayah_suku" class="form-control" value="<?=$siswa->result()[0]->ayah_suku?>" required placeholder="Suku">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Kode POS</label>
                              <input type="number" onkeypress="return isNumber(event)" maxlength="6" value="<?=$siswa->result()[0]->ayah_pos?>" name="ayah_pos" placeholder="Kode Pos" class="form-control" >
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Pendidikan Terakhir</label>
                              <select name="ayah_lastDegree" id="ayah_lastDegree" class="form-control" required="">
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="SMP" <?php if($siswa->result()[0]->ayah_lastDegree == "SMP"){echo 'selected';}?>>SMP</option>
                                 <option value="SMA" <?php if($siswa->result()[0]->ayah_lastDegree == "SMA"){echo 'selected';}?>>SMA</option>
                                 <option value="DIPLOMA" <?php if($siswa->result()[0]->ayah_lastDegree == "DIPLOMA"){echo 'selected';}?>>DIPLOMA</option>
                                 <option value="S1" <?php if($siswa->result()[0]->ayah_lastDegree == "S1"){echo 'selected';}?>>S1</option>
                                 <option value="S2"  <?php if($siswa->result()[0]->ayah_lastDegree == "S2"){echo 'selected';}?>>S2</option>
                                 <option value="S3" <?php if($siswa->result()[0]->ayah_lastDegree == "S3"){echo 'selected';}?>>S3</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Almamater</label>
                              <input type="text" name="ayah_almamater" value="<?=$siswa->result()[0]->ayah_almamater?>" placeholder="Almamater" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Jurusan/Program Studi</label>
                              <input type="text" name="ayah_jurusan" value="<?=$siswa->result()[0]->ayah_jurusan?>" class="form-control" placeholder="Nama Program Studi" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Bidang Pekerjaan</label>
                              <input type="text" name="ayah_bidKerjaan" value="<?=$siswa->result()[0]->ayah_bidKerjaan?>" class="form-control" required>
                           </div>
                           <!-- <div class="form-group col-sm-3">
                              <label>Nama Instansi/Kantor</label>
                              <input type="text" placeholder="Nama Instansi/Kantor" name="ayah_kantor" class="form-control" value="<?=$siswa->result()[0]->ayah_kantor?>" >
                              </div> -->
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Alamat Kantor</label>
                              <input type="text" name="ayah_alamatKantor" value="<?=$siswa->result()[0]->ayah_alamatKantor?>" placeholder="Jalan, Kota" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Jabatan</label>
                              <input type="text" name="ayah_jabatan" value="<?=$siswa->result()[0]->ayah_jabatan?>" placeholder="Posisi/Jabatan" class="form-control" >
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Nama Instansi/Kantor</label>
                              <input type="text" placeholder="Nama Instansi/Kantor" name="ayah_kantor" class="form-control" value="<?=$siswa->result()[0]->ayah_kantor?>" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Jumlah Jam Kerja per Pekan</label>
                              <div class="form-group">
                                 <label class="sr-only" for="exampleInputAmount">jumlah Jam</label>
                                 <div class="input-group">
                                    <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ayah_jmlJamKerja?>" min="0" name="ayah_jmlJamKerja" class="form-control" placeholder="Jumlah jam" required>
                                    <div class="input-group-addon">Jam</div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Waktu untuk Keluarga per Pekan</label>
                              <div class="form-group">
                                 <label class="sr-only" for="exampleInputAmount">jumlah Jam</label>
                                 <div class="input-group">
                                    <input type="number" onkeypress="return isNumber(event)" min="0" name="ayah_jmlJamKeluarga" value="<?=$siswa->result()[0]->ayah_jmlJamKeluarga?>" class="form-control" placeholder="Jumlah Jam" required>
                                    <div class="input-group-addon">Jam</div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>NIK Ayah</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ayah_nik?>" name="ayah_nik" placeholder="Nomor Induk Kependudukan" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Penghasilan per Bulan</label>
                              <select class="form-control" name="ayah_penghasilan" id="ayah_penghasilan" required>
                                 <option selected disabled>--Pilih--</option>
                                 <option value="Rp. 1.000.000 - Rp. 3.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Rp. 1.000.000 - Rp. 3.000.000"){echo 'selected';}?>>Rp. 1.000.000 - Rp. 3.000.000</option>
                                 <option value="Rp. 3.100.000 - Rp. 6.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Rp. 3.100.000 - Rp. 6.000.000"){echo 'selected';}?>>Rp. 3.100.000 - Rp. 6.000.000</option>
                                 <option value="Rp. 6.100.000 - Rp. 9.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Rp. 6.100.000 - Rp. 9.000.000"){echo 'selected';}?>>Rp. 6.100.000 - Rp. 9.000.000</option>
                                 <option value="Rp. 9.100.000 - Rp. 12.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Rp. 9.100.000 - Rp. 12.000.000"){echo 'selected';}?>>Rp. 9.100.000 - Rp. 12.000.000</option>
                                 <option value="Rp. 12.100.000 - Rp. 15.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Rp. 12.100.000 - Rp. 15.000.000"){echo 'selected';}?>>Rp. 12.100.000 - Rp. 15.000.000</option>
                                 <option value="Lebih dari Rp. 15.000.000" <?php if($siswa->result()[0]->ayah_penghasilan == "Lebih dari Rp. 15.000.000"){echo 'selected';}?>>Lebih dari Rp. 15.000.000</option>
                                 <option value="Tidak Memiliki Penghasilan" <?php if($siswa->result()[0]->ibu_penghasilan == "Tidak Memiliki Penghasilan"){echo 'selected';}?>>Tidak Memiliki Penghasilan</option>
                              </select>
                           </div>
                        </div>
                        <h3>Data Orang Tua Kandung - <b>Ibu</b></h3>
                        <div class="row" data-step="4" data-intro="Selanjutnya adalah Isian mengenai Ibu dari Anak Didik. Apabila Ibu tidak bekerja, isi dengan tanda '-' Pada kolom isian" data-position='right'>
                           <div class="form-group col-sm-6">
                              <label>Nama Lengkap</label>
                              <input type="text" name="ibu_namaLengkap" value="<?=$siswa->result()[0]->ibu_namaLengkap?>" placeholder="Nama Lengkap" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tanggal Lahir</label>
                              <input type="text" name="ibu_tanggalLahir" value="<?=date('d/m/Y',strtotime($siswa->result()[0]->ibu_tanggalLahir))?>" class="form-control datepicker" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Tempat Lahir</label>
                              <input type="text" name="ibu_tempatLahir" value="<?=$siswa->result()[0]->ibu_tempatLahir?>" placeholder="Kota/Kabupaten" class="form-control" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-7">
                              <label>Alamat Rumah</label>
                              <input type="text" name="ibu_alamat" value="<?=$siswa->result()[0]->ibu_alamat?>" placeholder="Jalan, Kota" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-2">
                              <label>Nomor HP</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ibu_phone?>" name="ibu_phone" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Nomor Telepon</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ibu_telepon?>" name="ibu_telepon" placeholder="021-..." class="form-control">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Alamat Email</label>
                              <input type="email" name="ibu_email" placeholder="Alamat Email" value="<?=$siswa->result()[0]->ibu_email?>" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Kewarganegaraan</label>
                              <select name="ibu_kewarganegaraan" id="ibu_kewarganegaraan" class="form-control" required="">
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="WNI" <?php if($siswa->result()[0]->ibu_kewarganegaraan == "WNI"){echo 'selected';}?>>Warga Negara Indonesia</option>
                                 <option value="WNA" <?php if($siswa->result()[0]->ibu_kewarganegaraan == "WNA"){echo 'selected';}?>>Warga Negara Asing</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Suku</label>
                              <input type="text" name="ibu_suku" value="<?=$siswa->result()[0]->ibu_suku?>" class="form-control" required placeholder="Suku">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Kode POS</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ibu_pos?>" name="ibu_pos" class="form-control" >
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Pendidikan Terakhir</label>
                              <select name="ibu_lastDegree" id="ibu_lastDegree" class="form-control" required>
                                 <option disabled selected>-- PILIH --</option>
                                 <option value="SMP" <?php if($siswa->result()[0]->ibu_lastDegree == "SMP"){echo 'selected';}?>>SMP</option>
                                 <option value="SMA" <?php if($siswa->result()[0]->ibu_lastDegree == "SMA"){echo 'selected';}?>>SMA</option>
                                 <option value="DIPLOMA" <?php if($siswa->result()[0]->ibu_lastDegree == "DIPLOMA"){echo 'selected';}?>>DIPLOMA</option>
                                 <option value="S1" <?php if($siswa->result()[0]->ibu_lastDegree == "S1"){echo 'selected';}?>>S1</option>
                                 <option value="S2"  <?php if($siswa->result()[0]->ibu_lastDegree == "S2"){echo 'selected';}?>>S2</option>
                                 <option value="S3" <?php if($siswa->result()[0]->ibu_lastDegree == "S3"){echo 'selected';}?>>S3</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Almamater</label>
                              <input type="text" name="ibu_almamater" value="<?=$siswa->result()[0]->ibu_almamater?>" placeholder="Almamater" class="form-control">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Jurusan/Program Studi</label>
                              <input type="text" name="ibu_jurusan" value="<?=$siswa->result()[0]->ibu_jurusan?>" class="form-control" placeholder="Jurusan/Program Studi" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Bidang Pekerjaan</label>
                              <input type="text" name="ibu_bidKerjaan" value="<?=$siswa->result()[0]->ibu_bidKerjaan?>" class="form-control" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Alamat Kantor</label>
                              <input type="text" name="ibu_alamatKantor" value="<?=$siswa->result()[0]->ibu_alamatKantor?>" placeholder="Kota/Kabupaten" class="form-control">
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Jabatan</label>
                              <input type="text" name="ibu_jabatan" value="<?=$siswa->result()[0]->ibu_jabatan?>" placeholder="Kota/Kabupaten" placeholder="Posisi/Jabatan" class="form-control" >
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Nama Instansi/Kantor</label>
                              <input type="text" placeholder="Nama Instansi/Kantor" name="ibu_kantor" value="<?=$siswa->result()[0]->ibu_kantor?>" class="form-control">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-3">
                              <label>Jumlah Jam Kerja </label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ibu_jmlJamKerja?>" name="ibu_jmlJamKerja" class="form-control" placeholder="dalam Sepekan" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Waktu Untuk Keluarga</label>
                              <input type="number" value="<?=$siswa->result()[0]->ibu_jmlJamKeluarga?>" name="ibu_jmlJamKeluarga" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>NIK Ibu</label>
                              <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->ibu_nik?>" name="ibu_nik" placeholder="Nomor Induk Kependudukan" class="form-control" required>
                           </div>
                           <div class="form-group col-sm-3">
                              <label>Penghasilan per Bulan</label>
                              <select class="form-control" name="ibu_penghasilan" id="ibu_penghasilan" required>
                                 <option selected disabled>--Pilih--</option>
                                 <option value="Rp. 1.000.000 - Rp. 3.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Rp. 1.000.000 - Rp. 3.000.000"){echo 'selected';}?>>Rp. 1.000.000 - Rp. 3.000.000</option>
                                 <option value="Rp. 3.100.000 - Rp. 6.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Rp. 3.100.000 - Rp. 6.000.000"){echo 'selected';}?>>Rp. 3.100.000 - Rp. 6.000.000</option>
                                 <option value="Rp. 6.100.000 - Rp. 9.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Rp. 6.100.000 - Rp. 9.000.000"){echo 'selected';}?>>Rp. 6.100.000 - Rp. 9.000.000</option>
                                 <option value="Rp. 9.100.000 - Rp. 12.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Rp. 9.100.000 - Rp. 12.000.000"){echo 'selected';}?>>Rp. 9.100.000 - Rp. 12.000.000</option>
                                 <option value="Rp. 12.100.000 - Rp. 15.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Rp. 12.100.000 - Rp. 15.000.000"){echo 'selected';}?>>Rp. 12.100.000 - Rp. 15.000.000</option>
                                 <option value="Lebih dari Rp. 15.000.000" <?php if($siswa->result()[0]->ibu_penghasilan == "Lebih dari Rp. 15.000.000"){echo 'selected';}?>>Lebih dari Rp. 15.000.000</option>
                                 <option value="Tidak Memiliki Penghasilan" <?php if($siswa->result()[0]->ibu_penghasilan == "Tidak Memiliki Penghasilan"){echo 'selected';}?>>Tidak Memiliki Penghasilan</option>
                              </select>
                           </div>
                        </div>
                        <!-- <div class="row"> -->
                        <input type="checkbox" name="wali_c" id="c_wali" <?php if($siswa->result()[0]->isWali != NULL){echo 'checked="true"';} ?>> Mempunyai Wali selain orang tua.
                        <!-- </div> -->
                        <div id="wali_c">
                           <h3>Data Wali  - <b><?=$siswa->result()[0]->posisiWali?></b></h3>
                           <div class="row" >
                              <div class="form-group col-sm-6">
                                 <label>Nama Lengkap Wali</label>
                                 <input type="text" name="wali_namaLengkap" value="<?=$siswa->result()[0]->wali_namaLengkap?>" placeholder="Nama Lengkap" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Tanggal Lahir</label>
                                 <?php
                                    if($siswa->result()[0]->ayah_tanggalLahir != NULL){
                                       ?><input type="text" name="wali_tanggalLahir" value="<?=date('d/m/Y',strtotime($siswa->result()[0]->wali_tanggalLahir))?>" id="wali_tanggalLahir" class="form-control datepicker" required><?php
                                    }else{
                                       ?><input type="text" name="wali_tanggalLahir" id="wali_tanggalLahir" class="form-control datepicker" required><?php
                                    }
                                    ?>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Tempat Lahir</label>
                                 <input type="text" name="wali_tempatLahir" value="<?=$siswa->result()[0]->wali_tempatLahir?>" placeholder="Kota/Kabupaten" class="form-control" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-sm-7">
                                 <label>Alamat Rumah Wali</label>
                                 <input type="text" name="wali_alamat" value="<?=$siswa->result()[0]->wali_alamat?>" placeholder="Jalan, Kota" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Nomor HP</label>
                                 <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->wali_phone?>" name="wali_phone" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Hubungan Terhadap Anak</label>
                                 <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->wali_telepon?>" name="waliPosisi" placeholder="021-..." class="form-control">
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-sm-3">
                                 <label>Alamat Email</label>
                                 <input type="email" name="wali_email" placeholder="Alamat Email" value="<?=$siswa->result()[0]->wali_email?>" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Kewarganegaraan</label>
                                 <select name="wali_kewarganegaraan" id="wali_kewarganegaraan" class="form-control" required="">
                                    <option disabled selected>-- PILIH --</option>
                                    <option value="WNI" <?php if($siswa->result()[0]->wali_kewarganegaraan == "WNI"){echo 'selected';}?>>Warga Negara Indonesia</option>
                                    <option value="WNA" <?php if($siswa->result()[0]->wali_kewarganegaraan == "WNA"){echo 'selected';}?>>Warga Negara Asing</option>
                                 </select>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Suku</label>
                                 <input type="text" name="wali_suku" value="<?=$siswa->result()[0]->wali_suku?>" class="form-control" required placeholder="Suku">
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Kode POS</label>
                                 <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->wali_pos?>" name="wali_pos" class="form-control" >
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-sm-3">
                                 <label>Pendidikan Terakhir</label>
                                 <select name="wali_lastDegree" id="wali_lastDegree" class="form-control" required>
                                    <option disabled selected>-- PILIH --</option>
                                    <option value="SMP" <?php if($siswa->result()[0]->wali_lastDegree == "SMP"){echo 'selected';}?>>SMP</option>
                                    <option value="SMA" <?php if($siswa->result()[0]->wali_lastDegree == "SMA"){echo 'selected';}?>>SMA</option>
                                    <option value="DIPLOMA" <?php if($siswa->result()[0]->wali_lastDegree == "DIPLOMA"){echo 'selected';}?>>DIPLOMA</option>
                                    <option value="S1" <?php if($siswa->result()[0]->wali_lastDegree == "S1"){echo 'selected';}?>>S1</option>
                                    <option value="S2"  <?php if($siswa->result()[0]->wali_lastDegree == "S2"){echo 'selected';}?>>S2</option>
                                    <option value="S3" <?php if($siswa->result()[0]->wali_lastDegree == "S3"){echo 'selected';}?>>S3</option>
                                 </select>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Almamater</label>
                                 <input type="text" name="wali_almamater" value="<?=$siswa->result()[0]->wali_almamater?>" placeholder="Almamater" class="form-control">
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Jurusan/Program Studi</label>
                                 <input type="text" name="wali_jurusan" value="<?=$siswa->result()[0]->wali_jurusan?>" class="form-control" placeholder="Jurusan/Program Studi" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Bidang Pekerjaan</label>
                                 <input type="text" name="wali_bidKerjaan" value="<?=$siswa->result()[0]->wali_bidKerjaan?>" class="form-control" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-sm-6">
                                 <label>Alamat Kantor</label>
                                 <input type="text" name="wali_alamatKantor" value="<?=$siswa->result()[0]->wali_alamatKantor?>" placeholder="Kota/Kabupaten" class="form-control">
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Jabatan</label>
                                 <input type="text" name="wali_jabatan" value="<?=$siswa->result()[0]->wali_jabatan?>" placeholder="Kota/Kabupaten" placeholder="Posisi/Jabatan" class="form-control" >
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Nama Instansi/Kantor</label>
                                 <input type="text" placeholder="Nama Instansi/Kantor" name="wali_kantor" value="<?=$siswa->result()[0]->wali_kantor?>" class="form-control">
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-sm-3">
                                 <label>Jumlah Jam Kerja </label>
                                 <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->wali_jmlJamKerja?>" name="wali_jmlJamKerja" class="form-control" placeholder="dalam Sepekan" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Waktu Untuk Keluarga</label>
                                 <input type="number" value="<?=$siswa->result()[0]->wali_jmlJamKeluarga?>" name="wali_jmlJamKeluarga" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>NIK wali</label>
                                 <input type="number" onkeypress="return isNumber(event)" value="<?=$siswa->result()[0]->wali_nik?>" name="wali_nik" placeholder="Nomor Induk Kependudukan" class="form-control" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Penghasilan per Bulan</label>
                                 <select class="form-control" name="wali_penghasilan" id="wali_penghasilan" required>
                                    <option selected disabled>--Pilih--</option>
                                    <option value="Rp. 1.000.000 - Rp. 3.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Rp. 1.000.000 - Rp. 3.000.000"){echo 'selected';}?>>Rp. 1.000.000 - Rp. 3.000.000</option>
                                    <option value="Rp. 3.100.000 - Rp. 6.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Rp. 3.100.000 - Rp. 6.000.000"){echo 'selected';}?>>Rp. 3.100.000 - Rp. 6.000.000</option>
                                    <option value="Rp. 6.100.000 - Rp. 9.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Rp. 6.100.000 - Rp. 9.000.000"){echo 'selected';}?>>Rp. 6.100.000 - Rp. 9.000.000</option>
                                    <option value="Rp. 9.100.000 - Rp. 12.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Rp. 9.100.000 - Rp. 12.000.000"){echo 'selected';}?>>Rp. 9.100.000 - Rp. 12.000.000</option>
                                    <option value="Rp. 12.100.000 - Rp. 15.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Rp. 12.100.000 - Rp. 15.000.000"){echo 'selected';}?>>Rp. 12.100.000 - Rp. 15.000.000</option>
                                    <option value="Lebih dari Rp. 15.000.000" <?php if($siswa->result()[0]->wali_penghasilan == "Lebih dari Rp. 15.000.000"){echo 'selected';}?>>Lebih dari Rp. 15.000.000</option>
                                    <option value="Tidak Memiliki Penghasilan" <?php if($siswa->result()[0]->wali_penghasilan == "Tidak Memiliki Penghasilan"){echo 'selected';}?>>Tidak Memiliki Penghasilan</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" data-step="5" data-intro="Tahap terakhir, Tekan tombol Daftar untuk mengirim data pendaftaran" data-position='right'>
                           <button type="submit" onkeypress="return isNumber(event)" class="btn btn-lg btn-primary btn-block">Simpan</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane" id="tab_1">
                     <div class="box box-solid box-success" data-widget="box-widget">
                        <div class="box-header">
                           <h3 class="box-title">Panduan Pengisian</h3>
                           <div class="box-tools">
                              <a class="btn btn-box-tool" onclick="edit('f_tab_1')" data-toggle="tooltip" title="Edit">Edit</a>

                              <!-- This will cause the box to be removed when clicked -->
                              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                              <!-- This will cause the box to collapse when clicked -->
                              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="box-body">
                           <p>
                           <ul>
                              <li>Isi kolom input dibawah ini yang masih kosong.</li>
                              <li>Kolom input dengan Label bertanda * ,wajib untuk disi.</li>
                              <li>Tekan tombol "Tambah" untuk menambahkan riwayat Penyakit.</li>
                              <li>Isi kolom input riwayat penyakit sesuai dengan petunjuk pada kolom inputan.</li>
                           </ul>
                           </p>
                        </div>
                     </div>
                     <form id="f_tab_1" method="POST" action="<?=base_url()?>Dashboard/save/penyakit/<?=$this->uri->segment(4);?>">
                        <div class="row">
                           <div class="form-group col-sm-5">
                              <label>Tinggi Badan</label>
                              <div class="input-group">
                                 <input type="number" name="tinggi" value="<?=$siswa->result()[0]->tinggi?>" class="form-control" placeholder="dalam Cm" required>
                                 <span class="input-group-addon">Centimeter</span>
                              </div>
                           </div>
                           <div class="form-group col-sm-5">
                              <label>Berat Badan</label>
                              <div class="input-group">
                                 <input type="number" name="berat" value="<?=$siswa->result()[0]->berat?>" class="form-control" placeholder="dalam Kg" required>
                                 <span class="input-group-addon">Kilogram</span>
                              </div>
                           </div>
                           <div class="form-group col-sm-2">
                              <!-- <label>dsa</label> -->
                              <input type="button" style="margin-top: 25px;" class="btn btn-default btn-block" onclick="tambahPenyakit()" id="add-penyakit" value="Tambah">
                           </div>
                        </div>
                        <div id="div_penyakit">
                           <?php
                              if (count($penyakit->result()) != 0) {
                                foreach ($penyakit->result() as $key) {
                              ?>
                           <div class="row">
                              <div class="form-group col-sm-2">
                                 <label>Nama Penyakit</label>
                                 <input type="text" name="namaPenyakit[]" value="<?=$key->namaPenyakit?>" class="form-control" placeholder="Nama Penyakit" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Tahun</label>
                                 <input type="number" onkeypress="return isNumber(event)" name="tahunPenyakit[]" value="<?=$key->tahunPenyakit?>" class="form-control" placeholder="Tahun" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Pengobatan/Terapi</label>
                                 <input type="text" name="pengobatan[]" value="<?=$key->pengobatan?>" class="form-control" placeholder="Sebutkan Nama Pengobatan/Terapi" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Pantangan</label>
                                 <input type="text" name="pantangan[]" value="<?=$key->pantangan?>" class="form-control" placeholder="Pantangan" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Status</label>
                                 <select class="form-control" name="statusPenyakit[]" >
                                    <option selected disabled>--Pilih</option>
                                    <option value="sembuh" <?php if($key->statusPenyakit == 'Sembuh'){ echo 'selected';} ?>>Sembuh</option>
                                    <option value="Dalam Pengobatan" <?php if($key->statusPenyakit == 'Dalam Pengobatan'){ echo 'selected';} ?>>Dalam Pengobatan</option>
                                 </select>
                              </div>
                           </div>
                           <?php
                              }
                              }else{
                              ?>
                           <div class="row">
                              <div class="form-group col-sm-2">
                                 <label>Nama Penyakit</label>
                                 <input type="text" name="namaPenyakit[]" class="form-control" placeholder="Nama Penyakit" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Tahun</label>
                                 <input type="number" onkeypress="return isNumber(event)" name="tahunPenyakit[]" class="form-control" placeholder="Tahun" required>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Pengobatan/Terapi</label>
                                 <input type="text" name="pengobatan[]"  class="form-control" placeholder="Sebutkan Nama Pengobatan/Terapi" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Pantangan</label>
                                 <input type="text" name="pantangan[]"  class="form-control" placeholder="Pantangan" required>
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Status</label>
                                 <select class="form-control" name="statusPenyakit[]" >
                                    <option selected disabled>--Pilih</option>
                                    <option>Sembuh</option>
                                    <option>Dalam Pengobatan</option>
                                 </select>
                              </div>
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary btn-lg btn-block">Simpan</button>
                        </div>
                     </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                     <div class="box box-solid box-success" data-widget="box-widget">
                        <div class="box-header">
                           <h3 class="box-title">Panduan Pengisian</h3>
                           <div class="box-tools">
                              <a class="btn btn-box-tool" onclick="edit('f_tab_2')" data-toggle="tooltip" title="Edit">Edit</a>

                              <!-- This will cause the box to be removed when clicked -->
                              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                              <!-- This will cause the box to collapse when clicked -->
                              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="box-body">
                           <p>
                           <ul>
                              <li>Isi kolom input dibawah ini yang masih kosong.</li>
                              <li>Kolom input dengan Label bertanda * ,wajib untuk disi.</li>
                           </ul>
                           </p>
                        </div>
                     </div>
                     <form id="f_tab_2" action="<?=base_url()?>Dashboard/save/kelahiran/<?=$this->uri->segment(4);?>" method="POST">
                        <ol>
                           <li>
                              <span>Pra Kelahiran</span>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Kondisi Kehamilan</label>
                                       <select class="form-control" name="kondisiKelahiran" id="kondisiKelahiran">
                                          <option disabled selected>-- PILIH -- </option>
                                          <option value="Cukup Bulan">Cukup Bulan</option>
                                          <option value="Kurang Bulan">Kurang Bulan</option>
                                       </select>
                                    </div>
                                 </div>
                                 <!-- </div>
                                    <div class="row"> -->
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Kondisi Ibu</label>
                                       <select class="form-control" name="kondisiIbu" id="kondisiIbu">
                                          <option disabled selected>-- PILIH -- </option>
                                          <option value="Sehat">Sehat</option>
                                          <option value="Bermasalah">Bermasalah</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Kondisi Linkungan</label>
                                 <input type="text" class="form-control" placeholder="Pedesaan/Perkotaan/Lingkungan Pantai/Sebutkan" name="kondisiLingkungan" id="kondisiLingkungan">
                              </div>
                              <div class="form-group">
                                 <label>Selama kehamilan pernah mengalami perawatan di rumah sakit.</label>
                                 <select class="form-control" name="pernahRawat" id="pernahRawat">
                                    <option disabled selected>-- PILIH -- </option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                 </select>
                              </div>
                           </li>
                           <li>
                              Kelahiran
                              <div class="row">
                                 <div class="form-group col-sm-4">
                                    <label>Usia Kelahiran (dalam pekan)</label>
                                    <div class="input-group">
                                       <input type="number"  name="usiaKelahiran" onkeypress="return isNumber(event)" placeholder="usia kelahiran" class="form-control " id="usiaKelahiran" required>
                                       <div class="input-group-addon">Pekan</div>
                                    </div>
                                 </div>
                                 <!-- <div class="form-group col-sm-4">
                                    <label>Usia Kelahiran (Hari)</label>
                                    <input type="text" name="" class="form-control ">
                                    </div> -->
                                 <div class="form-group col-sm-4">
                                    <label>Apakah ada kasus khusus penyebab kelahiran?</label>
                                    <input type="text" name="kasusKhusus" class="form-control " id="kasusKhusus">
                                 </div>
                                 <!-- </div>
                                    <div class="row"> -->
                                 <div class="form-group col-sm-3">
                                    <label>Proses Kelahiran</label>
                                    <select class="form-control" name="prosesKelahiran" id="prosesKelahiran">
                                       <option disabled selected>-- PILIH -- </option>
                                       <option>Spontan</option>
                                       <option>Vacum</option>
                                       <option>Caesar</option>
                                       <option>Forceps</option>
                                    </select>
                                 </div>
                              </div>
                           </li>
                           <li>
                              Riwayat Perkembangan Anak
                              <div class="row">
                                 <div class="form-group col-sm-2">
                                    <label>Tengkurap pada Usia</label>
                                    <div class="input-group">
                                       <input type="number" name="tengkurap" placeholder="0" class="form-control" onkeypress="return isNumber(event)" id="tengkurap" required>
                                       <div class="input-group-addon">Bulan</div>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-2">
                                    <label>Merangkak pada Usia</label>
                                    <div class="input-group">
                                       <input type="number" name="merangkak" placeholder="0" class="form-control" onkeypress="return isNumber(event)" id="merangkak" required>
                                       <div class="input-group-addon">Bulan</div>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-2">
                                    <label>Berjalan pada Usia</label>
                                    <div class="input-group">
                                       <input type="number" name="berjalan" placeholder="0" class="form-control" onkeypress="return isNumber(event)" id="berjalan" required>
                                       <div class="input-group-addon">Bulan</div>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-2">
                                    <label>Berbicara 2 suku kata</label>
                                    <div class="input-group">
                                       <input type="number" name="bicara" placeholder="0" class="form-control" onkeypress="return isNumber(event)" id="bicara" required>
                                       <div class="input-group-addon">Bulan</div>
                                    </div>
                                 </div>

                                 <div class="form-group col-sm-2">
                                    <label>Mengerti Diperintah</label>
                                    <div class="input-group">
                                       <input type="number" name="diperintah" placeholder="0" class="form-control" onkeypress="return isNumber(event)" id="diperintah" required>
                                       <div class="input-group-addon">Bulan</div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              Karakter Anak
                              <div class="row">
                                 <div class="form-group col-sm-4">
                                    <label>Tuliskan Karakter Anak</label>
                                    <input type="text" name="karakter1" class="form-control" id="karakter1">
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label>Tuliskan Karakter Anak</label>
                                    <input type="text" name="karakter2" class="form-control" id="karakter2">
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label>Tuliskan Karakter Anak</label>
                                    <input type="text" name="karakter3" class="form-control" id="karakter3">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-sm-4">
                                    <label>Tuliskan Karakter Anak</label>
                                    <input type="text" name="karakter4" class="form-control" id="karakter4">
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label>Tuliskan Karakter Anak</label>
                                    <input type="text" name="karakter5" class="form-control" id="karakter5">
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <div class="form-group">
                           <button type="submit" class="btn btn-block btn-lg btn-primary">Simpan</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane" id="tab_4">
                     <div class="box box-solid box-success" data-widget="box-widget">
                        <div class="box-header">
                           <h3 class="box-title">Panduan Pengisian</h3>
                           <div class="box-tools">
                              <a class="btn btn-box-tool" onclick="edit('f_tab_4')" data-toggle="tooltip" title="Edit">Edit</a>

                              <!-- This will cause the box to be removed when clicked -->
                              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                              <!-- This will cause the box to collapse when clicked -->
                              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="box-body">
                           <p>
                           <ul>
                              <li>Mohon untuk dibaca dengan perlahan dan teliti.</li>
                              <li>Terdapat 61 Pernyataan, beri tanda ceklis atau klik pada kotak disebelah kiri tiap-tiap pernyataan.</li>
                              <li>Tekan tombol "Simpan" untuk menyimpan perubahan</li>
                           </ul>
                           </p>
                        </div>
                     </div>
                     <form id="f_tab_4" action="<?=base_url()?>Dashboard/save/perkembangan/<?=$this->uri->segment(4);?>" method="POST">
                        <table class="table table-hover">
                           <tbody>
                              <tr>
                                 <td >
                                    <label><input type="checkbox" value="1" name="dataPerkembangan[0]" id="dataPerkembangan1"></label>
                                 </td>
                                 <td>
                                    <p>Menjadi takut, cemas atau agresif dengan sentuhan ringan atau sentuhan yang tidak diduga</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[1]" id="dataPerkembangan2"></label></td>
                                 <td>
                                    <p>Terlihat ketakutan atau menghindari berdekatan dengan teman atau orang lain (terutama dalam barisan)</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[2]" id="dataPerkembangan3"></label></td>
                                 <td>
                                    <p>Protes ketika disisir, memilih menggunakan sisir tertentu</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[3]" id="dataPerkembangan4"></label></td>
                                 <td>
                                    <p>Menolak menggunakan tangan untuk bermain </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[4]" id="dataPerkembangan5"></label></td>
                                 <td>
                                    <p>Menolak/tidak menyukai/enggan terhadap permainan kotor seperti pasir, lumpur, air, lem, <em>glitter</em>, lilin mainan, berlendir, busa cukur dll</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[5]" id="dataPerkembangan6"></label></td>
                                 <td>
                                    <p>Akan kesulitan dengan tangan yang kotor dan ingin mengelap dan/atau mencucinya segera</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[6]" id="dataPerkembangan7"></label></td>
                                 <td>
                                    <p>Kesulitan dengan sentuhan pakaian terhadap kulit, memilih mengenakan celana pendek, lengan pendek, ketika balita lebih memilih tidak mengenakan pakaian dan sering melepas popok atau pakaian</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[7]" id="dataPerkembangan8"></label></td>
                                 <td>
                                    <p>Atau meminta mengenakan lengan panjang atau celana panjang menghindari kulit terpapar</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[8]" id="dataPerkembangan9"></label></td>
                                 <td>
                                    <p>Kesulitan ketika potong rambut atau potong kuku</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[9]" id="dataPerkembangan10"></label></td>
                                 <td>
                                    <p>Memilih makan, hanya memakan makanan dengan rasa tertentu dan tekstur tertentu, makanan dengan tekstur yang bercampur, makanan panas atau dingin, menolak mencoba makanan baru</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[10]" id="dataPerkembangan11"></label></td>
                                 <td>
                                    <p>Berjinjit jika berjalan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[11]" id="dataPerkembangan12"></label></td>
                                 <td>
                                    <p>Mencari sentuhan, butuh menyentuh segalanya dan setiap orang</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[12]" id="dataPerkembangan13"></label></td>
                                 <td>
                                    <p>Tidak sadar terhadap sentuhan/menabrak kecuali dengan tenaga yang kuat atau sering</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[13]" id="dataPerkembangan14"></label></td>
                                 <td>
                                    <p>Mengunyah benda secara berlebihan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[14]" id="dataPerkembangan15"></label></td>
                                 <td>
                                    <p>Berulang kali menyentuh permukaan atau benda yang menenangkan (misalkan selimut)</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[15]" id="dataPerkembangan16"></label></td>
                                 <td>
                                    <p>Mencari getaran atau input sensori yang kuat</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[16]" id="dataPerkembangan17"></label></td>
                                 <td>
                                    <p>Kesulitan dengan tugas motorik halus seperti mengancing, menutup/membuka ritsleting dan mengikat</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[17]" id="dataPerkembangan18"></label></td>
                                 <td>
                                    <p>Kesulitan menggunakan gunting, krayon, atau peralatan makan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[18]" id="dataPerkembangan19"></label></td>
                                 <td>
                                    <p>Menghindari/tidak menyukai permainan ditaman bermain seperti ayunan, tangga, perosotan atau komedi putar</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[19]" id="dataPerkembangan20"></label></td>
                                 <td>
                                    <p>Terlihat takut jatuh meskipun tidak ada hal yang benar &ndash; benar beresiko</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[20]" id="dataPerkembangan21"></label></td>
                                 <td>
                                    <p>Takut naik turun tangga atau berjalan di permukaan yang tidak rata</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[21]" id="dataPerkembangan22"></label></td>
                                 <td>
                                    <p>Takut jika dibalik posisi kepala di bawah, berjalan menyamping atau ke belakang; sangat menolak keramas di bawah keran</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[22]" id="dataPerkembangan23"></label></td>
                                 <td>
                                    <p>Mudah kehilangan keseimbangan dan terlihat ceroboh</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[23]" id="dataPerkembangan24"></label></td>
                                 <td>
                                    <p>Menolak gerakan berputar atau cepat </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[24]" id="dataPerkembangan25"></label></td>
                                 <td>
                                    <p>Selalu bergerak, terlihat seperti tidak bisa diam</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[25]" id="dataPerkembangan26"></label></td>
                                 <td>
                                    <p>Selalu loncat di <span style="font-family: Calibri, serif;"><span style="font-size: small;"><em>furniture, trampoline,</em><span style="font-family: Calibri, serif;"><span style="font-size: small;"> berputar di kursi putar atau dalam posisi terbalik</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[26]" id="dataPerkembangan27"></label></td>
                                 <td>
                                    <p>Senang naik ayunan setinggi mungkin dan untuk waktu yang lama</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[27]" id="dataPerkembangan28"></label></td>
                                 <td>
                                    <p>Selalu berlari, loncat, lompat dll dibandingkan berjalan </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[28]" id="dataPerkembangan29"></label></td>
                                 <td>
                                    <p>Menggoyangkan badan, kaki atau kepala ketika duduk</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[29]" id="dataPerkembangan30"></label></td>
                                 <td>
                                    <p>Sering merosot, tiduran, dan/atau menyangga kepa<span style="font-family: Calibri, serif;"><span style="font-size: small;"><span lang="id-ID">l</span><span style="font-family: Calibri, serif;"><span style="font-size: small;">a dengan tangan ketika duduk dikursi</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[30]" id="dataPerkembangan31"></label></td>
                                 <td>
                                    <p>Sering duduk dengan posisi &ldquo;W&rdquo; untuk menstabilkan badan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[31]" id="dataPerkembangan32"></label></td>
                                 <td>
                                    <p>Kesulitan memutar pegangan pintu, membuka dan menutup benda</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[32]" id="dataPerkembangan33"></label></td>
                                 <td>
                                    <p>Kesulitan memakai pakaian dan mengancingkan ritsleting dan kancing </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[33]" id="dataPerkembangan34"></label></td>
                                 <td>
                                    <p>Kemungkinan tidak merangkak ketika bayi</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[34]" id="dataPerkembangan35"></label></td>
                                 <td>
                                    <p>Motorik kasar buruk; loncat, menangkap bola, <span style="font-family: Calibri, serif;"><span style="font-size: small;"><em>jumping jack</em><span style="font-family: Calibri, serif;"><span style="font-size: small;">, memanjat tangga dll</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[35]" id="dataPerkembangan36"></label></td>
                                 <td>
                                    <p>Kesulitan belajar mengikuti gerakan atau tarian</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[36]" id="dataPerkembangan37"></label></td>
                                 <td>
                                    <p>Mengigit atau menghisap jari dan/atau berulang kali melukai buku-buku jari</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[37]" id="dataPerkembangan38"></label></td>
                                 <td>
                                    <p>Berlebihan membenturkan mainan atau menggunakan mainan benda</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[38]" id="dataPerkembangan39"></label></td>
                                 <td>
                                    <p>Menyembunyikan gigi sepanjang hari</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[39]" id="dataPerkembangan40"></label></td>
                                 <td>
                                    <p>Kesulitan mengatur tekanan ketika menulis/menggambar; mungkin terlalu tipis atau terlalu keras sehingga ujung pensil patah</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[40]" id="dataPerkembangan41"></label></td>
                                 <td>
                                    <p>Bermain dengan binatang terlalu kuat, sering seperti mau menyakitinya</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[41]" id="dataPerkembangan42"></label></td>
                                 <td>
                                    <p>Terganggu dengan suara yang biasanya diacuhkan oleh orang lain, misalnya suara kulkas, kipas angin, AC atau detik jam</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[42]" id="dataPerkembangan43"></label></td>
                                 <td>
                                    <p>Takut dengan suara bilasan toilet (terutama di kamar mandi umum), penyedot debu, pengering rambut, bunyi sepatu atau gonggongan anjing</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[43]" id="dataPerkembangan44"></label></td>
                                 <td>
                                    <p>Berlari menghindar, menangis dan/atau menutup telinga karena suara yang keras atau yang tidak diharapkan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[44]" id="dataPerkembangan45"></label></td>
                                 <td>
                                    <p>Sering tidak merespon terhadap petunjuk verbal atau ketika namanya dipanggil</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[45]" id="dataPerkembangan46"></label></td>
                                 <td>
                                    <p>Senang menonton televisi dengan suara sangat keras</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[46]" id="dataPerkembangan47"></label></td>
                                 <td>
                                    <p>Membutuhkan arahan berulang atau akan bertanya &ldquo;apa&rdquo; berulang</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[47]" id="dataPerkembangan48"></label></td>
                                 <td>
                                    <p>Pemilih makanan, sering dengan pilihan yang aneh, misalnya daftar makanan yang terbatas, memilih merk, menolak mencoba restoran baru dan mungkin tidak mau makan di rumah orang</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[48]" id="dataPerkembangan49"></label></td>
                                 <td>
                                    <p>Kemungkinan muntah karena tekstur makanan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[49]" id="dataPerkembangan50"></label></td>
                                 <td>
                                    <p>Kemungkinan hanya memakan makanan yang lembut </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[50]" id="dataPerkembangan51"></label></td>
                                 <td>
                                    <p>Memiliki kesulitan dengan menghisap, mengunyah dan menelan; kemungkinan tersedak atau takut tersedak </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[51]" id="dataPerkembangan52"></label></td>
                                 <td>
                                    <p>Kemungkinan menjilat, merasakan atau mengunyah benda yang tidak bisa dimakan </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[52]" id="dataPerkembangan53"></label></td>
                                 <td>
                                    <p>Mengeces berlebihan setelah tahapan tumbuh gigi</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[53]" id="dataPerkembangan54"></label></td>
                                 <td>
                                    <p>Berulang kali mengunyah rambut, baju atau tangan</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[54]" id="dataPerkembangan55"></label></td>
                                 <td>
                                    <p>Secara konstan memasukan benda ke mulut setelah masa batita</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[55]" id="dataPerkembangan56"></label></td>
                                 <td>
                                    <p>Bereaksi negatif atau tidak menyukai bau yang biasanya orang lain tidak terganggu atau tidak peduli </p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[56]" id="dataPerkembangan57"></label></td>
                                 <td>
                                    <p>Tidak sadar terhadap bau yang biasanya orang lain terganggu</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[57]" id="dataPerkembangan58"></label></td>
                                 <td>
                                    <p>Sensitif terhadap cahaya yang terang, akan memicingkan mata, menutup, menangis dan/atau pusing</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[58]" id="dataPerkembangan59"></label></td>
                                 <td>
                                    <p>Mudah terganggu dengan stimulus visual di ruangan, misalnya gerakan, hiasan, mainan, jendela atau pintu keluar dll</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[59]" id="dataPerkembangan60"></label></td>
                                 <td>
                                    <p>Menolak kontak mata</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[60]" id="dataPerkembangan61"></label></td>
                                 <td>
                                    <p>Kesulitan mengerjakan <em>puzzle</em>, menyalin bentuk dan/atau menggunting/mengikuti garis</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[61]" id="dataPerkembangan62"></label></td>
                                 <td>
                                    <p>Bingung kanan dan kiri</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[62]" id="dataPerkembangan63"></label></td>
                                 <td>
                                    <p>Kesulitan menyampaikan ide dalam bentuk kata (verbal atau tulisan)</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[63]" id="dataPerkembangan64"></label></td>
                                 <td>
                                    <p>Sering berbicara tidak sesuai giliran atau topik</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td><label><input type="checkbox" value="1" name="dataPerkembangan[64]" id="dataPerkembangan65"></label></td>
                                 <td>
                                    <p>Kesulitan artikulasi dan berbicara yang jelas</p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="form-group">
                           <input type="submit" value="Simpan" class="btn btn-block btn-lg btn-primary">
                        </div>
                     </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                     <div class="box box-solid box-success" data-widget="box-widget">
                        <div class="box-header">
                           <h3 class="box-title">Panduan Pengisian</h3>
                           <div class="box-tools">
                              <a class="btn btn-box-tool" onclick="edit('f_tab_5')" data-toggle="tooltip" title="Edit">Edit</a>

                              <!-- This will cause the box to be removed when clicked -->
                              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                              <!-- This will cause the box to collapse when clicked -->
                              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="box-body">
                           <p>
                           <ul>
                              <li>Mohon untuk dibaca dengan perlahan dan teliti.</li>
                              <li>Isilah jawaban dari pertanyaan dibawah ini dengan jujur.</li>
                              <li>Perhatikan dengan ** sebagai instruksi lanjutan.</li>
                              <li>Tekan tombol "Simpan" untuk menyimpan perubahan.</li>
                           </ul>
                           </p>
                        </div>
                     </div>
                     <form id="f_tab_5" method="POST" action="<?=base_url()?>Dashboard/save/tambahan/<?=$this->uri->segment(4);?>">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label>Kami mendapat informasi tentang Sekolah Alam Indonesia dari : </label>
                              <textarea class="form-control" rows="2" name="pertanyaan1" id="pertanyaan1"><?=$siswa->result()[0]->pertanyaan1?></textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Alasan kami memilih Sekolah Alam Indonesia adalah : </label>
                              <textarea class="form-control" rows="2" name="pertanyaan12" id="pertanyaan12"><?=$siswa->result()[0]->pertanyaan1?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label>Menurut kami, urutan skala prioritas dari akademik, akhlak, dan kepemimpinan adalah (Jelaskan!)</label>
                              <textarea class="form-control" rows="2" name="pertanyaan2" id="pertanyaan2"><?=$siswa->result()[0]->pertanyaan2?></textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Menurut kami, tanggung jawab pendidikan anak ada pada (Jelaskan!)</label>
                              <textarea class="form-control" rows="3" name="pertanyaan3" id="pertanyaan3"><?=$siswa->result()[0]->pertanyaan3?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label>Harapan kami terhadap akhlaq anak kami ketika lulus dari Sekolah Alam Indonesia adalah</label>
                              <textarea class="form-control" rows="1" name="pertanyaan4" id="pertanyaan4"><?=$siswa->result()[0]->pertanyaan4?></textarea>
                           </div>
                           <div class="form-group col-md-4">
                              <label>Harapan kami terhadap karakter kepemimpinan anak kami ketika lulus dari Sekolah Alam Indonesia adalah</label>
                              <textarea class="form-control" rows="2" name="pertanyaan5" id="pertanyaan5"><?=$siswa->result()[0]->pertanyaan5?></textarea>
                           </div>
                           <div class="form-group col-md-4">
                              <label>Harapan kami terhadap kemampuan akademik anak kami ketika lulus dari Sekolah Alam Indonesia adalah</label>
                              <textarea class="form-control" rows="2" name="pertanyaan6" id="pertanyaan6"><?=$siswa->result()[0]->pertanyaan6?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label>Jika kami sebagai orang tua mengalami kesulitan dalam pembiayaan sekolah, maka yang akan kami lakukan adalah</label>
                              <textarea class="form-control" rows="2" name="pertanyaan7" id="pertanyaan7"><?=$siswa->result()[0]->pertanyaan7?></textarea>
                           </div>
                           <div class="form-group col-md-4">
                              <label>Pandangan kami tentang sekolah berbasis komunitas adalah</label>
                              <textarea class="form-control" rows="2" name="pertanyaan8" id="pertanyaan8"><?=$siswa->result()[0]->pertanyaan8?></textarea>
                           </div>
                           <div class="form-group col-md-4">
                              <label>Kontribusi konkrit yang akan kami berikan sebagai bagian dari komunitas adalah</label>
                              <textarea class="form-control" rows="2" name="pertanyaan9" id="pertanyaan9"><?=$siswa->result()[0]->pertanyaan9?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label><b>(Studi Kasus I)</b>
                              Dalam kelas anak anda terdapat 44 siswa. Suatu hari kelas akan mengadakan kegiatan <i>outing</i> keluar kota, kegiatan ini membutuhkan biaya. Setelah dihitung ternyata biaya yang diperlukan sebesar Rp. 200.000,-. Ternyata dari ke-44 siswa  yang ada di  kelas, ada 6 siswa yang secara ekonomi hanya mampu membayar kurang dari setengah biaya yang sudah dibagi ke-44 siswa tersebut.  Bagaimana anda menyikapi hal tersebut?
                              Apa solusi yang anda tawarkan terhadap kasus tersebut?</label>
                              <textarea class="form-control" rows="3" name="pertanyaan10" id="pertanyaan10"><?=$siswa->result()[0]->pertanyaan10?></textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label><b>(Studi Kasus II)</b>
                              Anak anda kini lebih memilih untuk tidak bersekolah. Anak anda beralasan bahwa teman-temannya tidak seru karena kasar. Kadang anak anda juga mengatakan bahwa temen-temannya nakal dan ibu guru jahat. Setiap akan masuk gerbang sekolah, tangan anak anda berkeringat dan genggamannya sangat erat memegang tangan anda. Ia kemudian menangis merengek minta pulang. Apa yang akan anda lakukan?</label>
                              <textarea class="form-control" rows="3" name="pertanyaan11" id="pertanyaan11"><?=$siswa->result()[0]->pertanyaan11?></textarea>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h4>**Isian berikut khusus bagi orang tua yang memilki anak yang telah sekolah di Sekolah Alam Indonesia sebelumnya.</h4>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label>Kami telah menjadi bagian dari komunitas SAI sejak</label>
                              <div class="input-group">
                                 <div class="input-group-addon">Tahun</div>
                                 <input type="number" <?=$siswa->result()[0]->pertanyaan13?> class="form-control" onkeypress="return isNumber(event)" name="pertanyaan13" id="pertanyaan13" value="" placeholder="Tahun">
                              </div>
                           </div>
                           <div class="form-group col-md-8">
                              <label>Kerjasama kami sebagai orang tua dengan guru dalam mendukung kegiatan belajar mengajar adalah</label>
                              <textarea class="form-control" rows="1" name="pertanyaan14" id="pertanyaan14"><?=$siswa->result()[0]->pertanyaan14?></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label>Kontribusi nyata dan pengalaman kami dalam organisasi komunitas di Sekolah Alam Indonesia</label>
                              <div class="form-horizontal">
                                 <p>Dewan Sekolah</p>
                                 <div class="col-md-12">
                                    <div class="col-md-6">
                                       <input type="text" <?=$siswa->result()[0]->pertanyaan15?> class="form-control" name="pertanyaan15" id="pertanyaan15" value="" placeholder="Nama Jabatan">
                                    </div>
                                    <div class=" col-md-6">
                                       <input type="number" <?=$siswa->result()[0]->pertanyaan16?> class="form-control" onkeypress="return isNumber(event)" name="pertanyaan16" id="pertanyaan16" value="" placeholder="Tahun">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-horizontal">
                                 <p>Dewan Kelas</p>
                                 <div class="col-md-12">
                                    <div class="col-md-6">
                                       <input type="text" value="<?=$siswa->result()[0]->pertanyaan19?>" class="form-control" name="pertanyaan19" id="pertanyaan19"  placeholder="Nama Jabatan">
                                    </div>
                                    <div class=" col-md-6">
                                       <input type="number" value="<?=$siswa->result()[0]->pertanyaan20?>" class="form-control" onkeypress="return isNumber(event)" name="pertanyaan20" id="pertanyaan20"  placeholder="Tahun">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-horizontal">
                                 <p>Kepanitian Kegiatan Komunitas</p>
                                 <div class="col-md-12">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="pertanyaan21" id="pertanyaan21" value=" <?=$siswa->result()[0]->pertanyaan21?>" placeholder="Nama Jabatan">
                                    </div>
                                    <div class=" col-md-6">
                                       <input type="number"  class="form-control" onkeypress="return isNumber(event)" name="pertanyaan22" id="pertanyaan22" value="<?=$siswa->result()[0]->pertanyaan22?>" placeholder="Tahun">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Saran dan solusi kami  untuk Sekolah Alam Indonesia (komunitas,  dewan guru, sarana prasarana, KBM, dll) adalah</label>
                              <div class="form-horizontal">
                                 <p>Komunitas</p>
                                 <input type="text"  class="form-control" name="pertanyaan23" id="pertanyaan23" value="<?=$siswa->result()[0]->pertanyaan23?>" placeholder="Saran  ">
                              </div>
                              <div class="form-horizontal">
                                 <p>Dewan Guru</p>
                                 <input type="text"  class="form-control" name="pertanyaan24" id="pertanyaan24" value="<?=$siswa->result()[0]->pertanyaan24?>" placeholder="Saran">
                              </div>
                              <div class="form-horizontal">
                                 <p>Sarana Prasarana</p>
                                 <input type="text"  class="form-control" name="pertanyaan25" id="pertanyaan25" value="<?=$siswa->result()[0]->pertanyaan25?>" placeholder="Saran">
                              </div>
                              <div class="form-horizontal">
                                 <p>KBM (Kegiatan Belajar Mengajar)</p>
                                 <input type="text"  class="form-control" name="pertanyaan26" id="pertanyaan26" value="<?=$siswa->result()[0]->pertanyaan26?>" placeholder="Saran">
                              </div>
                              <div class="form-horizontal">
                                 <p>Lainya</p>
                                 <input type="text"  class="form-control" name="pertanyaan27" id="pertanyaan27" value="<?=$siswa->result()[0]->pertanyaan27?>" placeholder="Saran">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane" id="tab_3">
                     <div class="box box-solid box-success" data-widget="box-widget">
                        <div class="box-header">
                           <h3 class="box-title">Panduan Pengisian</h3>
                           <div class="box-tools">
                              <a class="btn btn-box-tool" onclick="edit('f_tab_3')" data-toggle="tooltip" title="Edit">Edit</a>

                              <!-- This will cause the box to be removed when clicked -->
                              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                              <!-- This will cause the box to collapse when clicked -->
                              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                           </div>
                        </div>
                        <div class="box-body">
                           <p>
                           <ul>
                              <li>Mohon untuk dibaca dengan perlahan dan teliti.</li>
                              <li>Tekan tombol "Tambah Saudara" untuk menambahkan riwayat Penyakit.</li>
                              <li>Isi kolom input riwayat penyakit sesuai dengan petunjuk pada kolom inputan.</li>
                              <li>Tekan tombol "Simpan" untuk menyimpan perubahan</li>
                           </ul>
                           </p>
                        </div>
                     </div>
                     <form id="f_tab_3" method="POST" action="<?=base_url()?>Dashboard/save/keluarga/<?=$this->uri->segment(4);?>">
                        <div class="row">
                           <!-- <div class="form-group col-sm-4">
                              <label>Jumlah Tanggungan</label>
                              <input type="number" name="jumlahTanggungan" value="<?= $siswa->result()[0]->jumlahTanggungan?>" class="form-control" placeholder="jumlah Tanggungan" required>
                              </div> -->
                           <div class="form-group col-sm-4">
                              <label>Jumlah Pengeluaran Per Bulan</label>
                              <select class="form-control" name="jumlahPengeluaran" id="jumlahPengeluaran" required>
                                 <option disabled selected>-- Pilih --</option>
                                 <option value="Rp. 5.000.000" <?php if($siswa->result()[0]->jumlahPengeluaran == "Rp. 5.000.000"){echo "selected";}?>>Rp. 5.000.000</option>
                                 <option value="Rp. 5.000.000 s/d Rp. 10.000.000" <?php if($siswa->result()[0]->jumlahPengeluaran == "Rp. 5.000.000 s/d Rp. 10.000.000"){echo "selected";}?>>Rp. 5.000.000 s/d Rp. 10.000.000</option>
                                 <option value="Rp. 10.000.000 s/d Rp. 15.000.000" <?php if($siswa->result()[0]->jumlahPengeluaran == "Rp. 10.000.000 s/d Rp. 15.000.000"){echo "selected";}?>>Rp. 10.000.000 s/d Rp. 15.000.000</option>
                                 <option value="Rp. 15.000.000 s/d Rp. 20.000.000" <?php if($siswa->result()[0]->jumlahPengeluaran == "Rp. 15.000.000 s/d Rp. 20.000.000"){echo "selected";}?> >Rp. 15.000.000 s/d Rp. 20.000.000</option>
                                 <option value="Lebih dari Rp. 20.000.000" <?php if($siswa->result()[0]->jumlahPengeluaran == "Lebih dari Rp. 20.000.000"){echo "selected";}?>>Lebih dari Rp. 20.000.000</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Alokasi Dana Pendidikan per Bulan</label>
                              <div class="input-group">
                                 <div class="input-group-addon">Rp.</div>
                                 <input type="number" name="danaPendidikan" class="form-control" value="<?= $siswa->result()[0]->danaPendidikan?>" placeholder="tulis angka saja. dalam Satuan Rupiah" onkeypress="return isNumber(event)" required>
                              </div>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Anak Tinggal Bersama : </label>
                              <input type="text" name="tinggalBersama" class="form-control" value="<?= $siswa->result()[0]->tinggalBersama?>" placeholder="Kedua Orang Tua/Salah satu orang tua" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-4">
                              <label>Jarak Tempuh Ke Sekolah</label>
                              <div class="input-group">
                                 <input type="number" name="jarakTempuh" class="form-control" value="<?= $siswa->result()[0]->jarakTempuh?>" placeholder="dalam Km" onkeypress="return isNumber(event)" required>
                                 <div class="input-group-addon">Km</div>
                              </div>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Waktu Tempuh Ke Sekolah</label>
                              <div class="input-group">
                                 <input type="number" name="waktuTempuh" class="form-control" value="<?= $siswa->result()[0]->waktuTempuh?>" placeholder="dalam Jam" required>
                                 <div class="input-group-addon">Menit</div>
                              </div>
                           </div>
                           <div class="form-group col-sm-4">
                              <label>Moda Transportasi ke Sekolah</label>
                              <input type="text" name="jenisTransportasi" class="form-control" value="<?= $siswa->result()[0]->jenisTransportasi?>" placeholder="Kendaraan Pribadi/Kendaraan Umum/Jalan Kaki" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Tuliskan semua orang yang tinggal dalam 1 (Satu) Rumah dengan Anak</label>
                           <textarea class="form-control" rows="2" name="orangSaturumah" placeholder=""><?= $siswa->result()[0]->orangSaturumah?></textarea>
                        </div>
                        <div class="row">
                           <div class="form-group col-sm-6">
                              <div class="col-sm-12"><label>Orang Terdekat oleh anak</label></div>
                              <div class="col-sm-4">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_ayah" name="orangTerdekat[0]" value="1">
                                    Ayah
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_ibu" name="orangTerdekat[1]" value="1">
                                    Ibu
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_paman" name="orangTerdekat[2]" value="1">
                                    Paman
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_bibi" name="orangTerdekat[3]" value="1">
                                    Bibi
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_kakek" name="orangTerdekat[4]" value="1">
                                    Kakek
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_nenek" name="orangTerdekat[5]" value="1">
                                    Nenek
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_kakak" name="orangTerdekat[6]" value="1">
                                    Kakak
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                    <input type="checkbox" id="cb_adik" name="orangTerdekat[7]" value="1">
                                    Adik
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-sm-6">
                              <label>Berangkat Ke sekolah/Pulang dari Sekolah diantar oleh : </label>
                              <input type="text" name="pengantarSekolah" class="form-control" value="<?= $siswa->result()[0]->pengantarSekolah?>"  placeholder="Ayah/Ibu/Supir Pribadi" required>
                           </div>
                        </div>
                        <hr/>
                        <div id="div_saudara">
                           <?php
                              if (count(json_decode($siswa->result()[0]->dataKeluarga)) == 0) {
                              ?>
                           <div class="row">
                              <div class="form-group col-sm-3">
                                 <label>Nama Saudara</label>
                                 <input type="text" name="namaSaudara[]" class="form-control" placeholder="Nama Saudara" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Umur</label>
                                 <div class="input-group">
                                    <input type="text" name="umurSaudara[]" class="form-control" placeholder="Umur Saudara" >
                                    <div class="input-group-addon">Tahun</div>
                                 </div>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Nama Sekolah</label>
                                 <input type="text" name="sekolahSaudara[]" class="form-control" placeholder="Nama Sekolah" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Kelas</label>
                                 <input type="text" name="kelasSaudara[]" class="form-control" placeholder="Kelas/Tingkat" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <!-- <div class="row"> -->
                                 <input type="button" style="margin-top: 25px;" class="btn btn-default btn-block" onclick="tambahSaudara()" id="add-saudara" value="Tambah Saudara">
                                 <!-- <button class="btn btn-block btn-default" onclick="tambahSaudara()">Tambah Saudara</button> -->
                                 <!-- </div> -->
                              </div>
                           </div>
                           <?php
                              }else{
                                foreach (json_decode($siswa->result()[0]->dataKeluarga) as $key) {
                                  ?>
                           <div class="row">
                              <div class="form-group col-sm-3">
                                 <label>Nama Saudara</label>
                                 <input type="text" name="namaSaudara[]" value="<?=$key->namaSaudara?>" class="form-control" placeholder="Nama Saudara" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Umur</label>
                                 <div class="input-group">
                                    <input type="text" name="umurSaudara[]" value="<?=$key->umurSaudara?>" class="form-control" placeholder="Umur Saudara" >
                                    <div class="input-group-addon">Tahun</div>
                                 </div>
                              </div>
                              <div class="form-group col-sm-3">
                                 <label>Nama Sekolah</label>
                                 <input type="text" name="sekolahSaudara[]" value="<?=$key->sekolahSaudara?>" class="form-control" placeholder="Nama Sekolah" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <label>Kelas</label>
                                 <input type="text" name="kelasSaudara[]"  value="<?=$key->kelasSaudara?>" class="form-control" placeholder="Kelas/Tingkat" >
                              </div>
                              <div class="form-group col-sm-2">
                                 <!-- <div class="row"> -->
                                 <input type="button" style="margin-top: 25px;" class="btn btn-default btn-block" onclick="tambahSaudara()" id="add-saudara" value="Tambah Saudara">
                                 <!-- <button class="btn btn-block btn-default" onclick="tambahSaudara()">Tambah Saudara</button> -->
                                 <!-- </div> -->
                              </div>
                           </div>
                           <?php
                              }
                              }
                              ?>
                        </div>
                        <!-- <div></div> -->
                        <div class="form-group">
                           <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                        </div>
                     </form>
                  </div>
                  <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
            </div>
         </div>
      </div>
      <!-- /.box -->
   </section>
   <!-- /.content -->
</div>
<div class="modal fade" id="verifikasi" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="color: white;background-color: #EC6607">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verifikasi Berkas</h4>
        </div>
        <div class="modal-body">
          <p>Perlu diperhatikan Kelengkapan Berkas yang sudah disimpan (Formulir,Berkas,Pernyataan).</p>
          <!-- <p>Unduh Berkas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <a href="" target="blank">Unduh</a> </p>
          <p>Unduh Pasfoto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <a id="m_pasfoto" target="blank">Unduh</a> </p>
          <p>Unduh Akta Kelahiran &nbsp;: <a id="m_akta" target="blank">Unduh</a> </p>
          <p>Unduh Kartu Keluarga : <a id="m_kartukeluarga" target="blank">Unduh</a> </p> -->
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" id="m_lolos">Lolos</a>
          <a type="button" class="btn btn-danger" id="m_tidaklolos">Tidak Lolos</a>
        </div>
      </div>

    </div>
  </div>
<!-- /.content-wrapper -->
<script>

   var columns = [];
    function tambahPenyakit() {
      var row = '<div class="row"> <div class="form-group col-sm-2"> <label>Nama Penyakit</label> <input type="text" name="namaPenyakit[]" class="form-control" placeholder="Nama Penyakit" required> </div><div class="form-group col-sm-2"> <label>Tahun</label> <input type="number" onkeypress="return isNumber(event)" name="tahunPenyakit[]" class="form-control" placeholder="Tahun" required> </div><div class="form-group col-sm-3"> <label>Pengobatan/Terapi</label> <input type="text" name="pengobatan[]" class="form-control" placeholder="Sebutkan Nama Pengobatan/Terapi" required> </div><div class="form-group col-sm-2"> <label>Pantangan</label> <input type="text" name="pantangan[]" class="form-control" placeholder="Pantangan" required> </div><div class="form-group col-sm-2"> <label>Status</label> <select class="form-control" name="statusPenyakit[]" > <option selected disabled>--Pilih</option> <option>Sembuh</option> <option>Dalam Pengobatan</option> </select> </div></div>';
      $('#div_penyakit').append(row);
    }
    function tambahSaudara() {
      var row = '<div class="row"> <div class="form-group col-sm-3"> <label>Nama Saudara</label> <input type="text" name="namaSaudara[]" class="form-control" placeholder="Nama Saudara" > </div><div class="form-group col-sm-2"> <label>Umur</label> <div class="input-group"> <input type="text" name="umurSaudara[]" class="form-control" placeholder="Umur Saudara" > <div class="input-group-addon">Tahun</div></div></div><div class="form-group col-sm-3"> <label>Nama Sekolah</label> <input type="text" name="sekolahSaudara[]" class="form-control" placeholder="Nama Sekolah" > </div><div class="form-group col-sm-2"> <label>Kelas</label> <input type="text" name="kelasSaudara[]" class="form-control" placeholder="Kelas/Tingkat" > </div></div>';
      $('#div_saudara').append(row);
    }
    function uploads(argument) {
        var file_data = $('#'+argument).prop('files')[0];
        // console.log(file_data);
        if (argument == 'pasFoto') {
          if (file_data.type != 'image/jpeg') {
            alert('Unggah Pasfoto format berkas .jpg atau .jpeg');$('#'+argument).val('');return false;
          }
        }
        else{
          if (file_data.type = 'image/jpeg') {
            alert('Unggah Dokumen format berkas .jpg atau .jpeg');$('#'+argument).val('');return false;
          }
        }

        if (file_data.size > (1024*1000*1)) {
          alert('Unggah Berkas dengan Ukuran Maksimal 1 MB');$('#'+argument).val('');return false;
        }
    }
    function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    function toogleCheckbox(argument) {
      console.log(argument);
    }
</script>
<script>
   /* jQueryKnob */

   $('.knob').knob();
    $(document).ready(function() {
      // introJs().start();
      $('#f_tab_0 :input').prop('disabled',true);
      $('#f_tab_1 :input').prop('disabled',true);
      $('#f_tab_2 :input').prop('disabled',true);
      $('#f_tab_3 :input').prop('disabled',true);
      $('#f_tab_4 :input').prop('disabled',true);
      $('#f_tab_5 :input').prop('disabled',true);
      if($('#c_wali').is(":checked") == true) {
            $('#wali_c').show();
          }else{
            $('#wali_c').hide();
          }
         $('#c_wali').on('change',function() {
          // console.log($('#c_wali').is(":checked"));
          if ($('#c_wali').is(":checked") == true) {
            $('#wali_c').show();
          }else{
            $('#wali_c').hide();
          }
       })
      $('#verifikasi').on('show.bs.modal', function(e) {
        // $('#myModalLabel1').text('Konfirmasi Update '+$(e.relatedTarget).data('text'));
        $('#m_lolos').attr('href', $(e.relatedTarget).data('href')+'/lolos');
        $('#m_tidaklolos').attr('href', $(e.relatedTarget).data('href')+'/tidak');
        // $('#m_pasfoto').attr('href', $(e.relatedTarget).data('href')+'/lolos');
        // $('#m_kartukeluarga').attr('href', $(e.relatedTarget).data('href')+'/tidak');
        // $('#m_akta').attr('href', $(e.relatedTarget).data('href')+'/tidak');
      });
         $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
          });
      // alert('dasda')
      //Kelahiran
      var kelahiran = <?php echo json_encode($kelahiran->result())?>;
      // console.log(kelahiran);
      if (kelahiran.length > 0) {
        $('#kondisiKelahiran').val(kelahiran[0].kondisiKelahiran);
        $('#kondisiIbu').val(kelahiran[0].kondisiIbu);
        $('#kondisiLingkungan').val(kelahiran[0].kondisiLingkungan);
        $('#pernahRawat').val(kelahiran[0].pernahRawat);
        $('#usiaKelahiran').val(kelahiran[0].usiaKelahiran);
        $('#kasusKhusus').val(kelahiran[0].kasusKhusus);
        $('#prosesKelahiran').val(kelahiran[0].prosesKelahiran);
        $('#tengkurap').val(kelahiran[0].tengkurap);
        $('#berjalan').val(kelahiran[0].berjalan);
        $('#bicara').val(kelahiran[0].bicara);
        $('#merangkak').val(kelahiran[0].merangkak);
        $('#diperintah').val(kelahiran[0].diperintah);
        $('#karakter1').val(kelahiran[0].karakter1);
        $('#karakter2').val(kelahiran[0].karakter2);
        $('#karakter3').val(kelahiran[0].karakter3);
        $('#karakter4').val(kelahiran[0].karakter4);
        $('#karakter5').val(kelahiran[0].karakter5);
      }
      var siswa = <?=json_encode($siswa->result())?>;
      // console.log(siswa);
      var orangTerdekat = JSON.parse(siswa[0].orangTerdekat);
      // console.log('orangTerdekat :',orangTerdekat);
      var dataPerkembangan = JSON.parse(siswa[0].dataPerkembangan);
      for (var i = 0; i < 8; i++) {
        if (orangTerdekat[i] != null) {
          if(i==0){$('#cb_ayah').prop('checked',true);}
          else if(i==1){$('#cb_ibu').prop('checked',true);}
          else if(i==2){$('#cb_paman').prop('checked',true);}
          else if(i==3){$('#cb_bibi').prop('checked',true);}
          else if(i==4){$('#cb_kakek').prop('checked',true);}
          else if(i==5){$('#cb_nenek').prop('checked',true);}
          else if(i==6){$('#cb_kakak').prop('checked',true);}
          else if(i==7){$('#cb_adik').prop('checked',true);}
        }
      }
      console.log(dataPerkembangan[3]);
      for (var i = 0; i < 65; i++) {
        if (dataPerkembangan[i] != null) {
          $('#dataPerkembangan'+(i+1)).prop('checked',true);
        }
      }
      // console.log(orangTerdekat[2])
    })
    function edit(argument) {
      console.log(document.getElementById(""+argument).disabled);
      if ($('#'+argument+' :input').prop("disabled") == true) {
         $('#'+argument+' :input').prop("disabled",false);
      }else{
         $('#'+argument+' :input').prop("disabled",true);
      }
      return false;
   }
</script>
