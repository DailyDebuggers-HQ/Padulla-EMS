<?php $c = file_get_contents("C:/xampp/htdocs/EMS/modules/payments/pay.php"); if(substr(bin2hex($c), 0, 6) == "efbbbf"){ echo "Has BOM"; }else{ echo "Clean. Starts with: ".substr($c,0,5); } ?>
