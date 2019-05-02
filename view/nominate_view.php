<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">

<!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
<!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">-->
</head>
<div>

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
                <h3 class="">Nominate Registration</h3>
                <div class="container">

                    <form id="nominate">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Register No</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="reg_no" name="reg_no" placeholder="Register No.." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Name</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="name" name="name" placeholder="Your name.." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Department No</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="dept_no" name="dept_no" placeholder="Department No" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Department</label>
                            </div>
                            <div class="col-75">
                                <input type="text"  required id="dept_name" name="dept_name" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Black Marks</label>
                            </div>
                            <div class="col-75">
                                <input type="radio" required name="mark" value="yes"> Yes<br>
                                <input type="radio" required name="mark" value="no"> No<br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Posting</label>
                            </div>
                            <div class="col-75">
                                <select class="select" name="posting" required>
                                    <option value="precedent">Ps</option>
                                    <option value="vice precedent">vp</option>
                                    <option value="Accedamy">accedamy</option>
                                    <option value="sports">sports</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select Profile</label>
                            </div>
                            <div class="col-75">
                                <input type="file" name="dp" id="dp" required>
                            </div>
                        </div>
                        <input type="submit" value="Submit">
                        <marquee style="color:green;" class="message"></marquee>
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
    $('#nominate').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url:'nominate/nominate',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
//
//                       alert(data);
                $('.message').html(data);
                    $('#nominate')[0].reset()

            }
        });
    });
    //    });
</script>
</body>
</html>
