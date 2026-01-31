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
        $veri['sonuc']=null;
        $this->load->view('home_detay_view',$veri);
    }

    public function rezervasyonEklePost()
    {
        $this->load->model("araclar_model");
        $this->load->model("rezervasyonlar_model");
        $id=$this->input->post('arac_id_');
        $rezervasyon = array(
            'arac_id'   => $id,
            'tc_kimlik' => $this->input->post('tc_kimlik_'),
            'ad_soyad'  => $this->input->post('ad_soyad_'),
            'alma_tarihi'   => $this->input->post('alma_tarihi_'),
            'teslim_tarihi' => $this->input->post('teslim_tarihi_'),
            'tutar'         => $this->input->post('tutar_')
        );

        $result = $this->rezervasyonlar_model->Ekle($rezervasyon);
        if($result) 
        {
            $veri['sonuc']="Rezervasyon işlemi başarılı";
        }
        else
        {
            $veri['sonuc']="Rezervasyon işlemi esnasında bir hata oluştu";
        }
    
        $veri['arac_bilgileri']=$this->araclar_model->AracBilgisiGetir($id);
        $this->load->view('home_detay_view',$veri);
    }

    public function rezervasyonlarim()
    {
        $veri['tc']=null;
        $veri['rezervasyonlar']=[];
        $this->load->view('home_rezervasyonlarim_view',$veri);
    }

    public function rezervasyonlarimPost()
    {
        $veriler=new stdClass();
        $this->load->model('rezervasyonlar_model');
        $tc = $this->input->post('tc_kimlik_');
        $veriler->tc=$tc;
        //$veriler['tc']=$tc
        $veriler->rezervasyonlar=$this->rezervasyonlar_model->RezervasyonListem($tc);
        //$veriler['rezervasyonlar']=$this->rezervasyonlar_model->RezervasyonListem($tc);
        $this->load->view('home_rezervasyonlarim_view',$veriler);
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