<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Request list</title>
    <?php include_once 'include/css-link.php' ?>
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
 </head>

<body>

    <div id="wrapper" style="background-image:url(public/images/1.jpg); background-size: cover;">

        <!-- Navigation -->
      <?php include_once 'include/menu.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <h1 class="page-header" style="color: #fff;">List<img id="admin_loading" src="<?php echo BASE_PATH.'public/images/liveload.gif'?>" style="margin-left: 21%;display:none;">
                    
                    </h1>
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                 
                <div class="col-lg-12 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" >
                            Request
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper ">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Patient Name</th>
                                            <th>Disease</th>
                                            <th>Requsest Docter Id</th>
                                            <th>State</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i=0;
                                       foreach($this->request_list as $cmd)
                                       {
                                           $i++;
                                       ?>
                                        <tr class="gradeA" id="commandlist_<?php echo $cmd['cmd_id'];?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $cmd['p_name'];?></td>
                                            <td><?php echo $cmd['p_disease'];?></td>
                                            <td><?php echo $cmd['d_mail'];?></td>
                                           <td><?php echo $cmd['state'];?></td>
                                            <td class="center">
                                            <button class="btn btn-primary view-category btn-circle" type="button" onclick='approved(<?php echo $cmd['r_id'];?>)'><i class="fa fa-check"></i> </button>
                                            <button class="btn btn-warning delete_category btn-circle" type="button" onclick='reject(<?php echo $cmd['r_id']; ?>)'><i class="fa fa-times"></i></button></td>
                                        </tr>
                                        <?php
                                       }
                                        ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
                <!--edit and View-->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- jQuery -->
    </div>
    <!-- Metis Menu Plugin JavaScript -->
  <?php include_once 'include/js-link.php' ?>

    <!-- DataTables JavaScript -->
    <script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>


        function approved($id) {
            var txt;
            var r = confirm("If You Want To Approved");
            if (r == true) {
                txt = 'Ok';
            }
            else {
                txt = 'Cancel';
            }
            if (txt == 'Ok') {
                $.ajax({
                    url: 'request_list/accept',
                    type: 'POST',
                    data: {r_id: $id},
                    success: function (data) {

                        alert(data);
                    }
                });
                location.reload();
            }
        }


        function reject($id) {
            var txt;
            var r = confirm("If You Want To reject");
            if (r == true) {
                txt = 'Ok';
            }
            else {
                txt = 'Cancel';
            }
            if (txt == 'Ok') {
                $.ajax({
                    url: 'request_list/rejected',
                    type: 'POST',
                    data: {r_id: $id},
                    success: function (data) {
//               $('#commandlist_'+$id).hide();
                        alert(data);

                    }
                });
                location.reload();
            }
        }

    </script>

</body>

</html>
