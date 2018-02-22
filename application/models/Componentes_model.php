<?php
class Componentes_model extends CI_Model {
	
		private $table_name = 'componentes';
		private $PK = 'ID_COMPONENTE';

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
									 where $this->PK = $id")->row_array();
			
		}
		
		public function search($field, $searchword)
		{
			return $this->db->query("SELECT *
									 FROM $this->table_name A
									 WHERE (A.$field LIKE '%$searchword%' AND '$searchword' <> ''
											OR '$searchword' = '')
									 ")->result_array();
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
		
		public function addProveedorComponente($data)
		{
			return $this->db->insert('proveedores_componentes', $data);
		}		
		public function removeProveedorComponente($cuit_proveedor, $idcomponente)
		{
			return $this->db->delete('proveedores_componentes', array('CUIT_PROVEEDOR' => $cuit_proveedor,
																'ID_COMPONENTE' => $idcomponente));
		}
		
		public function getProveedoresComponente($id_componente)
		{
			return $this->db->query("SELECT *
									 FROM proveedores_componentes
									 JOIN proveedores on proveedores_componentes.CUIT_PROVEEDOR = proveedores.CUIT
									 WHERE ID_COMPONENTE = $id_componente")->result_array();
		}
		
		public function getProveedoresNoUsados($id_componente){
			return $this->db->query("SELECT *
									 FROM proveedores p
									 WHERE p.CUIT NOT IN (
										SELECT CUIT_PROVEEDOR
										FROM proveedores_componentes
										WHERE ID_COMPONENTE = $id_componente)")->result_array();
		}
}