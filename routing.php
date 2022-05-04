
<?php 


$controllers=array(
	'jobs'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('jobs','error');
	}		
}else{
	call('jobs','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'jobs':
		require_once('Model/Jobs.php');
		$controller= new UsuarioController();
		break;			
		default:
				# code...  AMAZON
		break;
	}
	$controller->{$action}();
}

?>
