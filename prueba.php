<?php
	$inicio 		=	true;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
	$login			=	false;
	
	$men= "INICIO";
	include("includes/header.php");
?>
<?php 
    function imprimirTiempo($time){
        date_default_timezone_set('America/Lima');
        $start_date = new DateTime($time);
        $since_start = $start_date->diff(new DateTime(date("Y-m-d")." ".date("H:i:s")));
        echo "Hace ";
        if($since_start->y==0){
            if($since_start->m==0){
                if($since_start->d==0){
                   if($since_start->h==0){
                       if($since_start->i==0){
                          if($since_start->s==0){
                             echo $since_start->s.' segundos';
                          }else{
                              if($since_start->s==1){
                                 echo $since_start->s.' segundo'; 
                              }else{
                                 echo $since_start->s.' segundos'; 
                              }
                          }
                       }else{
                          if($since_start->i==1){
                              echo $since_start->i.' minuto'; 
                          }else{
                            echo $since_start->i.' minutos';
                          }
                       }
                   }else{
                      if($since_start->h==1){
                        echo $since_start->h.' hora';
                      }else{
                        echo $since_start->h.' horas';
                      }
                   }
                }else{
                    if($since_start->d==1){
                        echo $since_start->d.' día';
                    }else{
                        echo $since_start->d.' días';
                    }
                }
            }else{
                if($since_start->m==1){
                   echo $since_start->m.' mes';
                }else{
                    echo $since_start->m.' meses';
                }
            }
        }else{
            if($since_start->y==1){
                echo $since_start->y.' año';
            }else{
                echo $since_start->y.' años';
            }
        }
    }


?>
<div class="section2">
    <br>
        <h1>Hola 2019-11-11 11:39:37</h1>
        <h2><?php 
            $time = "2019-11-17 11:39:37";
            imprimirTiempo($time);
        ?>
        </h2>
</div>
<?php 
include("includes/footer.php");
?>