<?php
    echo "<script>console.log('outside');</script>";
    //echo $_POST['inputEmail'];
    if($_SERVER['REQUEST_METHOD']=='POST'){  
        if(isset($_POST['status'])){
                if($_POST['status'] == "connect"){
                    echo "<script>console.log('inside');</script>";
                    $uname = $_POST['inputEmail'];
                    $upass = $_POST['inputPassword'];
                    //echo $uname;
                    //echo $upass;
                    $query = "select * from users";
                    require_once($_SERVER['DOCUMENT_ROOT'].'\clothbox\resources\config.php');  
                    //echo "hello\n";
                    try {
                        $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $pdostat = $conn->prepare($query);
                        $pdostat->execute();
                        $res = $pdostat->fetchAll(PDO::FETCH_NUM);
                        $flag = false;
                        foreach($res as $r){
                            //echo 'User:'.$r[1].'Pass:'.$r[3].'<br>';
                            if($r[1] === $uname && $r[3]===$upass){
                                $flag = true;
                                echo "<script>console.log('Found');</script>";
                                $query = "Select firstName,lastName from ".$r[2]."s where email='".$uname."'";
                                $pdostat = $conn->prepare($query);
                                $pdostat->execute();
                                $result = $pdostat->fetchAll(PDO::FETCH_NUM);
                                $fname = "";
                                $lname = "";
                                foreach($result as $r1){
                                    $fname = $r1[0];
                                    $lname = $r1[1];
                                }
                                session_start();
                                $_SESSION['username'] = $r[1];
                                $_SESSION['userid'] = $r[0];
                                $_SESSION['role'] = $r[2];
                                $_SESSION['fname']= $fname;
                                $_SESSION['lname'] = $lname;
                                echo $_SESSION['username'];
                                break;
                            }
                        }
                            if(!$flag){
                                $location = "\clothbox\public_html\\views\login.php";  
                            }
                            else{
                                $location = '\clothbox\public_html\views\\';
                                $location.=$_SESSION["role"];
                                $location.='.php';
                            }
                            header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$location);
                        echo "<script>console.log('Connected');</script>";
                    }catch(PDOException $ex){
                        echo "<script>window.alert('Not Connected');</script>";
                    }    
                }
        }
    }
?>