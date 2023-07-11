<?php
//session_start();
//require_once '../config/koneksi.php';
//require_once '../user/class.user.php';
?>

<!-- ==================================================================================================== -->
				<ul class="nav nav-list">
					<li>
						<a href="javascript:void(0)" onclick="swapContent('home')">
							<i class="icon-home"></i>
							<span class="menu-text"> Home </span>
						</a>
					</li>			
<!-- ==================================================================================================== -->
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-tasks"></i>
							<span class="menu-text"> Master </span>

							<b class="arrow icon-angle-down"></b>
						</a>
<!-- ==================================================================================================== -->
						<ul class="submenu">

							<li>
								<a href="javascript:void(0)" onclick="swapContent('master_ref/user/user')">
									<i class="icon-double-angle-right"></i>
									User
								</a>
							</li>
<!-- ==================================================================================================== -->
							
							<?php if ($_SESSION['s_level'] == 'Administrator' ) { ?>
<!-- ==================================================================================================== -->
							<li>
								<a href="javascript:void(0)" onclick="swapContent('master_ref/dokter/dokter')">
									<i class="icon-double-angle-right"></i>
									Dokter Pelaksana
								</a>
							</li>
<!-- ==================================================================================================== -->
							
<!-- ==================================================================================================== -->
							<li>
								<a href="javascript:void(0)" onclick="swapContent('master_ref/tindakan/tindakan')">
									<i class="icon-double-angle-right"></i>
									Tindakan
								</a>
							</li>

							<li>
								<a href="javascript:void(0)" onclick="swapContent('master_ref/tindakan_lab/tindakan_lab')">
									<i class="icon-double-angle-right"></i>
									Tindakan Lab
								</a>
							</li>

						
<!-- ==================================================================================================== -->	
							<li>
								<a href="javascript:void(0)" onclick="swapContent('master_ref/tipe_pasien/tipe_pasien')">
									<i class="icon-double-angle-right"></i>
									Tipe Pasien
								</a>
							</li>
							<?php } ?>
<!-- ==================================================================================================== -->
							
<!-- ==================================================================================================== 
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-tasks"></i>
									<span class="menu-text"> Referensi Wilayah </span>
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
									<li>
										<a href="javascript:void(0)" onclick="swapContent('master_ref/propinsi/propinsi')">
											<i class="icon-double-angle-right"></i>
											Propinsi
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="swapContent('master_ref/kabupaten/kabupaten')">
											<i class="icon-double-angle-right"></i>
											Kabupaten/Kota
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="swapContent('master_ref/kecamatan/kecamatan')">
											<i class="icon-double-angle-right"></i>
											Kecamatan
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="swapContent('master_ref/kelurahan/kelurahan')">
											<i class="icon-double-angle-right"></i>
											Kelurahan
										</a>
									</li>
								</ul>
							</li>
<!-- ==================================================================================================== -->					
						</ul>
					</li>
					<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Apotik'  ) { ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-beaker"></i>
							<span class="menu-text"> Apotik </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="javascript:void(0)" onclick="swapContent('apotik/apotik')">
									<i class="icon-double-angle-right"></i>
									Daftar Obat
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" onclick="swapContent('apotik/trans_apotik/trans_apotik')">
									<i class="icon-double-angle-right"></i>
									Transaksi
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Dokter' || $_SESSION['s_level'] == 'Laboratorium' || $_SESSION['s_level'] == 'Operator'  ) { ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-book"></i>
							<span class="menu-text"> Transaksi </span>
							<b class="arrow icon-angle-down"></b>
						</a>
<!-- ==================================================================================================== -->
						<ul class="submenu">
							<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Operator' ) { ?>
							<li>
								<a href="javascript:void(0)" onclick="swapContent('reg/reg')">
									<i class="icon-double-angle-right"></i>
									Registrasi
								</a>
							</li>
							<?php } ?>
							<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Dokter' ) { ?>
							<li>
								<a href="javascript:void(0)" onclick="swapContent('poli/poli')">
									<i class="icon-double-angle-right"></i>
									Poli
								</a>
							</li>
							<?php } ?>
							<?php if ($_SESSION['s_level'] == 'Laboratorium' || $_SESSION['s_level'] == 'Administrator' ) { ?>
							<li>
								<a href="javascript:void(0)" onclick="swapContent('lab/lab')">
									<i class="icon-double-angle-right"></i>
									Laboratorium
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>	
					<?php } ?>		
					<?php if ($_SESSION['s_level'] == 'Administrator') { ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-tags"></i>
							<span class="menu-text"> Kasir </span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="javascript:void(0)" onclick="swapContent('kasir/kasir')">
									<i class="icon-double-angle-right"></i>
									Pembayaran
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>	
<!-- ====================================================================================================			
					
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Laporan </span>
							<b class="arrow icon-angle-down"></b>
						</a>

						
<!-- ==================================================================================================== 
						
						<ul class="submenu">
							<li>
								<a href="javascript:void(0)" onclick="swapContent('')">
									<i class="icon-double-angle-right"></i>
									
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" onclick="swapContent('lap-pelkes/lap-pelkes')">
									<i class="icon-double-angle-right"></i>
									Pelayanan Kesehatan
								</a>
							</li>
						</ul>
					</li>
					
<!-- ==================================================================================================== -->					
					
<!-- ==================================================================================================== -->					
					<li>
						<a href="logout.php">
							<i class="icon-signout"></i>
							<span class="menu-text"> Logout </span>
						</a>
					</li>
				</ul><!--/.nav-list-->
<!-- ==================================================================================================== -->				