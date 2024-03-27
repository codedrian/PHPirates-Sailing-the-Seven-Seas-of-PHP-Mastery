<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index()
	{
		echo "welcome";
	}
	public function world()
	{
		$this->load->view('main/world');
	}
	public function ninjas($number_of_ninja = 5)
	{
		$data['number_of_ninja'] = $number_of_ninja;
		$this->load->view('main/ninjas', $data);
	}
	public function users()
	{
		$this->load->view('users/index');

	}

}
