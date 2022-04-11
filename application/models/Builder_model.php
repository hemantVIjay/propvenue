<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Builder_model extends MY_Model{

	public function get_all_builders($params = array()){
		
    	$this->db->select('b.*');
        $this->db->from('builders b');
        $this->db->where('b.status','1');
		if(!empty($params['search']['keyword'])){
            $this->db->where("(
                c.name LIKE '%".$params['search']['keyword']."%'             
            )");
        }
        //filter data by searched status
        if(!empty($params['search']['status'])){
            $this->db->where('b.status', $status);
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        if(array_key_exists("keep_order",$params)){
            if($params['keep_order']==TRUE){
                $this->db->order_by("b.ordering","asc");
            }
        }else{
            $this->db->order_by("b.id","desc");
        }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $builders=$query->result();
            return $builders;
        }else{
            return FALSE;
        }
	
	}
	//get all builders
	public function get_builders($params = array()){
		$this->db->select('u.*,r.role_name,r.role_slug');
        $this->db->from('builders u');
		$this->db->join('builders_roles r', 'r.id = u.user_role_id', 'inner');

		//filter data by searched keyword
        if(!empty($params['search']['keyword'])){
            $this->db->like('u.full_name', $params['search']['keyword']);
        }
        //filter data by searched user type
        if(!empty($params['search']['user_type'])){
            $this->db->where('u.user_role_id', $params['search']['user_type']);
        }
        //filter data by searched status
        if(!empty($params['search']['status'])){
            if($params['search']['status']=='INACTIVE'){
                $status=0;
            }elseif($params['search']['status']=='ACTIVE'){
                $status=1;
            }elseif($params['search']['status']=='BLOCKED'){
                $status=2;
            }
            $this->db->where('u.status', $status);
		}
		if(array_key_exists("exclued",$params)){
			$this->db->where('u.id !=', $params['exclued']);
		}
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
	}

	
	//create new user
	public function create_builder($post_data, $mdata){
		$this->_table_name='builders';
		//check user with mail exist
		$condition=array('builder_name'=>$post_data['builder_name']);
		$record=$this->get_by($where=$condition, $single = TRUE, $AsOrder = "asc", $limit= NULL, $pageNumber=0);
		if(isset($record) && $record!=NULL){
			//user already exist
			$return_data=array(
				'status'=>FALSE,
				'label'=>'EXIST',
			);
			return $return_data;
		}else{
			//user not exist
			$this->_table_name='builders';
			$this->_timestamps=TRUE;
			//create user
			$insert_id=$this->save($data=$post_data, $id = NULL);
			if($insert_id){
				//if inserted
				//create slug
				$slug=$this->create_slug($id=$insert_id, $title=$post_data['builder_name']);
				$update_data=array(
					'slug'=>$slug
				);
				//update faq caregory
				$update_id=$this->save($data=$update_data, $id = $insert_id);
				$return_data=array(
					'id'=>$insert_id,
					'status'=>TRUE,
					'label'=>'SUCCESS',
				);
				$this->_table_name='contact_persons';
			    $this->_timestamps=TRUE;
				foreach($mdata as $kk=>$arr){
					$arr['parent_id'] = $insert_id;
					$this->save($arr, $id = NULL);
				}
				return $return_data;
			}else{
				//if not inseted
				$return_data=array(
					'id'=>'',
					'status'=>FALSE,
					'label'=>'ERROR',
				);
				return $return_data;
			}

		}
	}

	//update user
	public function update_builder($builder_id, $update_data, $mdata){
		$this->_table_name='builders';
		$this->_timestamps=TRUE;
		//update user
		$update_id=$this->save($data=$update_data, $id = $builder_id);
		//create slug
		$slug=$this->create_slug($id=$builder_id, $title=$update_data['builder_name']);
		$update_data=array(
		 'slug'=>$slug
		);
		//update faq caregory
		$update_id=$this->save($data=$update_data, $id = $builder_id);
		if($update_id){
			//if updated
			$this->db->where('parent_id', $builder_id);
		    $this->db->delete('contact_persons');
		
			$this->_table_name='contact_persons';
			$this->_timestamps=TRUE;
			foreach($mdata as $kk=>$arr){
			   $arr['parent_id'] = $builder_id;
			   $this->save($arr, $id = NULL);
			}
			$return_data=array(
				'status'=>TRUE,
				'label'=>'SUCCESS',
			);
			return $return_data;
		}else{
			//if not updated
			$return_data=array(
				'status'=>FALSE,
				'label'=>'ERROR',
			);
			return $return_data;
		}
	}
    
	//get user by id
	public function get_builder($id){
		$this->db->select('b.*');
        $this->db->from('builders b');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		return ($query->num_rows() == 1)?$query->row_array():FALSE;
	}
	
	
	//get user by id
	public function get_builderProjects($id){
		$this->db->select('p.*');
        $this->db->from('projects p');
		$this->db->where('p.builder_id', $id);
		$query = $this->db->get();

		return ($query->num_rows() > 0)?$query->result():FALSE;
	}

	public function get_contacts($id){
		$this->db->select('c.*');
        $this->db->from('contact_persons c');
		$this->db->where('c.parent_id', $id);
		$query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result():FALSE;
	}
	
	//delete user
	public function delete_builder($id){
		$this->db->trans_start();
		//get user to unlink profile image
		$builder=$this->get_builder($id);
		if($builder){
			if($builder['builder_logo']!=NULL){
				@unlink(FCPATH.'uploads/builders/'.$builder['builder_logo']);
			}
		}
		$this->db->where('parent_id', $id);
		$this->db->delete('contact_persons');
		
		//delete user
		$this->db->where('id', $id);
        $this->db->limit(1);
		$this->db->delete('builders');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            //if not deleted
			$return_data=array(
				'status'=>FALSE,
				'label'=>'ERROR',
			);
			return $return_data;
        }else{
			$this->db->trans_commit();
			
            //if deleted
			$return_data=array(
				'status'=>TRUE,
				'label'=>'SUCCESS',
			);
			return $return_data;
        }
	}
}

?>