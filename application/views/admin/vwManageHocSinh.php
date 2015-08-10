<?php
$this->load->view('admin/vwHeader');
 // var_dump($query[0]);exit;
?>
<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->
<script type="text/javascript">
  $(document).ready( function() {

    $("#add_student").click(function(){
      window.location.href = "/admin/hocsinh/edit_hocsinh/";
    });

    // $("#jquery_link a").click(function(){
    //   alert("aaaaaaaaaaaa");
    //   var url = $(this).attr("href");
    //   $.ajax({
    //     type: "POST",
    //     url: url,
    //     data: "ajax",
    //     async: true,
    //     beforeSend: function(){
    //       $("#content").html("");
    //     },
    //     success: function(kq){
    //       $("#content").html(kq);
    //     }
    //   })
    //   return false;
    // });
  });
</script>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Học Sinh<small>Học Sinh Module</small></h1>
            <ol class="breadcrumb">
              <li><a href="hocsinh"><i class="icon-dashboard"></i> Học Sinh</a></li>
              <li class="active"><i class="icon-file-alt"></i> Học Sinh</li>        
              <button class="btn btn-primary" type="button" style="float:right;" id="add_student">Thêm học sinh mới</button>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">Tên Thánh <i class="fa fa-sort"></i></th>
                    <th class="header">Họ và Tên <i class="fa fa-sort"></i></th>
                    <th class="header">Operation <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      foreach($info as $val){
                        // echo($val->hs_tenthanh);
                    ?>
                  <tr>
                    <td><?php echo $val['hs_tenthanh'];?></td>
                    <td><?php echo $val['hs_last_name'].' '.$val['hs_first_name']; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>admin/hocsinh/edit_hocsinh/<?php echo $val['hs_id']; ?>" class="btn btn-primary btn-xs">Chỉnh Sửa</a>
                    </td>
                  </tr>
                    <?php
                            }
                    ?>
                </tbody>
              </table>
              <div id="jquery_link" align="center">
                <?php echo $pagination;?>
              </div>
            </div>
                   
        
      </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>