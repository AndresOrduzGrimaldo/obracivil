<?php

    if($_SESSION['id_usuario'])
    { 
      session_destroy();
      header("Location:index.php");
    }
    else
    {
      header("Location:index.php");
    }



?>