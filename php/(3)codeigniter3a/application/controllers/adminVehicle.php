<?php
    class adminVehicle extends CI_Controller {
        public function index()
        {
            $this->load->model('araclar_model');
            $viewData = new stdClass();
            $viewData->araclar=$this->araclar_model->tumAraclariListele();
            $this->load->view('adminVehicle_index_view',$viewData);
        }
    }
?>