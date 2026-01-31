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

    public function tumAraclariListele()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

}
?>