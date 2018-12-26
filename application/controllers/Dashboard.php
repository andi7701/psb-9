<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminpsb')) {
			redirect('Auth/login','refresh');
		}
		$this->load->model('Guru_model');
		$this->load->model('Siswa_model');
		$this->load->model('RiwayatPenyakit_model');
		$this->load->model('RiwayatKelahiran_model');
	}
	public function index($value='')
	{
		$siswa = $this->Siswa_model->getAll();
		$seri = [];$sd1=0;$sd2=0;$sd4=0;$tka=0;$tkb=0;
		$seri[] = array('name'=>'Sekolah Dasar','y'=>$this->Siswa_model->getWhere(array('jenjangPendidikan'=>'SD'))->num_rows(),'drilldown'=>'SD');
		$seri[] = array('name'=>'Taman Kanak-kanak','y'=>$this->Siswa_model->getWhere(array('jenjangPendidikan'=>'TK'))->num_rows(),'drilldown'=>'TK');
		$seri[] = array('name'=>'Kelompok Bermain','y'=>$this->Siswa_model->getWhere(array('jenjangPendidikan'=>'KB'))->num_rows(),'drilldown'=>NULL);
		foreach ($siswa->result() as $key) {
			switch ($key->tingkat) {
				case '1':$sd1++;break;
				case '2':$sd2++;break;
				case '4':$sd4++;break;
				case 'A':$tka++;break;
				default:$tkb++;break;
			}
		}
		$drilldown[] = array('name'=>'Sekolah Dasar','id'=>'SD','data'=>[['SD 1',$sd1],['SD 2',$sd2],['SD 4',$sd4]]);
		$drilldown[] = array('name'=>'Taman Kanak-Kanak','id'=>'TK','data'=>[['TK A',$tka],['TK B',$tkb]]);
		$series[] = array('name' =>"Jenjang Pendaftaran" ,'colorByPoint'=>TRUE,"data"=>$seri );
		$data['series'] = $series;
		$data['drilldown'] = $drilldown;
		$this->load->view('admin/header_s');
		$this->load->view('admin/index_s',$data);
		$this->load->view('admin/footer_s');
	}
	public function out($value='')
	{
		$this->session->unset_userdata('adminpsb');
		redirect('Auth/login','refresh');
	}

	public function invoice($value='')
	{
		$str = substr(substr(base64_decode($value), 1), 0,-1);
		// print_r (explode(" ",$str));
		// echo $str;die();
		$data = explode(',', $str);
		// $data = $this->input->post();

		// echo json_encode($data['data']);die();
		$data['siswa'] = $this->Siswa_model->getWherein($data);
		// print_r($data['siswa']);die()
		$this->load->library('Pdf');
		$this->load->view('admin/invoices',$data);
	}

	public function save($value='',$id='')
	{
		// echo $_FILES['kartuKeluarga']['size'];die();
		switch ($value) {
			case 'pendaftaran':
				$data = array(
						'namaLengkap' =>$this->input->post('namaLengkap'),
						'tanggalLahir' =>DateTime::createFromFormat('d/m/Y', $this->input->post('tanggalLahir'))->format('Y-m-d'),
						'tempatLahir' =>$this->input->post('tempatLahir'),
						'namaPanggilan' =>$this->input->post('namaPanggilan'),
						'anakKe' =>$this->input->post('anakKe'),
						'dariKe' =>$this->input->post('dariKe')+$this->input->post('anakKe'),
						'suku' =>$this->input->post('suku'),
						'jenisKelamin' =>$this->input->post('jenisKelamin'),
						'golonganDarah' =>$this->input->post('golonganDarah'),
						'agama' =>$this->input->post('agama'),
						'kewarganegaraan' =>$this->input->post('kewarganegaraan'),
						'alamat1' =>$this->input->post('alamat1'),
						'pos1' =>$this->input->post('pos1'),
						'telpon1' =>$this->input->post('telpon1'),
						'hobi' =>$this->input->post('hobi'),
						'bakat' =>$this->input->post('hobi'),
						'asalSekolah' =>$this->input->post('asalSekolah'),
						'ayah_namaLengkap' =>$this->input->post('ayah_namaLengkap'),
						'ayah_tanggalLahir' => DateTime::createFromFormat('d/m/Y', $this->input->post('ayah_tanggalLahir'))->format('Y-m-d'),
						'ayah_tempatLahir' =>$this->input->post('ayah_tempatLahir'),
						'ayah_alamat' =>$this->input->post('ayah_alamat'),
						'ayah_phone' =>$this->input->post('ayah_phone'),
						'ayah_telepon' =>$this->input->post('ayah_telepon'),
						'ayah_email' =>$this->input->post('ayah_email'),
						'ayah_pos' =>$this->input->post('ayah_pos'),
						'ayah_suku' =>$this->input->post('ayah_suku'),
						'ayah_kewarganegaraan' =>$this->input->post('ayah_kewarganegaraan'),
						'ayah_lastDegree' =>$this->input->post('ayah_lastDegree'),
						'ayah_almamater' =>$this->input->post('ayah_almamater'),
						'ayah_bidKerjaan' =>$this->input->post('ayah_bidKerjaan'),
						'ayah_kantor' =>$this->input->post('ayah_kantor'),
						'ayah_alamatKantor' =>$this->input->post('ayah_alamatKantor'),
						'ayah_jabatan' =>$this->input->post('ayah_jabatan'),
						'ayah_penghasilan' =>$this->input->post('ayah_penghasilan'),
						'ayah_jmlJamKerja' =>$this->input->post('ayah_jmlJamKerja'),
						// 'ayah_lastDegree'
						'ayah_jmlJamKeluarga' =>$this->input->post('ayah_jmlJamKeluarga'),
						'ibu_namaLengkap' =>$this->input->post('ibu_namaLengkap'),
						'ibu_tanggalLahir' =>DateTime::createFromFormat('d/m/Y', $this->input->post('ibu_tanggalLahir'))->format('Y-m-d'),
						'ibu_tempatLahir' =>$this->input->post('ibu_tempatLahir'),
						'ibu_alamat' =>$this->input->post('ibu_alamat'),
						'ibu_phone' =>$this->input->post('ibu_phone'),
						'ibu_telepon' =>$this->input->post('ibu_telepon'),
						'ibu_pos' =>$this->input->post('ibu_pos'),
						'ibu_kewarganegaraan' =>$this->input->post('ibu_kewarganegaraan'),
						'ibu_email' =>$this->input->post('ibu_email'),
						'ibu_suku' =>$this->input->post('ibu_suku'),
						'ibu_bidKerjaan' =>$this->input->post('ibu_bidKerjaan'),
						'ibu_kantor' =>$this->input->post('ibu_kantor'),
						'ibu_alamatKantor' =>$this->input->post('ibu_alamatKantor'),
						'ibu_jabatan' =>$this->input->post('ibu_jabatan'),
						'ibu_penghasilan' =>$this->input->post('ibu_penghasilan'),
						'ibu_jmlJamKerja' =>$this->input->post('ibu_jmlJamKerja'),
						'ibu_jmlJamKeluarga' =>$this->input->post('ibu_jmlJamKeluarga'),
						'ibu_lastDegree'=>$this->input->post('ibu_lastDegree'),
						'ibu_almamater'=>$this->input->post('ibu_almamater'),
						'pasFoto'=>null,
						'kartuKeluarga'=>null,
						'aktaKelahiran'=>null,
						'ayah_nik'=>$this->input->post('ayah_nik'),
						'ibu_nik'=>$this->input->post('ibu_nik'),
						'ibu_jurusan'=>$this->input->post('ibu_jurusan'),
						'ayah_jurusan'=>$this->input->post('ayah_jurusan')
					);
					if ($this->input->post('wali_c') == 'on') {
							$data['isWali'] = 1;
							$data['wali_namaLengkap'] =$this->input->post('wali_namaLengkap');
							$data['wali_tanggalLahir'] =DateTime::createFromFormat('d/m/Y', $this->input->post('wali_tanggalLahir'))->format('Y-m-d');
							$data['wali_tempatLahir'] =$this->input->post('wali_tempatLahir');
							$data['wali_alamat'] =$this->input->post('wali_alamat');
							$data['wali_phone'] =$this->input->post('wali_phone');
							$data['posisiWali'] =$this->input->post('posisiWali');
							$data['wali_pos'] =$this->input->post('wali_pos');
							$data['wali_kewarganegaraan'] =$this->input->post('wali_kewarganegaraan');
							$data['wali_jurusan'] =$this->input->post('wali_jurusan');
							$data['wali_email'] =$this->input->post('wali_email');
							$data['wali_suku'] =$this->input->post('wali_suku');
							$data['wali_bidKerjaan'] =$this->input->post('wali_bidKerjaan');
							$data['wali_kantor'] =$this->input->post('wali_kantor');
							$data['wali_alamatKantor'] =$this->input->post('wali_alamatKantor');
							$data['wali_jabatan'] =$this->input->post('wali_jabatan');
							$data['wali_penghasilan'] =$this->input->post('wali_penghasilan');
							$data['wali_jmlJamKerja'] =$this->input->post('wali_jmlJamKerja');
							$data['wali_jmlJamKeluarga'] =$this->input->post('wali_jmlJamKeluarga');
							$data['wali_lastDegree']=$this->input->post('wali_lastDegree');
							$data['wali_almamater']=$this->input->post('wali_almamater');
							$data['wali_nik']=$this->input->post('wali_nik');
	 					}else{
							$data['isWali'] = 0;
						}
					if ($_FILES['pasFoto']['size'] > 0) {
						$config['upload_path'] = './assets/upload/pasFoto/';
		                $config['allowed_types'] = 'jpg|jpeg';
		                $config['file_name'] = $_FILES['pasFoto']['name'];

		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);

		                if($this->upload->do_upload('pasFoto')){
		                    $uploadData = $this->upload->data();
		                     $filefoto = base_url().'assets/upload/pasFoto/'.$uploadData['file_name'];
		                }else{
		                    $filefoto = NULL;
		                }
					}else{$filefoto = NULL;}
					if ($_FILES['kartuKeluarga']['size'] > 0) {
						$config['upload_path'] = './assets/upload/kartuKeluarga/';
		                $config['allowed_types'] = 'jpg|jpeg';
		                $config['file_name'] = $_FILES['kartuKeluarga']['name'];

		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);

		                if($this->upload->do_upload('kartuKeluarga')){
		                    $uploadData = $this->upload->data();
		                     $kartuKeluarga = base_url().'assets/upload/kartuKeluarga/'.$uploadData['file_name'];
		                }else{
		                    $kartuKeluarga = NULL;
		                }
					}else{$kartuKeluarga = NULL;}
					// echo $kartuKeluarga;die();
					if ($_FILES['aktaKelahiran']['size'] > 0) {
						$config['upload_path'] = './assets/upload/aktaKelahiran/';
		                $config['allowed_types'] = 'jpg|jpeg';
		                $config['file_name'] = $_FILES['aktaKelahiran']['name'];

		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);

		                if($this->upload->do_upload('aktaKelahiran')){
		                    $uploadData = $this->upload->data();
		                     $aktaKelahiran = base_url().'assets/upload/aktaKelahiran/'.$uploadData['file_name'];
		                }else{
		                    $aktaKelahiran = NULL;
		                }
		                }else{$aktaKelahiran = NULL;}
		            $obj = $this->Siswa_model->getWhere(array('id'=>$id))->result()[0];
		            if($filefoto != NULL){$data['pasFoto'] = $filefoto;}else{
		            	if ($obj->pasFoto == NULL) {$data['pasFoto'] = NULL;}else{$data['pasFoto'] = $obj->pasFoto;}
		            }
		            // var_dump($data['pasFoto']);die();
					if($kartuKeluarga != NULL){$data['kartuKeluarga'] = $kartuKeluarga;echo "a";}else{
		            	if ($obj->kartuKeluarga == NULL) {$data['kartuKeluarga'] = NULL;echo "b";}else{$data['kartuKeluarga'] = $obj->kartuKeluarga;echo "c";}
		            }
		            // die();
					if($aktaKelahiran != NULL){$data['aktaKelahiran'] = $aktaKelahiran;}else{
		            	if ($obj->aktaKelahiran == NULL) {$data['aktaKelahiran'] = NULL;}else{$data['aktaKelahiran'] = $obj->aktaKelahiran;}
		            }
					// echo json_encode($data);die();
					$this->Siswa_model->update($id,$data);
					// die();
					$info = '<div class="alert alert-success"> <strong>Data Pendaftaran!</strong> Berhasil diubah.</div>';
					$this->session->set_flashdata('info',$info);
					// echo $id;die();
					redirect('Dashboard/siswa/detil/'.$id,'refresh');
					break;
			case 'penyakit':
				$data = array('berat' =>$this->input->post('berat') ,'tinggi'=>$this->input->post('tinggi'));
				// print_r($this->input->post('namaPenyakit'));die();
				$this->Siswa_model->update($id ,$data);
				$this->RiwayatPenyakit_model->remove($id);
				if (count($this->input->post('namaPenyakit')) == 0) {
					# code...
				}else{
					foreach ($this->input->post('namaPenyakit') as $key => $value) {
						$array['namaPenyakit'] = $value;
						$array['statusPenyakit'] = $this->input->post('statusPenyakit')[$key];
						$array['tahunPenyakit'] = $this->input->post('tahunPenyakit')[$key];
						$array['pengobatan'] = $this->input->post('pengobatan')[$key];
						$array['pantangan'] = $this->input->post('pantangan')[$key];
						$array['idSiswa'] = $id;
						$this->RiwayatPenyakit_model->insert($array);
					}
				}
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Penyakit!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				// die();
				redirect('Dashboard/siswa/detil/'.$id,'refresh');
				break;
			case 'kelahiran':
				$data = array(
					'kondisiKelahiran' => $this->input->post('kondisiKelahiran'),
					'kondisiIbu' => $this->input->post('kondisiIbu'),
					'kondisiLingkungan' => $this->input->post('kondisiLingkungan'),
					'pernahRawat' => $this->input->post('pernahRawat'),
					'usiaKelahiran' => $this->input->post('usiaKelahiran'),
					'kasusKhusus' => $this->input->post('kasusKhusus'),
					'prosesKelahiran' => $this->input->post('prosesKelahiran'),
					'tengkurap' => $this->input->post('tengkurap'),
					'berjalan' => $this->input->post('berjalan'),
					'bicara' => $this->input->post('bicara'),
					'merangkak' => $this->input->post('merangkak'),
					'diperintah' => $this->input->post('diperintah'),
					'karakter1' => $this->input->post('karakter1'),
					'karakter2' => $this->input->post('karakter2'),
					'karakter3' => $this->input->post('karakter3'),
					'karakter4' => $this->input->post('karakter4'),
					'karakter5' => $this->input->post('karakter5')
				);
				$data['idSiswa'] = $id;
				$res = $this->RiwayatKelahiran_model->getWhere(array('idSiswa'=>$id));
				if ($res->num_rows() > 0) {
					$this->RiwayatKelahiran_model->update($id,$data);
				 } else{
					$this->RiwayatKelahiran_model->insert($data);
				 }
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Kelahiran!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Dashboard/siswa/detil/'.$id,'refresh');;
				break;
			case 'keluarga':
				$data = array(
				'jumlahTanggungan' => $this->input->post('jumlahTanggungan'),
				'jumlahPengeluaran' => $this->input->post('jumlahPengeluaran'),
				'danaPendidikan' => $this->input->post('danaPendidikan'),
				'orangSaturumah' => $this->input->post('orangSaturumah'),
				'tinggalBersama' => $this->input->post('tinggalBersama'),
				'jarakTempuh' => $this->input->post('jarakTempuh'),
				'waktuTempuh' => $this->input->post('waktuTempuh'),
				'jenisTransportasi' => $this->input->post('jenisTransportasi'),
				'pengantarSekolah' => $this->input->post('pengantarSekolah'),
				'orangTerdekat' => json_encode($this->input->post('orangTerdekat')),

				);
				foreach ($this->input->post('namaSaudara') as $key => $value) {
					$dataKeluarga['namaSaudara'] = $value;
					$dataKeluarga['umurSaudara'] = $this->input->post('umurSaudara')[$key];
					$dataKeluarga['sekolahSaudara'] = $this->input->post('sekolahSaudara')[$key];
					$dataKeluarga['kelasSaudara'] = $this->input->post('kelasSaudara')[$key];
					$data['dataKeluarga'][]=$dataKeluarga;
					// array_push($data['dataKeluarga'], $dataKeluarga);
				}
				$data['dataKeluarga'] =json_encode($data['dataKeluarga']);
				// echo json_encode($data);die();
				$this->Siswa_model->update($id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Keluarga!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Dashboard/siswa/detil/'.$id,'refresh');
				break;
			case 'tambahan':
				$data = array(
					'pertanyaan1' => $this->input->post('pertanyaan1'),
					'pertanyaan2' => $this->input->post('pertanyaan2'),
					'pertanyaan3' => $this->input->post('pertanyaan3'),
					'pertanyaan4' => $this->input->post('pertanyaan4'),
					'pertanyaan5' => $this->input->post('pertanyaan5'),
					'pertanyaan6' => $this->input->post('pertanyaan6'),
					'pertanyaan7' => $this->input->post('pertanyaan7'),
					'pertanyaan8' => $this->input->post('pertanyaan8'),
					'pertanyaan9' => $this->input->post('pertanyaan9'),
					'pertanyaan10' => $this->input->post('pertanyaan10'),
					'pertanyaan11' => $this->input->post('pertanyaan11'),
					'pertanyaan12' => $this->input->post('pertanyaan12'),
					'pertanyaan13' => $this->input->post('pertanyaan13'),
					'pertanyaan14' => $this->input->post('pertanyaan14'),
					'pertanyaan15' => $this->input->post('pertanyaan15'),
					'pertanyaan16' => $this->input->post('pertanyaan16'),
					'pertanyaan17' => $this->input->post('pertanyaan17'),
					'pertanyaan18' => $this->input->post('pertanyaan18'),
					'pertanyaan19' => $this->input->post('pertanyaan19'),
					'pertanyaan20' => $this->input->post('pertanyaan20'),
					'pertanyaan21' => $this->input->post('pertanyaan21'),
					'pertanyaan22' => $this->input->post('pertanyaan22'),
					'pertanyaan23' => $this->input->post('pertanyaan23'),
					'pertanyaan24' => $this->input->post('pertanyaan24'),
					'pertanyaan25' => $this->input->post('pertanyaan25'),
					'pertanyaan26' => $this->input->post('pertanyaan26'),
					'pertanyaan27' => $this->input->post('pertanyaan27'),
				);
				$this->Siswa_model->update($id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Tambahan!</strong> Berhasil disimpan.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Dashboard/siswa/detil/'.$id,'refresh');
				break;
			case 'perkembangan':
				// print_r($this->input->post('dataPerkembangan'));die();
				$data = array('dataPerkembangan' => json_encode($this->input->post('dataPerkembangan')));
				$this->Siswa_model->update($id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Perkembangan Anak!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Dashboard/siswa/detil/'.$id,'refresh');
				break;
			default:
				# code...
				break;
		}
	}
	public function siswa($case='',$id='',$spec='')
	{
		switch ($case) {
			case 'detil':
				$data['siswa'] = $this->Siswa_model->getWhere(array('id'=>$id));
				$data['penyakit'] = $this->RiwayatPenyakit_model->getWhere(array('idSiswa'=>$id));
				$data['kelahiran'] = $this->RiwayatKelahiran_model->getWhere(array('idSiswa'=>$id));
				$this->load->view('admin/header_s');
				$this->load->view('admin/detil_siswa',$data);
				$this->load->view('admin/footer_s');
				break;
			case 'draft':
				$data['siswa'] = $this->Siswa_model->getWhere(array('id'=>$id))->result()[0];
				$this->load->library('Pdf');
				$this->load->view('admin/view_file',$data);
				break;
			case 'invoice':
				$data['siswa'] = $this->Siswa_model->getWhere(array('id'=>$id))->result()[0];
				$this->load->library('Pdf');
				$this->load->view('admin/invoice',$data);
				break;
			case 'verif':
				if ($spec == 'lolos') {
					$this->Siswa_model->update($id,array('statusPendaftaran' => 'lolos verifikasi', 'verifikasiBerkas'=>1));
				}else{
					$this->Siswa_model->update($id,array('statusPendaftaran' => 'terdaftar', 'verifikasiBerkas'=>2));
				}
				redirect('Dashboard/siswa/detil/'.$id,'refresh');
				break;
			default:
				if ($case == '') {
					$data['siswa'] = $this->Siswa_model->getAll();
				}else{
					$data['siswa'] = $this->Siswa_model->getWhere(array('jenjangPendidikan'=>$case));
				}

				$this->load->view('admin/header_s');
				switch ($case) {
					case 'KB':
						$this->load->view('admin/tabel_siswa_kb',$data);
						break;
					case 'TK':
						$this->load->view('admin/tabel_siswa',$data);
						break;
					case 'SD':
						$this->load->view('admin/tabel_siswa_sd',$data);
						break;
					default: //SD
						$this->load->view('admin/tabel_siswa_all',$data);
						break;
				}

				$this->load->view('admin/footer_s');
				break;
		}
	}
	public function guru($case='',$id='')
	{
		switch ($case) {
			case 'add':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$data = array(
						'namaLengkap' => $this->input->post('namaLengkap'),
						'nomorSeluler' => $this->input->post('nomorSeluler'),
						'email'=>$this->input->post('email'),
						'tanggalLahir'=>date('Y-m-d',strtotime($this->input->post('tanggalLahir'))),
						'password'=>md5(str_replace('/', '', $this->input->post('tanggalLahir'))),
						'status'=>$this->input->post('status'),
						'isInterviewer'=> ($this->input->post('isInterviewer') == 1? 1:0),
						'isNotulen'=> ($this->input->post('isNotulen') == 1? 1:0)
					);
					// echo "<br/>".$this->input->post('isInterviewer');
					// print_r($data);die();
					$this->Guru_model->insert($data);
					$info ='<div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Selamat!</strong> data guru berhasil ditambahkan. </div>';
					$this->session->set_flashdata('info',$info);
					redirect('Dashboard/guru','refresh');
				}else{

				}
				break;
			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					# code...
				}else{

				}
				break;
			case 'delete':
				# code...
				break;
			case 'notulensi':
				$where = array('id' => $id);
				$res = $this->Guru_model->getWhere($where);
				if($res->result()[0]->isNotulen == 0){
					$data = array('isNotulen' => 1);
				}else{
					$data = array('isNotulen' => 0);
				}
				$this->Guru_model->update($id,$data);
				$info ='<div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Selamat!</strong> data guru berhasil diupdate. </div>';
					$this->session->set_flashdata('info',$info);
					redirect('Dashboard/guru','refresh');
				break;
			case 'interview':
				$where = array('id' => $id);
				$res = $this->Guru_model->getWhere($where);
				if($res->result()[0]->isInterviewer == 0){
					$data = array('isInterviewer' => 1);
				}else{
					$data = array('isInterviewer' => 0);
				}
				$this->Guru_model->update($id,$data);
				$info ='<div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Selamat!</strong> data guru berhasil diupdate. </div>';
					$this->session->set_flashdata('info',$info);
					redirect('Dashboard/guru','refresh');
				break;
			default:
				$data['guru'] = $this->Guru_model->getAll();
				$this->load->view('admin/header_s');
				$this->load->view('admin/tabel_guru',$data);
				$this->load->view('admin/footer_s');
				break;
		}
	}
	public function Export($value='',$spec=''){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // echo "sdsa";
	     // Settingan awal fil excel
   		$excel->getProperties()->setCreator('Sistem')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Siswa ".$value)
                 ->setSubject("Siswa")
                 ->setDescription("Laporan Semua Data Siswa")
                 ->setKeywords("Data Siswa");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Nama Anak"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Jenis Kelamin"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C1', "tanggal Lahir"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D1', "tempat Lahir"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E1', "anak Ke"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('F1', "agama"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('G1', "Nama Ayah/Wali"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('H1', "Nama Ibu"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('I1', "Telepon Ayah"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('J1', "Telepon Ibu"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('K1', "Alamat Tinggal"); // Set kolom E3 dengan tulisan "ALAMAT"
	    if ($value != '') {
		    $excel->setActiveSheetIndex(0)->setCellValue('L1', "Jenjang Pendidikan"); // Set kolom E3 dengan tulisan "ALAMAT"
	    	$excel->setActiveSheetIndex(0)->setCellValue('M1', "Tingkat");
		}
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
	    if ($value != '') {
		    $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		}

	  	if ($value == '') {
	  		$result = $this->Siswa_model->getAll();
	  	}else{
	  		if ($spec == '') {
	  			$result = $this->Siswa_model->getWhere( array('jenjangPendidikan' => $value ));
	  		}else{
	  			$result = $this->Siswa_model->getWhere( array('jenjangPendidikan' => $value,'tingkat'=>$spec ));
	  		}
	  	}
		// echo json_encode($result);die();
	     $no = 1; // Untuk penomoran tabel, di awal set dengan 1
		    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		    foreach($result->result() as $data){ // Lakukan looping pada variabel siswa
		      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->namaLengkap);
		      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->jenisKelamin);
		      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, date('d/m/Y',strtotime($data->tanggalLahir)));
		      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tempatLahir);
		      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->anakKe);
		      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->agama);
		      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->ayah_namaLengkap);
		      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->ibu_namaLengkap);
		      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->ayah_phone);
		      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->ibu_phone);
		      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->alamat1);
		      if ($value != '') {
		      	$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->jenjangPendidikan);
		      	$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tingkat);
		      }

		      $no++; // Tambah 1 setiap kali looping
		      $numrow++; // Tambah 1 setiap kali looping
		    }

			    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		    // Set orientasi kertas jadi LANDSCAPE
		    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		    // Set judul file excel nya
		     $excel->setActiveSheetIndex(0);
		    $excel->getActiveSheet(0)->setTitle("Siswa ".$value);

		    // Proses file excel
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		    header('Cache-Control: max-age=0');
		    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		    $write->save('php://output');
	}
}
