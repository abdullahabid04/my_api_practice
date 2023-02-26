<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PracticeModel', 'pm');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function postdata($prod_id, $sensor_name, $sensor_value)
	{
		$data = array(
            'prod_id' => $prod_id,
            'sensor_name' => $sensor_name,
            'sensor_value' => $sensor_value
        );
        $response = $this->pm->insert_data($data);

        echo "<h1>$response</h1>";
	}

    public function get_data($prod_id, $sensor_name)
    {
        $data = $this->pm->fetch_data($prod_id, $sensor_name);

        $timestamp = $data[0];
        $sensor_name = $data[1];
        $sensor_value = $data[2];

        echo $timestamp;
        echo $sensor_name;
        echo $sensor_value;
    }
}
?>
