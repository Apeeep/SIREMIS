	<div class="navbar">
				<div class="navbar-inner bg-primary">
					<div class="container-fluid">
						<a href="#" class="brand">
							<small>
								<i class="icon-plus-sign-alt"></i>
								SISTEM INFORMASI REKAM MEDIS KLINIK PRATAMA BP CILANDAK - JAKARTA SELATAN
							</small>
						</a><!--/.brand-->
						
						<ul class="nav ace-nav pull-right">
							
							<li style="background:#307ECC">
								<a data-toggle="dropdown" href="#" class="dropdown-toggle">
									<?php $foto = 'master_ref/user/img_user/'.$_SESSION['foto_user']; ?>
									<img class="nav-user-photo" src="<?php  echo $foto;?>" />
									<span class="user-info">
										<small>Welcome,</small>
										<?php echo $_SESSION['s_nama']?>
									</span>
	
									<i class="icon-caret-down"></i>
								</a>
	
								<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
									<li>								
										<a  href="javascript:void(0)" onclick="swapContent('master_ref/user/user')" > 
											<i class="icon-user"></i>
											Profile
										</a>
									</li>
								
									<li class="divider"></li>
	
									<li>
										<a href="logout.php">
											<i class="icon-off"></i>
											Logout
										</a>
									</li>
								</ul>
							</li>
						</ul><!--/.ace-nav-->
					</div><!--/.container-fluid-->
				</div><!--/.navbar-inner-->
			</div>