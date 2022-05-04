<?php 
require_once('connection.php');	
class UsuarioController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Jobs/bienvenido.php');
	}

	function register(){
		require_once('Views/Jobs/register.php');
	}

	function save(){
		if (!isset($_POST['status'])) {
			$status="of";
		}else{
			$status="on";
		}
		$jobs= new Jobs(null, $_POST['name'],$_POST['description'],$status);

		Jobs::save($jobs);
		$this->show();
	}

	function show(){
		$listaJobs=Jobs::all();

		require_once('Views/Jobs/show.php');
	}

	function updateshow(){
		$id=$_GET['idJobs'];
		$jobs=Jobs::searchById($id);
		require_once('Views/Jobs/updateshow.php');
	}


	function update(){
		$jobs = new Jobs($_POST['id'],$_POST['name'],$_POST['description'],$_POST['status']);
		Jobs::update($jobs);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Jobs::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$jobs=Jobs::searchById($id);
			$listaJobs[]=$jobs;
			//var_dump($id);
			//die();
			require_once('Views/Jobs/show.php');
		} else {
			$listaJobs=Jobs::all();

			require_once('Views/Jobs/show.php');
		}
		
		
	}

	function error(){
		require_once('Views/Jobs/error.php');
	}

}

?>