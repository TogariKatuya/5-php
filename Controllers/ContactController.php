<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{
    
    public function confirmation(){
        
        $Data = $_POST;

        // リファラーを取得
        $referer = @$_SERVER['HTTP_REFERER'];

        // リファラーが存在しない場合、直接アクセスとみなしエラーメッセージを表示
        if (empty($referer)) {
            die('このページへの直接アクセスは禁止されています。');
            header('Location: /contacts/contactform');
        }
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $receivedToken = $_POST['csrf_token'];
        //     // セッション内のCSRFトークンをコンソールに表示
        //     echo 'セッション内のCSRFトークン: ' . $_SESSION['csrf_token'] . PHP_EOL;
        //     // // フォームデータ内のトークンをコンソールに表示
        //     // echo 'フォームデータ内のCSRFトークン: ' . $receivedToken . PHP_EOL;

        //     if (!isset($_SESSION['csrf_token']) || $receivedToken !== $_SESSION['csrf_token']) {
        //         die('CSRF攻撃の可能性があるため、処理を中止しました。');
        //     }
        // }
       
        
        $this->view('contacts/contact-confirmation',['post' => $Data]);
        $err = false;
        // var_dump($Data);
        $inputName = ($Data['name']);
        $inputKana = ($Data['kana']);
        $inputTel = ($Data['tel']);
        $inputMail = ($Data['email']);
        $inputContact = ($Data['text']);
        // 確認用
        // var_dump($inputName);
        // var_dump($inputKana);
        // var_dump($inputTel);
        // var_dump($inputMail);
        // var_dump($inputContact);
        
        // 送信ボタン
        if (isset($_POST['btn_submit'])) {
            // var_dump($Data);
            $count_input = mb_strlen($inputName);
            if($count_input < 1){
                
                exit;
            } 
            $count_input = mb_strlen($inputKana);
            if($count_input < 1){
                
                exit;
            } 
            $count_input = mb_strlen($inputTel);
            if($count_input < 1){
                
                exit;
            } 
            $count_input = mb_strlen($inputMail);
            if($count_input < 1){
                var_dump($count_input);
                
                return;
            }else{
                echo(1);
                $errorMessages = [];
                // var_dump($Data);
                if (empty($Data['name'])) {
                    $errorMessages['name'] = '氏名を入力してください。';
                    echo(2);
                 
                }

                if (empty($Data['kana'])) {
                    $errorMessages['kana'] = 'ふりがなを入力してください。';
                    echo(3);
                    
                }

                if (empty($Data['email'])) {
                    $errorMessages['email'] = 'メールアドレスを入力してください。';
                    echo(4);
                   
                }

                if (empty($Data['tel'])) {
                    $errorMessages['tel'] = '電話番号を入力してください';
                    echo(5);
                    
                }

                if (empty($Data['text'])) {
                    $errorMessages['text'] = 'お問い合わせ内容を入力してください';
                    echo(6);
                    
                }
                // var_dump($errorMessages);
                if (!empty($errorMessages)) {
                    // バリデーション失敗
                    echo(7);
                    $_SESSION['errorMessages'] = $errorMessages;
                    $_SESSION['post'] = $_POST;
                    // header('Location: /contacts/contactform');
                    return;
                } else {
                    //登録処理
                    echo(8);
                    $Contact = new Contact;
                    $result = $Contact->create(
                        $Data['name'],
                        $Data['kana'],
                        $Data['email'],
                        $Data['tel'],
                        $Data['text']
                    );
                    header('Location: /contacts/contact-complete');
                }         
                $this->view('contacts/contact-complete',['post' => $Data]);

            }
            
        }
        // キャンセルボタン
        if (isset($_POST['btn_back'])) {
            $_SESSION['post'] = $Data; // 現在のデータをセッションに保存
            header('Location: /contacts/contactform');
            return;   
        }
    }
    
    
    public function contactform(){
        // var_dump($post);
        
        // // CSRFトークンを生成
        // $csrf_token = '';
        // $csrf_token = bin2hex(random_bytes(32));
        // // セッションにCSRFトークンを格納
        // $_SESSION['csrf_token'] = $csrf_token;
        // // 生成したトークンをセッションに保存します
        // $_SESSION['csrf_token'] = $csrf_token;
        // // var_dump($csrf_token);
 
            $Contact = new Contact;
            $record = $Contact->index();
        if (!empty($_SESSION['post'])){
            $post = $_SESSION['post'];
            $post = $this->escapeFormData($post);
            $this->view('contacts/contactform',['post' => $post,'posts' => $record]);
            // // var_dump($record);
            // if (isset($_POST['update'])) {
            //     $post = $this->escapeFormData($_POST);
            //     // echo'AAAAAAA';
            //     $_SESSION['post'] = $post; // 現在のデータをセッションに保存
            //     header('Location: /contacts/update');
            // }
        }else{
            $this->view('contacts/contactform',['posts' => $record]);
        }
    }

    private function escapeFormData($data){
        if (is_array($data)) {
            return array_map([$this, 'escapeFormData'], $data);
            
        } else {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
    }

    public function Complete(){

        // リファラーを取得
        $referer = @$_SERVER['HTTP_REFERER'];

        // リファラーが存在しない場合、直接アクセスとみなしエラーメッセージを表示
        if (empty($referer)) {
            die('このページへの直接アクセスは禁止されています。');
            header('Location: /contacts/contactform');
        }else{
            $this->view('contacts/contact-complete');
        }
    }

    public function update(){
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // =============================================
            
            // GETリクエストで編集ページを表示する処理
            // URLからidを取得
            $url = $_SERVER['REQUEST_URI'];
            $params = explode('/', $url);
            $id = end($params);
            $contactId = preg_replace('/[^0-9]/', '', $id);
            // =============================================
                // var_dump($contactId);

            // GETリクエストで編集ページを表示する処理
            $contact = new Contact;
            $rowData = $contact->getContactData($contactId);
            // var_dump($rowData);
            $this->view('contacts/update', ['rowData' => $rowData]);
        } 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // POSTリクエストでデータを更新する処理
            //  var_dump($contactId); 
            // echo'AAAAA';
            // var_dump( $_POST);
            // if (isset($_POST['btnSubmit'])) {
                $contactId = $_POST['id'];
                $name = $_POST['name'];
                $kana = $_POST['kana'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $text = $_POST['text'];
                // var_dump($text);
                $errors = array();
            
                // 氏名のバリデーション
                if (empty($name)) {
                    $errors[] = '氏名を入力してください。';
                } elseif (mb_strlen($name, 'UTF-8') > 10) {
                    $errors[] = '氏名は10文字以内で入力してください。';
                }
                
                // フリガナのバリデーション
                if (empty($kana)) {
                    $errors[] = 'フリガナを入力してください。';
                } elseif (mb_strlen($kana, 'UTF-8') > 10) {
                    $errors[] = 'フリガナは10文字以内で入力してください。';
                }
                
                // 電話番号のバリデーション (数字かどうかをチェック)
                if (!empty($tel) && !preg_match('/^[0-9]+$/', $tel)) {
                    $errors[] = '電話番号は数字のみで入力してください。';
                }
                
                // メールアドレスのバリデーション
                if (empty($email)) {
                    $errors[] = 'メールアドレスを入力してください。';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = '有効なメールアドレスを入力してください。';
                }
                
                // お問い合わせ内容のバリデーション
                if (empty($text)) {
                    $errors[] = 'お問い合わせ内容を入力してください。';
                }
                
                // エラーがある場合はエラーメッセージを表示して処理を中断
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        // var_dump($_POST);
                        
                        $_SESSION['rowData'] = $_POST;
                        $contact = new Contact;
                        $rowData = $contact->getContactData($contactId);
                        // var_dump($rowData);
                        $this->view('contacts/update', ['rowData' => $rowData]);
                        // $this->view('contacts/update',['rowData' => $_POST]);
                        $_SESSION['errorMessages'] = $errors;
                    }
                
                }else{
            
                // バリデーションが成功した場合にデータを更新
                $contact = new Contact;
                $result = $contact->update($contactId, $name, $kana, $email, $tel, $text);
                
                header('Location: /contacts/contactform');
                exit;
                }
            // }   
        
            // if (isset($_POST['btn_back'])) {
            //     $_SESSION['post'] = $Data; // 現在のデータをセッションに保存
            //     header('Location: /contacts/contactform');
            //     return;   
            // }
        }
    
       
    }

    public function delete(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // POSTリクエストで削除を実行する処理
            $contactId = $_GET['id'];
            
            $contact = new Contact;
            $result = $contact->deleteContact($contactId);
    
            header('Location: /contacts/contactform');
            exit;
            
        }
    }
    
}

    ?>