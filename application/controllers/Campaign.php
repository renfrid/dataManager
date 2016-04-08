<?php

/**
 *Campaign Class
 *
 * @package     Data
 * @category    Controller
 * @author      Renfrid Ngolongolo
 * @link        http://sacids.org
 */
class Campaign extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Campaign_model'));
    }

    /**
     * get_campaign function
     *
     * @return response
     */
    function get_campaign()
    {
        //comapign result
        $campaign = $this->Campaign_model->get_campaign();

        if ($campaign) {
            $response = array("campaign" => $campaign, "status" => "success");
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        } else {
            $response = array("status" => "success", "message" => "No content");
            $this->output
                ->set_status_header(204)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        }
    }

}