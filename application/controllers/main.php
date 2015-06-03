<?
class Main extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('Person');
		$this->load->model('Kved');
		$this->load->model('Sex');
		$this->load->model('LegalEntity');
		$this->load->model('Work_for');
		$this->load->model('BankAccount');
	}
	public function index()
	{	
		if(!$this->input->cookie('login')){
			redirect('/main/author/', 'refresh');
		}else{
			$login=$this->input->cookie('login');
		}
		$person=$this->Person->get_by_login($login);
		if($person){
			$data['fio']=$person[0]->surname.' '.$person[0]->name.' '.$person[0]->secondname;
			$data['id']=$person[0]->id;
			$this->load->view('main_view',$data);
		}else echo "DataBase of Persons is empty";
	}
	public function author($error="")
	{	
		$data['error']=$error;
		$this->load->view('author_view',$data);
	}
	public function author_action()
	{	
		$pass=$this->Person->checkPass($_POST['login'],$_POST['pass']);
		if(!$pass){
			redirect('/main/author/'.urlencode('Не вірний логін чи пароль'), 'refresh');
		}else{
			$this->input->set_cookie('login',$pass[0],'86500');
			$this->input->set_cookie('id',$pass[1],'86500');
			redirect('/', 'refresh');
		}
	}
	public function regist($error="")
	{	
		$data['error']=$error;
		$data['sex']=$this->Sex->get_all();
		$this->load->view('regist_view',$data);
	}
	public function regist_action()
	{	
		$login=$this->Person->get_by_login($_POST['login']);
		if(!$login){
			$col=count($this->Person->get_by_born($_POST['born']))+1;
			if(empty($_POST['photo'])){$_POST['photo']='';}
			$data=array(
				'id'=>_generateIPN($_POST['born'],$col),
				'login'=>$_POST['login'],
				'pass'=>$_POST['pass'],
				'name'=>$_POST['name'],
				'secondname'=>$_POST['secondname'],
				'surname'=>$_POST['surname'],
				'sex'=>$_POST['sex'],
				'born'=>$_POST['born'],
				'photo'=>$_FILES['photo']['name']
			);
			$this->Person->insert_new($data);
			
			$path='./data/photo/';
			$file=$path.basename($_FILES['photo']['name']);
			move_uploaded_file($_FILES['photo']['tmp_name'], $file);
			
			redirect('/main/author/', 'refresh');
		}else{
			redirect('/main/regist/'.urlencode('Такий логін вже зайнятий'), 'refresh');
		}
	}
	public function del_cookie()
	{	
		delete_cookie('login');
		redirect('/main/author/', 'refresh');
	}
	public function inform()
	{	
		$person=$this->Person->get_by_id($this->input->cookie('id'));
		if($person){
			$data['fio']=$person[0]->surname.' '.$person[0]->name.' '.$person[0]->secondname;
			$eng = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$ua   = array("січня", "лютого", "березня", "квітня", "травня", "червня", "липня", "серпня", "вересня", "жовтня", "листопада", "грудня");
			$data['born'] = str_replace($eng, $ua, date("d F Y", strtotime($person[0]->born)));
			$data['ipn'] = $person[0]->id;
			$sex=$this->Sex->get_by_id($person[0]->sex);
			$data['sex']=$sex[0]->name;
			if($person[0]->photo==null){
				$data['photo']='imgres.jpg';
			}else{
				$data['photo']=$person[0]->photo;
			}
			$this->load->view('inform_view',$data);
		}else echo "DataBase of Persons is empty";
	}
	public function createlentity($error="")
	{	
		if(!$this->input->cookie('login')){
			redirect('/main/author/', 'refresh');
		}else{
			$data['id']=$this->input->cookie('id');
			$data['error']=$error;
			$this->load->view('createlentity_view',$data);
		}
	}
	public function createlentityaction()
	{	
		if(empty($_POST['name'])){
			redirect('/main/createlentity/'.urlencode('Назву не вказано'), 'refresh');
		}else if(empty($_POST['state'])){
			redirect('/main/createlentity/'.urlencode('Область не вказано'), 'refresh');
		}else if(empty($_POST['town'])){
			redirect('/main/createlentity/'.urlencode('Місто/Село не вказано'), 'refresh');
		}else if(empty($_POST['str'])){
			redirect('/main/createlentity/'.urlencode('Вулиця не вказана'), 'refresh');
		}else{
			$address=$_POST['state'].' обл., '.$_POST['town'].', вул. '.$_POST['str'].', буд. '.$_POST['house'].', кв. '.$_POST['room'];
		}
		$col=count($this->LegalEntity->get_all())+1;
		$data=array(
				'id'=>sprintf("%'.08d",$col),
				'name'=>$_POST['name'],
				'owner_id'=>$this->input->cookie('id'),
				'address'=>$address,
				'create_date'=>Date("Y-m-d")
			);
		$this->LegalEntity->insert_new($data);
		redirect('/main/setkved/', 'refresh');
	}
	public function setkved()
	{	
		if(!$this->input->cookie('login')){
			redirect('/main/author/', 'refresh');
		}else{
			$data['id']=$this->input->cookie('id');
			$this->load->view('setkved_view',$data);
		}
	}
	public function mywork()
	{	
		if(!$this->input->cookie('login')){
			redirect('/main/author/', 'refresh');
		}else{
			$id=$this->input->cookie('id');
			$data['work_for']=$this->Work_for->get_by_person($id);
			$data['lentity']=$this->LegalEntity->get_by_ownerId($id);
			$this->load->view('mywork_view',$data);
		}
	}
	public function mycount()
	{	
		if(!$this->input->cookie('login')){
			redirect('/main/author/', 'refresh');
		}else{
			$id=$this->input->cookie('id');
			$data['accounts']=$this->BankAccount->get_by_userId($id);
			$this->load->view('mycount_view',$data);
		}
	}
}
function _timestamp2xl($timestamp){
		return round(($timestamp/86400)+25568);
}
function _generateIPN($born,$col){
	$date=_timestamp2xl(strtotime($born)); 
	$num=sprintf("%'.04d",$col);
	$e=$date.$num;
	$last=(($e[0]*(-1)+$e[1]*5+$e[2]*7+$e[3]*9+$e[4]*4+$e[5]*6+$e[6]*10+$e[7]*5+$e[8]*7)%11)%10;
	return $date.$num.$last;
}
?>