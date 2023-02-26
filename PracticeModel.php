<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PracticeModel extends CI_Model {
    
    public function insert_data($data)
    {
        $this->db->insert('mytableone', $data);

        return ($this->db->affected_rows() != 1) ? 0 : 1;
    }

    public function fetch_data($prod_id, $sensor_name)
    {
        $query = "SELECT `timestamp`, `sensor_name`, `sensor_value` FROM `mytableone` WHERE `prod_id` = '$prod_id' AND `sensor_name` = '$sensor_name' ORDER BY `id` DESC LIMIT 1";
        
        $exec_sql = $this->db->query($query);

        $timestamp = $exec_sql->result()[0]->timestamp;
        $sensor_name = $exec_sql->result()[0]->sensor_name;
        $sensor_value = $exec_sql->result()[0]->sensor_value;

        $data = array($timestamp, $sensor_name, $sensor_value);

        return $data;
        
        // $query = $this->db->get_where('mytableone', array('prod_id' => $prod_id, 'id' => $this->db->select_max('id')));

        // $row = $query->result_array()[0];
        // return $row;

        // $this->db->select($select);
        // $this->db->where($where);
        // $query = $this->db->get('mytableone');
        // return $query->result_array();

        // $select = array('timestamp', 'sensor_name', 'sensor_value');
        
        // $where = array(
        //     'prod_id' => $prod_id,
        //     'id' => $this->db->select_max('id')
        // );

        // $query = $this->db->select($select);
        // $this->db->from('mytableone');
        // $this->db->where($where);
        // $this->db->limit(1);
        // // $query = $this->db->get();
        // return $query;
    }
}

?>
