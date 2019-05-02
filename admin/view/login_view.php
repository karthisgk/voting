<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moviecrop|Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>


<body class="img-responsive" style="    background-image: url(../public/images/bk/img26.jpg); " >

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body" style="background-color: #35312b;">
                    <form role="form" method="Post" action="login/login_check">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="email" type="name" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block" style="background-color: #429ae2; border-color: black; color:black;" name="login" value="Login">Login</button>

                        </fieldset>
                    </form>
                </div>
            </div>

            <!-- reset password-->
            <!--                <div class="login-panel panel panel-warning" id="password_reset">-->
            <!--                    <div class="panel-heading" id="">-->
            <!--                        <h3 class="panel-title">Reset Your Password</h3>-->
            <!--                    </div>-->
            <!--                    <div class="panel-body" id="">-->
            <!--                        <form role="form" method="Post" action="login/reset_password">-->
            <!--                            <fieldset>-->
            <!--                                <div class="form-group">-->
            <!--                                    <input class="form-control" placeholder="Old password" name="oldpassword" type="text" autofocus>-->
            <!--                                </div>-->
            <!--                                <div class="form-group">-->
            <!--                                    <input class="form-control" placeholder=" New password" name="newpassword" type="text" value="">-->
            <!--                                </div>-->
            <!--                                <div class="form-group">-->
            <!--                                    <div class="col-lg-12">-->
            <!--                                        <button type="submit" class=" col-lg-4 btn btn-u-md btn-success pull-right" name="reset" value="reset">Reset</button>-->
            <!--                                        <p><a id="reset_login" class="login_link" href="#">Click to Login !</a></p>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </fieldset>-->
            <!--                        </form>-->
            <!--                    </div>-->
            <!--                </div>-->
        </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <?php
        if(isset($_GET['fail']))
        {
            ?>
            <label class=" pull-right alert alert-info "><center><strong>Login Failed ! </strong></center></label>
            <?php
        }
        ?>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo ADMIN_BASE_PATH; ?>public/dist/js/sb-admin-2.js"></script>
<script>
    $(document).ready(function ()
    {
        $('#login_check').show();
        $('#password_reset').hide();

        $('#login_reset').click(function ()
        {
            $('#login_check').hide();
            $('#password_reset').show();
        });

        $('#reset_login').click(function ()
        {
            $('#login_check').show();
            $('#password_reset').hide();
        });

    });

</script>

</body>

</html>
