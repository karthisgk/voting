<?php
//var_dump($this->cat_list);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>video List</title>
    <?php include_once 'include/css-link.php' ?>

    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

<div id="wrapper" style="background-image: url(../public/images/bk/img27.jpg); background-size: cover;">

    <!-- Navigation -->
    <?php include_once 'include/menu.php' ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header" style="color: #fff;">Patient List<img id="admin_loading" src="<?php echo BASE_PATH.'public/images/liveload.gif'?>" style="width:20px;margin-left: 21%;display:none;">

                </h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        List Of Patient's
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Patient Name</th>
                                    <th> Age</th>
                                    <th>Gender File</th>
                                    <th>Gendral Imformation</th>
                                    <th>Disease</th>
                                    <th>History</th>
                                    <th>Condition</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=0;
                                foreach ($this->join_list as $key)
                                {
                                    $i++;
                                    ?>
                                    <tr class="gradeA remove<?php echo $key['v_id']; ?>">

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $key['p_name']; ?></td>
                                        <td><?php echo $key['p_age']; ?></td>
                                        <td><?php echo $key['p_gender'];?></td>
                                        <td><?php echo $key['p_des'];?></td>
                                        <td><?php echo $key['p_disease'];?></td>
                                        <td><?php echo $key['p_history'];?></td>
                                        <td><?php echo $key['p_condition'];?></td>
                                        <td class="center">

<!--                                            <button class="btn btn-warning delete_category btn-rectangle" type="button" onclick='deletepatient(--><?php //echo $key['p_id']; ?>
                                        <button class="btn btn-warning delete_category" type="button" onclick='deletepatient(<?php echo $key['p_id']; ?>)'> Delete</button></td>
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


<!-- Metis Menu Plugin JavaScript -->
<?php include_once 'include/js-link.php' ?>

<!-- DataTables JavaScript -->
<script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script>


        function deletepatient($id) {
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
                    url: 'list_patient/delete',
                    type: 'POST',
                    data: {p_id: $id},
                    success: function (data) {
                        $(".remove" + $id).remove();
                        alert(data);
                    }
                });
                  location.reload();
            }
        }

</script>

</body>

</html>
