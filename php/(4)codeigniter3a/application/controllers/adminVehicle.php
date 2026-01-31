<?php
    class adminVehicle extends CI_Controller {
        public function index()
        {
            $this->load->model('araclar_model');
            $viewData = new stdClass();
            $viewData->araclar=$this->araclar_model->tumAraclariListele();
            $this->load->view('adminVehicle_index_view',$viewData);
        }

        public function detay($id)
        {
            $this->load->model('araclar_model');
            $veri['arac_bilgileri']=$this->araclar_model->AracBilgisiGetir($id);
            $veri['kullanici']='Anonim';
            $this->load->view('adminVehicle_detay_view',$veri);
        }

        public function ekle()
        {
            $this->load->view('adminVehicle_ekle_view');
        }
    }
?>