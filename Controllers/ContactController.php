<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Users.php';

class ContactController extends Controller
{
    public function confirmation(){
        var_dump($_POST);
        $Data = $_POST;
        $this->view('contacts/contact-confirmation',['postdate' => $Data]);
        // echo $_SERVER['CONTENT_TYPE'];
        // $name = file_get_contents('tpl://contactform');
        // print_r($_POST);
        // print_r($_POST['name']);
        $err = false;
        // echo $inputName;
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // $inputName = $_POST['name'];
            // $inputName = empty($_POST['name']);
            // $inputKana = empty($_POST['kana']);
            // $inputTel = empty($_POST['tel']);
            // $inputMail = empty($_POST['email']);
            // $inputContact = empty($_POST['text']);

            // echo $inputName;
            // $count_input = mb_strlen($inputName);
            // if($count_input < 1){
            //     exit;
            // } 
            // $count_input = mb_strlen($inputKana);
            // if($count_input < 1){
            //     exit;
            // } 
            // $count_input = mb_strlen($inputTel);
            // if($count_input < 1){
            //     exit;
            // } 
            // $count_input = mb_strlen($inputMail);
            // if($count_input > 1){
            //     return;
            // }else{
            //     // require_once (ROOT_PATH."contacts/contact-confirmation");
            // }

        }else{
            echo'err';
            require_once (ROOT_PATH."contacts/contactform");
        };
        
    }
    
    public function contactform(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $inputName = $_POST['name'];
            $inputKana = $_POST['kana'];
            $inputTel = $_POST['tel'];
            $inputMail = $_POST['email'];
            $inputContact = $_POST['text'];
        }else{
            $this->view('contacts/contactform');
        };
    }

    public function Complete(){
        $this->view('contacts/contactform');
    }
}
    ?>