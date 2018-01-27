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
							where r.$this->PK = $id
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
		
		public function getComponentes($nro_orden)
		{
			return $this->db->query("SELECT c.*
									 FROM componentes c
									 JOIN reparaciones_componentes as rc on
										rc.ID_COMPONENTE = c.ID_COMPONENTE
									 JOIN reparaciones r ON
										r.NRO_ORDEN = rc.NRO_ORDEN
									 WHERE r.NRO_ORDEN = $nro_orden")->result_array();
		}
}