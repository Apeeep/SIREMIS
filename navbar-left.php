<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 250px;">
	<ul class="accordion nav nav-pills flex-column gap-1" id="accordionParents">

		<!-- ====================================================== HOME ACCORDION ====================================================== -->
		<li class="list-group">
			<button class="nav-link list-group-item list-group-item-action" aria-current="page" onclick="swapContent('home')">
				<i class="fa-solid fa-house"></i>
				<span class="ms-2">Home</span>
			</button>
		</li>
		<!-- ====================================================== HOME ACCORDION ====================================================== -->

		<!-- ====================================================== MASTER ACCORDION ====================================================== -->
		<div class="accordion-item bg-transparent border-0">
			<li class="list-group accordion-header">
				<a class="accordion-button collapsed nav-link list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="page" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMaster">
					<div>
						<i class="fa-solid fa-server"></i>
						<span class="ms-2">Master</span>
					</div>
				</a>
			</li>
			<div class="accordion-collapse collapse" id="collapseMaster" data-bs-parent="#accordionParents">
				<ul class="accordion-body list-group p-1 grid gap-1">
					<li class="list-group" onclick="swapContent('master_ref/user/user')">
						<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
							<i class="fa-solid fa-angles-right"></i>
							<span class="ms-2">User</span>
						</a>
					</li>
					<?php if ($_SESSION['s_level'] == 'Administrator') { ?> <!-- ===== SPECIFIC SESSION ===== -->
						<li class="list-group" onclick="swapContent('master_ref/dokter/dokter')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Dokter</span>
							</a>
						</li>
						<li class="list-group" onclick="swapContent('master_ref/tindakan/tindakan')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Tindakan</span>
							</a>
						</li>
						<li class="list-group" onclick="swapContent('master_ref/tindakan_lab/tindakan_lab')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Tindakan Lab</span>
							</a>
						</li>
						<li class="list-group" onclick="swapContent('master_ref/tipe_pasien/tipe_pasien')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Tipe Pasien</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- ====================================================== MASTER ACCORDION ====================================================== -->

		<!-- ====================================================== APOTIK ACCORDION ====================================================== -->
		<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Apotik') { ?> <!-- ===== SPECIFIC SESSION ===== -->
			<div class="accordion-item bg-transparent border-0">
				<li class="list-group accordion-header">
					<a class="accordion-button collapsed nav-link list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="page" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApotik">
						<div>
							<i class="fa-solid fa-tablets"></i>
							<span class="ms-2">Apotik</span>
						</div>
					</a>
				</li>
				<div class="accordion-collapse collapse" id="collapseApotik" data-bs-parent="#accordionParents">
					<ul class="accordion-body list-group p-1 grid gap-1">
						<li class="list-group" onclick="swapContent('apotik/apotik')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Daftar Obat</span>
							</a>
						</li>
						<li class="list-group" onclick="swapContent('apotik/trans_apotik/trans_apotik')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Transaksi</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		<?php } ?>
		<!-- ====================================================== APOTIK ACCORDION ====================================================== -->

		<!-- ====================================================== TRANSAKSI ACCORDION ====================================================== -->
		<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Dokter' || $_SESSION['s_level'] == 'Laboratorium') { ?> <!-- ===== SPECIFIC SESSION ===== -->
			<div class="accordion-item bg-transparent border-0">
				<li class="list-group accordion-header">
					<a class="accordion-button collapsed nav-link list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="page" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTransaksi">
						<div>
							<i class="fa-solid fa-wallet"></i>
							<span class="ms-2">Transaksi</span>
						</div>
					</a>
				</li>
				<div class="accordion-collapse collapse" id="collapseTransaksi" data-bs-parent="#accordionParents">
					<ul class="accordion-body list-group p-1 grid gap-1">
						<?php if ($_SESSION['s_level'] == 'Administrator') { ?> <!-- ===== SPECIFIC SESSION ===== -->
							<li class="list-group" onclick="swapContent('reg/reg')">
								<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
									<i class="fa-solid fa-angles-right"></i>
									<span class="ms-2">Registrasi</span>
								</a>
							</li>
						<?php } ?>
						<?php if ($_SESSION['s_level'] == 'Administrator' || $_SESSION['s_level'] == 'Dokter') { ?> <!-- ===== SPECIFIC SESSION ===== -->
							<li class="list-group" href="javascript:void(0)" onclick="swapContent('poli/poli')">
								<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
									<i class="fa-solid fa-angles-right"></i>
									<span class="ms-2">Poli</span>
								</a>
							</li>
						<?php } ?>
						<?php if ($_SESSION['s_level'] == 'Laboratorium' || $_SESSION['s_level'] == 'Administrator') { ?> <!-- ===== SPECIFIC SESSION ===== -->
							<li class="list-group" onclick="swapContent('lab/lab')">
								<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
									<i class="fa-solid fa-angles-right"></i>
									<span class="ms-2">Laboratorium</span>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<!-- ====================================================== TRANSAKSI ACCORDION ====================================================== -->

		<!-- ====================================================== KASIR ACCORDION ====================================================== -->
		<?php if ($_SESSION['s_level'] == 'Administrator') { ?> <!-- ===== SPECIFIC SESSION ===== -->
			<div class="accordion-item bg-transparent border-0">
				<li class="list-group accordion-header">
					<a class="accordion-button collapsed nav-link list-group-item list-group-item-action d-flex align-items-center justify-content-between" aria-current="page" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKasir">
						<div>
							<i class="fa-solid fa-coins"></i>
							<span class="ms-2">Kasir</span>
						</div>
					</a>
				</li>
				<div class="accordion-collapse collapse" id="collapseKasir" data-bs-parent="#accordionParents">
					<ul class="accordion-body list-group p-1 grid gap-1">
						<li class="list-group" onclick="swapContent('kasir/kasir')">
							<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="navbar-left-active">
								<i class="fa-solid fa-angles-right"></i>
								<span class="ms-2">Pembayaran</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		<?php } ?>
		<!-- ====================================================== KASIR ACCORDION ====================================================== -->

	</ul>
	<hr>

	<!-- ====================================================== LOG OUT ACCORDION ====================================================== -->
	<ul class="nav nav-pills flex-column mb-auto gap-1 justify-self-end">
		<li class="list-group">
			<a href="logout.php" class="nav-link list-group-item list-group-item-action bg-danger text-white" aria-current="page" data-bs-target="#collapse">
				<i class="fa-solid fa-right-from-bracket"></i>
				<span class="ms-2">Logout</span>
			</a>
		</li>
	</ul>
	<!-- ====================================================== LOG OUT ACCORDION ====================================================== -->

</div>