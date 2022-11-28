<?php

    class Home_model extends CI_model{
        function get_email($email){
            $this->db->where('email_User', $email);
            $result = $this->db->get('user')->row();
            return $result;
        }

        function get_request_by_id($id){
            $this->db->where('ID_waitingApproval', $id);
            $result = $this->db->get('waitingapproval')->row();
            return $result;
        }

        function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function insertData($values){
            $this->db->insert('user', $values);
        }

        public function insertFacility($values){
            $this->db->insert('fasilitas', $values);
        }

        public function request_approved($values){
            $this->db->insert('acceptedrequest', $values);
        }

        public function request_rejected($values){
            $this->db->insert('rejectedrequest', $values);
        }

        public function bookFacility($values){
            $this->db->insert('waitingapproval', $values);
            $this->db->insert('waitingapprovaltemporary', $values);
        }

          function get_facillities(){
            $query = $this->db->query("SELECT * FROM fasilitas ORDER BY NAMA_fasilitas");
            return $query->result_array();
        }

        function get_request_listing(){
            $query = $this->db->query("SELECT * FROM waitingapproval");
            return $query->result_array();
        }

        function get_management_request_listing(){
            $query = $this->db->query("SELECT * FROM waitingapprovaltemporary");
            return $query->result_array();
        }

        function get_users(){
            $query = $this->db->query("SELECT * FROM user");
            return $query->result_array();
        }

        public function display_Facilities_By_Id($id){
            $query=$this->db->query("SELECT * FROM fasilitas where ID_Fasilitas ='".$id."'");
            return $query->result();
        }

        public function displayUsersById($id){
            $query=$this->db->query("SELECT * FROM user where id_User ='".$id."'");
            return $query->result();
        }

        public function display_request_listing(){
            $query=$this->db->query("SELECT * FROM waitingapproval where ID_requester ='".$this->session->userdata('id')."'");
            return $query->result();
        }

        public function check_start_date($startdate, $id){
            $this->db->where("start_date <=", $startdate);
            $this->db->where("end_date >=", $startdate);
            $this->db->where('ID_Facility', $id);
            $result = $this->db->get('acceptedrequest')->row();
            return $result;
        }

        public function check_end_date($enddate, $id){
            $this->db->where("start_date <=", $enddate);
            $this->db->where("end_date >=", $enddate);
            $this->db->where('ID_Facility', $id);
            $result = $this->db->get('acceptedrequest')->row();
            return $result;
        }
    }

?>