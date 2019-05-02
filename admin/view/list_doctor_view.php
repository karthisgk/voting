<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Play Game| Category List</title>
    <?php include_once 'include/css-link.php' ?>
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
 </head>

<body>

    <div id="wrapper" style="background-image: url(../public/images/bk/img11.jpg); background-size: cover;">

        <!-- Navigation -->
      <?php include_once 'include/menu.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color: #ec971f;">Doctor List <img id="admin_loading" src="<?php echo BASE_PATH.'public/images/liveload.gif'?>" style="margin-left: 21%;display:none;">
                    
                    </h1>
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                 
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List Of Doctor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Doctor Name</th>
                                            <th> Doctor Roll</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//var_dump($this->record_list);        
                                         $i=0;                            
                                        foreach ($this->record_list as $key)
                                        {
                                            $i++;
                                        ?>
                                        <tr class="gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $key['doctor_name']; ?></td>
                                            <td><?php echo $key['roll']; ?></td>
                                            <td class="center">


                                            <button class="btn btn-warning delete_category" type="button" onclick='deletedoctor(<?php echo $key['doctor_id']; ?>)'>Delete</button></td>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<script>
    function deletedoctor($id) {
        var txt;
        var r = confirm("If You Want To Delete");
        if (r == true) {

            txt = 'Ok';
        }
        else {
            txt = 'Cancel';
        }
        if (txt == 'Ok') {
            $.ajax({
                url: 'list_Doctor/ deletesingle_doctor',
                type: 'POST',
                data: {doctor_id: $id},
                success: function (data) {
                    alert(data);
                }
            });
            location.reload();

        }
    }
</script>



</body>

</html>
