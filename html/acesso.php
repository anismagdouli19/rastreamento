<?php
    session_start();
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['id'])){
        header("Location: index.php");
	    exit();   
    }
	else{
		if(isset($_SESSION['ultimaAtividade']) && (time() - $_SESSION['ultimaAtividade'] > 600)){
			session_unset();
			session_destroy();
			header("Location: index.php?timeout=1");
			exit();
		}
		else{
			$_SESSION['ultimaAtividade'] = time();
		}
		
		if(!isset($_SESSION['criada'])){
			$_SESSION['criada'] = time();
		} 
		else{
			if(time() - $_SESSION['criada'] > 600) {
				session_regenerate_id(true);
				$_SESSION['criada'] = time();
			}
		}
	}
?>