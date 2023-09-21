<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Users.php';

class UserController extends Controller
{
    public function logIn(){
        if(is_numeric($this->getAuth())){
            // ログイン中の場合はトップページへリダイレクト
            header('Location: /');
            exit();
        }
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        $this->view('user/login');
    }
    
    public function signUp(){
        if(is_numeric($this->getAuth())){
            // ログイン中の場合はトップページへリダイレクト
            header('Location: /');
            exit();
        }
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        $this->view('user/signup', ['errorMessage' => $errorMessages, 'post' => $post]);

    }
    public function create()
    {
        $errorMessages = [];

        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        }

        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }

        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }

        if (empty($_POST['password'])) {
            $errorMessages['password'] = 'パスワードを入力してください';
        }

        if ($_POST['password'] !== $_POST['password-confirmation']) {
            $errorMessages['password-confirmation'] = '確認用パスワードが正しくありません。';
        }

        if (!empty($errorMessages)) {
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST;
            header('Location: /user/sign-up');
        } else {
            //登録処理
            $user = new User;
            $result = $user->create(
                $_POST['name'],
                $_POST['kana'],
                $_POST['email'],
                $_POST['password']
            );

            if (is_numeric($result)) {
                $_SESSION['auth'] = $result;

                $this->view('user/create-complete');
            } else {
                $errorMessages['email'] = 'メールアドレスが既に使用されています。';
                $_SESSION['errorMessages'] = $errorMessages;
                $_SESSION['post'] = $_POST;
                header('Location: /user/signup');
            }
        }

    }

    public function contactform(){
        $this->view('contacts/contactform');
    }

    public function Validation(){
        
        // echo 'aaaaaaaaa';
        $this->view('contacts/contactform');
        $inputName = empty($_POST['inputName']);
        $inputTel = empty($_POST['inputTel']);
        $inputMail = empty($_POST['inputMail']);
        $inputContact = empty($_POST['inputContact']);
        
        // $errorMessages = [];

        // if (empty($_POST['inputName'])) {
        //     $errorMessages['inputName'] = '氏名を入力してください。';
        // }
        // if (empty($_POST['inputTel'])) {
        //     $errorMessages['inputTel'] = 'ふりがなを入力してください。';
        // }

        // if (empty($_POST['emainputMailil'])) {
        //     $errorMessages['inputMail'] = 'メールアドレスを入力してください。';
        // }

        // if (empty($_POST['inputContact'])) {
        //     $errorMessages['inputContact'] = 'お問い合わせ内容を入力してください';
        // }
        
        // if (empty($errorMessages)) {
        //     // バリデーション失敗
        //     $_SESSION['errorMessages'] = $errorMessages;
        //     $_SESSION['post'] = $_POST;
        //     header('Location: /user/contactform');
        // } else {
        //     //登録処理
        //     $user = new contacts;
        //     $result = $user->create(
        //         $_POST['inputName'],
        //         $_POST['inputTel'],
        //         $_POST['inputMail'],
        //         $_POST['inputContact']
        //     );
        //     $this->view('contacts/contact-views');
        //     header('Location: /contacts/contact-views')

            
        // }
        $count_input = mb_strlen($inputName);
        if($count_input < 1){
            exit;
        } 
        $count_input = mb_strlen($inputTel);
        if($count_input < 1){
            exit;
        } 
        $count_input = mb_strlen($inputMail);
        if($count_input > 1){
            return;
        }else{
            require_once (ROOT_PATH."Controllers/Registration.php");;
           }
    }

    public function Complete(){
        $this->view('contacts/contactform');
    }


    /**
     * ログイン状態を取得する
     * @return string|false ログイン状態の場合はuserId  未ログイン状態の場合はfalseを返却する
     */
    public function getAuth(){
        return $_SESSION['auth'] ?? false;
    }
    public function logOut(){
        $_SESSION['auth'] = false;
        header('Location: /');
        exit();}
    public function myPage(){
        $userId = $this->getAuth();
        if($userId === false){
            header('Location: /');
            exit();
        }
    
        $user = new User;
        $result = $user->getMyPage($userId);
        $this->view('user/mypage', ['data' => $result, 'auth' => $userId]);
        }
    }
