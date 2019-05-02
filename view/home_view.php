<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">
<!--    --><?php //include_once 'include/css-link.php' ?>
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_BASE_PATH; ?>public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date('<?php echo $_SESSION['time']; ?>').getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = "<b style='font-size: 42px'>"+ days + "</b> days <b style='font-size: 42px'>" + hours + "</b> hrs <b style='font-size: 42px'>"
                + minutes + "</b> mins <b style='font-size: 42px'>" + seconds + "</b> secs Remaining ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Election Started";
            }
        }, 1000);
    </script>


</head>
<div>

<div class="navbar">
    <a href="<?php echo BASE_PATH;?>home">Registration</a>
    <a href='<?php echo BASE_PATH;?>nominate'>Nominate</a>
    <a href='<?php echo ADMIN_BASE_PATH;?>'>Admin</a>
</div>

<div class="main">
    <h2 class="header">Online Student Voting System</h2>
    <p id="demo" style="float: right;font-size:large;margin-right: 100px;margin-top: -35px;color: mediumvioletred;"></p>

<div class="col-100">
     <div class="col-50">
         <h3 class="">Registration</h3>
        <div class="container">

        <form id="reg">

            <div class="row">
                <div class="col-25">
                    <label for="fname">Register No</label>
                </div>
                <div class="col-75">
                    <input type="text" id="reg_no" name="reg_no" placeholder="Register No.."required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Name" name="name" placeholder="Your name.."required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Department No</label>
                </div>
                <div class="col-75">
                    <input type="text" id="dept_no" name="dept_no" placeholder="Department No"required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Department</label>
                </div>
                <div class="col-75">
                    <input type="text" id="dept_name" name="dept_name" placeholder="Department Name"required>
                </div>
             </div>
             <div class="row">
                <div class="col-25">
                    <label for="lname">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email"required>
                </div>
                </div>
               <div class="row">
                <div class="col-25">
                    <label for="lname">Password</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password" placeholder="Password"required>

                </div>

                </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">phone</label>
                </div>
                <div class="col-75">
                    <input type="text" id="password" name="phone" placeholder="phone"required>

                </div>

            </div>
                <input type="submit" value="Register">
            <marquee class="message" style="color:green;"></marquee >
        </div>
                </form>
     </div>

        <div class="col-10">
        </div>
                <div class="col-40">
                    <h3 class="">Login</h3>
       <form id="login" style="    margin-top: 99px; ">
        <div class="imgcontainer" style="margin-top: -82px;">
        </div>
        <div class="container" style="padding-top: 0px;">
            <label><b>Register No</b></label>
            <input type="text" placeholder="Register No" name="reg_no" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me

            <p class="logmsg" style="color:Red;"></p >
        </div>

       </form>
      </div>
     </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
//    $(document).ready(function() {
        $('#reg').submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:'home/reg',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
//
//                       alert(data);
                    $('.message').html(data);
//                    $('#reg')[0].reset();

                }
            });
        });
//    });
</script>

<script>
    //    $(document).ready(function() {
    $('#login').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url:'home/login',
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
