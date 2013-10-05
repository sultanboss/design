<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function add_tiles($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('main_tiles', $data)) {
            $tiles_id = $this->db->insert_id();
            return $tiles_id;
        }
        return NULL;
    }

    function get_tiles($tiles_id) 
    {
        $this->db->where('tiles_id', $tiles_id);
        $query = $this->db->get('main_tiles');

        if ($query->num_rows() == 1) 
            return $query->row();
        return NULL;
    }

    function get_all_tiles()
    {
        $this->db->order_by("tiles_type", "asc"); 
        $query = $this->db->get('main_tiles');
        return $query->result_array();
    }

    function get_all_tiles_size()
    {
        $this->db->order_by("tiles_type_size_name", "asc"); 
        $query = $this->db->get('main_tiles_type_size');
        return $query->result_array();
    }

    function get_all_tiles_cat()
    {
        $this->db->order_by("tiles_type_cat_name", "asc"); 
        $query = $this->db->get('main_tiles_type_cat');
        return $query->result_array();
    }

    function get_all_border_tiles()
    {
        $this->db->where('tiles_cat', 'border');
        $this->db->order_by("tiles_code", "asc"); 
        $query = $this->db->get('main_tiles');
        return $query->result_array();
    }

    function update_tiles($data, $tiles_id)
    {
        $data['created'] = date('Y-m-d H:i:s');

        $this->db->where('tiles_id', $tiles_id);
        $this->db->update('main_tiles', $data);
        return $tiles_id;
    }

    function add_rooms($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('main_rooms', $data)) {
            $room_id = $this->db->insert_id();
            return $room_id;
        }
        return NULL;
    }

    function get_rooms($room_id) 
    {
        $this->db->where('room_id', $room_id);
        $query = $this->db->get('main_rooms');

        if ($query->num_rows() == 1) 
            return $query->row();
        return NULL;
    }

    function get_all_rooms()
    {
        $this->db->order_by("room_type", "asc"); 
        $query = $this->db->get('main_rooms');
        return $query->result_array();
    }

    function update_rooms($data, $room_id)
    {
        $data['created'] = date('Y-m-d H:i:s');

        $this->db->where('room_id', $room_id);
        $this->db->update('main_rooms', $data);
        return $room_id;
    }

    function get_all_rooms_type()
    {
        $query = $this->db->get('main_rooms_type');
        return $query->result_array();
    }

    function get_category_tiles($category)
    {
        $this->db->where("tiles_type", $category); 
        $query = $this->db->get('main_tiles');
        return $query->result_array();
    }

    function get_size_tiles($size)
    {
        $this->db->where("tiles_size", $size); 
        $query = $this->db->get('main_tiles');
        return $query->result_array();
    }

    function get_tiles_category_count($category)
    {
        $this->db->select("count(tiles_size), tiles_cat, tiles_size, tiles_type");
        $this->db->where('tiles_type', $category);
        $this->db->from("main_tiles");
        $this->db->group_by("tiles_cat, tiles_size");
        return $this->db->get()->result_array();
    }

}