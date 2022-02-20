<?php 
include 'connection.php';
$Item = file_get_contents("php://input");//diplay data
$request = json_decode($Item);//insert data
//$request =  (object) array("updatetype"=>"check","email"=>"ram@gmail.com","password"=>"ram123");
if(isset($request->updatetype)  && ($request->updatetype == 'add')){//check random assigned var coming inside
    $updatetype= $request->updatetype;
$fname = $request->first;
$lname = $request->last;
$email = $request->email;
$passcode = $request->pwd;
$code = md5($passcode);
$firstname ="";
$already = $mysqli ->query("SELECT * FROM login WHERE email='$email'");
while($row = $already->fetch_assoc()){
        $firstname = $row['firstname'];
        }
 if($firstname !=""){
    echo json_encode(array('status'=>"already"));
    //echo "sucess";
 }
else{
    $mysqli ->query("INSERT INTO login (firstname,lastname,email,password) VALUES ('$fname','$lname','$email','$code')") or die($mysqli->error);  
   echo json_encode(array('status'=>"inserted"));
    //echo "failed";
}
}



if(isset($request->updatetype)  && ($request->updatetype == 'check')){//check random assigned var coming inside
     $updatetype= $request->updatetype;
   
    $email= $request->email;
    $password= $request->password;
    $pass= md5($password);
    $firstname ="";
    $result = $mysqli ->query("SELECT firstname FROM login WHERE email='$email' AND password='$pass'");
    while($row = $result->fetch_assoc()){
        $firstname = $row['firstname'];
        }
 if($firstname !=""){
    echo json_encode(array('status'=>"sucess"));
    //echo "sucess";
 }
else{
    echo json_encode(array('status'=>"fail"));
    //echo "failed";
}

}

        



?>