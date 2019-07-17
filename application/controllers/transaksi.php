<?php
class transaksi extends CI_Controller{
	function __construct(){
		parent :: __construct();
		$this->load->model(array('model_barang','model_transaksi'));
		chek_session();
 	}

	function index(){
		if(isset($_POST['submit']))
		{
		$this->model_transaksi->simpan_barang();
		redirect('transaksi');
		}
		else{
			$data['barang']=$this->model_barang->tampil_data();
			$data['detail'] =$this->model_transaksi->tampilkan_detail_transaksi()->result();
		$this->template->load('template','transaksi/form_transaksi',$data);
		}
	}
	function hapusitem()
	{
		$id = $this->uri->segment(3);
		$this->model_transaksi->hapusitem($id);
		redirect('transaksi');
	}

	function selesai_belanja()
	{
		$tanggal=date('Y-m-d');
		$user = $this->session->userdata('username');
	$id_op = $this->db->get_where('operator',array('username'=>$user))->row_array();
	$data=array('operator_id'=>$id_op['operator_id'],'tanggal_transaksi'=>$tanggal);
	$this->model_transaksi->selesai_belanja($data);
	redirect('transaksi');
	}

	function laporan(){
		if(isset($_POST['submit']))
		{
			$tanggal1=$this->input->post('tanggal1');
			$tanggal2=$this->input->post('tanggal2');
			$data['record']= $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
			$this->template->load('template','transaksi/laporan',$data);
		}
		else{
			$data['record']= $this->model_transaksi->laporan_default();
			$this->template->load('template','transaksi/laporan',$data);
		}
	}	

	function excel()
	{
		header("Content-type=application/vnd.ms-excel");
		header("content-disposition:attchment;filename=laporantransaksi.xlsx");
		$data['record']= $this->model_transaksi->laporan_default();
		$this->load->view('transaksi/laporan_excel',$data);

	}

}