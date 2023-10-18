<header id="navbar" class="py-2 border-bottom text-white">
	<div class="d-flex align-items-center mx-4 flex-wrap justify-content-center justify-content-lg-start" style="grid-template-columns: 1fr 2fr;">
		<div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center align-items-center gap-2 mb-md-0">
			<i class="fa-solid fa-notes-medical fs-5"></i>
			<h4 class="m-0 fw-bold text-center fw-md-thin">SISTEM INFORMASI REKAM MEDIS</h4>
		</div>
		<div class="d-flex align-items-center">
			<div class="d-flex align-items-center gap-2 flex-shrink-0 dropdown">
				<p class="m-0"><?php echo $_SESSION['s_nama'] ?></p>
				<a href="#" class="d-flex align-items-center gap-2 link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
					<?php $foto = 'master_ref/user/img_user/' . $_SESSION['foto_user']; ?>
					<img src="<?php echo $foto; ?>" alt="Profile" width="32" height="32" class="rounded-circle">
					<i class="fa-solid fa-caret-down text-white"></i>
				</a>
				<ul class="dropdown-menu gap-1 p-2 rounded-3 mx-0 shadow w-220px" data-bs-theme="light">
					<li>
						<a class="dropdown-item rounded-2" href="javascript:void(0)" onclick="swapContent('master_ref/user/user')">Profile</a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li>
						<a class="dropdown-item rounded-2" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>