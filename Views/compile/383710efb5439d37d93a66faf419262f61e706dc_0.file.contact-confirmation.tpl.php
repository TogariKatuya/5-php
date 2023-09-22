<?php
/* Smarty version 4.3.2, created on 2023-09-22 14:10:33
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\contact-confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_650d21c999ff27_42196205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '383710efb5439d37d93a66faf419262f61e706dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\contact-confirmation.tpl',
      1 => 1695359412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650d21c999ff27_42196205 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <form action ="/contacts/contact-complete" method='POST'">
        <div class="container-field" >
                <div class="form-wrapper">
                    <h1>お問い合わせ内容</h1>
                    <table>
                        <div class="element_wrap">
                            <label>氏名</label>
                            <input type="text" class="form-control" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>フリガナ</label>
                            <input type="text" class="form-control" name="kana" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>メールアドレス</label>
                            <input type="text" class="form-control" name="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>電話番号</label>
                            <input type="text" class="form-control" name="tel" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div> 
                        <div class="element_wrap">
                            <label>お問い合わせ内容</label>
                            <input type="text" class="form-control" name="text" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <p> <class="label-text">上記の内容でよろしいですか。</p>   
                        <input type="submit" name="btn_back" value="キャンセル">
                        <input type="submit" name="btn_submit" value="送信">
                    </table>
                    <div class="form-item">
                        
                        <input type="hidden" name="token" value="<?php echo '<?php'; ?>
 echo $token; <?php echo '?>'; ?>
">
                    </div>
                </div>
        </div>
    </form>
</body><?php }
}
