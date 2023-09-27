<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ</title>
   
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="main">
    <form method='POST'">
        <div class="container-field" >
                <div class="form-wrapper">
                    <h1>お問い合わせ内容</h1>
                    <table>
                        <div class="element_wrap">
                            <label>氏名</label>
                            <input type="text" class="form-control" name="name" value="{$post['name']|default:''}"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>フリガナ</label>
                            <input type="text" class="form-control" name="kana" value="{$post['kana']|default:''}"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>メールアドレス</label>
                            <input type="text" class="form-control" name="email" value="{$post['email']|default:''}"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>電話番号</label>
                            <input type="text" class="form-control" name="tel" value="{$post['tel']|default:''}"readonly>
                        </div> 
                        <div class="element_wrap">
                            <label>お問い合わせ内容</label>
                            <input type="text" class="form-control" name="text" value="{$post['text']|default:''}"readonly>
                        </div>
                        <p> <class="label-text">上記の内容でよろしいですか。</p>   
                        <input type="submit" name="btn_back" action="/contacts/contactform" value="キャンセル">
                        <input type="submit" name="btn_submit" action="/contacts/contact-complete" value="送信">
                    </table>
                </div>
        </div>
    </form>
</body>