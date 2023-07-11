<?php

class grafik
{
	private $db;
	
	function __construct($pdo)
	{
		$this->db = $pdo;
	}

	public function grafik_pasien($query)
	{		
		$query = $this->db->prepare($query);
		$query->execute();		
		while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
						$data   =date('M', strtotime($row['tgl_reg'] ));
                        $jumlah =$row['jumlah'];

                ?>
                 {
                    name:  '<?php echo $data; ?>',
                    data: [<?php echo $jumlah; ?>]

                 },
               <?php
          } 
	}
} 