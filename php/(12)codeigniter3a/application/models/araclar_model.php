<?php
class araclar_model extends CI_model {
    //herkese açık değişken
    public $tablo_adi = "";

    public function __construct()
    {
        //bu metoda diğer metotlar erişebilecek.
        parent::__construct();
        $this -> tablo_adi = "tbl_araclar";
    }

    //tüm verileri getiriyor
    //tüm kullanıcılar
    public function tumAraclariListele()
    {
        //dışardan herhangi bir parametre gelmiyor
        //çünkü tüm araçlar listeleniyor
        return $this->db->get($this->tablo_adi)->result();
    }

    public function AracBilgisiGetir($id)
    {
        //select * from tbl_araclar where arac_id=$id
        $this->db->where('arac_id',$id); //bu satır koşul ifadesidir
        $query=$this->db->get($this->tablo_adi); //tabloyu seçtik
        return $query->row(); //veriyi seçtik
    }

    public function AracEkle($arac=array())
    {
        return $this->db->insert($this->tablo_adi,$arac);
        //sonuçra geriye true veya false dönecek
    }

    public function AracSil($id)
    {
        return $this->db->where('arac_id',$id)->delete($this->tablo_adi);
    }

    public function AracDuzenle($arac=array())
    {
        return $this->db->where('arac_id',$arac['arac_id'])->update($this->tablo_adi,$arac);
    }

    //araç resmi yükleme kısmı
    public function UpdateImage($id)
    {
        $data=array('resim_var_mi'=>'E');
        $this->db->set($data);
        $this->db->where('arac_id',$id);
        return $this->db->update($this->tablo_adi);
    }

    

}
?>