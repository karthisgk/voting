<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo BASE_PATH; ?>public/css/style1.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>public/css/votting.css" rel="stylesheet">
</head>
<style>

</style>

    <div class="navbar">

        <a href="<?php echo BASE_PATH; ?>home/logout">Logout</a>
    </div>

    <div class="main">
        <h2 class="header">Online Student Voting System</h2>

        <div class="col-100" id="box1">

            <div class="col-10 ">
            </div>

        <div class="col-40">

            <div class="row">

                        <h3> Precedent Vote</h3>
                        <table>
                            <?php
                            $i=0;
                            foreach($this->nominate_precedentlist as $list)
                            {
                            $i++;
                            ?>
                            <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Cantidate Name</th>
                                <th>Vote</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td><img src="<?php echo BASE_PATH.'upload/dp/'.$list['dp']; ?>" alt="Smiley face" height="42" width="42"></td>
                                <td><?php echo ($list['n_name']);?></td>
                            <td><button class="button" onclick="ps(<?php echo ($list['n_id']);?>)">Vote</button>
                                </td>
                            </tr>

                            </tbody>
                                <?php

                            }
                            ?>
                        </table>

                <marquee class="message" style="color: red"></marquee>
            </div>

            <div class="row">
                <h3>Vice Precedent Vote</h3>
                <table>
                    <?php
                    $i=0;
                    foreach($this->nominate_vice_precedentlist as $list)
                    {
                        $i++;
                        ?>
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Cantidate Name</th>
                            <th>Vote</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td><img src="<?php echo BASE_PATH.'upload/dp/'.$list['dp']; ?>" alt="Smiley face" height="42" width="42"></td>
                            <td><?php echo ($list['n_name']);?></td>
                            <td><button class="button" onclick="vps(<?php echo ($list['n_id']);?>)">Vote</button>
                            </td>
                        </tr>

                        </tbody>
                        <?php

                    }
                    ?>
                </table>

                <marquee class="vp" style="color: red"></marquee>
            </div>


        </div>
            <div class="colv-10 ">


            </div>

            <div class="col-40">
                <div class="row">
                <h3>Sports </h3>
                    <table>
                        <?php
                        $i=0;
                        foreach($this->sports as $list)
                        {
                            $i++;
                            ?>
                            <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Cantidate Name</th>
                                <th>Vote</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td><img src="<?php echo BASE_PATH.'upload/dp/'.$list['dp']; ?>" alt="Smiley face" height="42" width="42"></td>
                                <td><?php echo ($list['n_name']);?></td>
                                <td><button class="button" onclick="sports(<?php echo ($list['n_id']);?>)">Vote</button>
                                </td>
                            </tr>

                            </tbody>
                            <?php

                        }
                        ?>
                    </table>
                    <marquee class="sports" style="color: red"></marquee>
                </div>
                <div class="row">
                    <h3> Accedamy</h3>
                    <table>
                        <?php
                        $i=0;
                        foreach($this->nominate_Accedamylist as $list)
                        {
                            $i++;
                            ?>
                            <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Cantidate Name</th>
                                <th>Vote</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td><img src="<?php echo BASE_PATH.'upload/dp/'.$list['dp']; ?>" alt="Smiley face" height="42" width="42"></td>
                                <td><?php echo ($list['n_name']);?></td>
                                <td><button class="button" onclick="accadumy(<?php echo ($list['n_id']);?>)">Vote</button>
                                </td>
                            </tr>

                            </tbody>
                            <?php

                        }
                        ?>
                    </table>
                    <marquee class="acc" style="color: red"></marquee>
                </div>


            </div>
            <div class="col-10 ">


            </div>


        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function ps($id) {

        var txt;
        var r = confirm("If You Want To votted");
        if (r == true) {
            txt = 'Ok';
        }
        else {
            txt = 'Cancel';
        }
        if (txt == 'Ok')
            $.ajax({
                url: 'vote/ps',
                type: 'POST',
                data: {n_id: $id},
                success: function (data) {
                    $('.message').html(data);
                    alert(data);


                }
            });


    }
    </script>

    <script>
    function vps($id) {

        var txt;
        var r = confirm("If You Want To votted");
        if (r == true) {
            txt = 'Ok';
        }
        else {
            txt = 'Cancel';
        }
        if (txt == 'Ok') {
            $.ajax({
                url: 'vote/vps',
                type: 'POST',
                data: {n_id: $id},
                success: function (data) {

                    $('.vp').html(data);
                }
            });

        }
    }
</script>
<script>
    function sports($id) {

        var txt;
        var r = confirm("If You Want To votted");
        if (r == true) {
            txt = 'Ok';
        }
        else {
            txt = 'Cancel';
        }
        if (txt == 'Ok') {
            $.ajax({
                url: 'vote/sport',
                type: 'POST',
                data: {n_id: $id},
                success: function (data) {

                    $('.sports').html(data);
                }
            });

        }
    }
</script>
<script>
    function accadumy($id) {
        alert($id);
        var txt;
        var r = confirm("If You Want To votted");
        if (r == true) {
            txt = 'Ok';
        }
        else {
            txt = 'Cancel';
        }
        if (txt == 'Ok') {
            $.ajax({
                url: 'vote/accadumy',
                type: 'POST',
                data: {n_id: $id},
                success: function (data) {


                    $('.acc').html(data);
                }
            });

        }
    }
</script>
</body>
</html>
