<?php

class tindakan
{
	private $db;
	
	function __construct($pdo)
	{
		$this->db = $pdo;
	}
	
	public function create($tindakan,$harga,$created_by)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO tindakan(tindakan,harga,created_by) VALUES (:tindakan, :harga, :created_by)");
			$query -> bindparam(":tindakan",$tindakan);
			$query -> bindparam(":harga",$harga);
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
		$query = $this->db->prepare("SELECT * FROM tindakan WHERE id_tindakan=:id_tindakan");
		$query->execute(array(":id_tindakan"=>$id));
		$editRow=$query->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id_tindakan,$tindakan,$harga,$update_by)
	{
		try
		{
			$query=$this->db->prepare("UPDATE tindakan SET 		tindakan 	= :tindakan,
																harga		= :harga,
													   			update_by 	= :updated_by
														WHERE 	id_tindakan	= :id_tindakan ");
			$query -> bindparam(":tindakan",$tindakan);
			$query -> bindparam(":harga",$harga);
			$query -> bindparam(":updated_by",$update_by);
			$query -> bindparam(":id_tindakan",$id_tindakan);
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
			$query = $this->db->prepare("DELETE FROM tindakan WHERE id_tindakan=:id_tindakan");
			$query->bindparam(":id_tindakan",$id);
			$query->execute();
			echo "
			<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Data Berhasil Di Hapus
			</div>
			<strong><a href='javascript:void(0)' onclick='Tindakan()'> <i class='icon-backward'></i> Kembali</a></strong>";
			return true;
		}catch(PDOException $e)
		{
			echo "
			<div class='alert alert-error'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Data Tidak Bisa di Hapus Karena Sudah Di pakai !
			</div>
			<strong><a href='javascript:void(0)' onclick='Tindakan()'> <i class='icon-backward'></i> Kembali</a></strong>";
			return false;
		}
	}

	public function select($query){
		$query = $this->db->prepare($query);
		$query->execute();
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='$row[id_tindakan]'>$row[nama_tindakan]</option>";
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
                <td><?php print($row['tindakan']); ?></td>
                <td><?php print(number_format( $row['harga'] , 2 , ',', '.' )); ?></td>
                <td><div align="center" style="display:flex;gap:10px;justify-content:center">
                <?php echo "                
                <a href='javascript:void(0)' onclick=\"editData('$row[id_tindakan]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-pencil bigger-130'></i><span class='ttiptext'><strong>EDIT</strong></span></a>
                <a href='javascript:void(0)' onclick=\"deleteData('$row[id_tindakan]','$row[tindakan]')\" class='ttip' style='text-decoration:none'><i class='icon-trash icon-red bigger-130'></i><span class='ttiptext'><strong>HAPUS</strong></span></a>
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
	                <td><?php print($row['tindakan']); ?></td>
	                <td><?php print("Rp. ".number_format( $row['harga'] , 2 , ',', '.' )); ?></td>
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
