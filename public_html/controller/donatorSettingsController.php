<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['status']) && $_POST['status']=='connect'){
            if(isset($_POST['oldpass']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
                $oldpass = $_POST['oldpass'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                session_start();
                $uname = $_SESSION['username'];
                $query = "select user_id from users where email='".$uname."' and password='".$oldpass."'";
                require_once($_SERVER['DOCUMENT_ROOT'].'\clothbox\resources\config.php');  
                try {
                    $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdostat = $conn->prepare($query);
                    $pdostat->execute();
                    $res = $pdostat->fetchAll(PDO::FETCH_NUM);
                    $flag = false;
                    $id = 0;
                    foreach($res as $r){
                        if(!empty($r[0])){
                            $id = $r[0];
                            $flag = true;
                        }
                        break;
                    }
                    if($flag){
                        if($pass1 === $pass2){
                            $query = "UPDATE users SET password='$pass1' where user_id='$id'";
                            $pdostat = $conn->prepare($query);
                            $pdostat->execute();
                        }
                    }
                    else{
                        $_SESSION['mismatch'] = true;
                        echo 'mismatch';
                    }
                }catch(PDOException $ex){
                    echo "<script>window.alert('Not Connected');</script>";
                }
            }
            echo 'complete';
            $location="\clothbox\public_html\\views\donator\settings.php";
            //echo $location;
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$location);
        }
    }
    
?>