<?php

class pasien
{
	private $db;
	
	function __construct($pdo)
	{
		$this->db = $pdo;
	}
	
	public function create($no_bpjs,$nama,$tempat_lahir,$tgl_lahir,$pangkat,$nip,$alamat,$id_prov,$id_kab,$id_kec,$id_kel,$jenis_kelamin,$tlp,$created_by)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO pasien(no_bpjs,nama,tempat_lahir,tgl_lahir,pangkat,nip,alamat,id_prov,id_kab,id_kec,id_kel,jenis_kelamin,tlp,created_by) VALUES (:no_bpjs, :nama, :tempat_lahir, :tgl_lahir, :pangkat, :nip, :alamat, :id_prov, :id_kab, :id_kec, :id_kel, :jenis_kelamin, :tlp, :created_by)");
			$query -> bindparam(":no_bpjs",$no_bpjs);
			$query -> bindparam(":nama",$nama);
			$query -> bindparam(":tempat_lahir",$tempat_lahir);
			$query -> bindparam(":tgl_lahir",$tgl_lahir);
			$query -> bindparam(":pangkat",$pangkat);
			$query -> bindparam(":nip",$nip);
			$query -> bindparam(":alamat",$alamat);
			$query -> bindparam(":id_prov",$id_prov);
			$query -> bindparam(":id_kab",$id_kab);
			$query -> bindparam(":id_kec",$id_kec);
			$query -> bindparam(":id_kel",$id_kel);
			$query -> bindparam(":jenis_kelamin",$jenis_kelamin);
			$query -> bindparam(":tlp",$tlp);
			$query -> bindparam(":created_by",$created_by);
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function createreg($mr,$poli,$tgl_reg,$tipe_pasien,$diagnosa,$created_by)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO reg(mr,poli,tgl_reg,id_tipe_pasien,diagnosa,created_by) VALUES (:mr, :poli, :tgl_reg, :tipe_pasien, :diagnosa, :created_by)");
			$query -> bindparam(":mr",$mr);
			$query -> bindparam(":poli",$poli);
			$query -> bindparam(":tgl_reg",$tgl_reg);
			$query -> bindparam(":tipe_pasien",$tipe_pasien);
			$query -> bindparam(":diagnosa",$diagnosa);
			$query -> bindparam(":created_by",$created_by);
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function update($mr,$no_bpjs,$nama,$tempat_lahir,$tgl_lahir,$pangkat,$nip,$alamat,$id_prov,$id_kab,$id_kec,$id_kel,$jenis_kelamin,$tlp,$update_by)
	{
		try
		{
			$query=$this->db->prepare("UPDATE pasien SET 	no_bpjs 		= :no_bpjs,
															nama 			= :nama,
															tempat_lahir 	= :tempat_lahir,
															tgl_lahir 		= :tgl_lahir,
															pangkat 		= :pangkat,
															nip		 		= :nip,
 															alamat 			= :alamat,
 															id_prov 		= :id_prov,
 															id_kab 			= :id_kab,
 															id_kec 			= :id_kec,
 															id_kel 			= :id_kel,
 															jenis_kelamin 	= :jenis_kelamin,
															tlp 			= :tlp,
													   		update_by 		= :update_by
													WHERE 	mr				= :mr ");
			$query -> bindparam(":mr",$mr);
			$query -> bindparam(":no_bpjs",$no_bpjs);
			$query -> bindparam(":nama",$nama);
			$query -> bindparam(":tempat_lahir",$tempat_lahir);
			$query -> bindparam(":tgl_lahir",$tgl_lahir);
			$query -> bindparam(":pangkat",$pangkat);
			$query -> bindparam(":nip",$nip);
			$query -> bindparam(":alamat",$alamat);
			$query -> bindparam(":id_prov",$id_prov);
			$query -> bindparam(":id_kab",$id_kab);
			$query -> bindparam(":id_kec",$id_kec);
			$query -> bindparam(":id_kel",$id_kel);
			$query -> bindparam(":jenis_kelamin",$jenis_kelamin);
			$query -> bindparam(":tlp",$tlp);
			$query -> bindparam(":update_by",$update_by);
			$query -> execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function updatereg($reg_no,$mr,$poli,$tgl_reg,$tipe_pasien,$diagnosa,$update_by)
	{
		try
		{
			$query=$this->db->prepare("UPDATE reg  SET 	mr 						= :mr,
															poli 		 			= :poli,
															tgl_reg 				= :tgl_reg,
 															id_tipe_pasien 	= :id_tipe_pasien,
 															diagnosa 				= :diagnosa,
 															update_by 				= :update_by
													WHERE 	reg_no					= :reg_no ");
			$query -> bindparam(":reg_no",$reg_no);
			$query -> bindparam(":mr",$mr);
			$query -> bindparam(":poli",$poli);
			$query -> bindparam(":tgl_reg",$tgl_reg);
			$query -> bindparam(":id_tipe_pasien",$tipe_pasien);
			$query -> bindparam(":diagnosa",$diagnosa);
			$query -> bindparam(":update_by",$update_by);
			$query -> execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function getID($id)
	{
		$query = $this->db->prepare("SELECT * FROM v_pasien WHERE mr=:mr");
		$query->execute(array(":mr"=>$id));
		$editRow=$query->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function getEditReg($id)
	{
		$query = $this->db->prepare("SELECT * FROM v_reg WHERE mr=:mr");
		$query->execute(array(":mr"=>$id));
		$editRow=$query->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function delete($id)
	{
		// code untuk hapus
		$query = $this->db->prepare("DELETE FROM pasien WHERE mr=:mr");
		$query->bindparam(":mr",$id);
		$query->execute();
		return true;
	}

	public function deleteRegistrasi($id)
	{
		// code untuk hapus
		$query = $this->db->prepare("DELETE FROM reg WHERE reg_no=:reg_no");
		$query->bindparam(":reg_no",$id);
		$query->execute();
		return true;
	}

	public function prov(){
		$query = $this->db->prepare(" SELECT * FROM wilayah_provinsi ORDER BY nama_prov ");
		$query->execute();
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_prov]'>$row[nama_prov]</option>";
		}
		
	}

	public function kabupaten($query){
		$query = $this->db->prepare($query);
		$query->execute();
		echo "<option>-- Pilih Kabupaten --</option>";
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_kab]'>$row[nama_kab]</option>";
		}
		
	}

	public function kecamatan($query){
		$query = $this->db->prepare($query);
		$query->execute();
		echo "<option>-- Pilih Kecamatan --</option>";
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_kec]'>$row[nama_kec]</option>";
		}
		
	}

	public function kelurahan($query){
		$query = $this->db->prepare($query);
		$query->execute();
		echo "<option>-- Pilih Kelurahan --</option>";
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_kel]'>$row[nama_kel]</option>";
		}
		
	}

	public function tipePasien(){
		$query = $this->db->prepare("SELECT * FROM tipe_pasien WHERE aktif = 'Y' ORDER BY nama_tipe_pasien");
		$query->execute();
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_tipe_pasien]'>$row[nama_tipe_pasien]</option>";
		}
		
	}
	
	public function view($query)
	{
		$query = $this->db->prepare($query);
		$query->execute();
		$no = 1;
		if($query->rowCount()>0)
		{
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><div align="center"><?php print($row['mr']); ?></div></td>
                <td><?php print($row['no_bpjs']); ?></td>
                <td><?php print($row['nama']); ?></td>
                <td><?php print($row['tempat_lahir'].", " .tgl_indo($row['tgl_lahir'])); ?></td>
                <td><?php print($row['pangkat']); ?></td>
                <td><?php print($row['nip']); ?></td>
                <td><?php print($row['alamat'].", Kel. ". $row['nama_kel']. ", kec. " . $row['nama_kec']. ", ". $row['nama_kab']. " - " . $row['nama_prov']); ?></td>
                <td><?php print($row['jenis_kelamin']); ?></td>
                <td><?php print($row['tlp']); ?></td>
                <td><?php echo " 
                <a href='javascript:void(0)' onclick=\"registrasi('$row[mr]')\" ><i class='icon-inbox bigger-130'></i> Registrasi</a> </td> "; ?>
                <td><div align="center" style="display:flex;gap:10px;justify-content:center">
                <?php echo "               
                <a href='javascript:void(0)' onclick=\"editData('$row[mr]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-pencil bigger-130'></i><span class='ttiptext'><strong>EDIT</strong></span></a>
                <a href='javascript:void(0)' onclick=\"deleteData('$row[mr]','$row[nama]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-red bigger-130'></i><span class='ttiptext'><strong>HAPUS</strong></span></a>
                ";?>
                </div>
                </td>
                </tr>
                <?php
                $no++;
			} ?>
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					$('#tabeldata1').dataTable( {
						"iDisplayLength": 5,
	                    "aLengthMenu": [5, 10, 25, 50, 100 ],						
					} );
				} );
			</script><?php 
		}
		else
		{
			?>
            <tr>
           		<td></td>
           		<td><strong>Data Kosong</strong></td>
            </tr>
            <?php
		}		
	}
	
	public function viewreg($query)
	{
		$query = $this->db->prepare($query);
		$query->execute();
		$no = 1;
		if($query->rowCount()>0)
		{
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><div align="center"><?php print($row['mr']); ?></div></td>
	                <td><?php print($row['poli']); ?></td>
	                <td><?php print($row['diagnosa']); ?></td>
	                <td><?php print($row['nama']); ?></td>
	                <td><?php print($row['tempat_lahir'].", " .tgl_indo($row['tgl_lahir'])); ?></td>            
	                <td><?php print($row['alamat'].", Kel. ". $row['nama_kel']. ", kec. " . $row['nama_kec']. ", ". $row['nama_kab']. " - " . $row['nama_prov']); ?></td>
	                <td><?php print($row['jenis_kelamin']); ?></td>
	            
	                <td><div align="center" style="display:flex;gap:10px;justify-content:center">
	                <?php echo "               
					<a href='javascript:void(0)' onclick=\"editData('$row[mr]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-pencil bigger-130'></i><span class='ttiptext'><strong>EDIT</strong></span></a>
					<a href='javascript:void(0)' onclick=\"deleteData('$row[mr]','$row[nama]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-red bigger-130'></i><span class='ttiptext'><strong>HAPUS</strong></span></a>
					";?>
	                </div>
	                </td>
                </tr>
                <?php
                $no++;
			} ?>
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					www
						"iDisplayLength": 5,
	                    "aLengthMenu": [5, 10, 25, 50, 100 ],
						"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
						"sPaginationType": "bootstrap",
						"oLanguage":{
							"sProcessing": "Sedang Memproses",
							"sLengthMenu": "Tampilkan _MENU_ Data",
							"sZeroRecords": "Tidak ditemukan Data yang sesuai",
							"sInfo": "_START_ Sampai _END_ Dari _TOTAL_ Data",
							"sInfoEmpty": "0 Sampai 0 Dari 0 Data",
							"sInfoFiltered": "(disaring dari _MAX_ Data keseluruhan)",
							"sInfoPostFix": "",
							"sSearch": "Cari",
							"sUrl": "",
						}
					} );
				} );
			</script><?php 
		}
		else
		{
			?>
            <tr>
           		<td></td>
           		<td><strong>Data Kosong</strong></td>
            </tr>
            <?php
		}		
	}

	public function Prin($query)
	{
		$query = $this->db->prepare($query);
		$query->execute();
		$no = 1;
		if($query->rowCount()>0)
		{
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><div align="center"><?php print($row['mr']); ?></div></td>
	                <td><?php print($row['no_bpjs']); ?></td>
	                <td><?php print($row['nama']); ?></td>
	                <td><?php print($row['tempat_lahir'].", " .tgl_indo($row['tgl_lahir'])); ?></td>
	                <td><?php print($row['pangkat']); ?></td>
	                <td><?php print($row['nip']); ?></td>
	                <td><?php print($row['alamat'].", Kel. ". $row['nama_kel']. ", kec. " . $row['nama_kec']. ", ". $row['nama_kab']. " - " . $row['nama_prov']); ?></td>
	                <td><?php print($row['jenis_kelamin']); ?></td>
	                <td><?php print($row['tlp']); ?></td>
                </tr>
                <?php
                $no++;
			} 
		}
		else
		{
			?>
            <tr>
           		<td></td>
           		<td><strong>Data Kosong</strong></td>
            </tr>
            <?php
		}		
	}

	public function PrinReg($query)
	{
		$query = $this->db->prepare($query);
		$query->execute();
		$no = 1;
		if($query->rowCount()>0)
		{
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><div align="center"><?php print($row['mr']); ?></div></td>
	                <td><?php print($row['poli']); ?></td>
	                <td><?php print($row['diagnosa']); ?></td>
	                <td><?php print($row['nama']); ?></td>
	                <td><?php print($row['tempat_lahir'].", " .tgl_indo($row['tgl_lahir'])); ?></td>            
	                <td><?php print($row['alamat'].", Kel. ". $row['nama_kel']. ", kec. " . $row['nama_kec']. ", ". $row['nama_kab']. " - " . $row['nama_prov']); ?></td>
	                <td><?php print($row['jenis_kelamin']); ?></td>
	                <td><?php print(tgl_indo($row['tgl_reg'])); ?></td>
                </tr>
                <?php
                $no++;
			} 
		}
		else
		{
			?>
            <tr>
           		<td></td>
           		<td><strong>Data Kosong</strong></td>
            </tr>
            <?php
		}		
	}
	
}
