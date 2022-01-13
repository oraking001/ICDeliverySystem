<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'User_model');
		$this->load->model ( 'DBfunction');
	}
	function index() {
		
		
		$this->load->view ( 'admin_panel/login' );
	}

	public function login() {
		// create the data object
	//echo $pass = $this->hash_password( $this->input->post ( 'password' ) );	die;

		$data = new stdClass ();
		//print_r($data);die;
		// set validation rules
		$this->form_validation->set_rules ( 'username', 'Email', 'required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required' );
		if ($this->form_validation->run () == false) {
			
			$this->session->set_flashdata('error', 'form Validation Issues. Please try again.');
			redirect('Welcome/index');
		} else {
			// set variables from the form
			$username = $this->input->post ( 'username' );
			$password = $this->input->post ( 'password' );
			
			if(!empty($username) && !empty($password)){
				
				if ($this->User_model->resolve_user_login ( $username, $password )) {
					$user_id = $this->User_model->get_user_id_from_username ( $username );
					$userdetails = $this->User_model->get_user ( $user_id );
					 
						$session_data = array(
						        'user_id'=>$user_id,
								'username'  => $username,
								'password'     => $password,
								'role'     => $userdetails[0]->role,
								'user_image' => $userdetails[0]->user_image
							);
						$this->session->set_userdata($session_data);
						redirect('Dashboard');
				} else {
					$this->session->set_flashdata('error', 'Login Details Not Match Please check Details. Please try again.');
					redirect('Welcome/index');
				}
			}else{
				$this->session->set_flashdata('error', 'Please fill All Details. Please try again.');
				redirect('Welcome/index');
			}
		}
	}

	public function Logout(){
		$this->session->unset_userdata($sess_data);
		$this->session->sess_destroy();		
		$this->session->set_flashdata('success', 'LogOut successfull Done..');
		redirect('Welcome/index');
	}

	public function save_data()
    {
	//	$user_where = array('sau_name' => $this->input->post('email'));
		//$result_data = $this->User_model->getArrayWhereResultnew('tbl_login', $user_where);
		$this->db->select('*')->from('tbl_login')->where('sau_name',$this->input->post('email')); 
   		$q = $this->db->get(); 
		
		if($q->num_rows() == 0){
       			 $data = array(
							'sau_name' =>$this->input->post('email'),
                            'sau_FName' =>$this->input->post('full_name'),
                            'sau_pwd' =>$this->hash_password($this->input->post('password')),
                            'sau_PhoneNo' =>$this->input->post('phone_number'),
                            'user_address' =>$this->input->post('address'),
                            'user_type' =>$this->input->post('user_type'),
                            'country' =>$this->input->post('country'),
                            'created_at' =>date("Y-m-d h:i:s"),
                            'is_active'=>1,                          
                            'hubs'=> implode(',',$this->input->post('hubs')),                         
                            'tabs'=> implode(',',$this->input->post('tabs'))                        
                        );
						$res = $this->User_model->insertdata($data, "tbl_login");

						echo $res;
			}else{
				echo "2";
			}
	}
	
	private function hash_password($password) {
        return password_hash ( $password, PASSWORD_BCRYPT );
    }
	
}