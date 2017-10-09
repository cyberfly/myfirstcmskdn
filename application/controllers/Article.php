<?php 

class Article extends MY_Controller{

	// senarai artikel
	public function index()
	{
		$articles = $this->article_model->article_info()->get_all();

		//passkan data ke view

		$data = array();

		$data['articles'] = $articles;

		//load content

		$data['content'] = 'articles/index';

		//load view bersama dengan data

		$this->load->view('templates/master_template',$data);
	}

	//create form

	public function create()
	{
		//set validation rules

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('description', 'Description', 'required');

		//bila first time load, load page
		//bila validation failed, load balik page ni
		
		if ($this->form_validation->run() == FALSE) {
			
			$data = array();

			$data['content'] = 'articles/create';

			$this->load->view('templates/master_template', $data);

		}
		else{
			//bila validation success, baru insert

			//get data from form

			$title = $this->input->post('title');
			$description = $this->input->post('description');

			//prepare data to insert

			$article_data = array(
					'title'=>$title,
					'description'=>$description

				);

			//insert

			$this->article_model->insert($article_data);

			//set success message
			$this->session->set_flashdata('success','Artikel berjaya di tambah');

			//redirect

			redirect('article/index','refresh');
		}
	}

	//edit form

	public function edit()
	{
		//set validation rules

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('description', 'Description', 'required');


		//get article id from url if first time load

		$article_id = $this->uri->segment(3, 0);

		//get article id from hidden field if submit form

		if (empty($article_id)) {
			$article_id = $this->input->post('id');
		}

		// var_dump($article_id);
		// exit;


		//bila first time load, load page
		//bila validation failed, load balik page ni
		
		if ($this->form_validation->run() == FALSE) {
			
			$data = array();

			$article = $this->article_model->get($article_id);


			$data['article'] = $article;

			$data['content'] = 'articles/edit';

			$this->load->view('templates/master_template', $data);

		}
		else{
			//bila validation success, baru update

			//get data from form

			$title = $this->input->post('title');
			$description = $this->input->post('description');

			//prepare data to update

			$article_data = array(
					'title'=>$title,
					'description'=>$description

				);

			//update

			$this->article_model->update($article_data, $article_id);

			//set success message
			$this->session->set_flashdata('success','Artikel berjaya di kemaskini');

			//redirect

			redirect('article/edit/'.$article_id,'refresh');
		}
	}

	//delete form

	public function delete()
	{

	}

	// upload and import csv

	public function import_article_csv()
	{
		
		$this->form_validation->set_rules('article_csv', 'Article CSV', 'trim');

		//if validation failed or first load
		if ($this->form_validation->run() == FALSE) {
			
			$data = array();

			$data['content'] = 'articles/import';

			$this->load->view('templates/master_template', $data);
		}
		else
		{
			//process the csv and import

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 1000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('article_csv'))
            {
                    $error = array('error' => $this->upload->display_errors());
                 
                    var_dump($error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    // var_dump($data['upload_data']['full_path']);
                    // exit;
                    // var_dump($data);
                    // exit;

                    $full_path = $data['upload_data']['full_path'];

                    //read csv file and map into array

                    $csv_array = array_map('str_getcsv', file($full_path));

                    // var_dump($csv_array);

                    $result_array = array(
                    	'success_import'=>array(),
                    	'failed_import'=>array()
                    );


                    if (!empty($csv_array)) {
                    	
                    	foreach ($csv_array as $key => $value) {
                    		
                    		if ($key>0) {
                    			
                    			
                    			$title = $value[2];		
                    			$description = $value[3];

                    			// var_dump($title);		
                    			// var_dump($description);

                    			// check article already exist

                    			$condition = array('title'=>$title);

                    			$article = $this->article_model->where($condition)->get();

                    			//if article with title already exist

                    			if ($article) {
                    				// var_dump($article);
                    				// echo "dah ada";
                    				$result_array['failed_import'][] = $title;
                    			}
                    			else{
                    				//if not exist
                    				// echo "belum ada";

                    				$article_data = array(
                    					'title'=>$title,
                    					'description'=>$description
                    					);

                    				$this->article_model->insert($article_data);

                    				$result_array['success_import'][] = $title;
                    			}		

                    			// exit;
                    		}

                    	}

                    }

                    var_dump($result_array);
                    // echo 'success';
            }


		}

	}



}



