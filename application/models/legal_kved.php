<?
class Legal_kved extends CI_Model {

	var $id ='';
	var $legalId ='';
	var $kvedId ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('legal_kved');
			return $query->result();
		} else return false;
	}
	function get_all() { 
		$query = $this->db->get('legal_kved');
		return $query->result();
	}
}
?>