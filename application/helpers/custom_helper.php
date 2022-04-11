<?php
   if (!defined('BASEPATH'))
       exit('No direct script access allowed');
  
   //-- execute var
   if (!function_exists('dd')) {
       function dd($var)
       {
           echo '<pre>';
           if (is_array($var)) {
               print_r($var);
              
           } else
               echo $var;
           die;
       }
   }
  
   //-- check logged user
   if (!function_exists('check_login_user')) {
       function check_login_user()
       {
           $ci = get_instance();
           if ($ci->session->userdata('is_login') != TRUE) {
               $ci->session->sess_destroy();
               redirect(base_url('auth'));
           }
       }
   }
  
   if (!function_exists('logged_in_user_id')) {
      
       function logged_in_user_id()
       {
           $logged_in_id = 0;
           $CI =& get_instance();
           if ($CI->session->userdata('id') && $CI->session->userdata('role')):
               $logged_in_id = 5; //$CI->session->userdata('id');
           endif;
           return $logged_in_id;
       }
      
   }
  
  
  
   if (!function_exists('check_power')) {
       function check_power($type)
       {
           $ci = get_instance();
          
           $ci->load->model('common_model');
           $option = $ci->common_model->check_power($type);
          
           return $option;
       }
   }
  
   //-- current date time function
   if (!function_exists('current_datetime')) {
       function current_datetime()
       {
           $dt        = new DateTime('now', new DateTimezone('Asia/Kolkata'));
           $date_time = $dt->format('Y-m-d H:i:s');
           return $date_time;
       }
   }
  
   //-- show current date & time with custom format
   if (!function_exists('my_date_show_time')) {
       function my_date_show_time($date)
       {
           if ($date != '') {
               $date2    = date_create($date);
               $date_new = date_format($date2, "d M Y h:i A");
               return $date_new;
           } else {
               return '';
           }
       }
   }
  
  
   if (!function_exists('get_nice_time')) {
      
       function get_nice_time($date)
       {
          
           $ci =& get_instance();
           if (empty($date)) {
               return "2 months ago"; //"No date provided";
           }
          
           $periods = array(
               "second",
               "minute",
               "hour",
               "day",
               "week",
               "month",
               "year",
               "decade"
           );
           $lengths = array(
               "60",
               "60",
               "24",
               "7",
               "4.35",
               "12",
               "10"
           );
          
           $now       = time();
           $unix_date = strtotime($date);
          
           // check validity of date
           if (empty($unix_date)) {
               return "2 months ago"; // "Bad date";
           }
          
           // is it future date or past date
           if ($now > $unix_date) {
               $difference = $now - $unix_date;
               $tense      = "ago";
           } else {
               $difference = $unix_date - $now;
               $tense      = "from now";
           }
          
           for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
               $difference /= $lengths[$j];
           }
          
           $difference = round($difference);
          
           if ($difference != 1) {
               $periods[$j] .= "s";
           }
          
           return "$difference $periods[$j] {$tense}";
       }
      
   }
  
  
   //-- show current date with custom format
   if (!function_exists('my_date_show')) {
       function my_date_show($date)
       {
          
           if ($date != '') {
               $date2    = date_create($date);
               $date_new = date_format($date2, "d M Y");
               return $date_new;
           } else {
               return '';
           }
       }
   }
   if (!function_exists('mD_format')) {
       function mD_format($date)
       {          
           if ($date != '') {
               $date2    = date_create($date);
               $date_new = date_format($date2, "M d, Y");
               return $date_new;
           } else {
               return '';
           }
       }
   }

   if (!function_exists('_calDate')) {
       function _calDate($date)
       {          
           if ($date != '') {
               $date2    = date_create($date);
               $date_new = date_format($date2, "d-M-Y");
               return $date_new;
           } else {
               return '';
           }
       }
   }

   if (!function_exists('_sqlDate')) {
       function _sqlDate($date)
       {          
           if ($date != '') {
               $date2    = date_create($date);
               $date_new = date_format($date2, "Y-m-d");
               return $date_new;
           } else {
               return '';
           }
       }
   }
  
   if (!function_exists('create_log')) {
       function create_log($activity = null)
       {
           $ci =& get_instance();
           $data               = array();
           $data['user_id']    = check_licensee_id();
           $data['role_id']    = $ci->session->userdata('role');
           $user               = 1;
           $data['name']       = $ci->session->userdata('name');
           $data['phone']      = '';
           $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
           $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
           $data['activity']   = $activity;
           $data['status']     = 1;
           $data['created_at'] = date('Y-m-d H:i:s');
           $data['created_by'] = check_licensee_id();
           $ci->db->insert('activity_logs', $data);
       }
   }
  
  
   if (!function_exists('check_permission')) {
      
       function check_permission($action)
       {
           $ci =& get_instance();
           $role_id        = $ci->session->userdata('role_id');
           $operation_slug = $ci->router->fetch_class();
           $module_slug    = $ci->router->fetch_module();
          
           if ($module_slug == '') {
               $module_slug = $operation_slug;
           }
          
           $module_slug = 'my_' . $module_slug;
          
           $data = $ci->config->item($operation_slug, $module_slug);
          
           $result = $data[$role_id];
           if (!empty($result)) {
               $array = explode('|', $result);
               if (!$array[$action]) {
                   error($ci->lang->line('permission_denied'));
                   redirect('dashboard');
               }
           } else {
               error($ci->lang->line('permission_denied'));
               redirect('dashboard');
           }
          
           return TRUE;
       }
      
   }
   if (!function_exists('has_permissionq')) {
      
       function has_permissionq($action, $module_slug = null, $operation_slug = null)
       {
          
           $ci =& get_instance();
           $role_id = $ci->session->userdata('role_id');
          
           if ($module_slug == '') {
               $module_slug = $operation_slug;
           }
          
           $module_slug = 'my_' . $module_slug;
          
           $data = $ci->config->item($operation_slug, $module_slug);
          
           $result = @$data[$role_id];
          
           if (!empty($result)) {
               $array = explode('|', $result);
               return $array[$action];
           } else {
               return FALSE;
           }
       }
   }
  
   if (!function_exists('new_has_permission')) {
       function has_permission($action)
       {
           $role = $ci->session->userdata('role');
           if ($role == 'Licensee') {
               return TRUE;
           } else if ($role == 'User') {
               $ci->load->model('common_model');
               $option = $ci->common_model->check_power_licensee_privileges($operation_id);
              
           } else {
              
               return FALSE;
           }
          
       }
   }
  
  
   /***------***/
   /*if (!function_exists('_countries')) {
   function _countries($id)
   {
   $ci =& get_instance();
   return $ci->master_model->_getCountries($id);
   }
   }*/
  
  
   if (!function_exists('_currencyID')) {
       function _currencyID($code)
       {
           $ci =& get_instance();
           $res = $ci->master_model->_currencyID($code);
           return $res;
       }
   }
  
   if (!function_exists('_banks')) {
       function _banks()
       {
           $ci =& get_instance();
           $res = $ci->masters->_banks();
           return $res;
       }
   }
  
   if (!function_exists('_amenities')) {
       function _amenities()
       {
           $ci =& get_instance();
           $res = $ci->masters->_amenities();
           return $res;
       }
   }
  
   if (!function_exists('_builderCode')) {
       function _builderCode($code)
       {
           $ci =& get_instance();
           $str = 'PROPV';
           $res = $ci->masters->_builderCode($code);
           return $res;
       }
   }
  
   if (!function_exists('_builderDetails')) {
       function _builderDetails($id)
       {
           $ci =& get_instance();
           $str = 'PROPV';
           $res = $ci->masters->_builderDetails($id);
           return $res;
       }
   }
  
   if (!function_exists('_autoCode')) {
       function _autoCode($type)
       {
           $ci =& get_instance();
           if ($type == 'Project') {
               $str = 'PVPRJ';
           }
           if ($type == 'Property') {
               $str = 'PVPRT';
           }
           if ($type == 'Builder') {
               $str = 'PVBLD';
           }
           $code = $str;
           $res  = $ci->masters->_lastCode($type);
           if ($res->code != '') {
               $nCode = substr($res->code, -5);
           } else {
               $nCode = 0;
           }
           $nCode     = $nCode + 1;
           $finalCode = $code . sprintf("%05d", $nCode);
           return $finalCode;
       }
   }
  
   if (!function_exists('get_user')) {
       function get_user($id)
       {
           $ci =& get_instance();
           $res = $ci->user_model->get_user($id);
           return $res;
       }
   }
  
   if (!function_exists('_dateFormat')) {
       function _dateFormat($dd = '')
       {
           $ci =& get_instance();
          
           $nDate = DateTime::createFromFormat('d-m-Y', $dd);
           $nDD   = $nDate->format('Y-m-d');
           return $nDD;
       }
   }
  
   if (!function_exists('success')) {
       function success($message)
       {
           $CI =& get_instance();
           $CI->session->set_userdata('success', $message);
           return true;
       }
   }
   if (!function_exists('success_')) {
       function success_($message)
       {
           $CI =& get_instance();
           $CI->session->set_flashdata('success_', $message);
           return true;
       }
   }
  
   if (!function_exists('error')) {
       function error($message)
       {
           $CI =& get_instance();
           $CI->session->set_userdata('error', $message);
           return true;
       }
   }
   if (!function_exists('error_')) {
       function error_($message)
       {
           $CI =& get_instance();
           $CI->session->set_flashdata('error_', $message);
           return true;
       }
   }
  
   if (!function_exists('warning')) {
       function warning($message)
       {
           $CI =& get_instance();
           $CI->session->set_userdata('warning', $message);
           return true;
       }
   }
  
   if (!function_exists('info')) {
      
       function info($message)
       {
           $CI =& get_instance();
           $CI->session->set_userdata('info', $message);
           return true;
       }
      
   }
  
   if (!function_exists('send_data')) {
      
       function send_data($data, $md)
       {
           $CI =& get_instance();
           $host = 'http://localhost/desimurga/api/' . $md . '/';
          
           $apiKey   = 'CODEX@123';
           $username = "admin";
           $password = "1234";
          
           $ch = curl_init($host);
          
           curl_setopt($ch, CURLOPT_TIMEOUT, 30);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
           curl_setopt($ch, CURLOPT_HTTPHEADER, array(
               "X-API-KEY: " . $apiKey
           ));
           curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
           curl_setopt($ch, CURLOPT_POST, 1);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
           $result = curl_exec($ch);
           curl_close($ch);
           //        print_r($result);
          
       }
      
   }
  
  
   if (!function_exists('file_type')) {
       function file_type($type, $name)
       {
           $CI =& get_instance();
           $ext = explode('.', $name);
           if ($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg')
               return '<img src="' . base_url() . 'assets/images/jpg.png">';
           else if ($type == 'application/octet-stream' && ($ext[1] == 'xls' || $ext[1] == 'xlsx'))
               return '<img src="' . base_url() . 'assets/images/excel.png">';
           else if ($type == 'application/pdf')
               return '<img src="' . base_url() . 'assets/images/pdf.png">';
           else if ($type == 'application/octet-stream' && ($ext[1] == 'doc' || $ext[1] == 'docx'))
               return '<img src="' . base_url() . 'assets/images/word.png">';
           else
               return '<img src="' . base_url() . 'assets/images/jpg.png">';
          
       }
   }
   if (!function_exists('_dRegexmatch')) {
       function _dRegexmatch($checkval = '')
       {
           $ci =& get_instance();
           $regex = '^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$^';
           if (preg_match($regex, $checkval)) {
               $formatval = date('Y-m-d', strtotime($checkval));
           } else {
               $formatval = $checkval;
           }
           return $formatval;
       }
   }
  
   if (!function_exists('_createdirectory')) {
      
       function _createdirectory($dir, $subDir)
       {
           if (!is_dir('uploads/' . $dir)) {
               mkdir('uploads/' . $dir, 0777, TRUE);
           }
           if (!is_dir('uploads/' . $dir . '/' . $subDir)) {
               mkdir('uploads/' . $dir . '/' . $subDir, 0777, TRUE);
           }
           if (!is_dir('uploads/' . $dir . '/' . $subDir)) {
               return FALSE;
           } else {
               return TRUE;
           }
       }
      
   }
   if (!function_exists('_uploadFile')) {
      
       function _uploadFile($fname, $tmp_name, $Dname, $cName, $subDir, $exists)
       {
           $CI =& get_instance();
           $rfile = '';
           if ($fname != "") {
               $dest   = 'uploads/' . $subDir . '/' . $cName . '/';
               $f_type = explode(".", $fname);
               $ext    = strtolower($f_type[count($f_type) - 1]);
               $fpath  = md5($Dname . '-' . time() . '') . '.' . $ext;
               move_uploaded_file($tmp_name, $dest . $fpath);
               if ($exists != "") {
                   if (file_exists($dest . $exists)) {
                       @unlink($dest . $exists);
                   }
               }
               $rfile = $fpath;
           } else {
               $rfile = $exists;
           }
           return $rfile;
       }
      
   }
  
   if (!function_exists('_dFormat')) {
       function _dFormat($dd = '')
       {
           $ci =& get_instance();
           if ($dd != '0000-00-00' && $dd != '' && $dd != '1900-01-01') {
               $nDate = DateTime::createFromFormat('Y-m-d', $dd);
               $nDD   = $nDate->format('d-m-Y');
           } else {
               $nDD = '';
           }
          
           return $nDD;
       }
   }
  
   if (!function_exists('_sdFormat')) {
       function _sdFormat($dd = '')
       {
           $ci =& get_instance();
           if ($dd != '0000-00-00 00:00:00' && $dd != '' && $dd != '1900-01-01 00:00:00') {
               $nDate = DateTime::createFromFormat('Y-m-d H:i:s', $dd);
               $nDD   = $nDate->format('d-m-Y');
           } else {
               $nDD = '';
           }
          
           return $nDD;
       }
   }
  
   if (!function_exists('_countryID')) {
       function _countryID($name)
       {
           $ci =& get_instance();
           return $ci->master_model->_countryID($name);
       }
   }
   if (!function_exists('_countryN')) {
       function _countryN($name)
       {
           $ci =& get_instance();
           $cn = $ci->master_model->_countryN($name);
           if (!empty($cn)) {
               $cnt = $cn->name;
           } else {
               $cnt = '';
           }
           return $cnt;
       }
   }
  
  
   if (!function_exists('_propertyType')) {
       function _propertyType($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $query = $ci->db->get('property_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
  
   if (!function_exists('_Floors')) {
       function _Floors($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $query = $ci->db->get('floor_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
  
   if (!function_exists('_Numbers')) {
       function _Numbers($mid, $max)
       {
           $ci =& get_instance();
           $numbers = "";
          
           for ($i = 1; $i <= $max; $i++) {
               $Sdata = ($i == $mid) ? 'selected' : '';
               $numbers .= "<option " . $Sdata . " value ='" . $i . "'>";
               $numbers .= $i;
               $numbers .= "</option>";
           }
           return $numbers;
       }
   }
  
   if (!function_exists('_builders')) {
       function _builders($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $query = $ci->db->get('builders');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->builder_name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_currencies')) {
       function _currencies($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $query = $ci->db->get('currency');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->code;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_localities')) {
       function _localities($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->select('*');
           $ci->db->from('locations');
           $ci->db->where('status', 1);
           $query = $ci->db->get();
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_cities')) {
       function _cities($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->select('*');
           $ci->db->from('cities');
           $ci->db->where('status', 1);
           $ci->db->order_by('name', 'asc');
           $query = $ci->db->get();
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_districts')) {
       function _districts($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->select('*');
           $ci->db->from('districts');
           $ci->db->where('status', 1);
           $ci->db->order_by('name', 'asc');
           $query = $ci->db->get();
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_states')) {
       function _states($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->from('states');
           $ci->db->order_by('name');
           $query = $ci->db->get();
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_countries')) {
       function _countries($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->from('countries');
           $ci->db->where('id', 101);
           $query = $ci->db->get();
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_users')) {
       function _users($role, $mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('user_role_id', $role);
           $query = $ci->db->get('users');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->id . "'>";
               $banks .= $row->full_name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
  
   if (!function_exists('_categories')) {
       function _categories($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('property_categories');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               if ($mid == '') {
                   $mid = 'apartment';
               }
               $Sdata = ($row->slug == $mid) ? 'checked' : '';
               $banks .= '<span class="frdo"><input ' . $Sdata . ' id="pv_' . $row->id . '" type="radio" name="type" value ="' . $row->slug . '" /><label for="pv_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_pFor')) {
       function _pFor($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('listing_type');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="propf_' . $row->id . '" type="radio" name="pvIWT" value="' . $row->id . '"><label for="propf_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_pTypes')) {
       function _pTypes($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('property_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="box2RBC"><input ' . $Sdata . ' id="prop_' . $row->id . '" type="radio" name="propertyType" value="' . $row->id . '"><label for="prop_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_p_categories')) {
       function _p_categories($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('property_categories');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="pvAprt_' . $row->id . '" type="radio" name="pvPTYP" value="' . $row->id . '"><label for="pvAprt_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_floorTypes')) {
       function _floorTypes($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('floor_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="pvBHK_' . $row->id . '" type="radio" name="pvBHK" value="' . $row->id . '"><label for="pvBHK_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
  
   if (!function_exists('_filterRooms')) {
       function _filterRooms($mid)
       {
           $arr = array();
           if ($mid != '') {
               $arr = explode(',', $mid);
           }
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('floor_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = (in_array($row->id, $arr)) ? 'checked' : '';
               $banks .= '<li><div class="form-check"><input class="form-check-input" ' . $Sdata . ' id="pvBHK_' . $row->id . '" type="checkbox" name="pvBHK" value="' . $row->id . '" onclick="filterData();"><label for="pvBHK_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></div></li>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_bathrooms')) {
       function _bathrooms($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('bathrooms');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="pv_' . $row->id . '" type="radio" name="pvBTH" value="' . $row->id . '"><label for="pv_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_balconies')) {
       function _balconies($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('balconies');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="pvb_' . $row->id . '" type="radio" name="pvBLCNY" value="' . $row->id . '"><label for="pvb_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_furnishType')) {
       function _furnishType($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('furnish_types');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="pvfllfrns_' . $row->id . '" type="radio" name="pvFRNTYP" value="' . $row->id . '"><label for="pvfllfrns_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_constructionStatus')) {
       function _constructionStatus($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('construction_status');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->id == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input ' . $Sdata . ' id="cs_' . $row->id . '" type="radio" name="pvCONSTS" value="' . $row->id . '"><label for="cs_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_checkCategories')) {
       function _checkCategories($mid)
       {
           $arr = array();
           if ($mid != '') {
               $arr = explode(',', $mid);
           }
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('property_categories');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = (in_array($row->slug, $arr)) ? 'checked' : '';
               $banks .= '<li><div class="form-check"><input class="form-check-input" name="type" type="checkbox" value="' . $row->slug . '" id="pv_' . $row->id . '" ' . $Sdata . '><label class="form-check-label" for="pv_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</label></div></li>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_openParkings')) {
       function _openParkings($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('parkings');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->slug == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input type="radio" value="' . $row->slug . '" id="opr_' . $row->id . '" ' . $Sdata . ' name="pvOPNPRK" ><label class="form-check-label" for="opr_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</span>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('_coverParkings')) {
       function _coverParkings($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ci->db->where('status', 1);
           $query = $ci->db->get('parkings');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->slug == $mid) ? 'checked' : '';
               $banks .= '<span class="chkrdobtn"><input type="radio" value="' . $row->slug . '" id="cpr_' . $row->id . '" ' . $Sdata . '  name="pvCVRPRK" ><label class="form-check-label" for="cpr_' . $row->id . '">';
               $banks .= $row->name;
               $banks .= "</span>";
           }
           return $banks;
       }
   }
  
  
   if (!function_exists('_mainCities')) {
       function _mainCities($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ids   = array(706,1119,1126,1558,2707,2763,3659,4460,4536,4759,4933,5022);
           $ci->db->where('status', 1);
           $ci->db->where_in('id', $ids);
           $ci->db->order_by('name', 'ASC');
           $query = $ci->db->get('cities');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->slug == $mid) ? 'active' : '';
               $banks .= '<div class="col-xl-1 col-md-2 col-sm-3"><a href="'.base_url().$row->slug.'" class="ctyLink '.$Sdata.'">';
			   $banks .= '<img src="'.base_url().'uploads/cities/'.$row->icon.'" class="img-fluid">';
			   $banks .= '<span class="ctyName '.$row->id.'">';
               $banks .= $row->name;
               $banks .= "</span></a></div>";
           }
           return $banks;
       }
   }

   if (!function_exists('_topCities')) {
       function _topCities($mid)
       {
           $ci =& get_instance();
           $banks = "";
           $ids   = array(4776,5022,4759,706,707);
           $ci->db->where('status', 1);
           //$ci->db->where_in('id', $ids);
           $query = $ci->db->get('cities');
           $Mq    = $query->result();
          
           foreach ($Mq as $row) {
               $Sdata = ($row->slug == $mid) ? 'selected' : '';
               $banks .= "<option " . $Sdata . " value ='" . $row->slug . "'>";
               $banks .= $row->name;
               $banks .= "</option>";
           }
           return $banks;
       }
   }
  
   if (!function_exists('paypal_payment')) {
      
       function paypal_payment($amt, $invoice_id)
       {
          
           $ci =& get_instance();
           $amount  = $amt;
           $invoice = $invoice_id;
           $demo    = 1;
           $data    = array(
               'invoice_id' => $invoice,
               'amount' => $amount
           );
          
           $pay_amount = $data['amount'];
          
           $ci->paypal->add_field('rm', 2);
           $ci->paypal->add_field('no_note', 0);
           $ci->paypal->add_field('item_name', 'Invoice');
           $ci->paypal->add_field('amount', $pay_amount);
           $ci->paypal->add_field('custom', $data['invoice_id']);
           $ci->paypal->add_field('business', 'rajan@yopmail.org');
           $ci->paypal->add_field('tax', 0);
           $ci->paypal->add_field('quantity', 1);
           $ci->paypal->add_field('currency_code', 'USD');
          
           $ci->paypal->add_field('notify_url', base_url('payment/paypal_notify'));
           $ci->paypal->add_field('cancel_return', base_url('payment/payment_cancel/' . $data['invoice_id']));
           $ci->paypal->add_field('return', base_url('payment/payment_success/' . $data['invoice_id']));
          
          
          
           if ($demo == 1) {
               $ci->paypal->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
           } else {
               $ci->paypal->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
           }
          
           $ci->paypal->submit_paypal_post();
       }
   }
  
   if (!function_exists('_recaptchaValidate')) {
       function _recaptchaValidate($captcha)
       {
          
           $secretKey    = RE_CAPTCHA_SITE_KEY;
           $ip           = $_SERVER['REMOTE_ADDR'];
           $url          = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
           $response     = file_get_contents($url);
           $responseKeys = json_decode($response, true);
          
           if ($responseKeys["success"]) {
               return true;
           } else {
               return false;
           }
       }
   }
  
  
   if (!function_exists('_getDocumentByRelation')) {
       function _getDocumentByRelation($where)
       {
           $ci =& get_instance();
           return $ci->web->check_document($where);
       }
   }
  
  
   if (!function_exists('_getLastInvoice')) {
      
       function _getLastInvoice()
       {
           $ci =& get_instance();
          
           $ci->db->order_by('id', 'desc');
           $ci->db->limit(1, 1);
           $res = $ci->db->get('invoices')->row();
           return $res->id;
       }
   }

   if (!function_exists('_listingInfo')) {
      
       function _listingInfo($nm, $id)
       {
           $ci =& get_instance();          
           $ci->db->where('parent_id', $id);
           $ci->db->where('name', $nm);
           $res = $ci->db->get('listings')->row();
		   return $res;
       }
   }
  
   if (!function_exists('_getSlugID')) {
      
       function _getSlugID($tbl, $slug)
       {
           $ci =& get_instance();
           $ci->db->where('slug', $slug);
           $res = $ci->db->get($tbl)->row();
           return $res->id;
       }
   }
  
   if (!function_exists('_getSetting')) {
      
       function _getSetting()
       {
           $ci =& get_instance();
           $ci->db->select('*');
           $query  = $ci->db->get('settings');
           $result = $query->row();
           return $result;
       }
   }
  
   if (!function_exists('_cityName')) {
      
       function _cityName($id)
       {
           $ci =& get_instance();
           $ci->db->select('*');
           $ci->db->where('id', $id);
           $ci->db->order_by('name');
           $query  = $ci->db->get('cities');
           $result = $query->row();
           if (!empty($result)) {
               return $result->name;
           } else {
               return '';
           }
       }
   }
  
   if (!function_exists('_cityDetails')) {
      
       function _cityDetails($id)
       {
           $ci =& get_instance();
           $ci->db->select('c.name as city, s.name as state, ct.name as country');
           $ci->db->from('cities c');
           $ci->db->join('states s', 'c.state_id = s.id', 'left');
           $ci->db->join('countries ct', 's.country_id = ct.id', 'left');
           $ci->db->where('c.id', $id);
           $query  = $ci->db->get();
           $result = $query->row();
           if (!empty($result)) {
               return $result;
           } else {
               return array();
           }
          
       }
   }
  
   if (!function_exists('listing_prices')) {
      
       function listing_prices($id, $type)
       {
		   $ci =& get_instance();
		   if($type=='5'){
			$ci->db->select('IFNULL(MIN(plot_totalPrice), 0) as min_price, IFNULL(MAX(plot_totalPrice), 0) as max_price');
            $ci->db->from('plot_plans');
			$ci->db->where('plot_totalPrice!=0');
           }else{
			$ci->db->select('IFNULL(MIN(floor_totalPrice), 0) as min_price, IFNULL(MAX(floor_totalPrice), 0) as max_price');
            $ci->db->from('floor_plans');
			$ci->db->where('floor_totalPrice!=0');
           }
           $ci->db->where('listing_id', $id);
           $query  = $ci->db->get();
		   $result = $query->row();
		   
           if (!empty($result)) {
               return $result;
           } else {
               return array();
           }
          
       }
   }
  
  
   if (!function_exists('sendEmail')) {
       function sendEmail($to, $subject, $message)
       {
           $data = array();
           $ci =& get_instance();
           $ci->load->library('phpmailer_lib');
           $mail = $ci->phpmailer_lib->load();
          
           $mail->Host       = 'mail.propvenues.com';
           $mail->SMTPAuth   = true;
           $mail->Username   = 'enquiry@propvenues.com';
           $mail->Password   = '!RHPodeygyz#';
           $mail->SMTPSecure = 'tls';
           $mail->Port       = 587;
          
           $mail->setFrom('', '');
          
           $data['logo']               = $logo;
           $data['application_title']  = 'Propvenues';
           $data['application_footer'] = 'Propvenues';
           $data['email_content']      = $message;
          
           $email_body = $ci->load->view('email/template_mail', $data, true);
           $mail->addAddress($to);
           $mail->Subject = $subject;
           $mail->isHTML(true);
           $mail->Body = $email_body;
          
           if (!$mail->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $mail->ErrorInfo;
           } else {
               return true;
           }
          
       }
      
   }
  
   if (!function_exists('_locations')) {
      
       function _locations()
       {
           $ci =& get_instance();
           $query = $ci->db->get('locations');
           $res   = $query->result();
           if (!empty($res)) {
               return $res;
           } else {
               return array();
           }
       }
   }
  
  
   if (!function_exists('array_flatten')) {
      
       function array_flatten($array)
       {
           if (!is_array($array)) {
               return false;
           }
           $result = array();
           foreach ($array as $key => $value) {
               if (is_array($value)) {
                   $result = array_merge($result, array_flatten($value));
               } else {
                   $result = array_merge($result, array(
                       $key => $value
                   ));
               }
           }
           return $result;
       }
      
   }
  
   if (!function_exists('_listRecord')) {
      
       function _listRecord($arr)
       {          
		  $ci =& get_instance();
		  $ci->_table_name='listings';
          $query = $ci->db->insert('listings', $arr);
		  $insert_id = $ci->db->insert_id();
		  $slug= create_url($id=$insert_id, $title=$arr['url']);
		  $update_data=array('url'=>$slug);
		  $now = date('Y-m-d H:i:s');
          $insert_id || $update_data['created_on'] = $now; // if ID is set leave, else set $data['created_on'] = $now
          $update_data['updated_on'] = $now;
		  $ci->db->set($update_data);
          $ci->db->where('id', $insert_id);
          $ci->db->update('listings');
		  return true;
       }
   }

   if (!function_exists('_getlisting')) {
      
       function _getlisting($arr)
       {          
		  $ci =& get_instance();
		  $ci->db->select('id, url');
		  $ci->db->from('listings');
		  $ci->db->where('name', $arr['name']);
          $ci->db->where('parent_id', $arr['parent_id']);
         
		 $query = $ci->db->get();
		 if($query->num_rows() > 0){
            $details=$query->row();
            return $details;
         }else{
            return array();
         }
       }
   }

   if (!function_exists('_updatelistRecord')) {
      
       function _updatelistRecord($arr)
       {          
		  $ci =& get_instance();
		  $listing = _getlisting($arr);
		  if(!empty($listing)){
			$slug= create_url($id=$listing->id, $title=$arr['url']);
			$update_data=array('url'=>$slug);
			$now = date('Y-m-d H:i:s');
			$update_data['updated_on'] = $now;
			$ci->db->set($update_data);
			$ci->db->where('id', $listing->id);
			//$ci->db->where('name', $arr['name']);
			//$ci->db->where('parent_id', $arr['parent_id']);
			$ci->db->update('listings');
		  }else{
			  _listRecord($arr);
		  }
		  return true;
       }
   }

   if (!function_exists('_deleteListing')) {
      
       function _deleteListing($arr)
       {          
		  $ci =& get_instance();
		  $ci->db->set($update_data);
		  $ci->db->where('id', $listing->id);
		  $ci->db->update('listings');
		  return true;
       }
   }

   if (!function_exists('create_url')) {
		function create_url($id,$title)
		{   
		    $ci =& get_instance();
			$count = 0;
			$title = url_title($title);
			$url_title = $title;
			while(true) 
			{
				$ci->db->select('id');
				$ci->db->where('id !=', $id);
				$ci->db->where('url', $url_title);
				$query = $ci->db->get('listings');
				if ($query->num_rows() == 0) break;
				$url_title = $title . '-' . (++$count);
			}
			return strtolower($url_title);
		}
   }

   if (!function_exists('_listingUrl')) {
		function _listingUrl($id,$type)
		{   
		    $ci =& get_instance();
			$ci->db->select('url');
			$ci->db->where('parent_id', $id);
			$ci->db->where('name', $type);
			$query = $ci->db->get('listings');
			$details = $query->row();
			if(!empty($details)){
              return $details->url;
			}else{
			  $str = ''; 	
			  return $str;	
			}
		}
   }

   if (!function_exists('_listingDetails')) {
		function _listingDetails($id)
		{   
		    $ci =& get_instance();
			$ci->db->select('*');
			$ci->db->where('id', $id);
			$query = $ci->db->get('listings');
			$details = $query->row();
			if(!empty($details)){
              return $details;
			}else{
			  return array();	
			}
		}
   }

   if (!function_exists('_slugID')) {
		function _slugID($slug)
		{   
		    $ci =& get_instance();
			$ci->db->select('id');
			$ci->db->where('url', $slug);
			$query = $ci->db->get('listings');
			$details = $query->row();
			if(!empty($details)){
              return $details->id;
			}else{
			  $str = ''; 	
			  return $str;	
			}
		}
   }

   if (!function_exists('_averageRates')) {
		function _averageRates($id, $cat)
		{   
		    $ci =& get_instance();
			if($cat=='5'){
			 $ci->db->select('AVG(plot_basePrice) as avgRate');
			 $ci->db->join('plot_plans pp','p.id = pp.listing_id','inner');
			}if($cat!='5'){
			 $ci->db->select('AVG(floor_basePrice) as avgRate');
			 $ci->db->join('floor_plans fp','p.id = fp.listing_id','inner');
			}
			$ci->db->where('p.id', $id);
			$query = $ci->db->get('projects p');
			$details = $query->row();
			if(!empty($details)){
              return $details->avgRate;
			}else{
			  $str = 0.00; 	
			  return $str;	
			}
		}
   }
  
  
   function no_to_words($nm)
   {
       $ns       = explode('.', $nm);
       $no       = $ns[0];
       $finalval = '';
       if ($no == 0) {
           return '0.00';
          
       } else {
           $n = strlen($no); // 7
           switch ($n) {
               case 3:
                   $val      = $no / 100;
                   $val      = round($val, 2);
                   $finalval = $val . " HD";
                   break;
               case 4:
                   $val      = $no / 1000;
                   $val      = round($val, 2);
                   $finalval = $val . " TH";
                   break;
               case 5:
                   $val      = $no / 1000;
                   $val      = round($val, 2);
                   $finalval = $val . " TH";
                   break;
               case 6:
                   $val      = $no / 100000;
                   $val      = round($val, 2);
                   $finalval = $val . " Lac";
                   break;
               case 7:
                   $val      = $no / 100000;
                   $val      = round($val, 2);
                   $finalval = $val . " Lac";
                   break;
               case 8:
                   $val      = $no / 10000000;
                   $val      = round($val, 2);
                   $finalval = $val . " Cr";
                   break;
               case 9:
                   $val      = $no / 10000000;
                   $val      = round($val, 2);
                   $finalval = $val . " Cr";
                   break;
              
               default:
                   echo "";
           }
           return $finalval;
          
       }
   }
 