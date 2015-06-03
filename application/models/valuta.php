<?
class Valuta extends CI_Model {

	var $id ='';
	var $code ='';
	var $name ='';
	var $symbol ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('valuta');
			return $query->result();
		} else return false;
	}
}
?>