<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends MY_Controller {
    function __construct(){
        parent::__construct();
        //check if backend login
        $this->is_admin_login();
        //pagination settings
        $this->perPage = 25;
        
    }
    //list Cities
	
	public function list_cities($page=0)
	{   
	    $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        $keyword=$this->input->post('keyword');
        $category=$this->input->post('category');
        $status=$this->input->post('status');
        if(!empty($keyword)){
            $conditions['search']['keyword'] = $keyword;
        }
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        $Cities = $this->other_model->get_cities($conditions);
		if($Cities){
           $citiesCount=count($Cities);
		}   
		else{
		  $citiesCount=0;
		}
		//set start and limit
	    $conditions['start'] = $page;
		$conditions['limit'] = $this->perPage;
			
		$data['title']=$this->lang->line("text_locations");
		$id = $this->uri->segment(4);
        if($this->permitted('list_articles')){
			$Cities = $this->other_model->get_cities($conditions);
			//get pagination confing
			$config=$this->pagination_config($base_url=base_url().'admin/cities/list_cities',$total_rows=$citiesCount,$per_page=$this->perPage);
			// Initialize
			$this->pagination->initialize($config);
			//set data array
			$data['pagination'] = $this->pagination->create_links();
			$data['page']=$page;
			
			$data['Cities']=$Cities;
            $data['sub_view'] = $this->load->view('admin/Cities/list_Cities', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
    }

	public function add_cities()
	{
		$post_data = array(
          'name' => $this->input->post('amenity_name'),
          'created_by' => $this->get_user_id()
        );                    //XXS Clean
        $post_data = $this->security->xss_clean($post_data);
        $result = $this->other_model->create_city($post_data);
        redirect('admin/Cities/list_Cities','refresh');
    }
	
	public function edit_Cities()
	{
		$post_data = array(
          'name' => $this->input->post('amenity_name'),
          'updated_by' => $this->get_user_id()
        );
                    //XXS Clean
        $post_data = $this->security->xss_clean($post_data);
        $result = $this->other_model->create_amenity($post_data);
        redirect('admin/cities/list_Cities','refresh');
    }
	
	
	public function delete_cities()
	{
        $id = $this->uri->segment(4);
		if(isset($id)){
            //check permission
            if($this->permitted('delete_article')){
                $data['title']=$this->lang->line("text_delete_article");
                $post_data = array(
				  'status' => 0,
				  'updated_by' => $this->get_user_id()
				);
				$res = $this->other_model->delete_cities($id, $post_data);
				redirect('admin/Cities/list_Cities','refresh');
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
	
}