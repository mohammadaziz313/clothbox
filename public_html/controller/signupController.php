<?php
    echo "<script>console.log('outside');</script>";
    //echo $_POST['inputEmail'];
    if($_SERVER['REQUEST_METHOD']=='POST'){  
        if(isset($_POST['status'])){
                if($_POST['status'] == "connect"){
                    echo "<script>console.log('inside');</script>";
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $upass1 = $_POST['pass1'];
                    $upass2 = $_POST['pass2'];
                    $uname = $_POST['email1'];
                    
                    if(isset($_POST['check1']))
                        $role = $_POST['check1'];
                    else
                        $role = $_POST['check2'];
                    
                    echo $fname." ";
                    echo $lname." ";
                    echo $upass1." ";
                    echo $upass2." ";
                    echo $uname." ";
                    echo $role;
                    
                    $query1 = "INSERT INTO users(email,password,role) VALUES('$uname','$upass1','$role')";
                    $query2 = "INSERT INTO ".$role."s(email,firstName,lastName) VALUES('$uname','$fname','$lname')";
                    echo $query2;
                    require_once($_SERVER['DOCUMENT_ROOT'].'\clothbox\resources\config.php');  
                    echo "<script>console.log('here');</script>";
                    try {
                        $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //$pdostat = $conn->prepare($query);
                        echo "<script>console.log('here2');</script>";
                        $conn->exec($query1);
                        echo "<script>console.log('here3');</script>";
                        $conn->exec($query2);
                        echo "<script>console.log('here4');</script>";
                        //$res = $pdostat->fetchAll(PDO::FETCH_NUM);
                        //$flag = false;
                        //foreach($res as $r){
                            //echo 'User:'.$r[1].'Pass:'.$r[3].'<br>';
                            //if($r[1] === $uname && $r[3]===$upass){
                              //  $flag = true;
                               // echo "<script>console.log('Found');</script>";
                                session_start();
                                $_SESSION['username'] = $uname;
                                //$_SESSION['userid'] = $r[0];
                                $_SESSION['role'] = $role;
                                echo $_SESSION['username'];
                               // break;
                            //}
                        //}
                          //  if(!$flag){
                             //   $location = "\clothbox\public_html\\views\login.php";  
                           // }
                            //else{
                                $location = "\clothbox\index.php";
                            //}
                            header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$location);
                        echo "<script>console.log('Connected');</script>";
                    }catch(PDOException $ex){
                        echo "<script>window.alert('Not Connected');</script>";
                    }  
                }
        }
    }
?>