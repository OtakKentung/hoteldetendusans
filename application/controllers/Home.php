<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
    }

	public function index(){
        if( ! $this->session->userdata('authenticated')){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/landingPage_template.php', $data);
        }
        else{
            if($this->session->userdata('role') == 'User'){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $data['data']=$this->Home_model->get_facillities();
                $data['users']=$this->Home_model->get_facillities();
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data);
                $this->load->view('template/userPage_template.php', $data);
            }
            else if($this->session->userdata('role') == 'Admin'){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $data['data']=$this->Home_model->get_users();
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data);
                $this->load->view('template/adminPage_template.php', $data);
            }
            else if ($this->session->userdata('role') == "Management"){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $data['data']=$this->Home_model->get_facillities();
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data);
                $this->load->view('template/facilityListings_template.php', $data);
            }
        }
        
	}
    public function showLogin(){
        $data['js'] = $this->load->view('include/jslogin.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/csslogin.php', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        $this->load->view('pages/home.php', $data);
        $this->load->view('template/login_template.php', $data);
    }
    public function showRegister(){
        $data['js'] = $this->load->view('include/jslogin.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/cssregister.php', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        $this->load->view('pages/home.php', $data);
        $this->load->view('template/register_template.php', $data);
    }

    public function showDetails(){
        if( ! $this->session->userdata('authenticated')){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/landingPage_template.php', $data);
        }
        else{
            if($this->session->userdata('role') == 'User'){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/detailcss.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $id=$this->input->get('id');
                $data['data'] = $this->Home_model->display_Facilities_By_Id($id);
                $data['users']=$this->Home_model->get_facillities();
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data); 
                $this->load->view('template/showDetails_template.php',$data);
            }
            else{
                redirect('Home');
            }
        }
    }
        

    public function show_Book_Template(){
        if( ! $this->session->userdata('authenticated')){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/landingPage_template.php', $data);
        }  
        else{
            if($this->session->userdata('role') == 'User'){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/bookingcss.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $id=$this->input->get('id');
                $data['data'] = $this->Home_model->display_Facilities_By_Id($id);
                $data['users']=$this->Home_model->get_facillities();
                $this->load->view('pages/home.php', $data); 
                $this->load->view('template/bookFacility_template.php',$data);
            }
            else{
                redirect('showLogin');
            }
            
        }
    }

    public function book_Facility(){

        $this->form_validation->set_rules('startDate','Tanggal Mulai','callback_validate_start_date');
        $this->form_validation->set_rules('endDate','Tanggal Mulai','callback_validate_end_date');
		

        if($this->form_validation->run() == false){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/bookingcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $id=$this->input->post('ID_fasilitas');
            $data['data'] = $this->Home_model->display_Facilities_By_Id($id);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/bookFacility_template.php',$data);
        }
        else{
            $id = uniqid();
            $status = 'Waiting For Approval';
            $values = array(
                'ID_facility' => $this->input->post('ID_fasilitas',TRUE),
                'start_date' => $this->input->post('startDate',TRUE),
                'end_date' => $this->input->post('endDate',TRUE),
                'ID_requester' => $this->session->userdata('id'),
                'requester' => $this->session->userdata('nama'),
                'requestedFacility' => $this->input->post('facilityName'),
                'ID_waitingapproval' => $id,
                'status' => $status
            );
            $this->Home_model->bookFacility($values);
            redirect('Home'); 
        }
    }

    public function validate_start_date(){
        $id = $this->input->post('ID_fasilitas');
        $startdate = $this->input->post('startDate');
        $checkdate = $this->Home_model->check_start_date($startdate, $id);
        if(empty($checkdate)){
            $check = TRUE;
        }
        else{
            $this->form_validation->set_message('validate_start_date', 'The Facility is already reserved for that date');
            $check = FALSE;
        }
        return $check;
    }

    public function validate_end_date(){
        $id = $this->input->post('ID_fasilitas');
        $enddate = $this->input->post('endDate');
        $checkdate = $this->Home_model->check_end_date($enddate, $id);
        if(empty($checkdate)){
            $check = TRUE;
        }
        else{
            $this->form_validation->set_message('validate_end_date', 'The Facility is already reserved for that date');
            $check = FALSE;
        }
        return $check;
    }

    public function show_request_Listing(){
        if( ! $this->session->userdata('authenticated')){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/landingPage_template.php', $data);
        }
        else{
            if($this->session->userdata('role') == 'User'){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $data['data'] = $this->Home_model->display_request_listing();
                $data['users']=$this->Home_model->get_facillities();
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data);
                $this->load->view('template/requestListing_template.php',$data);
            }
            else{
                redirect('Home'); 
            }
        }
    }

    public function doLogin(){
     
                $email = $this->input->post('email'); 
                $hash = $this->input->post('password');
                $password = md5($hash);
                $user = $this->Home_model->get_email($email);
                if(empty($user)){
                    $this->session->set_flashdata('message', 'Username atau Password salah');
                    redirect('Home/showLogin');  
                }
                else if ($email == $user->email_User && $password == $user->password_User && $user->role_User == 'Admin'){
                    $session = array(
                        'authenticated'=>true,  
                        'nama'=>$user->nama_User,
                        'id'=>$user->id_User,
                        'email'=>$user->email_User,
                        'role' => $user->role_User
                    );
                    $this->session->set_userdata($session);
                    redirect('Home');
                }
                else if ($email == $user->email_User && $password == $user->password_User && $user->role_User == 'Management'){
                    $session = array(
                        'authenticated'=>true,  
                        'nama'=>$user->nama_User,
                        'id'=>$user->id_User,
                        'email'=>$user->email_User,
                        'role' => $user->role_User
                    );
                    $this->session->set_userdata($session); 
                    redirect('Home');
                }
                else if ($email == $user->email_User && $password == $user->password_User && $user->role_User == 'User'){
                    $session = array(
                        'authenticated'=>true,  
                        'nama'=>$user->nama_User,
                        'id'=>$user->id_User,
                        'email'=>$user->email_User,
                        'role' => $user->role_User
                    );
                    $this->session->set_userdata($session); 
                    redirect('Home');
                }
     
    }

public function logout(){
    $this->session->sess_destroy(); 
    redirect('Home'); 
}

public function doRegister(){
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('name','Name','required');
    $captcha= trim($this->input->post('g-recaptcha-response'));

    if($captcha != ''){
        $keySecret = '6Le9MnEdAAAAAMPBehxTb314XW79-IpvT-OMczSd';

        $check = array(
            'secret' => $keySecret,
            'response' => $this->input->post('g-recaptcha-response')
        );

        $startProcess = curl_init();

        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($startProcess, CURLOPT_POST, true);

        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($startProcess,CURLOPT_RETURNTRANSFER, true);
        $recieveData = curl_exec($startProcess);

        $finaleResponse = json_decode($recieveData, true);

        if($finaleResponse['success']){
		
            if($this->form_validation->run() == false){
                $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
                $data['css'] = $this->load->view('include/cssregister.php', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
                $this->load->view('pages/home.php', $data);
                $this->load->view('template/header.php', $data);
                $this->load->view('template/register_template.php',$data);
            }
            else{
                $id = uniqid();
                $role = 'User';
                $values = array(
                    'id_User' => $id,
                    'nama_User' => $this->input->post('name',TRUE),
                    'email_User' => $this->input->post('email',TRUE),
                    'password_User' => md5($this->input->post('password',TRUE)),
                    'role_User' => $role,
                );
                $this->Home_model->insertData($values);
                redirect('Home');
                }
            }else{
                $this->session->set_flashdata('message','Verifikasi Gagal!');
                redirect('Home/ShowRegister');
            }
    }else{
        $this->session->set_flashdata('message','Mohon Melakukan Verifikasi reCAPTCHA');
        redirect('Home/ShowRegister');
    }
}

    
    public function show_add_users(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else{
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data); 
            //$this->load->view('template/header.php', $data);
            $this->load->view('template/addUsers_template.php',$data);
        }
    }

    public function add_users(){
        $this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('name','Name','required');
		

        if($this->form_validation->run() == false){
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            //$this->load->view('template/header.php', $data);
            $this->load->view('template/addUsers_template.php',$data);
        }
        else{
            $id = uniqid();
            $role = 'User';
            $values = array(
                'id_User' => $id,
                'nama_User' => $this->input->post('name',TRUE),
                'email_User' => $this->input->post('email',TRUE),
                'password_User' => md5($this->input->post('password',TRUE)),
                'role_User' => $role,
            );
            $this->Home_model->insertData($values);
            redirect('Home');
        }
    }

    public function show_update_users(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Admin'){
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $id=$this->input->get('id');
            $data['data'] = $this->Home_model->displayUsersById($id);
            $this->load->view('pages/home.php', $data); 
            $this->load->view('template/updateUsers_template.php',$data);
        }
    }

    public function do_update_users(){
        $this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('role','Role','required');
        $this->form_validation->set_rules('name','Name','required');

        if($this->form_validation->run() == false){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $id=$this->input->post('id_User');
            $data['data'] = $this->Home_model->displayUsersById($id);
            $this->load->view('pages/home.php', $data); 
            $this->load->view('template/updateUsers_template.php',$data);
        }
        else{
            $id = $this->input->post('id_User');
            $values = array(
                'email_User' => $this->input->post('email',TRUE),
                'nama_User' => $this->input->post('name',TRUE),
                'role_User' => $this->input->post('role',TRUE),
            );
            $this->db->where('id_User', $id);
            $this->db->update('user', $values);
            redirect('Home');
        }
    }

    public function delete_users(){
        $id=$this->input->get('id');
        $where = array('id_User' => $id);
        $this->Home_model->hapus_data($where,'user');
        redirect('Home');
    }

    public function show_facility_listings(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Management'){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $data['data']=$this->Home_model->get_facillities();
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/facilityListings_template.php',$data);
        }
        else{
            redirect('Home');
        }
    }

    public function show_Admin_Request_Listings(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Admin'){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $data['data']=$this->Home_model->get_request_listing();
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/adminRequestListings_template.php',$data);
        }
        else{
            redirect('Home');
        }
    }

    public function delete_Request(){
        $id=$this->input->get('id');
        $where = array('ID_waitingApproval' => $id);
        $this->Home_model->hapus_data($where,'waitingapproval');
        redirect('Home/show_Admin_Request_Listings');
    }

    public function show_add_facility_template(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Management'){
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/addFacility_template.php',$data);
        }
        else{
            redirect('Home');
        }
    }

    public function show_update_facility_template(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Management'){
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $id=$this->input->get('id');
            $data['data'] = $this->Home_model->display_Facilities_By_Id($id);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/updateFacility_template.php',$data);
        }
    }

    public function do_update_facility(){

        $this->form_validation->set_rules('name','Facility Name','required');
		$this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('FileUpload', 'File Upload', 'callback_validate_update');

        if($this->form_validation->run() == false){
            $data['js'] = $this->load->view('include/formjs.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/formcss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $id=$this->input->post('id_Facility');
            $data['data'] = $this->Home_model->display_Facilities_By_Id($id);
            $this->load->view('pages/home.php',$data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/updateFacility_template.php',$data);
        }
        else{
            $id = $this->input->post('id_Facility');

            $config['upload_path']          = './assets/poster/';
            $config['allowed_types']        = 'gif|jpg|png|PNG';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('FileUpload')){
                $values = array(
                    'NAMA_Fasilitas' => $this->input->post('name',TRUE),
                    'description' => $this->input->post('description',TRUE),
                );
                $this->db->where('ID_Fasilitas', $id);
                $this->db->update('fasilitas', $values);
                redirect('Home/show_facility_listings');
            }
            else{
                $poster = $this->upload->data();
                $poster = $poster['file_name'];
                $values = array(
                    'NAMA_Fasilitas' => $this->input->post('name',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'URL_Gambar' => $poster,
                );
                $this->db->where('ID_Fasilitas', $id);
                $this->db->update('fasilitas', $values);
                redirect('Home/show_facility_listings');
            }
        }
    }

    public function delete_Facility(){
        $id=$this->input->get('id');
        $where = array('ID_Fasilitas' => $id);
        $this->Home_model->hapus_data($where,'fasilitas');
        redirect('Home/show_Facility_Listings');
    }

    public function validate_update(){
        $check = TRUE;
        if (isset($_FILES['FileUpload']) && $_FILES['FileUpload']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["FileUpload"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['FileUpload']['tmp_name']);
            $type = $_FILES['FileUpload']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_update', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['FileUpload']['tmp_name']) > 4097152) {
                $this->form_validation->set_message('validate_update', 'The Image file size shoud not exceed 4MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_update', "Invalid file extension {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function add_facility(){
        $this->form_validation->set_rules('name','Facility Name','required');
		$this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('FileUpload', 'File Upload', 'callback_validate_image');

        if($this->form_validation->run() == false){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/addFacility_template.php',$data);
        }
        else{
                $config['upload_path']          = './assets/poster/';
                $config['allowed_types']        = 'gif|jpg|png|PNG';
                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('FileUpload')){
                    echo "Gagal Tambah";
                }

                else{
                    $poster = $this->upload->data();
                    $poster = $poster['file_name'];
                    $id = uniqid();
                    $values = array(
                        'ID_Fasilitas' => $id,
                        'NAMA_Fasilitas' => $this->input->post('name',TRUE),
                        'description' => $this->input->post('description',TRUE),
                        'URL_Gambar' => $poster,
                    );
                    $this->Home_model->insertFacility($values);
                    redirect('Home/show_facility_listings');
                }
            
        }
    }

    public function validate_image(){
        $check = TRUE;
        if ((!isset($_FILES['FileUpload'])) || $_FILES['FileUpload']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} field is required');
            $check = FALSE;
        } 
        else if (isset($_FILES['FileUpload']) && $_FILES['FileUpload']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["FileUpload"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['FileUpload']['tmp_name']);
            $type = $_FILES['FileUpload']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['FileUpload']['tmp_name']) > 4097152) {
                $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 4MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Invalid file extension {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function show_management_request_template(){
        if( ! $this->session->userdata('authenticated')){
            redirect('Home');
        }
        else if($this->session->userdata('role') == 'Management'){
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/tablecss.php', NULL, TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $data['data']=$this->Home_model->get_management_request_listing();
            $this->load->view('pages/home.php', $data);
            $this->load->view('template/header.php', $data);
            $this->load->view('template/management_Request_Listing.php',$data);
        }
    }

    public function approve_Request(){
        $id = $this->input->get('id');
        $request = $this->Home_model->get_request_by_id($id);
        $status = 'Accepted';
        $values = array(
            'ID_facility' => $request->ID_Facility,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'ID_requester' => $request->ID_requester,
            'requester' => $request->requester,
            'requestedFacility' => $request->requestedFacility,
            'ID_waitingapproval' => $request->ID_waitingApproval,
            'status' => $status
        );
        $this->Home_model->request_approved($values);
        $this->db->where('ID_waitingapproval', $id);
        $this->db->update('waitingapproval', $values);

        $where = array('ID_waitingapproval' => $id);
        $this->Home_model->hapus_data($where,'waitingapprovaltemporary');
        redirect('Home/show_management_request_template');

    }

    public function reject_Request(){
        $id = $this->input->get('id');
        $request = $this->Home_model->get_request_by_id($id);
        $status = 'Rejected';
        $values = array(
            'ID_Facility' => $request->ID_Facility,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'ID_requester' => $request->ID_requester,
            'requester' => $request->requester,
            'requestedFacility' => $request->requestedFacility,
            'ID_waitingapproval' => $request->ID_waitingApproval,
            'status' => $status
        );
        $this->Home_model->request_rejected($values);
        $this->db->where('ID_waitingapproval', $id);
        $this->db->update('waitingapproval', $values);

        $where = array('ID_waitingapproval' => $id);
        $this->Home_model->hapus_data($where,'waitingapprovaltemporary');
        redirect('Home/show_management_request_template');
    }
}

    