<?php

class tipe_pasien
{
	private $db;
	
	function __construct($pdo)
	{
		$this->db = $pdo;
	}
	
	public function create($nama_tipe_pasien,$alamat_tipe_pasien,$telp_tipe_pasien,$aktif,$created_by)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO tipe_pasien(nama_tipe_pasien,alamat_tipe_pasien,telp_tipe_pasien,aktif,created_by) VALUES (:nama_tipe_pasien, :alamat_tipe_pasien, :telp_tipe_pasien, :aktif, :created_by)");
			$query -> bindparam(":nama_tipe_pasien",$nama_tipe_pasien);
			$query -> bindparam(":alamat_tipe_pasien",$alamat_tipe_pasien);
			$query -> bindparam(":telp_tipe_pasien",$telp_tipe_pasien);
			$query -> bindparam(":aktif",$aktif);
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
		$query = $this->db->prepare("SELECT * FROM tipe_pasien WHERE id_tipe_pasien=:id_tipe_pasien");
		$query->execute(array(":id_tipe_pasien"=>$id));
		$editRow=$query->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id_tipe_pasien,$nama_tipe_pasien,$alamat_tipe_pasien,$telp_tipe_pasien,$aktif,$update_by)
	{
		try
		{
			$query=$this->db->prepare("UPDATE tipe_pasien SET 	nama_tipe_pasien 	= :nama_tipe_pasien,
																		alamat_tipe_pasien	= :alamat_tipe_pasien,
																		telp_tipe_pasien	= :telp_tipe_pasien,
																		aktif 						= :aktif,
													   					update_by 					= :updated_by
																WHERE 	id_tipe_pasien		= :id_tipe_pasien ");
			$query -> bindparam(":nama_tipe_pasien",$nama_tipe_pasien);
			$query -> bindparam(":alamat_tipe_pasien",$alamat_tipe_pasien);
			$query -> bindparam(":telp_tipe_pasien",$telp_tipe_pasien);
			$query -> bindparam(":aktif",$aktif);
			$query -> bindparam(":updated_by",$update_by);
			$query -> bindparam(":id_tipe_pasien",$id_tipe_pasien);
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
		try{
			$query = $this->db->prepare("DELETE FROM tipe_pasien WHERE id_tipe_pasien=:id_tipe_pasien");
			$query->bindparam(":id_tipe_pasien",$id);
			$query->execute();
			echo "
			<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Data Berhasil Di Hapus
			</div>
			<strong><a href='javascript:void(0)' onclick='tipe_pasien()'> <i class='icon-backward'></i> Kembali</a></strong>";
			return true;
		}catch(PDOException $e){
			echo "
			<div class='alert alert-error'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Data Tidak Bisa di Hapus Karena Sudah Di pakai !
			</div>
			<strong><a href='javascript:void(0)' onclick='tipe_pasien()'> <i class='icon-backward'></i> Kembali</a></strong>";
			return false;
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
                <td><?php print($row['nama_tipe_pasien']); ?></td>
                <td><div align="center" style="display:flex;gap:10px;justify-content:center">
                <?php echo "                
                <a href='javascript:void(0)' onclick=\"editData('$row[id_tipe_pasien]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-pencil bigger-130'></i><span class='ttiptext'><strong>EDIT</strong></span></a>
                <a href='javascript:void(0)' onclick=\"deleteData('$row[id_tipe_pasien]','$row[nama_tipe_pasien]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-red bigger-130'></i><span class='ttiptext'><strong>HAPUS</strong></span></a>
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
	                <td><?php print($row['nama_tipe_pasien']); ?></td>
	                <td><?php print($row['alamat_tipe_pasien']); ?></td>
	                <td><?php print($row['telp_tipe_pasien']); ?></td>
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
