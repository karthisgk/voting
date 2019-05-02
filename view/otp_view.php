<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">

    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">-->
</head>


<div class="navbar">

    <a href='<?php echo BASE_PATH;?>logins'>Admin</a>
</div>

<div class="main">
    <h2 class="header">Online Student Voting System</h2>

    <div class="col-100">
        <div class="col-20"></div>
        <div class="col-60">

                <form id="otp" style="    margin-top: 99px; ">
                    <div class="imgcontainer" style="margin-top: -82px;">
                    </div>
                    <div class="container" style="padding-top: 0px;">
                        <label><b>OTP</b></label>
                        <input type="text" placeholder="OTP" name="otp" required>
                        <button type="submit">VERIFIED</button>
                        <input type="checkbox" checked="checked"> Remember me

                        <p class="logmsg" style="color:Red;"></p >
                    </div>

                </form>
            </div>
            <div class="col-20"></div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    //    $(document).ready(function() {
    $('#otp').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url:'otp/otp',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
//

                $('.logmsg').html(data);


            }
        });
    });
    //    });
</script>
</body>
</html>
