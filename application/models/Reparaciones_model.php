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
			return $this->db->query("SELECT *
									 FROM $this->table_name")->result_array();
			
		}
		public function getById($id)
		{
			return $this->db->query("SELECT *
									 FROM $this->table_name
									 WHERE $this->PK = $id")->row_array();
			
		}
		
		public function getEstado($id)
		{
			return $this->db->query("SELECT descripcion
									 FROM estados_reparaciones
									 WHERE ID_ESTADO=$id")->row_array();
		}
		
		public function getAllEstados()
		{
			return $this->db->query("SELECT *
									 FROM estados_reparaciones")->result_array();
		}
		
		public function getReparacionesComponentes($id)
		{
			return $this->db->query("SELECT c.ID_COMPONENTE, c.DESCRIPCION, c.STOCK, c.PRECIO_COMPRA 
									 FROM componentes c 
									 JOIN reparaciones_componentes rc ON c.ID_COMPONENTE=rc.ID_COMPONENTE 
									 WHERE rc.NRO_ORDEN=$id")->result_array();
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
		
}