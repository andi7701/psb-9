

    <div class="container mt-5" >

      <div class="row row-offcanvas row-offcanvas-right pt-3">

        <div class="col-xs-7 col-sm-7">
          <div class="jumbotron" data-step="1" data-intro="Anda berada di Halaman Formulir Pendaftaran, Mohon untuk teliti dalam mengisi Formulir Pendaftaran ini." data-position='right'>
            <p><strong>Pendaftaran Siswa Baru sudah berakhir atau ditutup. </strong> Untuk info lebih lanjut, silahkan untuk menghubungi <a class="text-warning" href="https://wa.me/+6281298981113/?text="><i data-feather="phone-call"></i> Wulan (0812-9898-1113) </a></p>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5">
          <table class="table table-hover table-responsive table-sm">
            <thead class="table-warning">
              <tr>
                <th scope="col">Jenjang Pendidikan</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Kuota</th>
                <!-- <th scope="col">Handle</th> -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">KB</td>
                <td>-</td>
                <td>10</td>
              </tr>
              <tr>
                <th scope="row">TK</th>
                <td>A</td>
                <td>18</td>
              </tr>
              <tr>
                <th scope="row">TK</th>
                <td>B</td>
                <td>19</td>
              </tr>
              <tr>
                <th scope="row">SD</th>
                <td>1</td>
                <td>25</td>
              </tr>
              <tr>
                <th scope="row">SD</th>
                <td>2</td>
                <td>3</td>
              </tr>
              <tr>
                <th scope="row">SD</th>
                <td>4</td>
                <td>7</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-12">
          <!-- <div class="row"> -->
            <form method="POST" action="<?=base_url()?>Welcome/regist/" data-step="2" data-intro="Bagian Formulir ini berisi informasi seputar Anak Didik/ Calon Siswa." data-position='right' id="regist-form">
              <h3>Pilih Jenjang Pendidikan</h3>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Jenjang Pendidikan</label>
                  <select class="form-control" name="jenjangPendidikan" id="jenjangPendidikan" required>
                    <option disabled selected>--Pilih--</option>
                    <option value="SD">Sekolah Dasar</option>
                    <option value="TK">Taman Kanak Kanak</option>
                    <option value="KB">Kelompok Bermain</option>
                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label>Tingkat</label>
                  <select class="form-control" name="tingkat" id="tingkat" onchange="cekKuota()" required>
                    <option disabled selected>--Pilih--</option>
                    
                  </select>
                </div>
              </div>
              <h3>Biodata Anak</h3>
              <div class="row" >
                <div class="form-group col-sm-6">
                  <label>Nama Lengkap</label>
                  <input type="text" name="namaLengkap" placeholder="Nama Lengkap" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tanggalLahir" placeholder="Tanggal/Bulan/Tahun" class="form-control datepicker" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempatLahir" placeholder="Kota Kelahiran" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label>Nama Panggilan</label>
                  <input type="text" name="namaPanggilan" placeholder="Nama Panggilan" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>Anak Ke</label>
                  <input type="number" onkeypress="return isNumber(event)" min="0" name="anakKe" class="form-control" required placeholder="1">
                </div>
                <div class="form-group col-sm-3">
                  <label>Jumlah Saudara Kandung</label>
                  <input type="number" onkeypress="return isNumber(event)" min="0" name="dariKe" class="form-control" required placeholder="Jumlah Saudara Kandung">
                </div>
                <div class="form-group col-sm-3">
                  <label>Suku</label>
                  <input type="text" name="suku" class="form-control" required placeholder="Suku">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label>Jenis Kelamin</label>
                  <select name="jenisKelamin" id="jenisKelamin" class="form-control" required>
                    <option disabled selected>-- PILIH --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                
                <div class="form-group col-sm-3">
                  <label>Golongan Darah</label>
                  <select name="golonganDarah" id="golonganDarah" class="form-control" required>
                    <option disabled selected>-- PILIH --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                  </select>
                </div>
                <div class="form-group col-sm-3">
                  <label>Agama</label>
                  <input type="text" name="agama" placeholder="Agama" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>Kewarganegaraan</label>
                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required="">
                    <option disabled selected>-- PILIH --</option>
                    <option value="WNI">Warga Negara Indonesia</option>
                    <option value="WNA">Warga Negara Asing</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-7">
                  <label>Alamat Tempat Tinggal</label>
                  <input type="text" name="alamat1" placeholder="Nama Jalan,Kota" class="form-control" required>
                </div>
                <div class="form-group col-sm-2">
                  <label>Kode POS</label>
                  <input type="number" onkeypress="return isNumber(event)" name="pos1" placeholder="16516" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                  <label>Asal Sekolah</label>
                  <input type="text" name="asalSekolah" class="form-control" placeholder="Asal Sekolah" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-4">
                  <label>Hobi</label>
                  <textarea rows="2" class="form-control" name="hobi" placeholder="Hobi yang tampak" name="hobi"></textarea>
                </div>
                <div class="form-group col-sm-4">
                  <label>Bakat yang Tampak</label>
                  <textarea rows="2" class="form-control" name="bakat" placeholder="Bakat yang tampak" name="bakat"></textarea>
                </div>
                
              </div>
              <h3>Orang Tua/Wali</h3><input type="checkbox" name="wali_c" id="c_wali"> Mempunyai Wali selain orang tua.
              <div class="row">
                <div class="form-group col-sm-4">
                  <label>Nama Lengkap Ayah</label>
                  <input type="text" name="ayah_namaLengkap" placeholder="Nama Lengkap" class="form-control" >
                </div>
                <div class="form-group col-sm-4">
                  <label>Nomor HP Ayah</label>
                  <input type="number" onkeypress="return isNumber(event)" oninput="if(value.length>13)value=value.slice(0,13)" name="ayah_phone" placeholder="08xxx" class="form-control" >
                </div>
                <div class="form-group col-sm-4">
                  <label>Alamat Email</label>
                  <input type="email" name="ayah_email" placeholder="Alamat Email" class="form-control"  required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Nama Lengkap Ibu</label>
                  <input type="text" name="ibu_namaLengkap" placeholder="Nama Lengkap" class="form-control" >
                </div>
                <div class="form-group col-sm-6">
                  <label>Nomor HP Ibu</label>
                  <input type="number" onkeypress="return isNumber(event)" oninput="if(value.length>13)value=value.slice(0,13)" name="ibu_phone" placeholder="08xxx" class="form-control" >
                </div>
              </div>
             <div class="row" id="wali_c">
                <div class="form-group col-sm-4">
                  <label>Nama Lengkap Wali</label>
                  <input type="text" name="wali_namaLengkap" placeholder="Nama Lengkap" class="form-control" >
                </div>
                <div class="form-group col-sm-4">
                  <label>Nomor HP Wali</label>
                  <input type="number" onkeypress="return isNumber(event)" oninput="if(value.length>13)value=value.slice(0,13)" name="wali_phone" placeholder="08xxx" class="form-control" >
                </div>
                <div class="form-group col-sm-4">
                  <label>Hubungan Terhadap Anak</label>
                  <input type="text" name="posisiWali" placeholder="Hubungan Terhadap Anak" class="form-control" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-4">
                  <label>Username</label>
                  <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group col-sm-4">
                  <label>Password/ Kata Sandi</label>
                  <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group col-sm-4">
                  <label>Konfirmasi Password/ Kata Sandi</label>
                  <input type="password" name="cpassword" id="cpassword" class="form-control" data-toggle="tooltip" data-placement="top" title="Konfirmasi Password berbeda dengan Password" required>
                </div>
              </div>
              
              <div class="form-group" data-step="3" data-intro="Tahap terakhir, Tekan tombol Daftar untuk mengirim data pendaftaran" data-position='right'>
                <button type="submit" onkeypress="return isNumber(event)" disabled="true" id="btn_daftar" class="btn btn-lg btn-primary btn-block">Daftar</button>
              </div>
            </form>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

      </div><!--/row-->

      <hr>

      

    </div><!--/.container-->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Sudah Ditutup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Mohon maaf pendaftaran sudah ditutup.Untuk lebih lanjut, silahkan menghubungi narahubung (Wulan 09893)
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
      // $('#btn_daftar').prop('disabled',false);
      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
          }
          return true;
      }
      $(document).ready(function() {
        $('#regist-form :input').prop('disabled',true);
        $('#cpassword').tooltip('hide');
        $('#tingkat').prop('disabled',true);
        var request;
        // introJs().start();
       $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
       $('#wali_c').hide();
       $('#c_wali').on('change',function() {
          console.log($('#c_wali').is(":checked"));
          if ($('#c_wali').is(":checked") == true) {
            $('#wali_c').show();
          }else{
            $('#wali_c').hide();
          }
       })
       $('#jenjangPendidikan').on('change',function() {
          $('#tingkat').prop('disabled',false);
           if ($(this).val() == 'SD') {
            $('#tingkat').html('<option disabled selected>--Pilih--</option><option val="1">1</option><option val="2">2</option><option val="4">4</option>');
           }else if($(this).val() == 'KB'){
            $('#tingkat').prop('disabled',true);
            cekKuota();
           }
            else{
              $('#tingkat').html('<option disabled selected>--Pilih--</option><option val="A">A</option><option val="B">B</option>');
            }
       })
       $('#cpassword').on('keyup',function () {
      // console.log('1 : ' ,$('#confirm_password').val());console.log('2 : ',$('#password').val());
      if ($('#password').val().length <= $('#cpassword').val().length) {
        if($('#cpassword').val() != $('#password').val()){
          $('#btn_daftar').prop('disabled',true);$('#cpassword').tooltip('show');
      }
      }else{
        $('#btn_daftar').prop('disabled',false);$('#cpassword').tooltip('hide');
      }

    });

      })
      function cekKuota() {
        event.preventDefault();
             // Fire off the request to /form.php
            request = $.ajax({
                url: "<?=base_url()?>Welcome/cekKuota/",
                type: "post",
                data: {'jenjangPendidikan':$('#jenjangPendidikan').val(),'tingkat':$('#tingkat').val()}
            });// Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // console.log("Hooray, it worked! : ",response);
                if (response.status =='denied') {$("#regist-form :input").prop("disabled", true);$('#exampleModal').modal('show');}
            });
            request.fail(function (jqXHR, textStatus, errorThrown){
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
                alert('Refresh Halaman Ini ');window.location.reload();
            });
            request.always(function () {
                // Reenable the inputs
                // $inputs.prop("disabled", false);
            });
      }
    </script>
    