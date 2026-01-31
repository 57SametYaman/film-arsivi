<?php
class home extends CI_Controller {
    //metot, action
    public function index()
    {
        $this->load->view('home_index_view'); //index_view.php
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