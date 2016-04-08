<?php

/**
 * Feedback Model class
 *
 * @package     Campaign_model
 * @author      Renfrid Ngolongolo
 * @link        http://sacids.org
 */
class Campaign_model extends CI_Model
{

    /**
     * Campaign table name
     *
     * @var string
     */
    private static $table_name = "campaign";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null
     * @return mixed
     */
    public function get_campaign()
    {
        return $this->db->get(self::$table_name)->result();
    }

    /**
     * @param $campaign_id
     * @return mixed
     */
    public function get_campaign_by_id($campaign_id)
    {
        return $this->db->get_where(self::$table_name, array('id' => $campaign_id))->row();
    }

}