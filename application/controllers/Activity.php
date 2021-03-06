<?php
class Activity extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('activity_model');
                $this->load->helper('url_helper');
        }


		private function _render_page($view, $data = null)
		{
			$this->viewdata = (empty($data)) ? $this->data : $data;

			$this->load->view('header.php', $this->viewdata);
			$this->load->view($view, $this->viewdata);
			$this->load->view('footer.php', $this->viewdata);
		}

		public function index($data = null)
		{
			$filter = $this->input->post('filter');
        	$field  = $this->input->post('field');
        	$search = $this->input->post('search');
			$data = array(
				'page_title' => 'Actividad',
				'title'=> 'Actividad',
				'success'=> ''
			);

			

        if (!empty($search)) {         
            $data['activity'] = $this->activity_model->get_activity_WhereLike($field, $search);
        } else {            
            $data['activity'] = $this->activity_model->get_activity();
        }


			$this->_render_page('activity/index.php', $data);
		}

		
		public function insert_activity()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			

			$data = array(
				'title' => 'Nueva Actividad',
				'categories' => $this->activity_model->get_categories(),
				'subcategories' => $this->activity_model->get_subcategories()
			);

			$this->form_validation->set_rules('activity_description', 'Descripción', 'required');
			$this->form_validation->set_rules('activity_category', 'Categoría', 'required');
			$this->form_validation->set_rules('activity_subcategory', 'Subcategoría', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// if person does not fill in correct info, they get resubmitted back to the form.             
            	
				$this->_render_page('activity/insert_activity', $data);
			}
			else
			{
				$this->activity_model->set_activity();
				$data['success'] = "La actividad se ha registrado con éxito.";
				redirect('activity', $data);
			}
		}


		public function delete($data = null){
			$this->activity_model->del_activity($data);
			$data['success'] = "La actividad se ha borrado con éxito.";
			redirect('activity', $data);
		}

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);
				        if (empty($data['news_item']))
						{
							show_404();
						}	

				$data['title'] = $data['news_item']['title'];

				$this->load->view('templates/header', $data);
				$this->load->view('news/view', $data);
				$this->load->view('templates/footer');
        }

        public function edit_activity($idActivity = NULL)
        {
            $this->load->helper('form');
			$this->load->library('form_validation');
            $this->load->library('session');			
                      
		    $data = array(
				'title' => 'Nueva Actividad',
				'activity_item' => $this->activity_model->get_activityById($idActivity),
				'categories' => $this->activity_model->get_categories(),
				'subcategories' => $this->activity_model->get_subcategories()
			);
		    if (empty($data['activity_item']))
			{
				show_404();
			}	

			$this->form_validation->set_rules('activity_description', 'activity description', 'required');
			//$data['title'] = $data['activity_item']['idactivity'];
 			if ($this->form_validation->run() === FALSE)
			{
				// if person does not fill in correct info, they get resubmitted back to the form.             
				$this->_render_page('activity/edit_activity.php', $data);

			}
			else
			{
				$this->activity_model->update_activity($idActivity,$data);
				$this->session->set_flashdata('info_message', 'El voluntario/a se ha modificado con éxito.');
				$data['info_message']=$this->session->flashdata('info_message');
				redirect('activity', $data);
			}
			
        }


        public function view_activity($idactivity = NULL)
        {
            $this->load->helper('form');
			$this->load->library('form_validation');
            $data['activity_item'] = $this->activitys_model->get_activityById($idactivity);
		   
		    if (empty($data['activity_item']))
			{
				show_404();
			}	
		
			$this->_render_page('activitys/view_activity.php', $data);			
        }


}