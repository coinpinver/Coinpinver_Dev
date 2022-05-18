<?php 

Class M_DatosWhitePaper extends CI_MODEL
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function MDWP_PrimerRegistro()
	{
		$q_white = "select * from whitepaper  order by 1 asc limit 1";
		return $this->db->query($q_white)->result();
	}
	public function MDWP_Titulos()
	{
		$q_titulo = "select w_id, w_titulo from whitepaper where w_estatus = 1";
		return $this->db->query($q_titulo)->result();
	}
	public function MDWP_Descripcion($w_id)
	{
		$q_descripcion = "select w_id, w_titulo, w_contenido from whitepaper where w_id = ?";
		return $this->db->query($q_descripcion, array($w_id))->result();	

	}
	public function MDWP_setContenidoWhitePaper($valoresWhitePaper)
	{
		
		$this->db->trans_start();

		$this->db->insert("whitepaper", $valoresWhitePaper);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{ // fallo el registro
			
		    $this->db->trans_rollback();
		    
		}
		else //se registro
		{
			
	        $this->db->trans_commit();
		        
		}
		return !$this->db->trans_status() ? false : true;
	}
	public function MDWP_updateContenidoWhitePaper($datosUpdateWhitePaper, $where) {
		if($this->db->update("whitepaper", $datosUpdateWhitePaper, $where)) 
		{
			return true;
		} 
		else {
			return false;
		}
	}
	public function MDWP_getMisVis(){
		$sql_misvis = "SELECT * FROM whitepaper WHERE w_titulo like '%misi%' or w_titulo like '%visi%'";
		return $this->db->query($sql_misvis)->result();
	}
}
?>