<?
class Work_for extends CI_Model {

	var $id ='';
	var $personId ='';
	var $lentityId ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('work_for');
			return $query->result();
		} else return false;
	}
	function get_by_lentity($id) {
		if(!empty($id)) {
			$this->db->where('lentity_id', $id);
			$query = $this->db->get('work_for');
			return $query->result();
		} else return false;
	}
	function get_by_person($id) {
		if(!empty($id)) {
			$this->db->select('*');
			$this->db->from('legal_entity');
			$this->db->join('work_for', 'work_for.lentity_id = legal_entity.id');
			$this->db->where('work_for.person_id', $id);
			$this->db->where('legal_entity.close_date', '0000-00-00');
			$query = $this->db->get();
			return $query->result();
		} else return false;
	}
	function get_all() { 
		$query = $this->db->get('work_for');
		return $query->result();
	}
}
?>