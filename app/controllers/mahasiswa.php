<?php

class Mahasiswa extends Controller{
	public function index(){
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){
		$data['judul'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('mahasiswa_model')->getMahasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		if( $this->model('mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
			Flasher::setflash('berhasil', 'ditambahkan', 'success');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		} else{
			Flasher::setflash('gagal', 'ditambahkan', 'danger');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		}
	}

	public function hapus($id){
		if( $this->model('mahasiswa_model')->hapusDataMahasiswa($id) > 0 ){
			Flasher::setflash('berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		} else{
			Flasher::setflash('gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		}
	}

	public function getubah(){
		echo json_encode($this->model('mahasiswa_model')->getMahasiswaById($_POST['id']));
	}

	public function ubah(){
		if( $this->model('mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
			Flasher::setflash('berhasil', 'diubah', 'success');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		} else{
			Flasher::setflash('gagal', 'diubah', 'danger');
			header('Location: '.BASEURL.'/mahasiswa');
			exit;
		}
	}

	public function cari(){
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('mahasiswa_model')->cariDataMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}
}