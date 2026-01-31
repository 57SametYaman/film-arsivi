<?php
class home extends CI_Controller {
    //metot, action
    public function index()
    {
        $this->load->model('araclar_model');
        $viewData = new stdClass();
        $viewData->araclar=$this->araclar_model->tumAraclariListele();
        $this->load->view('home_index_view',$viewData); //index_view.php
    }

    public function detay($id)
        {
            $this->load->model('araclar_model');
            $veri['arac_bilgileri']=$this->araclar_model->AracBilgisiGetir($id);
            $veri['kullanici']='Anonim';
            $this->load->view('home_detay_view',$veri);
        }

    public function about()
    {
        $this->load->view('home_about_view');
    }

    public function contact()
    {
        $this->load->view('home_contact_view');
    }
}
?>