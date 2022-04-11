<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends MY_Model{
    
		public function get_allreviews($params = array()){
		$this->db->select('c.*');
        $this->db->from('reviews c');

        if(!empty($params['search']['keyword'])){
            $this->db->where("(
                c.message LIKE '%".$params['search']['keyword']."%'             
            )");
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        if(array_key_exists("keep_order",$params)){
            if($params['keep_order']==TRUE){
                $this->db->order_by("c.stars","asc");
            }
        }else{
            $this->db->order_by("c.id","desc");
        }
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $cities=$query->result();
            return $cities;
        }else{
            return FALSE;
        }
    }
	
	public function create_project($post_data, $specs, $floorPlans){
        $this->_table_name='projects';
        $this->_timestamps=TRUE;
        $insert_id=$this->save($data=$post_data, $id = NULL);
		$specs['project_id'] = $insert_id;
		if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['project_name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update project
            $update_id=$this->save($data=$update_data, $id = $insert_id);
			$this->create_specifications($specs);
			$this->save_FloorPlans($floorPlans, $insert_id);
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
	
	public function updateReview($post_data, $id){
		$this->_table_name='reviews';
        $this->_timestamps=TRUE;
        $insert_id=$this->save($data=$post_data, $id = $id);
        return true;		
	}
	
	public function delete_review($id){
		$this->_table_name='reviews';
		$this->_primary_key='id';
		//update Amenity
		$update_id=$this->delete($id);
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