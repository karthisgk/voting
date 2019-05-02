
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin</title>

<?php include_once 'include/css-link.php'; ?>


</head>

<body>

    <div id="wrapper" style="background-image: url(../public/images/bk/img11.jpg); background-size: cover;">

<?php include_once 'include/menu.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color: #ec971f;">Add Doctor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="background-color: #0c535f;color: #feffff;"!important>
                            Add Doctor
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form role="form" id="add_Doctor">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Doctor Name</label>
                                            <input class="form-control" placeholder="Doctor Name" name="doctor_name" id="doctor_name" onblur="nameField(this.id)">
                                            <span class="error_span" id="err_doctor_name"></span>
                                            <p class="help-block">Example Cyril</p>
                                        </div>
                                          <div class="form-group">
                                              <label>Doctor Roll</label>
                                              <select name="roll" id="roll">
                                                  <option value="Trainee">Trainee</option>
                                                  <option value="Chif">Chief</option>
                                              </select>
                                              <span class="error_span" id="err_roll"></span>
<!--                                              <input type="text" value="" id="cat_icon" name="cat_icon">-->
                                          </div>
                                      </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>User ID</label>
                                              <input class="form-control" placeholder="Login_id"name="login_id" id="login_id" onblur="emptyField(this.id)">
                                              <span class="error_span" id="err_login_id"></span>
                                              <p class="help-block">Example cyril@gmail.com</p>
                                          </div>
                                          <label>password</label>
                                          <input class="form-control" placeholder="Doctor Name" name="password"id="password" onblur="emptyField(this.id)">
                                          <span class="error_span" id="err_password"></span>
                                          <p class="help-block">Example password</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit Button</button>
                                            <button type="reset" name="reset" class="btn btn-warning">Reset Button</button>
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

    <!-- jQuery -->
 <?php include_once 'include/js-link.php'; ?>
<script>
$(document).ready(function(){
   $('#add_Doctor').submit(function(event)
   {
      event.preventDefault();
      a=nameField('doctor_name');
      b=emptyField('roll');
      c=emptyField('login_id');
       d=emptyField('password');
      if(a==0||b==0||c==0||d==0)
      {
           $('.message').html('*Please Fill all mandatory fields.');
           return false;
      }


          else
          {
              $('.message').empty();
              $('.loading_img').css('display','inline');
              $.ajax({
                  url:'add_doctor/add_doctor',
                  type:'POST',
                  data:new FormData(this),
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data){
                      $('.loading_img').css('display','none');
                      $('.message').html(data);
                      $('#add_Doctor')[0].reset();
                  }
              });
          }

     
   }); 
});
</script>
<!--            <script>-->
<!--                function my_icon(id)-->
<!--                {-->
<!--                    var cat_icon=$('#cat_icon').val();-->
<!--                    if(cat_icon=='')-->
<!--                    {-->
<!--                        $('#span-'+id).show();-->
<!--                        $('#cat_icon').val(id);-->
<!--                    }-->
<!--                    else-->
<!--                    {-->
<!--                        $('#span-'+cat_icon).hide();-->
<!--                        $('#span-'+id).show();-->
<!--                        $('#cat_icon').val(id);-->
<!--                    }-->
<!--                </script>-->
</body>

</html>
