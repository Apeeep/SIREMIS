<?php

class reg
{
	private $db;
	
	function __construct($pdo)
	{
		$this->db = $pdo;
	}
	
	public function createreg($mr,$poli,$tgl_reg,$tipe_pasien,$diagnosa,$created_by)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO reg(mr,poli,tgl_reg,tipe_pasien,diagnosa,created_by) VALUES (:mr, :poli, :tgl_reg, :tipe_pasien, :diagnosa, :created_by)");
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
	
	public function getID($id)
	{
		$query = $this->db->prepare("SELECT * FROM reg WHERE id_reg=:id_reg");
		$query->execute(array(":id_reg"=>$id));
		$editRow=$query->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id_reg,$nama_reg,$alamat_reg,$telp_reg,$bidang_keahlian,$aktif,$update_by)
	{
		try
		{
			$query=$this->db->prepare("UPDATE reg SET 	nama_reg 	= :nama_reg,
															alamat_reg	= :alamat_reg,
															telp_reg		= :telp_reg,
															bidang_keahlian	= :bidang_keahlian,
															aktif 			= :aktif,
													   		update_by 		= :updated_by
													WHERE 	id_reg		= :id_reg ");
			$query -> bindparam(":nama_reg",$nama_reg);
			$query -> bindparam(":alamat_reg",$alamat_reg);
			$query -> bindparam(":telp_reg",$telp_reg);
			$query -> bindparam(":bidang_keahlian",$bidang_keahlian);
			$query -> bindparam(":aktif",$aktif);
			$query -> bindparam(":updated_by",$update_by);
			$query -> bindparam(":id_reg",$id_reg);
			$query -> execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		// code untuk hapus
		$query = $this->db->prepare("DELETE FROM reg WHERE id_reg=:id_reg");
		$query->bindparam(":id_reg",$id);
		$query->execute();
		return true;
	}

	public function select($query){
		$query = $this->db->prepare($query);
		$query->execute();
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_reg]'>$row[nama_reg]</option>";
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
                <td><div align="center" width="5px"><?php print($row['id_reg']); ?></div></td>
                <td><?php print($row['nama_reg']); ?></td>
                <td><?php print($row['alamat_reg']); ?></td>
                <td><?php print($row['telp_reg']); ?></td>
                <td><?php print($row['bidang_keahlian']); ?></td>
                <td><?php print($row['aktif']); ?></td>
                <td><div align="center" style="display:flex;gap:10px;justify-content:center">
                <?php echo "                
                <a href='javascript:void(0)' onclick=\"editData('$row[id_reg]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-pencil bigger-130'></i><span class='ttiptext'><strong>EDIT</strong></span></a>
                <a href='javascript:void(0)' onclick=\"deleteData('$row[id_reg]','$row[nama_reg]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-red bigger-130'></i><span class='ttiptext'><strong>HAPUS</strong></span></a>
                ";?>
                </div>
                </td>
                </tr>
                <?php
                $no++;
			} ?>
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
					$('#tabeldata').dataTable( {
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
	                <td><div align="center" width="5px"><?php print($row['id_reg']); ?></div></td>
	                <td><?php print($row['nama_reg']); ?></td>
	                <td><?php print($row['alamat_reg']); ?></td>
	                <td><?php print($row['telp_reg']); ?></td>
	                <td><?php print($row['bidang_keahlian']); ?></td>
	                <td><div align="center" width="5px"><?php print($row['aktif']); ?></div></td>
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
