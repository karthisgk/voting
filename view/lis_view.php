<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>public/css/votting.css" rel="stylesheet">
<style>
    body{
        margin: 0;
        padding: 0;
    }

    .header-left ol{
        width: auto;
        float: left;
        display: block;
        background-color: #6899D3;
        margin: 0; //RESET DEFAULT
    padding: 0; // RESET DEFAULT
    }
</style>
    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo ADMIN_BASE_PATH; ?><!--public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">-->
</head>


    <div class="navbar">
        <a href="<?php echo BASE_PATH;?>list/ps_list">Nominate list and Result</a>

    </div>

    <div class="main">
        <h2 class="header">Online Student Voting System</h2>

        <div class="col-100">
            <div class="col-20"></div>
            <div class="col-60">

                <div class="container">
                    <h3 class="">Precedent</h3>
                    <div class="row">

                        <table>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominaite Id</th>
                                <th>Name</th>
                                <th>Count</th>


                            </tr>
                            </thead>
                            <?php
                            $i=0;
                            foreach($this->ps_list as $list)
                            {
                                $i++;
                                ?>

                                <tbody>
                                <tr>

                                    <td><?php echo $i;?></td>
                                    <td><?php echo ($list['n_id']);?></td>
                                    <td><?php echo ($list['n_name']);?></td>
                                    <td><?php echo ($list['total']);?></td>



                                </tr>

                                </tbody>
                                <?php
                            }
                            ?>
                        </table>

                        <marquee class="message" style="color: red"></marquee>
                    </div>

            </div>
                <div class="container">
                    <h3 class=""> Vice Precedent</h3>
                    <div class="row">

                        <table>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominaite Id</th>
                                <th>Name</th>
                                <th>Count</th>


                            </tr>
                            </thead>
                            <?php
                            $i=0;
                            foreach($this->vp_list as $list)
                            {
                                $i++;
                                ?>

                                <tbody>
                                <tr>

                                    <td><?php echo $i;?></td>
                                    <td><?php echo ($list['n_id']);?></td>
                                    <td><?php echo ($list['n_name']);?></td>
                                    <td><?php echo ($list['total']);?></td>



                                </tr>

                                </tbody>
                                <?php

                            }
                            ?>
                        </table>

                        <marquee class="message" style="color: red"></marquee>
                    </div>

                </div>

                <div class="container">
                    <h3 class="">Sports</h3>
                    <div class="row">

                        <table>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominaite Id</th>
                                <th>Name</th>
                                <th>Count</th>

                            </tr>
                            </thead>
                            <?php
                            $i=0;
                            foreach($this->sp_list as $list)
                            {
                                $i++;
                                ?>

                                <tbody>
                                <tr>

                                    <td><?php echo $i;?></td>
                                    <td><?php echo ($list['n_id']);?></td>
                                    <td><?php echo ($list['n_name']);?></td>
                                    <td><?php echo ($list['total']);?></td>



                                </tr>

                                </tbody>
                                <?php

                            }
                            ?>
                        </table>

                        <marquee class="message" style="color: red"></marquee>
                    </div>

                </div>

                <div class="container">
                    <h3 class="">aceademy</h3>
                    <div class="row">

                        <table>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominaite Id</th>
                                <th>Name</th>
                                <th>Count</th>



                            </tr>
                            </thead>
                            <?php
                            $i=0;
                            foreach($this->acc_list as $list)
                            {
                                $i++;
                                ?>

                                <tbody>
                                <tr>

                                    <td><?php echo $i;?></td>
                                    <td><?php echo ($list['n_id']);?></td>
                                    <td><?php echo ($list['n_name']);?></td>
                                    <td><?php echo ($list['total']);?></td>



                                </tr>

                                </tbody>
                                <?php

                            }
                            ?>
                        </table>

                        <marquee class="message" style="color: red"></marquee>
                    </div>

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
                $('#nominate')[0].reset();

            }
        });
    });
    //    });
</script>
</body>
</html>
