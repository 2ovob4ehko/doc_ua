<?
class Person extends CI_Model {

	var $id ='';
	var $login ='';
	var $pass ='';
	var $name ='';
	var $secondname ='';
	var $surname ='';
	var $sex ='';
	var $born ='';
	var $photo ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function insert_new($data) {
		if(!empty($data)) {
			$this->db->insert('person', $data);
			return true;
		} else return false;
	}
	function get_all() { 
		$query = $this->db->get('person');
		return $query->result();
	}
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('person');
			return $query->result();
		} else return false;
	}
	function get_by_born($born) {
		if(!empty($born)) {
			$this->db->where('born', $born);
			$query = $this->db->get('person');
			return $query->result();
		} else return false;
	}
	function get_by_login($login) {
		if(!empty($login)) {
			$this->db->where('login', $login);
			$query = $this->db->get('person');
			return $query->result();
		} else return false;
	}
	function checkPass($login,$pass){
		if(!empty($login)) {
			$this->db->where('login',$login);
			$query = $this->db->get('person');
			$p=$query->result();
			if($p[0]->pass==$pass){
				return array($p[0]->login,$p[0]->id);
			} else return false;
		}
	}
}
?>