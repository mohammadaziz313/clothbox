<?php
    $query="";
    require_once($_SERVER['DOCUMENT_ROOT'].'\clothbox\resources\config.php');
    echo "<script>console.log('here');</script>";
    
    if(isset($_GET['search']) && !empty($_GET['search'])){
        
        try{
            $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $password);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if(isset($_GET['type']) && $_GET['type']==='email'){
                //echo "here";
                $query = "SELECT email from users where email='".$_GET['search']."'";
                //echo $query;
                $pdostat=$conn->prepare($query);
                $pdostat->execute();
                $res=$pdostat->fetchAll(PDO::FETCH_NUM);
                $flag = empty($res);
                //var_dump($res);
                $innercontent="";
                if(!$flag){
                    $innercontent='<span class="glyphicon glyphicon-warning-sign" style="color:red"></span> Email already taken';
                }
                else{
                    $innercontent='<span class="glyphicon glyphicon-ok" style="color:green"></span> Email available';
                }
                //foreach($res as $innarr){        
                  //  if($innarr[0])
                    //$innercontent=$innercontent."<tr><td>$innarr[1]</td><td>$innarr[2]</td><td>$innarr[6]</td><td>$innarr[9]</td></tr>";
                //}  
            
            echo "$innercontent";
            }
        }catch(PDOException $ex){
            echo "Error in ajax section";
        }
    }
    
?>

