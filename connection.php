<?php
//Connecting to database file

$host = "webpagesdb.it.auth.gr";
$user="ss_pspi";
$password ="_1iWol25";
$db="lathanag_pspi";

$link= @mysqli_connect($host,$user,$password,$db);

if(!$link){
    echo "Problem connecting to the database, please try again later";
}