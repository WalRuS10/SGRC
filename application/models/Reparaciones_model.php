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
		return $this->db->query("SELECT r.*, e.DESCRIPCION AS ESTADO, em.APELLIDO
						FROM $this->table_name as r
						LEFT JOIN estados_reparaciones AS e ON
							r.ESTADO_REPARACION = e.ID_ESTADO
						LEFT join tecnicos_reparaciones tr on
							tr.NRO_ORDEN_REPARACION = r.NRO_ORDEN
						LEFT JOIN empleados em on
							em.LEGAJO = tr.LEGAJO_TECNICO 
						")->result_array();
		
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
		/*
		$idcomponente = $data['ID_COMPONENTE'];
		$stock = $this->db->query("SELECT STOCK
							FROM componentes
						  WHERE ID_COMPONENTE = $idcomponente ;")->row();
		if($stock<$data['CANTIDAD'])
			die('asdasd');
		*/
		return $this->db->insert('reparaciones_componentes', $data);
	}
	
	public function removeComponente($idreparacion, $idcomponente)
	{
		return $this->db->delete('reparaciones_componentes', array('NRO_ORDEN' => $idreparacion, 'ID_COMPONENTE' => $idcomponente)); 
	}
	
	
		
	public function getTecnicosUsados($nro_orden)
	{
		return $this->db->query("SELECT e.*
								 FROM empleados e
								 JOIN tecnicos_reparaciones as tr on
								   tr.LEGAJO_TECNICO = e.LEGAJO
								 WHERE tr.NRO_ORDEN_REPARACION = $nro_orden
								 GROUP BY e.LEGAJO")->result_array();
	}
	
	public function getTecnicosNoUsados($nro_orden)
	{
		return $this->db->query("SELECT *
								 FROM empleados e
								 JOIN tecnicos t ON
									t.LEGAJO = e.LEGAJO
								 WHERE e.LEGAJO NOT IN (
									SELECT tr.LEGAJO_TECNICO
									FROM tecnicos_reparaciones tr
									WHERE tr.NRO_ORDEN_REPARACION = $nro_orden)
									
								 ")->result_array();
	}
	
	public function insertTecnico($data)
	{
		return $this->db->insert('tecnicos_reparaciones', $data);
	}
	
	public function removeTecnico($idreparacion, $legajo)
	{
		return $this->db->delete('tecnicos_reparaciones', array('NRO_ORDEN_REPARACION' => $idreparacion, 'LEGAJO_TECNICO' => $legajo)); 
	}
		
}