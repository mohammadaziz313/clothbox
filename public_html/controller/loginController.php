<?php
    //echo "<script>console.log('outside');</script>";
    //echo $_POST['inputEmail'];
    if($_SERVER['REQUEST_METHOD']=='POST'){  
        if(isset($_POST['status'])){
                if($_POST['status'] == "connect"){
                    echo "<script>console.log('inside');</script>";
                    $uname = $_POST['inputEmail'];
                    $password = $_POST['inputPassword'];
                    $query = "Select * from users where email='".$uname."'password='".$password."'";
                    require_once($_SERVER['DOCUMENT_ROOT'].'\clothbox\resources\config.php');  
                    try {
                        $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        /*
                        $flag=false;
                        $pdostat = $conn->prepare($query);
                        $pdostat->execute();
                        $res = $pdostat->fetchAll(PDO::FETCH_NUM);
                        $flag = false;
                        if(isset($_POST['email']) && isset($_POST['pass'])){
                            $uName = $_POST['uname'];
                            $uPass = $_POST['pass'];
                            echo $uName.$uPass;
                            foreach($res as $r){
                                echo 'User:'.$r[0].'Pass:'.$r[1].'<br>';
                                if($r[0] === $uName && $r[1]===$uPass){
                                    $flag = true;
                                    echo "<script>console.log('Found');</script>";
                                        break;
                                    }
                            }
                            if(!$flag){
                            $location = "/login/login.php";  
                            }
                            else{
                                $location = "/login/home.php";
                            }
                            header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$location);
                        }
                    */
                        echo "<script>console.log('Connected');</script>";
                    
                    }catch(PDOException $ex){
                        echo "<script>window.alert('Not Connected');</script>";
                    }    
                }
        }
    }
?>