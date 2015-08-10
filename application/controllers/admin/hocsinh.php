<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hocsinh extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library('form_validation');
        $this->load->model("Hocsinh_model");
        $this->load->library('javascript');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {

        // $data['base']=$this->config->item('base_url');
        // $data['title']= 'Message form';
        
        // $total=$this->Hocsinh_model->message_count();
        // $per_pg=3;
        // $offset=$this->uri->segment(4);
        // // echo $offset;exit;
                
        // $this->load->library('pagination');
        // $config['base_url'] = $data['base'].'admin/hocsinh/index/';
        // $config['total_rows'] = $total;
        // $config['per_page'] = $per_pg;
        // $config['full_tag_open'] = '<div id="pagination">';
        // $config['full_tag_close'] = '</div>';
            
        // $this->pagination->initialize($config);
             
        // $data['pagination']=$this->pagination->create_links();
        
        // $data['query']=$this->Hocsinh_model->get_all($per_pg,$offset);
        
        // $this->load->view('admin/vwManageHocSinh',$data);
        // $arr['page'] = 'hocsinh';
        
        // $qry ='SELECT `hs_id`,`hs_matn`,`hs_tenthanh`,`hs_first_name`,`hs_last_name` FROM gl_hocsinh'; // select data from db
        // $arr['hocsinh'] = $this->db->query($qry)->result_array();
        // $this->load->view('admin/vwManageHocSinh',$arr);

        $config['base_url']   = base_url(). "admin/hocsinh/index/";
        $config['total_rows'] = $this->Hocsinh_model->count_all();
        $config['per_page']   = 5;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        
        $offset = ($this->uri->segment(4)=='') ? 0 : $this->uri->segment(4);
        $this->load->library("pagination",$config);
        $data['pagination'] = $this->pagination->create_links();
        $data['info'] = $this->Hocsinh_model->listall($config['per_page'],$offset);

        $this->load->view("admin/vwManageHocSinh",$data);    
    }

    public function edit_hocsinh($id='') {
        $arr['page'] = 'hocsinh';
        if($id!=''){

            //get student information
            $qry ='SELECT * FROM gl_hocsinh where hs_id='.$id ; // select data from db
            $arr['hocsinh'] = $this->db->query($qry)->result_array();

            //get list team
            $qry_team ='SELECT `doi_id`, `doi_name` FROM gl_doi' ; // select data from db
            $arr['doi'] = $this->db->query($qry_team)->result_array();
            // var_dump($arr['doi']);exit;

            //get list school
            $qry_school ='SELECT `lop_id`, `lop_hocsinh_id`, `lop_name` FROM gl_lophoc' ; // select data from db
            $arr['lop'] = $this->db->query($qry_school)->result_array();

            //get relationship school student
            $qry_rl ='SELECT `tranfer_id`, `hs_id`, `lop_id` FROM gl_lophoc_hocsinh WHERE hs_id ='.$id ; // select data from db
            $arr['rl'] = $this->db->query($qry_rl)->result_array();

            $this->load->view('admin/vwEditHocSinh',$arr);
        }else{

            //get list team
            $qry_team ='SELECT `doi_id`, `doi_name` FROM gl_doi' ; // select data from db
            $arr['doi'] = $this->db->query($qry_team)->result_array();
            // var_dump($arr['doi']);exit;

            //get list school
            $qry_school ='SELECT `lop_id`, `lop_hocsinh_id`, `lop_name` FROM gl_lophoc' ; // select data from db
            $arr['lop'] = $this->db->query($qry_school)->result_array();

            $this->load->view('admin/vwEditHocSinh',$arr);
            // redirect('admin/hocsinh');
        }
    }
   
    
    public function update_hocsinh() {

        //get post value;
        $new_id = $_POST['hs_id'];
        $new_maTN = $_POST['hs_matn'];
        $new_tenthanh = $_POST['hs_tenthanh'];
        $new_last_name = $_POST['hs_last_name'];
        $new_first_name = $_POST['hs_first_name'];
        $new_birthday = $_POST['hs_birthday'];
        $new_hoten_cha = $_POST['hs_hoten_cha'];
        $new_phone_cha = $_POST['hs_phone_cha'];

        $new_hoten_me = $_POST['hs_hoten_me'];
        $new_phone_me = $_POST['hs_phone_me'];
        $new_ngay_rt = $_POST['hs_ngay_rt'];
        $new_noi_rt = $_POST['hs_noi_rt'];

        $new_linhmuc_rt = $_POST['hs_linhmuc_rt'];
        $new_nguoidodau_rt = $_POST['hs_nguoidodau_rt'];
        $new_ngay_rl = $_POST['hs_ngay_rl'];

        $new_noi_rl = $_POST['hs_noi_rl'];
        $new_ngay_ts = $_POST['hs_ngay_ts'];
        $new_noi_ts = $_POST['hs_noi_ts'];
        $new_linhmuc_ts = $_POST['hs_linhmuc_ts'];
        $new_nguoidodau_ts = $_POST['hs_nguoidodau_ts'];
        $new_doi_id = $_POST['doi_id'];
        $new_lop_id = $_POST['lop_id'];

        $now_date = date('Y-m-d h:i:s');

        //Update 
        if(isset($new_id) && !empty($new_id)){

            if(isset($new_lop_id) && !empty($new_lop_id)){

                //save tranfer class student history
                $qry_rela ='SELECT `tranfer_id`,`hs_id`,`lop_id`,`tranfer_date`,`tranfer_status` FROM gl_lophoc_hocsinh where hs_id='.$new_id;
                $relay_lop_hs = $this->db->query($qry_rela)->result_array();

                //history update
                $history_update = "";
                foreach ($relay_lop_hs as $key => $value) {
                    //convert array to string with format
                    array_walk($value, create_function('&$i,$k','$i=" \"$k\"=>\"$i\"";'));
                    $history_update = "Array(".implode(",",$value).");";
                }

                //get history old
                $history_old = "";
                $qry_his ='SELECT `tranfer_history` FROM gl_lophoc_hocsinh where hs_id='.$new_id;
                $relay_his = $this->db->query($qry_his)->row();

                foreach ($relay_his as $key_old => $value_old) {
                    $history_old = $value_old;
                }
                $history_final = $history_old.$history_update;
            }

            //update class, student relationship
            $sql_class = "UPDATE gl_lophoc_hocsinh SET `lop_id`='".$new_lop_id."',`tranfer_history`='".$history_final."',`tranfer_date`='".$now_date."' where hs_id=".$new_id;

            $val_class = $this->db->query($sql_class);

            //update student
            $sql = "UPDATE gl_hocsinh SET `hs_matn`='".$new_maTN."', `hs_tenthanh`='".$new_tenthanh."', `hs_last_name`='".$new_last_name."', `hs_first_name`='".$new_first_name."', `hs_birthday`='".$new_birthday."', `hs_hoten_cha`='".$new_hoten_cha."', `hs_phone_cha`='".$new_phone_cha."', `hs_hoten_me`='".$new_hoten_me."', `hs_phone_me`='".$new_phone_me."', `hs_phone_me`='".$new_phone_me."', `hs_ngay_rt`='".$new_ngay_rt."', `hs_noi_rt`='".$new_noi_rt."', `hs_linhmuc_rt`='".$new_linhmuc_rt."', `hs_nguoidodau_rt`='".$new_nguoidodau_rt."', `hs_ngay_rl`='".$new_ngay_rl."', `hs_noi_rl`='".$new_noi_rl."', `hs_ngay_ts`='".$new_ngay_ts."', `hs_noi_ts`='".$new_noi_ts."', `hs_linhmuc_ts`='".$new_linhmuc_ts."', `hs_nguoidodau_ts`='".$new_nguoidodau_ts."', `doi_id`='".$new_doi_id."' where hs_id=".$new_id;

            $val = $this->db->query($sql);
            redirect('admin/hocsinh/edit_hocsinh/'.$new_id);
        }else{
            //insert student
            $sql_stu = "INSERT INTO `gl_hocsinh` VALUES (NULL, '".$new_maTN."', '".$new_tenthanh."', '".$new_first_name."', '".$new_last_name."', '".$new_birthday."', '".$new_hoten_cha."', '".$new_hoten_me."', '".$new_phone_cha."', '".$new_phone_me."', '', '".$new_doi_id."', '".$new_ngay_rt."', '".$new_noi_rt."', '".$new_linhmuc_rt."', '".$new_nguoidodau_rt."', '".$new_ngay_rl."', '".$new_noi_rl."', '".$new_ngay_ts."', '".$new_noi_ts."', '".$new_linhmuc_ts."', '".$new_nguoidodau_ts."', b'0')";
            $val_stu = $this->db->query($sql_stu);

            //get student new
            $stu_new = "";
            $qry_stu_new ='SELECT MAX(`hs_id`) AS `hs_id` FROM gl_hocsinh LIMIT 1';
            $relay_stu_new = $this->db->query($qry_stu_new)->row();

            foreach ($relay_stu_new as $key_stu_new => $value_stu_new) {
                $stu_new = $value_stu_new;
            }

            //insert relationship
            $sql_rel = "INSERT INTO `gl_lophoc_hocsinh` VALUES (NULL, '".$stu_new."', '".$new_lop_id."', '".$now_date."', NULL, b'0')";
            $val_rel = $this->db->query($sql_rel);

            //get tranfer_id new
            $relay_tranfer_new = "";
            $qry_tranfer_new ='SELECT `tranfer_id` FROM gl_lophoc_hocsinh where hs_id='.$stu_new;
            $relay_tranfer_new = $this->db->query($qry_tranfer_new)->row();

            foreach ($relay_tranfer_new as $key_tranfer_new => $value_tranfer_new) {
                $relay_tranfer_new = $value_tranfer_new;
            }

            //update student relaytionship
            $sql_relaytionship = "UPDATE gl_hocsinh SET `lop_hocsinh_id`='".$relay_tranfer_new."' where hs_id=".$stu_new;

            $val_relaytionship = $this->db->query($sql_relaytionship);
            redirect('admin/hocsinh');

        }

        // $arr['page'] = 'hocsinh';
        // $this->load->view('admin/vwEditHocSinh',$arr);
    }
    

}