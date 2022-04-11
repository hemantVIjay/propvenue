<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Another {

         public function __construct() {
                 $this->load();
         }

         /**
          * Load the databases and ignore the old ordinary CI loader which only allows one
          */
         public function load() {
                 $CI =& get_instance();

                 $CI->another = $CI->load->database('another_db', TRUE);
         }
		 
}
?>