<?php
    function contact(){
        $inputName = $_POST['inputName'];
        $inputTel = $_POST['inputTel'];
        $inputMail = $_POST['inputMail'];
        $inputContact = $_POST['inputContact']; 
    }

 try{$pdo = new PDO('Mysql:host=localhost;dbname=casteria;charset=utf8mb4_bin','root','');
        $query = 'INSERT INTO contacts(name,tel,email,body,created_at)VALUES(:inputName, :inputTel, :inputMail, :inputContact, :now())';
        $pdo->beginTransaction();
        $sth->bindValue(':name',$inputName);
        $sth->bindValue(':tel',$inputTel);
        $sth->bindValue(':email',$inputMail);
        $sth->bindValue(':body',$inputContact);
        $query->execute();

        $pdo->commit();
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }finally{
        $pdo = null;
    }
    // $stmt = $this->dbh->prepare($query);
    // $params = array(':inputName' => 'test', ':inputTel' => '01000001111',':inputMail' => 'xxxxxx@xxxxx.xx.xx', ':inputContact' => 'test');
    // header('Location: /contacts/contact-views');

?>
