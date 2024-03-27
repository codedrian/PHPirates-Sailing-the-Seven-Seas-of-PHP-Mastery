<?php
class Users extends CI_Controller
{
    public function index()
    {
        echo"Welcome User";
    }
    public function new()
    {
        $this->load->view('users/new');
    }
    public function create()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if ($this->input->method() === 'post') {
            if ($this->form_validation->run() == TRUE) {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $password = $this->input->post('password');

                echo "First Name: " . $first_name . "<br>";
                echo "Last Name: " . $last_name . "<br>";
                echo "Password: " . $password . "<br>";
            } else {
                $this->load->view('users/new');
            }
        } else {
            redirect('users');
        }


    }
    public function count()
    {
        //cSpell:disable
        if ($this->session->has_userdata('visitCount')) {
            $visitCount = $this->session->userdata('visitCount') + 1;
        } else {
            $visitCount = 1;
            $this->session->set_userdata('visitCount', $visitCount);
        }
        $this->session->set_userdata('visitCount', $visitCount);
        $this->load->view('users/count', ['visitCount' => $visitCount]);
        // $this->session->unset_userdata('visitCount');
    }
    public function reset()
    {
        if ($this->session->has_userdata('visitCount')) {
            $this->session->unset_userdata('visitCount');
        }
        $this->load->view('users/reset');
    }
    public function say($message='', $number='') {
        $data = [
            'message' => $message,
            'number' => $number
        ];
        $this->load->view('users/say', $data);
    }
    public function mprep()
    {
        $view_data = array(
            'name' => "Michael Choi",
            'age'  => 40,
            'location' => "Seattle, WA",
            'hobbies' => array("Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
        );
        $this->load->view('users/mprep', $view_data);
    }
}
?>
