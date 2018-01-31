<?php
class Reparaciones_model extends CI_Model {

	private $table_name = 'reparaciones';
	private $PK = 'NRO_ORDEN';

	public function __construct()
	{
		$this->load->database();
	}
	public function getAll()
	{
		return $this->db->query("SELECT r.*, e.DESCRIPCION AS ESTADO
						FROM $this->table_name as r
						LEFT JOIN estados_reparaciones AS e ON
							r.ESTADO_REPARACION = e.ID_ESTADO")->result_array();
		
	}
	public function getById($id)
	{
		return $this->db->query("SELECT r.*, e.DESCRIPCION AS ESTADO
						FROM $this->table_name as r
						LEFT JOIN estados_reparaciones AS e ON
							r.ESTADO_REPARACION = e.ID_ESTADO
						WHERE r.$this->PK = $id
						")->row_array();
		
	}
	
	public function search($keywords)
	{
		//To Do...
	}
	
	public function insert($data)
	{
		return $this->db->insert($this->table_name, $data);
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table_name, array($this->PK => $id)); 
	}
	
	public function update($id, $data)
	{
		$this->db->where($this->PK, $id);
		return $this->db->update($this->table_name, $data);
	}
	
	public function getComponentesUsados($nro_orden)
	{
		return $this->db->query("SELECT c.*, rc.CANTIDAD, SUM(c.PRECIO_COMPRA*rc.CANTIDAD) AS SUBTOTAL
								 FROM componentes c
								 JOIN reparaciones_componentes as rc on
								   rc.ID_COMPONENTE = c.ID_COMPONENTE
								 WHERE rc.NRO_ORDEN = $nro_orden
								 GROUP BY c.ID_COMPONENTE")->result_array();
	}
	
	public function getComponentesNoUsados($nro_orden)
	{
		return $this->db->query("SELECT *
								 FROM componentes
								 WHERE ID_COMPONENTE NOT IN (
									SELECT ID_COMPONENTE
									FROM reparaciones_componentes
									WHERE NRO_ORDEN = $nro_orden
								 )")->result_array();
	}
	
	public function getGasto($nro_orden)
	{
		return $this->db->query("SELECT SUM(c.PRECIO_COMPRA*rc.CANTIDAD) as TOTAL
								 FROM componentes c
								 JOIN reparaciones_componentes as rc on
									rc.ID_COMPONENTE = c.ID_COMPONENTE
								 WHERE rc.NRO_ORDEN = $nro_orden")->row_array();
	}
	
	public function insertComponente($data)
	{
		return $this->db->insert('reparaciones_componentes', $data);
	}
	
	public function removeComponente($idreparacion, $idcomponente)
	{
		return $this->db->delete('reparaciones_componentes', array('NRO_ORDEN' => $idreparacion, 'ID_COMPONENTE' => $idcomponente)); 
	}
		
}