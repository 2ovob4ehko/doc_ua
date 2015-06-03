<?
class BankAccount extends CI_Model {

	var $id ='';
	var $userId ='';
	var $bankId ='';
	var $valutaId ='';
	var $typeId ='';
	var $num ='';
	var $balance ='';
	var $open ='';
	var $close ='';
	
	function __construct()
    {
        parent:: __construct();
    }
	function get_by_id($id) {
		if(!empty($id)) {
			$this->db->where('id', $id);
			$query = $this->db->get('bank_account');
			return $query->result();
		} else return false;
	}
	function get_by_userId($id) {
		if(!empty($id)) {
			$this->db->select('*,legal_entity.name as `legal_name`,account_type.name as `account_type`,valuta.name as `valuta`');
			$this->db->from('bank_account');
			$this->db->join('legal_entity', 'legal_entity.id = bank_account.bank_id');
			$this->db->join('account_type', 'account_type.id = bank_account.type_id');
			$this->db->join('valuta', 'valuta.id = bank_account.valuta_id');
			$this->db->where('user_id', $id);
			$query = $this->db->get();
			return $query->result();
		} else return false;
	}
}
?>