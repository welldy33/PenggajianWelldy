<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_welldy extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_welldy');
		$this->load->helper('form');
		$this->load->library('session');
	}
	public function index()
	{
		$data["page"]='def';
		$this->load->view('index',$data);
	}
	//-- Jabatan Start
	public function formDel(){
		$kd_jab=$this->uri->segment(3);
		$kd=$this->input->post('kd_jab');

		$canbeDel=true;
		$where=array(
			'kode_jab'=>$kd
		);
		$checkKar=$this->M_welldy->get_data_where($where,'karyawan')->row();
		$checkRule=$this->M_welldy->get_data_where($where,'rule')->row();
		if($checkKar!=null||$checkRule!=null){
			$canbeDel=false;
		}else{
			$this->M_welldy->delete_data($where,'jabatan');
		}
		//redirect('C_welldy/vjab');
		echo json_encode($canbeDel);
	}
	public function cancelJab(){
		redirect('C_welldy/vjab');
	}
	public function vjab(){
		$data["page"]='jabatan';
		$data["datas"]=$this->M_welldy->get_data('jabatan')->result();
		$this->load->view('index',$data);
	}
	public function formAdd(){
		$kd_jab=$this->uri->segment(3);
		$data["page"]='formJab';
		//$data["data"]=$kd_jab;
		if($kd_jab!=""){
			$where=array(
				'kode_jab'=>$kd_jab
			);
			$data["data"]=$this->M_welldy->get_data_where($where,'jabatan')->row();
		}else{
			$data["data"]=null;
		}
		$this->load->view('index',$data);
	}
	public function saveJab(){
		// if($this->input->post('save')){
			$kd=$this->input->post('kd_jab');
			$jabatan=$this->input->post('jab');
			$sal=$this->input->post('sal');
			$ket=$this->input->post('ket');
			if($kd==""){
				$data=array(
					'jabatan'=>$jabatan,
					'std_gaji'=>$sal,
					'ket'=>$ket
				);
				$this->M_welldy->insert_data($data,'jabatan');
			}
			if($kd!=""){
				$data=array(
					'jabatan'=>$jabatan,
					'std_gaji'=>$sal,
					'ket'=>$ket
				);
				$where=array(
					'kode_jab'=>$kd
				);
				$this->M_welldy->update_data($where,$data,'jabatan');
			}
		// }
		//redirect('C_welldy/vjab');
		echo json_encode(true);
	}
	//--Jabatan End


	//start karyawan
	public function formDelkar(){
		//$nip=$this->uri->segment(3);
		$nip=$this->input->post('nip');
		$canbeDel=true;
		$where=array(
			'nip'=>$nip
		);
		$checkRule=$this->M_welldy->get_data_where($where,'gaji')->row();
		if($checkRule!=null){
			$canbeDel=false;
		}else{
			$this->M_welldy->delete_data($where,'karyawan');
		}
		//redirect('C_welldy/vkar');
		echo json_encode($canbeDel);
	}

	//end karyawan

	public function formDelGaj(){
		//$nip=$this->uri->segment(3);
		$nip=$this->input->post('nip');
		$rec=$this->input->post('rec');
		$canbeDel=true;
		$where=array(
			'nip'=>$nip
			,'rec_date'=>$rec
		);
		$this->M_welldy->delete_data($where,'gaji');
		//redirect('C_welldy/vkar');
		echo json_encode($canbeDel);
	}
	public function vgaji(){
		$data["page"]='gaji';
		$data["datas"]=$this->M_welldy->get_data('gaji')->result();
		$this->load->view('index',$data);
	}
	public function vrule(){
		$data["page"]='aturan';
		$data["datas"]=$this->M_welldy->get_data('rule')->result();
		$this->load->view('index',$data);
	}
	public function vkar(){
		$data["page"]='karyawan';
		$data["datas"]=$this->M_welldy->get_data('karyawan')->result();
		$this->load->view('index',$data);
	}

	public function get_nip(){
		$kode_jab=$this->input->post('kode_jab');
		$where=array(
			'kode_jab'=>$kode_jab
		);
        $data=$this->M_welldy->get_data_where($where,'karyawan')->result();
        echo json_encode($data);
	}
	public function formAddGaji(){
		$kd_jab=$this->uri->segment(3);
		$data["page"]='formGaj';
		$data["data"]=$this->M_welldy->get_data('jabatan')->result();
		$this->load->view('index',$data);
	}
	public function formAddKar(){
		$kd_jab=$this->uri->segment(3);
		$data["page"]='formkar';
		if($kd_jab!=""){
			$where=array(
				'nip'=>$kd_jab
			);
			$data["data"]=$this->M_welldy->get_data_where($where,'karyawan')->row();

			$data["read"]="true";
		}else{
			$data["data"]=null;
			$data["read"]="false";
		}
		$data["datajab"]=$this->M_welldy->get_data('jabatan')->result();
		$this->load->view('index',$data);
	}

	public function formAddRul(){
		$kode_jab=$this->uri->segment(3);
		$masa_jab=$this->uri->segment(4);
		$data["page"]='formRule';
		//$data["data"]=$kd_jab;
		if($kode_jab!=""){
			$where=array(
				'kode_jab'=>$kode_jab
				,'masa_kerja'=>$masa_jab
			);
			$data["data"]=$this->M_welldy->get_data_where($where,'rule')->row();
		}else{
			$data["data"]=null;
		}
		$data["datajab"]=$this->M_welldy->get_data('jabatan')->result();
		$this->load->view('index',$data);
	}

	
	public function saveGaj(){
		$iinsertOk=true;
		// if($this->input->post('save')){
			$nip=$this->input->post('nip');
			$rec=$this->input->post('rec');
			$where=array(
				'nip'=>$nip
			);
			$cek=$this->M_welldy->get_data_where($where,'gaji')->row();
			if($cek!=null){
				$iinsertOk=false;
			}else{
				$this->M_welldy->calculate($nip);
			}
		// }
		echo json_encode($iinsertOk);
		//redirect('C_welldy/vgaji');
	}
	public function saveKar(){
		$isUpdate=$this->uri->segment(3);
		if($this->input->post('save')){
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');
			$tgl=$this->input->post('tgl');
			$jk=$this->input->post('jk');
			$tlp=$this->input->post('tlp');
			$email=$this->input->post('email');
			$alamat=$this->input->post('alamat');
			$jab=$this->input->post('jab');
			$mk=$this->input->post('mk');
			if($isUpdate==""){
				$data=array(
					'nip'=>$nip,
					'nama'=>$nama,
					'jk'=>$jk,
					'tgl_lahir'=>$tgl,
					'telp'=>$tlp,
					'email'=>$email,
					'alamat'=>$alamat,
					'kode_jab'=>$jab,
					'masa_kerja'=>$mk
				);
				$this->M_welldy->insert_data($data,'karyawan');
			}
			if(!isset($isUpdate)){
				$data=array(
					'nama'=>$nama,
					'jk'=>$jk,
					'tgl_lahir'=>$tgl,
					'telp'=>$tlp,
					'email'=>$email,
					'alamat'=>$alamat,
					'kode_jab'=>$jab,
					'masa_kerja'=>$mk
				);
				$where=array(
					'nip'=>$nip
				);
				$this->M_welldy->update_data($where,$data,'karyawan');
			}
		}
		redirect('C_welldy/vkar');
	}
	public function saveRul(){
		$isUpdate=$this->uri->segment(3);
		if($this->input->post('save')){
			$kd=$this->input->post('kode_jab');
			$masa_kerja=$this->input->post('masa_kerja');
			$insentif=$this->input->post('insentif');
			$bonus=$this->input->post('bonus');
			if($isUpdate==""){
				$data=array(
					'kode_jab'=>$kd,
					'masa_kerja'=>$masa_kerja,
					'insentif'=>$insentif,
					'bonus'=>$bonus
				);
				$this->M_welldy->insert_data($data,'rule');
			}
			if($isUpdate!=""){
				$data=array(
					'insentif'=>$insentif,
					'bonus'=>$bonus,
				);
				$where=array(
					'kode_jab'=>$kd,
					'masa_kerja'=>$masa_kerja
				);
				$this->M_welldy->update_data($where,$data,'rule');
			}
		}
		redirect('C_welldy/vrule');
	}

}
