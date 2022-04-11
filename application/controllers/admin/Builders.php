<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Builders extends MY_Controller {
    public function __construct()
	{
        parent::__construct();
        //check if backend login
        $this->is_admin_login();
        //pagination settings
        $this->perPage = 25;
	}
    //list users
	public function list_builders($page=0)
	{
        $data['title']=$this->lang->line("text_users");
		$conditions = array();
			if($page != 0){
				$page = ($page-1) * $this->perPage;
			}
			$keyword=$this->input->post('keyword');
			$status=$this->input->post('status');
			if(!empty($keyword)){
				$conditions['search']['keyword'] = $keyword;
			}
			if(!empty($status)){
				$conditions['search']['status'] = $status;
			}
			$Builders = $this->builder_model->get_all_builders($conditions);
			if($Builders){
			   $buildersCount=count($Builders);
			}   
			else{
			  $buildersCount=0;
			}
			$conditions['start'] = $page;
			$conditions['limit'] = $this->perPage;
			
        if($this->permitted('list_users')){
            $Builders = $this->builder_model->get_all_builders($conditions);
			$config=$this->pagination_config($base_url=base_url().'admin/builders/list_builders',$total_rows=$buildersCount,$per_page=$this->perPage);
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$data['page']=$page;
			
			$data['builders']=$Builders;
            $data['sub_view'] = $this->load->view('admin/builders/list_builders', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
    }

	public function add_builder()
	{
        $data['title']=$this->lang->line("text_users");
        if($this->permitted('list_users')){
            //get all user types
            $user_types = $this->user_model->get_user_types();
            $data['user_types']=$user_types;
            $data['sub_view'] = $this->load->view('admin/builders/add_builder', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
    }

    //ajax paginate users
    public function list_users_ajax($page=0){
        $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        $keyword=$this->input->post('keyword');
        $user_type=$this->input->post('user_type');
        $status=$this->input->post('status');
        if(!empty($keyword)){
            $conditions['search']['keyword'] = $keyword;
        }
        if(!empty($user_type)){
            $conditions['search']['user_type'] = $user_type;
        }
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        $conditions['exclued']=$this->get_user_id();
        //get users count
        $users=$this->user_model->get_users($conditions);
        if($users){
            $usersCount=count($users);
        }else{
            $usersCount=0;
        }
        //set start and limit
        $conditions['start'] = $page;
        $conditions['limit'] = $this->perPage;
        //get all users
        $users = $this->user_model->get_users($conditions);
        //get pagination confing
        $config=$this->pagination_config($base_url=base_url().'users/list_users_ajax',$total_rows=$usersCount,$per_page=$this->perPage);
        // Initialize
        $this->pagination->initialize($config);
        //set data array
        $data['pagination'] = $this->pagination->create_links();
        $data['page']=$page;
        $data['users']=$users;
        //response
        $success = true;
        $message = '';
        $content = $this->load->view('admin/users/list_users_ajax',$data,TRUE);
        $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
        echo json_encode($json_array);
        exit();
    }

    //view user
	public function view_user()
	{
        if($this->input->post()){
            //check permission
            if($this->permitted('view_user')){
                $data['title']=$this->lang->line("text_view_user");
                $user_id = $this->input->post('user_id');
                //get user by id
                $user = $this->user_model->get_user($user_id);
                $data['user']=$user;
                $success = true;
                $message = '';
                $content = $this->load->view('admin/users/view_user',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }
    }

    //create user
    public function create_builder(){
        $arr = array();
		if($this->input->post()){
            //check permission
            if($this->permitted('add_user')){
                $this->form_validation->set_rules('builder_name','Full Name','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
                    $post_data = array(
                        'builder_name' => $this->input->post('builder_name'),
						'title' => $this->input->post('title'),
                        'meta_description' => $this->input->post('meta_description'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'builder_website' => $this->input->post('builder_website'),
                        'builder_estabilished_year' => $this->input->post('builder_estabilished_year'),
                        'builder_information' => $this->input->post('builder_information'),
                        'builder_office_address' => $this->input->post('builder_office_address'),
                        'builder_phone' => $this->input->post('builder_phone'),
                        'builder_owner_name' => $this->input->post('builder_owner_name'),
                        'status' => 1,
                        'created_by' => $this->get_user_id(),
                        'updated_by' => $this->get_user_id(),
                    );
					
					$mdata = array();
					foreach($_REQUEST['name'] as $kk=>$rows){
					  $p_data = array(
                        'contact_name' => $_REQUEST['name'][$kk],
                        'contact_phone' => $_REQUEST['phone'][$kk],
                        'contact_email' => $_REQUEST['email'][$kk],
                        'status' => 1,
                        'created_by' => $this->get_user_id(),
                        'updated_by' => $this->get_user_id(),
                      );
					  $mdata[] = $p_data;	
					}
					
					 //upload config
                    $config['upload_path'] = 'uploads/builders/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['max_size'] = '1024'; //1 MB
                    //Upload Builder logo
                    if(isset($_FILES['builder_logo']['name'])){
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('builder_logo')) {
                            $success = FALSE;
                            $message = $this->upload->display_errors();
                            $json_array = array('success' => $success, 'message' => $message);
                            echo json_encode($json_array);
                            exit();
                        } else {
                            $upload_data=$this->upload->data();
                            $post_data['builder_logo']=$upload_data['file_name'];
                        }
                    }
                    //XXS Clean
                    $post_data = $this->security->xss_clean($post_data);
                    $result = $this->builder_model->create_builder($post_data, $mdata);
					$builder = $this->builder_model->get_builder($result['id']);
						$arr['name'] = 'builder';
						$arr['url']  = $builder['slug'];
						$arr['parent_id'] = $builder['id'];
						$arr['status'] = 1;
						$arr['file'] = '';
						$arr['is_active'] = 1;
					$lr = _listRecord($arr);
				    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = $this->lang->line("alert_user_created");
                    }elseif($result['status']==FALSE &&$result['label']=='EXIST'){
                        $success = FALSE;
                        $message = $this->lang->line("alert_user_exist");
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("alert_user_not_created");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
			redirect('admin/builders/list_builders','refresh');
            //$json_array = array('success' => $success, 'message' => $message);
            //echo json_encode($json_array);
            //exit();
        }
    }

    //edit user - load view
	public function edit_builder()
	{   
	   if($this->uri->segment(4)){
			$data['title']=$this->lang->line("text_users");
			if($this->permitted('edit_user')){
				//get all user types
				$data['title']=$this->lang->line("text_edit_user");
				$id = $this->uri->segment(4);

				$contacts = array();	
				$builder = $this->builder_model->get_builder($id);
				$contacts = $this->builder_model->get_contacts($id);
				$data['builder'] = $builder;
				$data['builder']['contacts'] = $contacts;			
				$data['sub_view'] = $this->load->view('admin/builders/edit_builder', $data, TRUE);
			}else{
				$data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
			}
			$this->load->view('admin/_layout', $data); 		
        }
	}

    //update user
    public function update_builder(){
        if($this->input->post()){
            //check permission
            if($this->permitted('edit_user')){
                $this->form_validation->set_rules('builder_name','Full Name','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
                    $builder_id=$this->input->post('builder_id');
                    $update_data = array(
                        'builder_name' => $this->input->post('builder_name'),
						'title' => $this->input->post('title'),
                        'meta_description' => $this->input->post('meta_description'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'builder_website' => $this->input->post('builder_website'),
                        'builder_estabilished_year' => $this->input->post('builder_estabilished_year'),
                        'builder_information' => $this->input->post('builder_information'),
                        'builder_office_address' => $this->input->post('builder_office_address'),
                        'builder_phone' => $this->input->post('builder_phone'),
                        'builder_owner_name' => $this->input->post('builder_owner_name'),
                        'updated_by' => $this->get_user_id(),
                    );
					
					$update_mdata = array();
					foreach($_REQUEST['name'] as $kk=>$rows){
					  $p_data = array(
                        'contact_name' => $_REQUEST['name'][$kk],
                        'contact_phone' => $_REQUEST['phone'][$kk],
                        'contact_email' => $_REQUEST['email'][$kk],
                        'updated_by' => $this->get_user_id(),
                      );
					  $update_mdata[] = $p_data;	
					}
					
					if(isset($_FILES['builder_logo']['name']) && $_FILES['builder_logo']['name']!=''){
						$builder = $this->builder_model->get_builder($builder_id);
						if($builder){
							if($builder['builder_logo']!=NULL){
								@unlink(FCPATH.'uploads/builders/'.$builder['builder_logo']);
							}
						}						
						//upload config
						$config['upload_path'] = 'uploads/builders/';
						$config['allowed_types'] = '*';
						$config['encrypt_name'] = TRUE;
						$config['overwrite'] = TRUE;
						$config['max_size'] = '1024'; //1 MB
						//Upload Builder logo
						if(isset($_FILES['builder_logo']['name'])){
							$this->load->library('upload', $config);
							if (!$this->upload->do_upload('builder_logo')) {
								$success = FALSE;
								$message = $this->upload->display_errors();
								$json_array = array('success' => $success, 'message' => $message);
								echo json_encode($json_array);
								exit();
							} else {
								$upload_data=$this->upload->data();
								$update_data['builder_logo']=$upload_data['file_name'];
							}
						}						
					}					
					
                    //XXS Clean
                    $update_data = $this->security->xss_clean($update_data);
                    $result = $this->builder_model->update_builder($builder_id,$update_data, $update_mdata);
					$builder = $this->builder_model->get_builder($builder_id);
					$arr['name'] = 'builder';
					$arr['url']  = $builder['slug'];
					$arr['parent_id'] = $builder['id'];
					$lr = _updatelistRecord($arr);
					
                    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = $this->lang->line("alert_user_updated");
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("alert_user_not_updated");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            redirect('admin/builders/list_builders','refresh');
			//$json_array = array('success' => $success, 'message' => $message);
            //echo json_encode($json_array);
            //exit();
        }
    }

    //delete user action
    public function delete_builder(){
        if($this->input->post()){
            //check permission
            if($this->permitted('delete_user')){
                $id = $this->input->post('builder_id');
                //delete user
                $result = $this->builder_model->delete_builder($id);
                if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                    $success = TRUE;
                    $message = $this->lang->line("alert_user_deleted");
                }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_user_not_deleted");
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
        
    }

    //user based permission
    public function permissions(){
        $data['title']=$this->lang->line("text_user_permissions");
        if($this->permitted('user_permissions')){
            if($this->input->post()){
                $post_data = array(
                    'permission_id' => $this->input->post('permission_id'),
                    'user_id' => $this->input->post('user_id'),
                    'role_id' => $this->input->post('role_id')
                    
                );
                //XXS Clean
                $post_data = $this->security->xss_clean($post_data);
                $result = $this->user_model->change_permission($post_data);
                if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                    $success = TRUE;
                    $message = $this->lang->line("alert_user_permission_updated");
                }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_user_permission_not_updated");
                }
                $json_array = array('success' => $success, 'message' => $message);
                echo json_encode($json_array);
                exit();
            }
            $users=$this->user_model->get_non_admin_non_customer_users();
            $data['users']=$users;
            $data['title']='Permissions';
            $data['sub_view'] = $this->load->view('admin/users/permissions', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data);
    }

    //ajax paginate permissions
    public function list_permissions_ajax($page=0){
        $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        $keyword=$this->input->post('keyword');
        $user=$this->input->post('user');
        if(!empty($keyword)){
            $conditions['search']['keyword'] = $keyword;
        }
        //get permissions count
        $permissions=$this->settings_model->get_permissions($conditions);
        if($permissions){
            $permissionsCount=count($permissions);
        }else{
            $permissionsCount=0;
        }
        //set start and limit
        $conditions['start'] = $page;
        $conditions['limit'] = $this->perPage;
        //get all permissions
        $permissions = $this->settings_model->get_permissions($conditions);
        //get pagination confing
        $config=$this->pagination_config($base_url=base_url().'users/list_permissions_ajax',$total_rows=$permissionsCount,$per_page=$this->perPage);
        // Initialize
        $this->pagination->initialize($config);
        //get user role
        $role=$this->user_model->get_user_role($user);
        $role_slug=$role['role_slug'];
        $role_id=$role['role_id'];

        //set data array
        $data['pagination'] = $this->pagination->create_links();
        $data['page']=$page;
        $data['user_id']=$user;
        $data['role_id']=$role_id;
        $permissions_list=array();
        if(isset($permissions) && $permissions!=NULL){
            $i=0;
            foreach($permissions as $permission){
                $permissions_list[$i]['id'] = $permission['id'];
                $permissions_list[$i]['name'] = $permission['permission_name'];
                $permissions_list[$i]['slug'] = $permission['permission_slug'];
                $permissions_list[$i]['info'] = $permission['permission_info'];
                $permissions_list[$i]['permission'] = $this->settings_model->check_permission($user_id=$user,$user_role=$role_slug,$permission_slug=$permission['permission_slug']);
                $i++;
            }
        }
        $data['permissions_list']=$permissions_list;
        //response
        $success = true;
        $message = '';
        $content = $this->load->view('admin/users/list_permissions_ajax',$data,TRUE);
        $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
        echo json_encode($json_array);
        exit();
    }
	
	public function assign_location(){
		$uid = $this->uri->segment(4);
		
		$data['title'] = 'Assign Locations';
        if($this->permitted('list_users')){
            //get all user types
            $user = $this->user_model->get_user($uid);
            $data['user'] = $user;
            $data['uid'] = $uid;
            $data['sub_view'] = $this->load->view('admin/users/assign_location', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
				
	}

	public function save_locations(){
		
		$data['user_id']  = $this->input->post('user_id');

		$locations = $this->input->post('location');
		
		$data['locations']  = $locations;
		$data['status']  = 1;
		$data['created_by']  = $_SESSION['login']['user_id'];
		$data['created_on']  = date('Y-m-d H:i:s');
		
		$lid = $this->user_model->save_locations($data, $data['user_id']);
				
	}

}