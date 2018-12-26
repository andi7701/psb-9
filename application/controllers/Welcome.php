<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('Siswa_model');
		$this->load->model('RiwayatPenyakit_model');
		$this->load->model('RiwayatKelahiran_model');
	}
	public function index()
	{
		$this->load->view('ots/header');
		$this->load->view('ots/welcome');
		$this->load->view('ots/footer');
		// $this->load->view('ots/welcome');
	}
	public function daftar($q='')
	{
		$this->load->view('ots/header');
		$this->load->view('ots/daftar');
		$this->load->view('ots/footer');
	}
	public function informasi($value='')
	{
		$this->load->view('ots/header');
		$this->load->view('ots/informasi');
		$this->load->view('ots/footer');
	}
	public function regist($value='')
	{
		$dsl = $this->Siswa_model->getWhere(array('username'=>$this->input->post('username')));
		if ($dsl->num_rows() > 0) {
			$info ='<div class="alert alert-success alert-dismissible text-justify"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> Terima kasih ayah dan bunda sudah mendaftarkan ananda di Sekolah Alam Indonesia - Studio Alam. Silakan ayah dan bunda <b>melalukan pembayaran seleksi 1 sebesar Rp 350.000,- pada tanggal 22 Desember 2018 bertempat di Sekolah Alam Indonesia - Studio Alam.</b> </div>';
			$this->session->set_flashdata('info',$info);
			redirect('Welcome/daftar','refresh');
		}else{


		// var_dump($this->input->post('wali_c'));die();
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
			// 'ayah_tanggalLahir' => DateTime::createFromFormat('d/m/Y', $this->input->post('ayah_tanggalLahir'))->format('Y-m-d'),
			// 'ayah_tempatLahir' =>$this->input->post('ayah_tempatLahir'),
			// 'ayah_alamat' =>$this->input->post('ayah_alamat'),
			'ayah_phone' =>$this->input->post('ayah_phone'),
			// 'ayah_telepon' =>$this->input->post('ayah_telepon'),
			'ayah_email' =>$this->input->post('ayah_email'),
			// 'ayah_pos' =>$this->input->post('ayah_pos'),
			// 'ayah_suku' =>$this->input->post('ayah_suku'),
			// 'ayah_kewarganegaraan' =>$this->input->post('ayah_kewarganegaraan'),
			// 'ayah_lastDegree' =>$this->input->post('ayah_lastDegree'),
			// 'ayah_almamater' =>$this->input->post('ayah_almamater'),
			// 'ayah_bidKerjaan' =>$this->input->post('ayah_bidKerjaan'),
			// 'ayah_kantor' =>$this->input->post('ayah_kantor'),
			// 'ayah_alamatKantor' =>$this->input->post('ayah_alamatKantor'),
			// 'ayah_jabatan' =>$this->input->post('ayah_jabatan'),
			// 'ayah_penghasilan' =>$this->input->post('ayah_penghasilan'),
			// 'ayah_jmlJamKerja' =>$this->input->post('ayah_jmlJamKerja'),
			// 'ayah_jmlJamKeluarga' =>$this->input->post('ayah_jmlJamKeluarga'),
			'ibu_namaLengkap' =>$this->input->post('ibu_namaLengkap'),
			// 'ibu_tanggalLahir' =>DateTime::createFromFormat('d/m/Y', $this->input->post('ibu_tanggalLahir'))->format('Y-m-d'),
			// 'ibu_tempatLahir' =>$this->input->post('ibu_tempatLahir'),
			// 'ibu_alamat' =>$this->input->post('ibu_alamat'),
			'ibu_phone' =>$this->input->post('ibu_phone'),
			// 'ibu_telepon' =>$this->input->post('ibu_telepon'),
			// 'ibu_pos' =>$this->input->post('ibu_pos'),
			// 'ibu_kewarganegaraan' =>$this->input->post('ibu_kewarganegaraan'),
			// 'ibu_email' =>$this->input->post('ibu_email'),
			// 'ibu_suku' =>$this->input->post('ibu_suku'),
			// 'ibu_bidKerjaan' =>$this->input->post('ibu_bidKerjaan'),
			// 'ibu_kantor' =>$this->input->post('namaLengkap'),
			// 'ibu_alamatKantor' =>$this->input->post('ibu_alamatKantor'),
			// 'ibu_jabatan' =>$this->input->post('ibu_jabatan'),
			// 'ibu_penghasilan' =>$this->input->post('ibu_penghasilan'),
			// 'ibu_jmlJamKerja' =>$this->input->post('ibu_jmlJamKerja'),
			// 'ibu_jmlJamKeluarga' =>$this->input->post('ibu_jmlJamKeluarga'),
			// 'ayah_nik'=>$this->input->post('ayah_nik'),
			// 'ibu_nik'=>$this->input->post('ibu_nik'),
			'sys_code' =>$this->sysCode(),
			'status' =>0,
			'password'=>md5($this->input->post('password')),
			'jenjangPendidikan'=>$this->input->post('jenjangPendidikan'),
			'tingkat'=>$this->input->post('tingkat'),
			'username'=>$this->input->post('username')
		);
		if ($this->input->post('wali_c') == 'on') {
			$data['wali_namaLengkap'] = $this->input->post('wali_namaLengkap');
			$data['isWali'] = 1;
			$data['wali_phone'] =$this->input->post('wali_phone');
			$data['posisiWali'] =$this->input->post('posisiWali');
		}
		// echo DateTime::createFromFormat('d/m/Y', $this->input->post('ibu_tanggalLahir'))->format('Y-m-d');die();
		// echo json_encode($data);die();
		$id = $this->Siswa_model->insert($data);
		$email = $this->sendmail($data);
		// die();
		$info ='<div class="alert alert-success alert-dismissible text-justify"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> Terima kasih ayah dan bunda sudah mendaftarkan ananda di Sekolah Alam Indonesia - Studio Alam. Silakan ayah dan bunda <b>melakukan pembayaran seleksi 1 sebesar Rp 350.000,- pada tanggal 22 Desember 2018 bertempat di Sekolah Alam Indonesia - Studio Alam.</b> </div>';
		$this->session->set_flashdata('info',$info);
		redirect('Welcome/login','refresh');
		}
	}

	public function ots($value='')
	{
		if (!$this->session->userdata('ots')) {
			redirect('Welcome/login','refresh');
		}
		if ($this->session->userdata('ots')->status == 0) {
			$this->load->view('ots/active');
		}else{
			switch ($value) {
				case 'formulir':
					$data['siswa'] = $this->Siswa_model->getWhere(array('id'=>$this->session->userdata('ots')->id));
					$data['penyakit'] = $this->RiwayatPenyakit_model->getWhere(array('idSiswa'=>$this->session->userdata('ots')->id));
					$data['kelahiran'] = $this->RiwayatKelahiran_model->getWhere(array('idSiswa'=>$this->session->userdata('ots')->id));
					// print_r($data['kelahiran']->result());die();
					// echo json_encode($data['siswa']->result()[0]);die();
					$this->load->view('ots/header_s');
					$this->load->view('ots/formulirs',$data);
					$this->load->view('ots/footer_s');
					break;
				case 'tatacara':
					$this->load->view('ots/header_s');
					$this->load->view('ots/tata');
					$this->load->view('ots/footer_s');
					break;
				default:
					$data['siswa'] = $this->Siswa_model->getWhere(array('id'=>$this->session->userdata('ots')->id))->result()[0];
					$data['penyakit'] = $this->RiwayatPenyakit_model->getWhere(array('idSiswa'=>$this->session->userdata('ots')->id));
					$data['kelahiran'] = $this->RiwayatKelahiran_model->getWhere(array('idSiswa'=>$this->session->userdata('ots')->id));
					if ($data['siswa']->pertanyaan1 != NULL && $data['siswa']->dataPerkembangan != NULL && count($data['penyakit']->result()) > 0 && count($data['kelahiran']->result()) > 0 ) {
						$data['formulir'] = TRUE;
					}else{$data['formulir'] = FALSE;}

					$this->load->view('ots/header_s');
					$this->load->view('ots/index_s',$data);
					$this->load->view('ots/footer_s');
					break;
			}
		}
	}

	public function save($value='')
	{
		if (!$this->session->userdata('ots')) {
			redirect('Welcome/login','refresh');
		}
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
					$data['pasFoto'] = $filefoto;
					$data['kartuKeluarga'] = $kartuKeluarga;
					$data['aktaKelahiran'] = $aktaKelahiran;
										// print_r($_FILES['pasFoto']);die();
					$this->Siswa_model->update($this->session->userdata('ots')->id,$data);
					// die();
					$info = '<div class="alert alert-success"> <strong>Data Pendaftaran!</strong> Berhasil diubah.</div>';
					$this->session->set_flashdata('info',$info);
					redirect('Welcome/ots/formulir','refresh');
					break;
			case 'penyakit':
				$data = array('berat' =>$this->input->post('berat') ,'tinggi'=>$this->input->post('tinggi'));
				// print_r($this->input->post('namaPenyakit'));die();
				$this->Siswa_model->update($this->session->userdata('ots')->id ,$data);
				$this->RiwayatPenyakit_model->remove($this->session->userdata('ots')->id);
				if (count($this->input->post('namaPenyakit')) == 0) {
					# code...
				}else{
					foreach ($this->input->post('namaPenyakit') as $key => $value) {
						$array['namaPenyakit'] = $value;
						$array['statusPenyakit'] = $this->input->post('statusPenyakit')[$key];
						$array['tahunPenyakit'] = $this->input->post('tahunPenyakit')[$key];
						$array['pengobatan'] = $this->input->post('pengobatan')[$key];
						$array['pantangan'] = $this->input->post('pantangan')[$key];
						$array['idSiswa'] = $this->session->userdata('ots')->id;
						$this->RiwayatPenyakit_model->insert($array);
					}
				}
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Penyakit!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				// die();
				redirect('Welcome/ots/formulir','refresh');
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
				$data['idSiswa'] = $this->session->userdata('ots')->id;
				$res = $this->RiwayatKelahiran_model->getWhere(array('idSiswa'=>$this->session->userdata('ots')->id));
				if ($res->num_rows() > 0) {
					$this->RiwayatKelahiran_model->update($this->session->userdata('ots')->id,$data);
				 } else{
					$this->RiwayatKelahiran_model->insert($data);
				 }
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Kelahiran!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Welcome/ots/formulir','refresh');
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
				$this->Siswa_model->update($this->session->userdata('ots')->id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Riwayat Keluarga!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Welcome/ots/formulir','refresh');
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
				$this->Siswa_model->update($this->session->userdata('ots')->id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Tambahan!</strong> Berhasil disimpan.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Welcome/ots/formulir','refresh');
				break;
			case 'perkembangan':
				// print_r($this->input->post('dataPerkembangan'));die();
				$data = array('dataPerkembangan' => json_encode($this->input->post('dataPerkembangan')));
				$this->Siswa_model->update($this->session->userdata('ots')->id,$data);
				$info = '<div class="alert alert-success"> <strong>Data Perkembangan Anak!</strong> Berhasil diubah.</div>';
				$this->session->set_flashdata('info',$info);
				redirect('Welcome/ots/formulir','refresh');
				break;
			default:
				# code...
				break;
		}
	}
	public function cekKuota($value='')
	{
		$data = $this->input->post();
		$hsl = $this->Siswa_model->getWhere($data)->num_rows();
		
		if ($data['jenjangPendidikan'] == 'KB') {
			if ($hsl >= 18) {$result = array('status' => 'denied');}
			else{$result = array('status' => 'allowed');}
		}elseif ($data['jenjangPendidikan'] == 'TK') {
			if ($data['tingkat'] == 'A') {
				if ($hsl >= 23) {$result = array('status' => 'denied');}
				else{$result = array('status' => 'allowed');}
			}else{
				if ($hsl >= 21) {$result = array('status' => 'denied');}
				else{$result = array('status' => 'allowed');}
			}
		}else{
			if ($data['tingkat'] == 1) {
				if ($hsl >= 36) {$result = array('status' => 'denied');}
				else{$result = array('status' => 'allowed');}
			}elseif ($data['tingkat'] == 2) {
				if ($hsl >= 3) {$result = array('status' => 'denied');}
				else{$result = array('status' => 'allowed');}
			}else{
				if ($hsl >= 7) {$result = array('status' => 'denied');}
				else{$result = array('status' => 'allowed');}
			}
		}
		// $result = array('status' => 'denied' );
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	public function active($value='')
	{
		if (!$this->session->userdata('ots')) {
			redirect('Welcome/login','refresh');
		}
		$data = array('sys_code' => $this->input->post('sys_code'),'id'=>$this->session->userdata('ots')->id);
		// print_r($data);die();
		$hsl = $this->Siswa_model->getWhere($data);
		if ($hsl->num_rows() > 0) {
			$up = array('status' => 1);
			$this->Siswa_model->update($this->session->userdata('ots')->id,$up);
			$this->session->userdata('ots')->status = 1;
			$info ='<div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> Selamat, tahap awal pendaftaran siswa baru sudah dilewati. Orang Tua Calon Siswa diharapkan untuk datang ke Sekolah untuk mendapatkan Kode Akses untuk melanjutkan pendaftaran ke tahap selanjutnya. </div>';
			$this->session->set_flashdata('info',$info);
		}else{
			$info ='<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Maaf</strong> Kode Aktivasi yang anda masukan salah. Perhatikan dengan baik dan tulis kode aktivasi dengan benar. </div>';
			$this->session->set_flashdata('info',$info);
			
		}
		redirect('Welcome/ots','refresh');
	}

	public function login($value='')
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$where = array('username' => $this->input->post('username'),'password'=>md5($this->input->post('password')));
			$res = $this->Siswa_model->getWhere($where);
			if ($res->num_rows() > 0) {
				$this->session->set_userdata('ots',$res->result()[0]);
				redirect('Welcome/ots','refresh');
			}else{
				$info ='<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Maaf!</strong> Kombinasi nama anak dengan password yang anda masukan salah. Silakan tulis nama panggilan dan password dengan benar. </div>';
				$this->session->set_flashdata('info',$info);
				redirect('Welcome/login','refresh');	
			}
		}else{
			$this->load->view('ots/login');
		}
	}
	public function sysCode($value='')
	{
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789"; 
	    srand((double)microtime()*1000000); 
	    $i = 0; 
	    $pass = '' ; 

	    while ($i <= 7) { 
	        $num = rand() % 33; 
	        $tmp = substr($chars, $num, 1); 
	        $pass = $pass . $tmp; 
	        $i++; 
	    } 

	    return $pass; 
	}
	
	public function kirimEm($email){
	    $where = array('ayah_email'=>$email);
	    $res = $this->Siswa_model->getWhere($where);
	    if($res->num_rows() > 0){
	        $this->sendmail($res->result_array()[0]);
	    }else{echo "Not Found";}
	}
	
	public function sendmail($object)
	{
		//SMTP & mail configuration
		$this->load->library('email');
		$this->load->library('encrypt');
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://mail.saistudioalam.sch.id',
		    'smtp_port' => 465,
		    'smtp_user' => 'psb@saistudioalam.sch.id',
		    'smtp_pass' => 'Saiindonesia2018',
		    'mailtype'  => 'html',
		    // 'charset'   => 'utf-8'
		    'charset'   => 'iso-8859-1'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		//Email content
		// $htmlContent = '<h1>Sending email via SMTP server</h1>';
		// $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
		$htmlContent = '<h3>Selamat datang di Sekolah Alam Indonesia - Studio Alam</h3>
<p><b>Hai '.$object['username'].'</b> ! Terima kasih telah melakukan pendaftaran. Akun ayah bunda telah terdaftar di Sekolah Alam Indonesia - Studio Alam.</p>
<p>Untuk langkah selanjutnya, mohon ayah bunda melakukan pembayaran pendaftaran pada hari Sabtu, 22 Desember 2018 (08.00-11.00 WIB) di Sekolah Alam Indonesia - Studio Alam sebesar Rp 350.000,-
</p>
<p>Terima kasih.</p>';

		$this->email->to($object['ayah_email']);
		$this->email->from('psb@saistudioalam.sch.id','Sekolah Alam Indonesia');
		$this->email->subject('Pendaftaran Sekolah Alam Indonesia');
		$this->email->message($htmlContent);
		$r = $this->email->send();
		if (!$r)
		  print_r($this->email->print_debugger());
		  ;
		  // die();
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
        return $this->session->flashdata('email_sent');
	}
}
