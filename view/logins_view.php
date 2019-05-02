<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">

    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">-->
</head>


    <div class="navbar">
        <a href="<?php echo BASE_PATH;?>home">Registration</a>
        <a href='<?php echo BASE_PATH;?>nominate'>Nominate</a>
        <a href='<?php echo BASE_PATH;?>logins'>Admin</a>
    </div>

    <div class="main">
        <h2 class="header">Online Student Voting System</h2>

        <div class="col-100">
            <div class="col-20"></div>
            <div class="col-60">
                <h3 class="">Admin Login</h3>
                <div class="container">

                    <form id="login" style="    margin-top: 99px; ">
                        <div class="imgcontainer" style="margin-top: -82px;">
                        </div>
                        <div class="container" style="padding-top: 0px;">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="User Nmae" name="user" required>

                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>

                            <button type="submit">Login</button>
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
    $('#login').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url:'logins/login',
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
