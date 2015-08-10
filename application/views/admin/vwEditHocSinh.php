<?php
$this->load->view('admin/vwHeader');
// var_dump($lop);exit;
?>
 
<script src="<?php echo HTTP_ASSETS_PATH_ADMIN; ?>tinymce/tinymce.min.js"></script>
<script>

    tinymce.init({selector: 'textarea',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false,
         

    height: "500",
    width:900
    });
</script>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Hoc Sinh <small>Edit Page</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/hocsinh/"><i class="icon-dashboard"></i> Hoc Sinh</a></li>
                <li class="active"><i class="icon-file-alt"></i> Edit Page</li>        


            </ol>
        </div>
    </div><!-- /.row -->


    <div class="fld">
        <form method="post" action="<?php echo base_url(); ?>admin/hocsinh/update_hocsinh">
        <table>
            <tr>
                <td>  
                    <input type="hidden" value="<?php echo isset($hocsinh[0]['hs_id']) && !empty($hocsinh[0]['hs_id']) ? $hocsinh[0]['hs_id'] : '';?>" name="hs_id" class="form_info"> 
                </td>
            </tr>
            <tr>
                <th>Mã Thiếu Nhi:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_matn']) && !empty($hocsinh[0]['hs_matn']) ? $hocsinh[0]['hs_matn'] : '';?>" name="hs_matn" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Tên Thánh:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_tenthanh']) && !empty($hocsinh[0]['hs_tenthanh']) ? $hocsinh[0]['hs_tenthanh'] : '';?>" name="hs_tenthanh" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Họ & Tên:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_last_name']) && !empty($hocsinh[0]['hs_last_name']) ? $hocsinh[0]['hs_last_name'] : '';?>" name="hs_last_name" class="form_info">
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_first_name']) && !empty($hocsinh[0]['hs_first_name']) ? $hocsinh[0]['hs_first_name'] : '';?>" name="hs_first_name" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Năm Sinh:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_birthday']) && !empty($hocsinh[0]['hs_birthday']) ? $hocsinh[0]['hs_birthday'] : '';?>" name="hs_birthday" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Họ & Tên Cha:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_hoten_cha']) && !empty($hocsinh[0]['hs_hoten_cha']) ? $hocsinh[0]['hs_hoten_cha'] : '';?>" name="hs_hoten_cha" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Điện Thoại Của Cha:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_phone_cha']) && !empty($hocsinh[0]['hs_phone_cha']) ? $hocsinh[0]['hs_phone_cha'] : '';?>" name="hs_phone_cha" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Họ & Tên Mẹ:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_hoten_me']) && !empty($hocsinh[0]['hs_hoten_me']) ? $hocsinh[0]['hs_hoten_me'] : '';?>" name="hs_hoten_me" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Điện Thoại Của Mẹ:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_phone_me']) && !empty($hocsinh[0]['hs_phone_me']) ? $hocsinh[0]['hs_phone_me'] : '';?>" name="hs_phone_me" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Ngày Rửa Tội:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_ngay_rt']) && !empty($hocsinh[0]['hs_ngay_rt']) ? $hocsinh[0]['hs_ngay_rt'] : '';?>" name="hs_ngay_rt" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Nơi Rửa Tội:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_phone_me']) && !empty($hocsinh[0]['hs_noi_rt']) ? $hocsinh[0]['hs_noi_rt'] : '';?>" name="hs_noi_rt" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Linh Mục Rửa Tội:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_linhmuc_rt']) && !empty($hocsinh[0]['hs_linhmuc_rt']) ? $hocsinh[0]['hs_linhmuc_rt'] : '';?>" name="hs_linhmuc_rt" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Người Đỡ Đầu Rửa Tội:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_nguoidodau_rt']) && !empty($hocsinh[0]['hs_nguoidodau_rt']) ? $hocsinh[0]['hs_nguoidodau_rt'] : '';?>" name="hs_nguoidodau_rt" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Ngày Rước Lễ:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_ngay_rl']) && !empty($hocsinh[0]['hs_ngay_rl']) ? $hocsinh[0]['hs_ngay_rl'] : '';?>" name="hs_ngay_rl" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Nơi Rước Lễ:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_noi_rl']) && !empty($hocsinh[0]['hs_noi_rl']) ? $hocsinh[0]['hs_noi_rl'] : '';?>" name="hs_noi_rl" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Ngày Thêm Sức:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_ngay_ts']) && !empty($hocsinh[0]['hs_ngay_ts']) ? $hocsinh[0]['hs_ngay_ts'] : '';?>" name="hs_ngay_ts" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Nơi Thêm Sức:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_noi_ts']) && !empty($hocsinh[0]['hs_noi_ts']) ? $hocsinh[0]['hs_noi_ts'] : '';?>" name="hs_noi_ts" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Linh Mục Thêm Sức:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_linhmuc_ts']) && !empty($hocsinh[0]['hs_linhmuc_ts']) ? $hocsinh[0]['hs_linhmuc_ts'] : '';?>" name="hs_linhmuc_ts" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Người Đỡ Đầu Thêm Sức:</th>
                <td>
                    <input type="text" value="<?php echo isset($hocsinh[0]['hs_nguoidodau_ts']) && !empty($hocsinh[0]['hs_nguoidodau_ts']) ? $hocsinh[0]['hs_nguoidodau_ts'] : '';?>" name="hs_nguoidodau_ts" class="form_info">
                </td>
            </tr>
            <tr>
                <th>Lớp:</th>
                <td>
                    <select name="lop_id" class="SL_doi">
                    <?php 
                        foreach ($lop as $key) {
                            if(isset($hocsinh[0])){
                            foreach ($rl as $key_rl) {
                    ?>
                        <option value="<?echo($key["lop_id"]);?>" <?php if ($key["lop_id"] == $key_rl['lop_id']) {echo "selected";}?> ><?echo($key["lop_name"]);?></option>
                    <?php
                            }
                            }else{
                    ?>
                        <option value="<?echo($key["lop_id"]);?>"><?echo($key["lop_name"]);?></option>
                    <?php
                            }
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Đội:</th>
                <td>
                    <select name="doi_id" class="SL_doi">
                    <?php
                        
                        foreach ($doi as $key) {
                            if(isset($hocsinh[0]['doi_id'])){
                    ?>
                        <option value="<?echo($key["doi_id"]);?>" <?php if ($key["doi_id"] == $hocsinh[0]['doi_id']) {echo "selected";}?> ><?echo($key["doi_name"]);?></option>
                    <?php
                            }
                        else{
                    ?>
                        <option value="<?echo($key["doi_id"]);?>"><?echo($key["doi_name"]);?></option>
                    <?php      
                            }
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <!-- <tr>
                <th>Content</th>
                <td><textarea name="tst_content"><?php echo isset($hocsinh[0]['content']) && !empty($hocsinh[0]['content']) ? $hocsinh[0]['content'] : ''; ?></textarea> 
                </td>
            </tr> -->
            <tr>
                <td><input type="submit" name="btn_submit" class="btn btn-primary" value="Submit"></td>
            </tr>
        </table>        
        </form>
    </div>      

</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>