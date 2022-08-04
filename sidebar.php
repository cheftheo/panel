
<aside class="left-sidebar" style="overflow: visible;">
<div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;"><div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
<div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
<?php
		if(isset($_SESSION['Username'])){
		?>
		<div class="user-profile">
				<div class="profile-text">
					<h4 class="text-muted" style="line-height:18px;font-size:16px;">
                    <?php 
                        if($_SESSION['staff'] >= 1 and $_SESSION['staff'] < 8) {
                            echo $_SESSION['Username'] . " <i class='fa fa-legal' aria-hidden='true'></i>";
                        } elseif ($_SESSION['staff'] >= 8) {
                            echo $_SESSION['Username'] . " <i class='fa fa-code' aria-hidden='true'></i>";
                        } else { 
                            echo $_SESSION['Username'] . ' <i class="fa fa-user" aria-hidden="true"></i>';
                        }
                    ?>
                    </h4>
					<a href="<?=$serverURL;?>profile.php?user=<?php echo $_SESSION['user_id']?>; ?>" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-settings"></i></a>
					<a href="<?=$serverURL;?>logout.php" class="" data-toggle="tooltip" title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a>

					<div class="dropdown-menu animated flipInY" x-placement="bottom-start" style="position: absolute; transform: translate3d(76px, 54px, 0px); top: 0px; left: 0px; will-change: transform;">
						<!-- text-->
						<a href="<?=$serverURL;?>profile.php?user=<?php echo $_SESSION['user_id']?>; ?>" class="dropdown-item"><i class="ti-user"></i> My
							Profile</a>
						<!-- text-->
						<div class="dropdown-divider"></div>
						<!-- text-->
						<a href="<?=$serverURL;?>logout.php" class="dropdown-item"><i class="fa fa-power-off"></i>
							Logout</a>
						<!-- text-->
					</div>
				</div>
			</div>
		<?php } ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MAIN NAVIGATION</li>
                        <li> <a class="" href="<?=$serverURL;?>index.php" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <!--Jucatori Online-->
                        <li> <a class="" href="<?=$serverURL;?>online.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Jucatori online</span></a>
                        </li>
                        <!--Cauta un jucator-->
                        <li> <a class="" href="<?=$serverURL;?>search.php" aria-expanded="false"><i class="mdi mdi-magnify"></i><span class="hide-menu">Cauta un jucator</span></a>
                        </li>
                        <!--Staff-->
                        <li> <a class="" href="<?=$serverURL;?>staff.php" aria-expanded="false"><i class="mdi mdi-shield"></i><span class="hide-menu">Staff</span></a>
                        </li>
                        <!-- Factiuni -->
                        <li> <a class="" href="<?=$serverURL;?>factions.php" aria-expanded="false"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="hide-menu">Factiuni</span></a>
                        </li>
                        <!--Jucatori banati-->
                        <li> <a class="" href="<?=$serverURL;?>banlist.php" aria-expanded="false"><i class="mdi mdi-cloud-outline-off"></i><span class="hide-menu">Jucatori
                        banati</span></a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Statistici</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=$serverURL;?>top.php">Top jucatori</a></li>
                                <!-- <li><a href="<?=$serverURL;?>houses.php">Case</a></li>
                                <li><a href="<?=$serverURL;?>businesses.php">Afaceri</a></li> -->
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 425.878px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
</aside>