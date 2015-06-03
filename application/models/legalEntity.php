<?
class LegalEntity extends CI_Model {

	var $id ='';
	var $name ='';
	var $ownerId ='';
	var $address ='';
	var $koatu ='';
	var $createDate ='';
	var $closeDate ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('legal_entity');
			return $query->result();
		} else return false;
	}
	function get_by_ownerId($id) {
		if(!empty($id)) {
			$this->db->select('*,legal_entity.name as `legal_name`, GROUP_CONCAT(kved.name SEPARATOR "; ") as `name`, GROUP_CONCAT(kved.text SEPARATOR ";\n") as `text`');
			$this->db->from('legal_entity');
			$this->db->join('legal_kved', 'legal_kved.legal_id = legal_entity.id');
			$this->db->join('kved', 'legal_kved.kved_id = kved.id');
			$this->db->where('owner_id', $id);
			$this->db->group_by('legal_entity.id');
			$query = $this->db->get();
			return $query->result();
		} else return false;
	}
	function get_by_ownerId_kvednotset($id) {
		if(!empty($id)) {
			$this->db->select('*,legal_entity.name as `legal_name`');
			$this->db->from('legal_entity');
			$this->db->join('legal_kved', 'legal_kved.legal_id = legal_entity.id');
			$this->db->where('owner_id', $id);
			$this->db->where_not_in('username', $names);
			
			$this->db->query('SELECT title FROM my_table');
			s
			$query = $this->db->get();
			return $query->result();
		} else return false;
	}
	function get_all() { 
		$query = $this->db->get('legal_entity');
		return $query->result();
	}
	function insert_new($data) {
		if(!empty($data)) {
			$this->db->insert('legal_entity', $data);
			return true;
		} else return false;
	}
}
?>