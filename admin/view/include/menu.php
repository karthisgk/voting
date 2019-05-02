 <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;     background: #e8e8e8; ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo ADMIN_BASE_PATH;?>home" style="color: #fff;">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="<?php echo ADMIN_BASE_PATH.'home?logout';?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="background-color: transparent;">
                <div class="sidebar-nav navbar-collapse">
                    <a  href="<?php echo ADMIN_BASE_PATH;?>home"><img src="../public/images/bk/logo.png" style="padding: 17px 0px 0px 18px;"></a>
                    <ul class="nav" id="side-menu">


                        <li>
                            <a href="<?php echo ADMIN_BASE_PATH;?>home"><i class="fa fa-dashboard" style="color:red"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="javascript::"><i class="fa fa-table fa-fw"></i>Doctor<span class="fa arrow"></span></a>
                            <ul class="nav ">
                                <li>
                                    <a href="<?php echo ADMIN_BASE_PATH;?>add_doctor">Add Doctor</a>
                                </li>
                                <li>
                                    <a href="<?php echo ADMIN_BASE_PATH;?>list_doctor">List Doctor</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="javascript::"><i class="fa fa-spinner fa-spin fa-fw"></i>Patient<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo ADMIN_BASE_PATH;?>add_patient">Add Patient Details</a>
                                </li>
                                <li>
                                    <a href="<?php echo ADMIN_BASE_PATH;?>list_patient">List Patient Details</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="javascript::"><i class="fa fa-thumbs-o-up fa-fw"></i>Request<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo ADMIN_BASE_PATH;?>request_list">Request List</a>
                                </li>
<!--                                <li>-->
<!--                                    <a href="--><?php //echo ADMIN_BASE_PATH;?><!--#">Dislike</a>-->
<!--                                </li>-->
<!--                            </ul>-->
                            <!-- /.nav-second-level -->
<!--                        </li>-->

<!--                         <li>-->
<!--                            <a href="--><?php //echo ADMIN_BASE_PATH;?><!--user_command"><i class="fa fa-edit fa-fw"></i>User command</a>-->
<!--                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>