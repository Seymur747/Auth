<?php
ob_start();

    session_start();

//    require('PHPMailer-master/src/PHPMailer.php');
//    require('PHPMailer-master/src/OAuth.php');
//    require('PHPMailer-master/src/Exception.php');
//    require('PHPMailer-master/src/POP3.php');
//    require('PHPMailer-master/src/SMTP.php');
//
//    $mail=new \PHPMailer\PHPMailer\PHPMailer();
//    $mail->isSMTP();
//$mail->SMTPDebug = 2;
//
//$mail->Host = 'smtp.gmail.com';
//$mail->SMTPAuth=true;
//$mail->SMTPSecure='ssl';
//
//$mail->Port = 465;
//
//$mail->Username = 'seymurng@code.edu.az';
//$mail->Password='SEYMUR951159';
//$mail->setFrom('seymurng@code.edu.az','alex');
//$mail->Subject = "lkm";
//$mail->msgHTML("Message");
//$mail->Body='kkk';
//$mail->isHTML(true);
//
//
//$mail->addAddress('seymur-98.98@mail.ru', 'John Doe');
//$mail->Subject = 'PHPMailer SMTP test';
//if (!$mail->send()) {
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message sent!';
//}


    class DataBase{
        public $myRow;

        public  $myData;

        public $name;

        public $email;

        public $password;

        public $queries;


        public function __construct()
        {

       $this->queries=new mysqli();

        }

        public function SignUp($name,$email,$password){

            if(isset($_POST['register']))
            {
                $this->queries->query("Insert into User_info (user_name,user_email,user_password) values ('$name','$email','$password')");
                }
            }

            public  function  SignOut(){

                $_SESSION['id']=null;

            }
            public function SignIn($email,$password){

               $myData= $this->queries->query("Select * from User_info where user_email='$email' and user_password='$password'");

                $myRow= mysqli_fetch_array($myData);


                if (isset($_POST['check'])) {

                    if ($myRow != null) {

                       session_start();

                        $_SESSION['succes']=true;

                        $_SESSION['id']=$myRow['id'];

                        $_SESSION['user_email']=$myRow['user_name'];





                    }
                    else {


                        $_SESSION['fail']='Email or password is incorret';
                    };
                }
//

            }


        }




        $db=new DataBase();

         $db->queries->connect('localhost','root','','AuthDb');

         if(!$db->queries->connect_error){



        $db->SignUp($_POST['name'],$_POST['email'],$_POST['password']);

        $db->SignIn($_POST['email1'],$_POST['password1']);

        if (isset($_POST['exit'])){


            $_SESSION['id']=null;



        }


    }


//    class SignUp{
//
//        public $name;
//        public $email;
//        public $password;
//        public $query;
//        public function __construct()
//        {
//
//            $this->query=new mysqli();
//
//        }
//        public function PostData($name,$email,$password){
//
//
//          $this->query->query("Insert into User_Info values ('$name',$email,$password)");
//        }
//    }
//
//    $db=new DataBase();
//
//
//    $db->conn->connect('localhost','root','','AuthDb');
//
//
//    if ( !$db->conn->connect_error)  {
//
//        if(isset($_POST['register'])) {
//
//
//            $new = new SignUp();
//
//
//
//            $new->PostData($_POST['name'], $_POST['email'], $password['password']);
//
//        }
//
//     }




//
//    $postData->query->query();
//   $q->PostDb('asaa');
//    echo 'aaa';
//    $q->PostDb('aaa');




//


    
    
//
//    $db=new DataBase('localhost','root','','AuthDb');
    
     // echo $db->conn;


    // $db=new DataBase();
    // $db->Connection('localhost','root','','AuthDb');


    //     $d=mysql_connect();



























//$db->connect('');
// $n=new DataBase();

// $n->$conn;
//     $db=mysqli_connect('localhost','root','','AuthDb');//Link to database


//     if(isset($_POST['register'])){
//         $name=$_POST['name'];
//         $email=$_POST['email'];
//         $password=$_POST['password'];
//         $myquery=mysqli_query($db,"Insert into User_info (user_name,user_email,user_password) values ('$name' ,'$email','$password')");

//     }
//     //Sign In

//     if( isset($_POST['enter'])){
//         $email1=$_POST['email1'];

//         $myquery2=mysqli_query($db,"Select id from User_info where user_email='$email1' and user_password='$password1'");
//         $myrow = mysqli_fetch_array($myquery2);
//         if(!empty($email1)&&!empty($password1)) {
//             if ($myrow != null) {
//                 session_start();
//                 $_SESSION['succes'] = true;
//                 $_SESSION['id'] = $myrow['id'];
//                 $_SESSION['user_email'] = $_POST['email1'];
//             }
//             else $_SESSION['error'] = 'Email or password is incorrect';
//         }
//     }
//     //Sign Out
//     if( isset($_POST['exit'])) {
// //        $_SESSION['succes']= null;
//         $_SESSION['id']= null;
//     }

//    //New Password

//     if(isset($_POST['newPassword'])){
 
//         $newEmail=$_POST['newEmail'];

//         $checkEmail=mysqli_query($db,"select * from User_info where user_email='$newEmail'");
//         $myrow2=mysqli_fetch_array($checkEmail);
//         if($myrow2!=null){

//             $random=rand(999,99999);
//             $newPassword=$random;

//             mysqli_query( $db,"update User_info set user_password='$newPassword' where user_email='$newEmail'");

//         }


//     }

?>




