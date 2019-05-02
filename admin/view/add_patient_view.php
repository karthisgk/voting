<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Video</title>
    <?php include_once 'include/css-link.php'; ?>
</head>

<body>

<div id="wrapper" style="background-image: url(../public/images/bk/img27.jpg); background-size: cover;">

    <?php include_once 'include/menu.php'; ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: #fff;">Add Patient</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Add Patient
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form" id="addpatient" enctype="multipart/form-data">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <input class="form-control" placeholder=" Name" name="name" id="name" onblur="nameField(this.id)">
                                            <span class="error_span" id="err_name"></span>
                                            <p class="help-block">Name</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Patient age</label>
                                            <input class="form-control" placeholder="age" name="age" id="age" onblur="emptyField(this.id)">
                                            <span class="error_span" id="err_age"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <input type="radio" name="gender" value="male" id="gender" onblur="emptyField(this.id)"/>Male
                                            <input type="radio" name="gender" value="female" id="gender" onblur="emptyField(this.id)"/>Female
                                            <span class="error_span" id="err_gender"></span>
                                            <p class="help-block">male or femal </p>
                                        </div>
                                        <div class="form-group">
                                            <label>General Imformation</label>
                                            <textarea class="form-control" rows="3" name="des" id="des" onblur="emptyField(this.id)"></textarea>
                                            <span  class="error_span" id="err_des"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label>Disease</label>
                                        <input class="form-control" placeholder=" Disease" name="disease" id="disease" onblur="emptyField(this.id)">
                                        <span class="error_span" id="err_disease"></span>
                                        <p class="help-block">disease Name </p>
                                        </div>
                                        <div class="form-group">
                                            <label>History</label>
                                            <input class="form-control" placeholder=" History" name="history" id="history" onblur="emptyField(this.id)">
                                            <span class="error_span" id="err_history"></span>
                                            <p class="help-block">history</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Patient Condition</label>
                                            <select name="condition" id="condition"onblur="emptyField(this.id)">
                                                <option value="emergency">Emergency</option>
                                                <option value="normal">Normal</option>
                                            </select>
                                            <span class="error_span" id="err_condition"></span>
                                            <p class="help-block">history</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit"  class="btn btn-success">Submit Button</button>
                                        <button type="reset" class="btn btn-info">Reset Button</button>
                                        <span class="message"></span>
                                        <img src="<?php echo BASE_PATH; ?>public/images/liveload.gif" class="loading_img">

                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
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
<?php include_once 'include/js-link.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('#addpatient').submit(function(event){
            event.preventDefault();
            a=nameField('name');
            b=emptyField('age');
            c=emptyField('gender');
            d=emptyField('des');
            e=emptyField('disease');
            f=emptyField('history');
            g=emptyField('condition');
            if(a==0||b==0||c==0||d==0|| e==0 ||f==0 ||g==0)
            {
                $('.message').html('*Please Fill all mandatory fields.');
                return false;
            }
            else
            {
                $('.message').empty();
                $('.loading_img').css('display','inline');
                $.ajax({
                    url:'add_patient/addpatient_form',
                    type:'POST',
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data)
                    {

                        $('.loading_img').css('display','none');
                        $('#addpatient')[0].reset();
                        $('.message').html(data);
                    }
                });
            }

        });
    });
</script>
</body>

</html>
