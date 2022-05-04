<?php 
/**
* 
*/
class Jobs
{
	private $id;
	private $name;
	private $description;
	private $status;

	
	function __construct($id, $name, $description, $status)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setDescription($description);
		$this->setStatus($status);		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getStatus(){

		return $this->status;
	}

	public function setStatus($status){
		
		if (strcmp($status, 'on')==0) {
			$this->status=1;
		} elseif(strcmp($status, '1')==0) {
			$this->status='checked';
		}elseif (strcmp($status, '0')==0) {
			$this->status='of';
		}else {
			$this->status=0;
		}

	}

	public static function save($jobs){
		$db=Db::getConnect();


		$insert=$db->prepare('INSERT INTO jobs VALUES (NULL,:name,:description,:status)');
		$insert->bindValue('name',$jobs->getName());
		$insert->bindValue('description',$jobs->getDescription());
		$insert->bindValue('status',$jobs->getStatus());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaJobs=[];

		$select=$db->query('SELECT * FROM jobs order by id');

		foreach($select->fetchAll() as $jobs){
			$listaJobs[]=new Jobs($jobs['id'],$jobs['name'],$jobs['description'],$jobs['status']);
		}
		return $listaJobs;
	}

//FILTER BY ID

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM jobs WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$jobsDb=$select->fetch();


		$jobs = new Jobs ($jobsDb['id'],$jobsDb['name'], $jobsDb['description'], $jobsDb['status']);
		return $jobs;
	}

	public static function update($jobs){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE jobs SET name=:name, description=:description, status=:status WHERE id=:id');
		$update->bindValue('name', $jobs->getName());
		$update->bindValue('description',$jobs->getDescrisption());
		$update->bindValue('status',$jobs->getStatus());
		$update->bindValue('id',$jobs->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM jobs WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>