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
                                session_start();
                                $_SESSION['username'] = $r[1];
                                $_SESSION['userid'] = $r[0];
                                $_SESSION['role'] = $r[2];
                                echo $_SESSION['username'];
                                break;
                            }
                        }
                            if(!$flag){
                                $location = "\clothbox\public_html\\views\login.php";  
                            }
                            else{
                                $location = "\clothbox\index.php";
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