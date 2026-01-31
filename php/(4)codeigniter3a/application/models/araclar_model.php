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
        return $this->db->get($this->tablo_adi)->result();
    }

    public function AracBilgisiGetir($id)
    {
        //select * from tbl_araclar where arac_id=$id
        $this->db->where('arac_id',$id); //bu satır koşul ifadesidir
        $query=$this->db->get($this->tablo_adi); //tabloyu seçtik
        return $query->row(); //veriyi seçtik
    }

    

}
?>