<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
  
   class Pages extends MY_Controller
   {
       public function __construct()
       {
           parent::__construct();
           //Load Libraries
           $this->load->library(array(
               'pagination'
           ));
           //pagination settings
           $this->perPage = 10;
           //load helper for language
           $this->load->helper('language');
       }
      
       //Home Page
       public function any($slug, $slug1 = null, $slug2 = null, $slug3 = null)
       {
           $data = array();
           if ($slug2 != '') {
               $details = $this->home->get_slugDetails($slug2);
               if (empty($details)) {
                   $this->error404();
               }
           } else if ($slug1 != '' && $slug2 == '') {
               $details = $this->home->get_slugDetails($slug1);
               if (empty($details)) {
                   $this->error404();
               }
           } else if ($slug != '' && $slug1 == '' && $slug2 == '') {
               $details = $this->home->get_slugDetails($slug);
               if (empty($details)) {
                   $this->error404();
               }
           } else {
               $this->error404();
           }
           if ($details->name == 'city') {
               $this->cities($details);
           }
           if ($details->name == 'locality') {
               $this->localities($details);
           }
           if ($details->name == 'builder') {
               $this->builders($details);
           }
           if ($details->name == 'project') {
               $this->projects($details);
           }
           if ($details->name == 'page') {
               $this->page($details);
           }
       }
      
      
       /**
        * All Page
        */
       private function page($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $data['title']       = ''; //$data['page']->title;
               $data['description'] = ''; //$data['page']->page_description;
               $data['keywords']    = ''; //$data['page']->page_keywords;
               $data['is_search']   = TRUE;
               $data['sub_view']    = $this->load->view('site/pages/' . $page->file, $data, TRUE);
               $this->load->view('site/_layout', $data);
           }
       }
      
      
       /**
        * Project Page
        */
       private function project($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $data['title']       = ''; //$data['page']->title;
               $data['description'] = ''; //$data['page']->page_description;
               $data['keywords']    = ''; //$data['page']->page_keywords;
               $data['is_search']   = TRUE;
               $data['sub_view']    = $this->load->view('site/pages/cities', $data, TRUE);
               $this->load->view('site/_layout', $data);
           }
       }
      
      
       /**
        * Project Page
        */
       private function cities($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $data['city']             = $page->parent_id;
               $info                     = $this->masters->get_record_id('cities', $page->parent_id);
               $data['title']            = $info->title;
               $data['description']      = $info->meta_description;
               $data['keywords']         = $info->meta_keywords;
			   $data['info']             = $info; //$data['page']->page_keywords;
               $data['popular_projects'] = $this->home->popular_projects($page->parent_id,'city');
               $data['best_builders']    = $this->home->_builders($page->parent_id,'city');
               $data['cities_locations'] = $this->home->cities_locations($page->parent_id); //$data['page']->page_keywords;
               $data['is_search']        = FALSE;
               $data['sub_view']         = $this->load->view('site/pages/cities', $data, TRUE);
               $this->load->view('site/_layout', $data);
           }
       }
      
       /**
        * Localities Page
        */
       private function localities($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $data['locality']         = $page->parent_id;
               $info                     = $this->masters->get_record_id('locations', $page->parent_id);
               $data['title']            = $info->title;
               $data['description']      = $info->meta_description;
               $data['keywords']         = $info->meta_keywords;
			   $data['info']             = $info;
               $data['popular_projects'] = $this->home->popular_projects($page->parent_id,'locality'); //$data['page']->page_keywords;
               $data['best_builders']    = $this->home->_builders($page->parent_id,'locality'); //$data['page']->page_keywords;
               $data['is_search']        = FALSE;
               $data['sub_view']         = $this->load->view('site/pages/' . $page->file, $data, TRUE);
               $this->load->view('site/_layout', $data);
           }
       }
      
      
       /**
        * Builder Page
        */
       private function builders($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $id                       = $page->parent_id;
               $builder             = $this->builder_model->get_builder($id);
               $data['title']       = $builder['title'];
               $data['description'] = $builder['meta_description'];
               $data['keywords']    = $builder['meta_keywords'];
               $data['builder']          = $builder;
               $builder_projects         = $this->builder_model->get_builderProjects($id);
               $data['builder_projects'] = $builder_projects;
               $data['is_builder']       = TRUE;
               $data['is_project']       = FALSE;
               $data['is_search']        = TRUE;
               $data['sub_view']         = $this->load->view('site/pages/builders-or-projects', $data, TRUE);
               $this->load->view('site/_layout', $data);
           }
       }
      
       /**
        * Property Page
        */
       private function post($slug)
       {
          
          
          
       }
      
       //Get Search Suggestions AJAX
       public function get_search_suggestions()
       {
           $conditions['search']['keyword'] = $this->input->post('keyword');
           ;
           $conditions['search']['category'] = NULL;
           $conditions['search']['status']   = 'PUBLISHED';
           $conditions['keep_order']         = TRUE;
           //get all articles
           $articles                         = $this->article_model->get_articles($conditions);
           if ($articles) {
               //response
               $success = TRUE;
               $message = '';
           } else {
               //response
               $success = FALSE;
               $message = 'No Suggestions Found!';
           }
          
           $json_array = array(
               'success' => $success,
               'message' => $message,
               'results' => $articles
           );
           echo json_encode($json_array);
           exit();
       }
      
       //Search Result Page
       public function search()
       {
           $data['title']    = $this->lang->line("text_search_result");
           $keyword          = $this->input->get('s', TRUE);
           $data['keyword']  = $keyword;
           $data['sub_view'] = $this->load->view('site/pages/search-result', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
      
       //Pages
       public function about_us()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;
           $data['sub_view'] = $this->load->view('site/pages/about-us', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function post_enquiry()
       {
           $post_data = array(
               'full_name' => $this->input->post('full_name'),
               'phone' => $this->input->post('phone'),
               'email_address' => $this->input->post('email'),
               'terms_conditions' => $this->input->post('terms'),
               'home_loans' => $this->input->post('loans'),
               'status' => 2
           );
          
           $result = $this->home->create_enquiry($post_data);
       }
      
       public function post_offer_enquiry()
       {
           $post_data = array(
               'full_name' => $this->input->post('full_name'),
               'phone' => $this->input->post('phone'),
               'email_address' => $this->input->post('email'),
               'terms_conditions' => $this->input->post('terms'),
               'home_loans' => $this->input->post('loans'),
               'listing_id' => $this->input->post('listing_id'),
               'listing_type' => $this->input->post('listing_type'),
               'status' => 2
           );
          
           $result = $this->home->create_enquiry($post_data);
       }
      
       public function careers()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/careers', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function partners()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/partners', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function contact_us()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/contact-us', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function feedback_review()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/feedback-review', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function advertise_with_us()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/advertise-with-us', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function home_loan()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/home-loan', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       private function projects($page)
       {
           $data['page'] = $page;
          
           if (empty($data['page']) || $data['page'] == null) {
               $this->error404();
           } else if ($data['page']->is_active == 0 || $data['page']->url == '') {
               $this->error404();
           } else {
               $id           = $page->parent_id;
               $project_info = $this->project->projectDetails($id);
			   $data['title']       = $project_info->title;
               $data['description'] = $project_info->meta_description;
               $data['keywords']    = $project_info->meta_keywords;
              
               if (!empty($project_info)) {
                   $p_images = $this->home->property_images($id);
                   $i_arr    = array();
                   if (!empty($p_images)) {
                       foreach ($p_images as $key => $image) {
                           $i_arr[$image->image_type][$key] = $image;
                       }
                   }
				   $p_arr = array('name'=>'project','parent_id'=>$id);
                   $pc = _getlisting($p_arr);
				   $reviews  = $this->home->all_reviews($pc->id);
				   $avg_rating  = $this->home->avgRating($pc->id);
                   //$project_properties = $this->project->get_projectProperties($id[1]);
                   $data['project_info']      = $project_info;
                   $data['floor_plans']       = $project_info;
                   $data['properties_images'] = $i_arr;
                   $data['project_reviews']   = $reviews;
                   $data['avg_rating']        = $avg_rating;
                   $data['is_search']         = TRUE;
                   $data['sub_view']          = $this->load->view('site/pages/project-details', $data, TRUE);
                   $this->load->view('site/_layout', $data);
               }
              
           }
       }
      
       public function price_trends()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/price-trends', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function offers()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/offers', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function emi_calculator()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/emi-calculator', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function social_media()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/social-media', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function frequently_asked_questions()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/frequently-asked-questions', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function safety_guide()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/safety-guide', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function privacy_policy()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/privacy-policy', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function terms_of_uses()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/terms-of-uses', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function refund_policy()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/refund-policy', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function disclaimer()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/disclaimer', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function profile()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/profile', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       public function post_property()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $data['sub_view'] = $this->load->view('site/pages/post-property', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       //Search Result AJAX
       public function search_result_ajax($page = 0)
       {
           // Row position
           if ($page != 0) {
               $page = ($page - 1) * $this->perPage;
           }
           $conditions['search']['keyword'] = $this->input->post('keyword');
           ;
           $conditions['search']['category'] = NULL;
           $conditions['search']['status']   = 'PUBLISHED';
           $conditions['keep_order']         = TRUE;
           //get articles count
           $articles                         = $this->article_model->get_articles($conditions);
           if ($articles) {
               $articlesCount = count($articles);
           } else {
               $articlesCount = 0;
           }
           //set start and limit
           $conditions['start'] = $page;
           $conditions['limit'] = $this->perPage;
           //get all articles
           $articles            = $this->article_model->get_articles($conditions);
           //get pagination confing
           $config              = $this->pagination_config($base_url = base_url() . 'pages/search_result_ajax', $total_rows = $articlesCount, $per_page = $this->perPage);
           // Initialize
           $this->pagination->initialize($config);
           //set data array
           $data['pagination'] = $this->pagination->create_links();
           $data['page']       = $page;
           $data['articles']   = $articles;
           //response
           $success            = true;
           $message            = '';
           $content            = $this->load->view('site/pages/search_result_ajax', $data, TRUE);
           $json_array         = array(
               'success' => $success,
               'message' => $message,
               'content' => $content
           );
           echo json_encode($json_array);
           exit();
       }
      
       //Knowledge Base Page
       public function articles()
       {
           $data['title']       = 'Propvenues.com';
           $data['description'] = 'Propvenues.com';
           $data['keywords']    = 'Propvenues.com';
		   $data['is_search']   = FALSE;;
           $categories         = $this->article_model->get_categories($params = array());
           $data['categories'] = $categories;
           $data['sub_view']   = $this->load->view('site/pages/knowledge-base', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       //Article Categories Page
       public function categories($category_slug = NULL)
       {
           if ($category_slug != NULL) {
               //get category by slug
               $category = $this->article_model->get_category_by_slug($category_slug);
               if ($category) {
                   $data['title']         = $category['category_name'];
                   $data['category_data'] = $category;
                   //get all categories
                   $categories            = $this->article_model->get_categories($params = array());
                   $data['categories']    = $categories;
                   $data['sub_view']      = $this->load->view('site/pages/categories', $data, TRUE);
                   $this->load->view('site/_layout', $data);
               } else {
                   //redirect to articles
                   redirect('articles', 'refresh');
               }
              
           } else {
               //redirect to articles
               redirect('articles', 'refresh');
           }
          
       }
      
       //List Articles AJAX
       public function list_articles_ajax($page = 0)
       {
           // Row position
           if ($page != 0) {
               $page = ($page - 1) * $this->perPage;
           }
           $keyword  = NULL;
           $category = $this->input->post('category');
           $status   = 'PUBLISHED';
           if (!empty($keyword)) {
               $conditions['search']['keyword'] = $keyword;
           }
           if (!empty($category)) {
               $conditions['search']['category'] = $category;
           }
           if (!empty($status)) {
               $conditions['search']['status'] = $status;
           }
           //get articles count
           $articles = $this->article_model->get_articles($conditions);
           if ($articles) {
               $articlesCount = count($articles);
           } else {
               $articlesCount = 0;
           }
           //set start and limit
           $conditions['start']      = $page;
           $conditions['limit']      = $this->perPage;
           $conditions['keep_order'] = TRUE;
           //get all articles
           $articles                 = $this->article_model->get_articles($conditions);
           //get pagination confing
           $config                   = $this->pagination_config($base_url = base_url() . 'pages/list_articles_ajax', $total_rows = $articlesCount, $per_page = $this->perPage);
           // Initialize
           $this->pagination->initialize($config);
           //set data array
           $data['pagination'] = $this->pagination->create_links();
           $data['page']       = $page;
           $data['articles']   = $articles;
           //response
           $success            = true;
           $message            = '';
           $content            = $this->load->view('site/pages/list_articles_ajax', $data, TRUE);
           $json_array         = array(
               'success' => $success,
               'message' => $message,
               'content' => $content
           );
           echo json_encode($json_array);
           exit();
       }
      
       //View Article
       public function article($article_slug = NULL)
       {
           if ($article_slug != NULL) {
               //get article by slug
               $article = $this->article_model->get_article_by_slug($article_slug);
               if ($article) {
                   $data['title']           = $article['article_title'];
                   $data['article_data']    = $article;
                   //get article vote counts
                   $vote_counts             = $this->article_model->get_article_vote_counts($article['id']);
                   $data['vote_counts']     = $vote_counts;
                   //get all categories
                   $categories              = $this->article_model->get_categories($params = array());
                   $data['categories']      = $categories;
                   //get recent articles
                   $recent_articles         = $this->article_model->get_recent_articles();
                   $data['recent_articles'] = $recent_articles;
                   $data['sub_view']        = $this->load->view('site/pages/article', $data, TRUE);
                   $this->load->view('site/_layout', $data);
               } else {
                   //redirect to articles
                   redirect('articles', 'refresh');
               }
              
           } else {
               //redirect to articles
               redirect('articles', 'refresh');
           }
       }
      
       //FAQ Page
       public function faq()
       {
           $data['title']    = $this->lang->line("text_faq");
           //get all faqs
           $faqs             = $this->faq_model->list_faqs();
           $data['faqs']     = $faqs;
           $data['sub_view'] = $this->load->view('site/pages/faq', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       //Submit Ticket - Guest
       public function submit_ticket()
       {
           //check if guest ticket is enabled
           $allow_guest_ticket_submission = $this->load->get_var('allow_guest_ticket_submission');
           if ($allow_guest_ticket_submission != 1 || $allow_guest_ticket_submission != '1') {
               //redirect to home
               redirect('/', 'refresh');
           }
          
           if ($this->input->post()) {
               //form validation
               $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
               $this->form_validation->set_rules('email', 'Email', 'trim|required');
               $this->form_validation->set_rules('ticket_title', 'Ticket Title', 'trim|required');
               $this->form_validation->set_rules('ticket_description', 'Ticket Description', 'trim|required');
               $this->form_validation->set_rules('category', 'Ticket Category', 'trim|required');
               $this->form_validation->set_rules('priority', 'Ticket Priority', 'trim|required');
               if ($this->form_validation->run() == FALSE) {
                   $success = FALSE;
                   $message = validation_errors();
               } else {
                   $post_data = array(
                       'client_name' => $this->input->post('full_name'),
                       'client_email' => $this->input->post('email'),
                       'ticket_title' => $this->input->post('ticket_title'),
                       'ticket_description' => $this->input->post('ticket_description'),
                       'category_id' => $this->input->post('category'),
                       'priority' => $this->input->post('priority'),
                       'status' => 0
                   );
                  
                   //upload config
                   $config['upload_path']   = 'uploads/tickets/';
                   $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|pdf';
                   $config['encrypt_name']  = TRUE;
                   $config['overwrite']     = TRUE;
                   $config['max_size']      = '2048'; //2 MB
                   //Upload Ticket File
                   if (isset($_FILES['attachment']['name'])) {
                       $this->load->library('upload', $config);
                       if (!$this->upload->do_upload('attachment')) {
                           $success    = FALSE;
                           $message    = $this->upload->display_errors();
                           $json_array = array(
                               'success' => $success,
                               'message' => $message
                           );
                           echo json_encode($json_array);
                           exit();
                       } else {
                           $upload_data              = $this->upload->data();
                           $post_data['ticket_file'] = $upload_data['file_name'];
                       }
                   }
                  
                   //XXS Clean
                   $post_data = $this->security->xss_clean($post_data);
                   $result    = $this->ticket_model->create_ticket($post_data);
                   if ($result['status'] == TRUE && $result['label'] == 'SUCCESS') {
                       try {
                           //Send Mail if Settings enabled
                           $email_notify_new_ticket = $this->load->get_var('email_notify_new_ticket');
                           if ($email_notify_new_ticket == 1 || $email_notify_new_ticket == "1") {
                               $to            = $this->load->get_var('site_email');
                               $site_name     = $this->load->get_var('site_name');
                               $data_set      = array(
                                   'sitename' => $site_name,
                                   'fullname' => $this->input->post('full_name'),
                                   'ticket_title' => $this->input->post('ticket_title'),
                                   'ticket_description' => $this->input->post('ticket_description')
                               );
                               $email_content = $this->generate_email('new_ticket', $data_set);
                               $subject       = $this->get_email_subject($slug = 'new_ticket');
                               @$this->sendEmail($to, $subject, $email_content);
                           }
                          
                       }
                       catch (Exception $e) {
                          
                       }
                      
                       $success = TRUE;
                       $message = $this->lang->line("alert_ticket_created");
                   } elseif ($result['status'] == FALSE && $result['label'] == 'ERROR') {
                       $success = FALSE;
                       $message = $this->lang->line("alert_ticket_not_created");
                   }
               }
              
               $json_array = array(
                   'success' => $success,
                   'message' => $message
               );
               echo json_encode($json_array);
               exit();
           }
           $data['title']      = $this->lang->line("text_submit_ticket");
           //get tickets categories
           $categories         = $this->ticket_model->get_categories($conditions = array());
           $data['categories'] = $categories;
           $data['sub_view']   = $this->load->view('site/pages/submit_ticket', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       //Contact
       public function contact()
       {
           if ($this->input->post()) {
               //form validation
               $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
               $this->form_validation->set_rules('email', 'Email', 'trim|required');
               $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
               $this->form_validation->set_rules('message', 'Message', 'trim|required');
               if ($this->form_validation->run() == FALSE) {
                   $success = FALSE;
                   $message = validation_errors();
               } else {
                   $full_name = $this->input->post('full_name');
                   $email     = $this->input->post('email');
                   $subject   = $this->input->post('subject');
                   $message   = $this->input->post('message');
                   try {
                       $to            = $this->load->get_var('site_email');
                       $site_name     = $this->load->get_var('site_name');
                       $data_set      = array(
                           'sitename' => $site_name,
                           'fullname' => $full_name,
                           'subject' => $subject,
                           'email' => $email,
                           'message' => $message
                       );
                       $email_content = $this->generate_email('site_contact', $data_set);
                       $subject       = $this->get_email_subject($slug = 'site_contact');
                       @$this->sendEmail($to, $subject, $email_content);
                       $success = TRUE;
                       $message = $this->lang->line("alert_message_sent");
                   }
                   catch (Exception $e) {
                       $success = FALSE;
                       $message = $this->lang->line("alert_message_not_sent");
                   }
               }
               $json_array = array(
                   'success' => $success,
                   'message' => $message
               );
               echo json_encode($json_array);
               exit();
           }
           $data['title']    = $this->lang->line("text_contact");
           $data['sub_view'] = $this->load->view('site/pages/contact', $data, TRUE);
           $this->load->view('site/_layout', $data);
       }
      
       //Switch Language
       public function switch_language($language = "")
       {
           $language         = ($language != "") ? $language : "english";
           $site_languages   = $this->config->item('site_language');
           $current_language = $site_languages[$language];
           $this->session->set_userdata('app_language', $current_language);
           redirect($_SERVER['HTTP_REFERER'], 'refresh');
       }
      
       //get all language data
       public function get_all_language_keys()
       {
           $all_lang_array = $this->lang->language;
           $json_array     = array(
               'languages' => $all_lang_array
           );
           echo json_encode($json_array);
           exit();
       }
      
       /*
        * Error 404
        */
       public function error404()
       {
           $data = array();
           echo $this->load->view('errors/error_404', $data, TRUE);
           exit;
       }
      
   }