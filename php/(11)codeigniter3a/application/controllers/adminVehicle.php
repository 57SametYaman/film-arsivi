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

        //resim ekleme/güncelleme
        public function UploadImage($id,$resim_sorgu)
        {
            $veri['uyari']=null;
            $veri['arac_id']=$id;
            $veri['resim_var_mi']=$resim_sorgu;
            $this->load->view("adminVehicle_UploadImage_view",$veri);

        }

        public function UploadImagePost()
        {
            //burada sadece dosya adı belirlendi
            $arac_id=$this->input->post('arac_id_');
            $file = $arac_id.".jpg"; //dosya adı elde edildi

            //resim değiştirme bölümü
            //önceden resim yüklü, onu sileceğiz
            $resim_sorgu=$this->input->post('resim_var_mi_');
            if($resim_sorgu=='E') 
            {
                //bu komut fiziksel olarak dosyayı siler
                unlink('arac_resimleri/'.$file);
            }

            $this->load->model("araclar_model");

            //yüklenecek dosya ile ilgili özellik belirleme
            $config['upload_path']='./arac_resimleri/';
            $config['allowed_types']='jpg|png|bmp';
            $config['max_size']=2048;
            $config['max_width']=2000;
            $config['max_height']=2000;
            $config['file_name']=$file;

            //yükleme kütüphane aracılığıyla yapılıyor
            //upload nesnesi kullanılıyor
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('resim'))
            {
                //işlem başarısız
                $veri['uyari']=$this->upload->display_errors();
            }
            else
            {
                //işlem başarılı
                $result=$this->araclar_model->UpdateImage($arac_id);
                $veri['uyari']='Tebrikler, resim yükleme başarılı';
                $veri['arac_id']=$arac_id;
                $veri['resim_var_mi']=$resim_sorgu;
                $this->load->view('adminVehicle_UploadImage_view',$veri);
            }
        }
    }
?>