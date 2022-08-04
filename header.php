        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=$serverURL;?>index.php">
                        <b>
                            <img src="<?=$serverURL;?>assets/images/logo.png" alt="homepage"
                                class="dark-logo light-logo" />
                        </b>
                        <span>
                            <img src="<?=$serverURL;?>assets/images/logo-text.png" class="dark-logo light-logo" alt="">
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">


						<?php if(!isset($_SESSION['Username'])){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Not logged in  <i class="ti-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                 <li><a href="#" data-toggle="modal" data-target="#login"><i class="ti-export"></i> Login</a></li></ul>
                            </div>
                        </li>
						<?php }else{ ?>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['Username'] ?> <i class="ti-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
									<li><a href="<?=$serverURL;?>profile.php?user=<?php echo $_SESSION['user_id'] ?>"><i class="ti-user"></i> My Profile</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=$serverURL;?>logout.php"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>
								</ul>
                            </div>
                        </li>
						<?php } ?>
                    </ul>
                </div>
            </nav>
        </header>