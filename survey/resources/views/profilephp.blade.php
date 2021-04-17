<?php
class user_details{
    public function __construct($str1,$num1,$str2,$str3){
        $this->name=$str1;
        $this->age=$num1;
        $this->email=$str2;
        $this->date_of_birth=$str3;
    }
    public function getname(){
        return $this->name;
    }
    public function getage(){
        return $this->age;
    }
    public function getmail(){
        return $this->email;
    }
    public function getdob(){
        return $this->date_of_birth;
    }
}
echo " <body style='background-color:#246a94;height: 550px; '><div style='margin-left: 350px; margin-right: 380px;   background-color: white ;margin-top: 150px; padding-top: 15px;padding-bottom: 15px;padding-left: 10px;'> ";
$user=new user_details($name,$age,$email,$dob);
date_default_timezone_set("Asia/Calcutta");
echo "<h3>Name: ".$user->getname()."</h3>";
echo "<h3>Email: ".$user->getmail()."</h3>";
echo "<h3>Date of Birth: ".$user->getdob()."</h3>";
echo "<h3>Age: ".$user->getage()."</h3>";
echo "<h3>Today is " . date("Y/m/d") . "</h3>";
echo "<h3>Time " . date("h:i:s") . "</h3>";
echo "<table border='1' width='500px'>
<tr><th>Name</th><th>Age</th><th>Date of Birth</th><th>Submitted On</th></tr>
<tr><td>".$user->getname()."</td><td>".$user->getage()."</td><td>".$user->getdob()."</td><td>".date("Y/m/d")."</td></tr>
</table></div></body>";

