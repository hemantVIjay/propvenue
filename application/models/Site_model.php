<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends MY_Model{
    
		public function get_allProperties($params = array()){
		$this->db->select('c.*');
        $this->db->from('properties c');
        $this->db->where('c.status','1');

        if(!empty($params['search']['keyword'])){
            $this->db->where("(
                c.name LIKE '%".$params['search']['keyword']."%'             
            )");
        }
        //filter data by searched status
        if(!empty($params['search']['status'])){
            $this->db->where('c.status', $status);
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        if(array_key_exists("keep_order",$params)){
            if($params['keep_order']==TRUE){
                $this->db->order_by("c.ordering","asc");
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
	
	public function create_property($post_data){
        $this->_table_name='properties';
        $this->_timestamps=TRUE;
        $insert_id=$this->save($data=$post_data, $id = NULL);
		
		if($insert_id){
            //create slug
            $slug=$this->create_slug($id=$insert_id, $title=$post_data['property_name']);
            $update_data=array(
                'slug'=>$slug
            );
            //update property
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
	
	public function create_specifications($post_data){
		$this->_table_name='flat_specifications';
        $this->_timestamps=TRUE;
        $insert_id=$this->save($data=$post_data, $id = NULL);
        return true;		
	}


	public function save_PlotPlans($post_data, $id){
		$mData = array();
		foreach($post_data as $key=>$data){
			$sdata['plot_size'] = $data[$key]['plot_size'];
			$sdata['plot_basePrice'] = $data[$key]['plot_basePrice'];
			$sdata['plot_Image'] = $data[$key]['plot_Image'];
			$sdata['plot_totalPrice'] = $data[$key]['plot_totalPrice'];
			$sdata['property_id'] = $id;
            $mData[$key] = $sdata;
		}
        $this->db->insert_batch('plot_plans', $mData);
        return true;		
	}

	public function save_FloorPlans($post_data, $id){
		$mData = array();
		foreach($post_data as $key=>$data){
			$sdata['floor_totalRoomSizes']  = $data[$key]['floor_totalRoomSizes'];
            $sdata['floor_allRoomSizes']    = $data[$key]['floor_allRoomSizes'];
            $sdata['floor_roomDesc']        = $data[$key]['floor_roomDesc'];
            $sdata['floor_bedrooms']        = $data[$key]['floor_bedrooms'];
            $sdata['floor_bathrooms']       = $data[$key]['floor_bathrooms'];
            $sdata['floor_unit']            = $data[$key]['floor_unit'];
            $sdata['floor_size']            = $data[$key]['floor_size'];
            $sdata['floor_builtupArea']     = $data[$key]['floor_builtupArea'];
            $sdata['floor_basePrice']       = $data[$key]['floor_basePrice'];
            $sdata['floor_totalPrice']      = $data[$key]['floor_totalPrice'];
			$sdata['property_id'] = $id;
            $mData[$key] = $sdata;
		}
        $this->db->insert_batch('floor_plans', $mData);
        return true;		
	}


	public function upload_PropertyImages($post_data){
        $this->db->insert_batch('properties_images', $post_data);
        return true;		
	}
	
	public function delete_property($id,$update_data){
		$this->_table_name='properties';
		$this->_timestamps=TRUE;
		//update Amenity
		$update_id=$this->save($data=$update_data, $id = $id);
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