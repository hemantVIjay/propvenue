<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masters_model extends MY_Model{
    
	public function get_record($table){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where('status','1');
        $query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

	public function get_record_id($table, $id){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->row():FALSE;
    }
	
	
	public function save_record($post_data, $tbl){
        $this->_table_name=$tbl;
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
                $return_data=array(
                    'id'=>$insert_id,
                    'status'=>TRUE,
                    'label'=>'SUCCESS',
                );
                return $return_data;
            }else{
                //if not updated
                $return_data=array(
                    'id'=>'',
                    'status'=>FALSE,
                    'label'=>'ERROR',
                );
                return $return_data;
            }
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
	
	
	public function update_record($id, $update_data, $tbl){
        $this->_table_name=$tbl;
		$this->_timestamps=TRUE;
		//update user
		$update_id=$this->save($data=$update_data, $id = $id);
		//create slug
        $slug=$this->create_slug($id=$id, $title=$update_data['name']);
        $updated_data=array(
                'slug'=>$slug
            );
            //update faq caregory
        $update_id=$this->save($data=$updated_data, $id = $id);
		if($update_id){
			//if updated
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
	
	
	public function get_banks(){
		$this->db->select('c.*');
        $this->db->from('banks c');
        $this->db->where('c.status','1');
        $this->db->group_by('c.id');
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

    /******************************/
	
	public function get_cityLocations($id){
		$this->db->select('l.city_id, l.district_id, l.state_id, l.country_id');
        $this->db->from('locations l');
		$this->db->where('l.id', $id);
		$query = $this->db->get();
		return ($query->num_rows() == 1)?$query->row():FALSE;
	}
	
	public function get_location($id){
		$this->db->select('l.city_id, l.district_id, l.state_id, l.country_id');
        $this->db->from('locations l');
		$this->db->where('l.id', $id);
		$query = $this->db->get();
		return ($query->num_rows() == 1)?$query->row():FALSE;
	}

	public function _banks(){
		$this->db->select('c.*');
        $this->db->from('banks c');
        $this->db->where('c.status','1');
        $this->db->group_by('c.id');
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

	public function _amenities(){
		$this->db->select('c.*');
        $this->db->from('amenities c');
        $this->db->where('c.status','1');
        $this->db->group_by('c.id');
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

	public function _lastCode($type){
		if($type=='Project'||$type=='Property'){
		 $this->db->select('c.code');
		 if($type=='Property'){
		   $this->db->from('properties c'); 
		 }elseif($type=='Project'){
		   $this->db->from('projects c');
		 }		 
        }
		if($type=='Builder'){
		 $this->db->select('c.builder_code as code');
		 $this->db->from('builders c');
        }
        $this->db->where('c.status','1');
        $this->db->order_by('c.id','desc');
        $this->db->limit(1);
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->row():FALSE;
    }

	public function get_propertyTypes(){
		$this->db->select('c.*');
        $this->db->from('property_types c');
        $this->db->where('c.status','1');
        $this->db->group_by('c.id');
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }


	public function get_floorTypes(){
		$this->db->select('c.*');
        $this->db->from('floor_types c');
        $this->db->where('c.status','1');
        $this->db->group_by('c.id');
		$query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

	public function _builderDetails($id){
		$this->db->select('b.*');
        $this->db->from('builders b');
		$this->db->where('b.id',$id);
        $query = $this->db->get();
		//return fetched data
        return ($query->num_rows() > 0)?$query->row():FALSE;
    }
	
	public function create_bank($post_data){
        $this->_table_name='banks';
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
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
        }else{
            //if not inseted
            $return_data=array(
                'status'=>FALSE,
                'label'=>'ERROR',
            );
            return $return_data;
        }
    }

	public function create_locality($post_data){
        $this->_table_name='locations';
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
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
        }else{
            //if not inseted
            $return_data=array(
                'status'=>FALSE,
                'label'=>'ERROR',
            );
            return $return_data;
        }
    }

	public function create_propertyType($post_data){
        $this->_table_name='property_types';
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
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
        }else{
            //if not inseted
            $return_data=array(
                'status'=>FALSE,
                'label'=>'ERROR',
            );
            return $return_data;
        }
    }

	public function create_floorType($post_data){
        $this->_table_name='floor_types';
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
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
        }else{
            //if not inseted
            $return_data=array(
                'status'=>FALSE,
                'label'=>'ERROR',
            );
            return $return_data;
        }
    }

	public function create_amenity($post_data){
        $this->_table_name='amenities';
        $this->_timestamps=TRUE;
        //create faq caregory
        $insert_id=$this->save($data=$post_data, $id = NULL);
        if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update faq caregory
            $update_id=$this->save($data=$update_data, $id = $insert_id);
            if($update_id){
                //if updated
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
        }else{
            //if not inseted
            $return_data=array(
                'status'=>FALSE,
                'label'=>'ERROR',
            );
            return $return_data;
        }
    }
	
	public function delete_record($r_id,$update_data, $tbl){
		$this->_table_name=$tbl;
		$this->_timestamps=TRUE;
		//update Amenity
		$update_id=$this->save($data=$update_data, $id = $r_id);
		if($update_id){
			//if updated
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

}

?>