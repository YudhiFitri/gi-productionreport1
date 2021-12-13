<?php
defined("BASEPATH") or exit("Direct script access not allowed");

class User extends CI_Controller
{
	var $name;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('UserModel');
		$this->load->model('LineModel');
	}

	public function index()
	{
		$this->load->view('login/login_view');
	}

	function auth()
	{
		$username    = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));

		$row = $this->UserModel->get_by_name($username);

		if ($row->active == 0) {
			$this->validation($username, $password);
		} else {
			redirect('user/confirm_active_user');
		}
	}

	function confirm_active_user()
	{
		$this->load->view('confirm_active_user_view');
	}

	function validation($uname, $psw)
	{
		$validate = $this->UserModel->validate($uname, $psw);
		if ($validate->num_rows() > 0) {
			$data  = $validate->row_array();
			$this->name  = $data['user_name'];
			$groupLocation = $this->LineModel->get_group_line($this->name);
			// $level = $data['user_level'];
			$sesdata = array(
				'username'  => $this->name,
				// 'level'     => $level,
				'logged_in' => TRUE,
				'group_location' => $groupLocation
			);

			$this->session->set_userdata($sesdata);
			switch ($this->name) {
				case "Super Admin":
					// $this->updateActive($this->name);
					redirect("DashboardSuperAdmin");
					break;
				case "Admin PPIC":
					// $this->updateActive($this->name);
					redirect("DashboardPPIC");
					break;
				case "Admin Cutting":
					// $this->updateActive($this->name);
					redirect("DashboardCutting");
					break;
				case "Admin Molding":
					// $this->updateActive($this->name);
					redirect("DashboardMolding");
					break;
				case "Admin Packing":
					// $this->updateActive($this->name);
					redirect("DashboardPacking");
					break;
				case "Mover Packing":
					redirect("DashboardMoverPacking");
					break;
				case "Operator Packing":
					redirect("DashboardOperatorPacking");
					break;
				case "Admin Mekanik":
					redirect("DashboardMekanik");
					break;
				case "Admin IE":
					redirect("DashboardIE");
				default:
					// $this->updateActive($this->name);
					redirect("DashboardSewing");
			}

			// $this->load->view('dashboard');

			// if($level === '1'){
			//     redirect('overview');

			// }elseif($level === '2'){
			//     redirect('overview');
			// }

		} else {
			echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
			redirect('user');
		}
	}

	function logout()
	{
		$name = $this->session->userdata['username'];
		$this->UserModel->update_inactive($name);

		$this->session->sess_destroy();
		redirect('user');
	}

	// function updateActive($nm){
	//     $rst = $this->UserModel->update_active($nm);

	//     print_r($rst);
	// }

	function lockscreen()
	{
		$data['username'] = $this->session->userdata['username'];
		$this->session->sess_destroy();
		$this->load->view('lock_screen_view', $data);
	}

	public function Management()
	{
	}

	function not_allowed()
	{
		$this->load->view('confirm_not_allowed');
	}
}
