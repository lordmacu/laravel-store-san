<?php 

return array(
 
    'driver' => 'smtp',
 
    'host' => '142.4.13.154',
 
    'port' => 465,
 
    'from' => array('address' => 'administrador@misanvictorino.com.co', 'name' => 'Misanvictorino '),
 
    'encryption' => 'tls',
 
    'username' => 'administrador@misanvictorino.com.co',
 
    'password' => 'sanvict_12',
 
    'sendmail' => '/usr/sbin/sendmail -bs',   
   
    'pretend' => false,
 
);