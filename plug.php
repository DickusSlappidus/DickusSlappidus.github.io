<?php

if (isset($_POST['convert']))
{
$name = $_POST['name'];
$amnt = $_POST['amnt'];
$conversion = $_POST['conversion']; 
$gooks = $amnt * 700;
$chooks = $amnt/700;
$GKT="GKT";
$NEO ="NEO";
}
      $conn = new mysqli('localhost','root','','transactionlist');
     if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }
        else {
            if($conversion = "GKT to NEO"){
                $amutcon = $gooks;
                $yeeyee = $NEO;
            } else{
                $amutcon = $chooks;
                $yeeyee = $GKT;
            }
             $Insert = "INSERT INTO myshit(name, amnt, conversion, amutcon) values(?, ?, ?, ?)";
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sdsd",$name, $amnt, $conversion, $amutcon);
                $execval = $stmt->execute();
                print($amutcon . $yeeyee);
                $stmt->close();
                $conn->close();
            }
?>