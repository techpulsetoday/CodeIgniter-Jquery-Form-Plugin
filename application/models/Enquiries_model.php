<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiries_Model extends CI_Model {

    private $table;
    public $key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->key = array();
        $this->data = array();
    }

    private function reset() {
        $this->key = array();
        $this->data = array();
    }

    private function reset_pk() {
        $this->key = array();
    }

    private function reset_data() {
        $this->data = array();
    }

    public function get_max_value($field) {
        $this->db->select_max($field);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->$field;
    }

    public function is_exist() {
        $this->db->where($this->key);
        $this->db->select('COUNT(*) as counter');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->counter;
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->key);
        $this->reset();
        return true;
    }

    public function delete() {
        $this->db->delete($this->table, $this->key);
        $this->reset_pk();
        return true;
    }
}