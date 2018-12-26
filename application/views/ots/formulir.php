

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Formulir Penerimaan 
			<small>Dashboard</small>
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="javascript:void(0);"><i class="fa fa-home"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	
		<div class="row">
      <div class="col-sm-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Keluarga</h3>
          <div class="box-tools pull-right">
            <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
              <i class="fa fa-expand"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <form>
             <div class="row">
                <div class="form-group col-sm-6">
                  <label>Jarak Tempuh Ke Sekolah</label>
                  <input type="number" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Waktu Tempuh Ke Sekolah</label>
                  <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Moda Transportasi Ke Sekolah</label>
                  <input type="text" name="tinggi" class="form-control" placeholder="Kendaraan Pribadi/Kendaraan Umum/Jalan Kaki" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Berangkat Ke sekolah diantar oleh : </label>
                  <input type="text" name="berat" class="form-control" placeholder="Ayah/Ibu/Supir Pribadi" required>
                </div>
              </div>
              <div class="form-group">
                <label>Tuliskan semua orang yang tinggal dalam 1 (Satu) Rumah dengan Anak</label>
                <textarea class="form-control" rows="2" placeholder=""></textarea>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Orang Terdekat oleh anak</label>
                   <div class="col-sm-6">
                     <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Ayah
                        </label>
                      </div>
                       <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Ibu
                        </label>
                      </div>
                       <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Paman
                        </label>
                      </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Bibi
                        </label>
                      </div>
                       <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Kakek
                        </label>
                      </div>
                       <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Nenek
                        </label>
                      </div>
                   </div>
                </div>

                <div class="form-group col-sm-6">
                  <label>Berangkat Ke sekolah diantar oleh : </label>
                  <input type="text" name="berat" class="form-control" placeholder="Ayah/Ibu/Supir Pribadi" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Anak Tinggal Bersama : </label>
                  <input type="text" name="berat" class="form-control" placeholder="Kedua Orang Tua/Salah satu orang tua" required>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block">Simpan</button>
              </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>  
    </div>
    <div class="col-sm-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Riwayat Kesehatan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
              <i class="fa fa-expand"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" onclick="tambahPenyakit()">
              <i class="fa fa-plus"></i> Tambah Data Penyakit
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Tinggi Badan</label>
                  <input type="number" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Berat Badan</label>
                  <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                </div>
              </div>
              <div id="div_penyakit">
                <div class="row">
                   <div class="form-group col-sm-6">
                    <label>Nama Penyakit</label>
                    <input type="text" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Tahun</label>
                    <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Status</label>
                    <select class="form-control" >
                      <option selected disabled>--Pilih</option>
                      <option>Sembuh</option>
                      <option>Dalam Pengobatan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block">Simpan</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Riwayat Kesehatan</h3>
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
            <form>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Tinggi Badan</label>
                  <input type="number" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Berat Badan</label>
                  <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                </div>
              </div>
              <div id="div_penyakit">
                <div class="row">
                   <div class="form-group col-sm-6">
                    <label>Nama Penyakit</label>
                    <input type="text" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Tahun</label>
                    <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Status</label>
                    <select class="form-control" >
                      <option selected disabled>--Pilih</option>
                      <option>Sembuh</option>
                      <option>Dalam Pengobatan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block">Simpan</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>  
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Riwayat Kesehatan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
              <i class="fa fa-expand"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" onclick="tambahPenyakit()">
              <i class="fa fa-plus"></i> Tambah Data Penyakit
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Tinggi Badan</label>
                  <input type="number" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Berat Badan</label>
                  <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                </div>
              </div>
              <div id="div_penyakit">
                <div class="row">
                   <div class="form-group col-sm-6">
                    <label>Nama Penyakit</label>
                    <input type="text" name="tinggi" class="form-control" placeholder="dalam Cm" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Tahun</label>
                    <input type="number" name="berat" class="form-control" placeholder="dalam Kg" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label>Status</label>
                    <select class="form-control" >
                      <option selected disabled>--Pilih</option>
                      <option>Sembuh</option>
                      <option>Dalam Pengobatan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block">Simpan</button>
              </div>
            </form>
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
  function tambahPenyakit() {
    // body...
  }
</script>



<script>
	/* jQueryKnob */
	$('.knob').knob();
</script>