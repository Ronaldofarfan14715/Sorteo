<?php 


$rs=json_decode($_POST['data']);
print_r($rs->{1}->{"c"});

?>