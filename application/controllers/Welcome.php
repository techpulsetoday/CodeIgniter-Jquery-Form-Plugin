<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('enquiries_model');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function save() {
        $response = array();
        $this->form_validation->set_rules('name', 'Name', 'trim|min_length[3]|max_length[12]|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|numeric|min_length[10]|max_length[10]|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                'status' => 'danger',
                'data' => validation_errors('<div class="error">', '</div>')
            );
            echo json_encode($response);
            return FALSE;
        } else {
            $this->enquiries_model->data['name'] = $this->input->post('name', TRUE);
            $this->enquiries_model->data['email'] = $this->input->post('email', TRUE);
            $this->enquiries_model->data['mobile'] = $this->input->post('mobile', TRUE);
            $this->enquiries_model->data['query'] = $this->input->post('query', TRUE);
            $this->enquiries_model->data['enquiry_type'] = $this->input->post('enquiry_type', TRUE);
            $this->enquiries_model->data['status_ind'] = 1;
            $this->enquiries_model->data['created_date'] = date("Y-m-d H:i:s");
            $this->enquiries_model->data['last_modified_date'] = date("Y-m-d H:i:s");
            $this->enquiries_model->data['ip_address'] = $this->input->ip_address();
            if ($this->enquiries_model->insert() == true) {
                $response = array(
                    'status' => 'success',
                    'data' => "Record Added"
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'danger',
                    'data' => "Error Occuredwhile saving data"
                );
                echo json_encode($response);
            }
        }
    }

}
