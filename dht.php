<?php
class dht11{
 public $link='';
 function __construct($nama, $suhu){
  $this->connect();
  $this->storeInDB($nama, $suhu);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'temp') or die('Cannot select the DB');
 }
 
 function storeInDB($nama, $suhu){
  $query = "insert into temp set nama='".$nama."', suhu='".$suhu."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['nama'] != '' and  $_GET['suhu'] != ''){
 $dht11=new dht11($_GET['nama'],$_GET['suhu']);
}


?>
