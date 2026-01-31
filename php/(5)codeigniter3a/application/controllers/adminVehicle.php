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
            $veri["uyari"]=null;
            $this->load->view('adminVehicle_ekle_view',$veri);
        }

        public function eklePost()
        {
            $this->load->model('araclar_model');

            $arac_bilgisi=array(
                //struct yapısı
                "marka" => $this->input->post("marka_"),
                "model" => $this->input->post("model_"),
                "model_yili" => $this->input->post("model_yili_"),
                "vites" => $this->input->post("vites_"),
                "yakit" => $this->input->post("yakit_"),
                "gunluk_fiyat" => $this->input->post("gunluk_fiyat_")
            );

            $result = $this->araclar_model->AracEkle($arac_bilgisi);

            if ($result) 
            {
                $veri["uyari"]="Tebrikler, yeni araç kaydedildi.";
            } else {
                $veri["uyari"]="Hata, araç kaydedilemedi";
            }

            $this->load->view('adminVehicle_ekle_view',$veri);
        }

        public function Sil($id)
        {
            $this->load->model('araclar_model');
            $result=$this->araclar_model->AracSil($id);
            if($result)
            {
                //true ise
                redirect(base_url("adminVehicle"));
            }
            else 
            {
                //hata verilecek sayfaya yönlendir
            }
        }

        public function duzenle($id)
        {
            $this->load->model('araclar_model');
            $veri['arac']=$this->araclar_model->AracBilgisiGetir($id);
            $veri['kullanici']='Anonim'; 
            $veri["uyari"]=null;
            $this->load->view('adminVehicle_duzenle_view',$veri);
        }
    }
?>