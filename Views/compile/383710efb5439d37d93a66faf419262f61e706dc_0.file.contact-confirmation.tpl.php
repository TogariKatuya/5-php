<?php
/* Smarty version 4.3.2, created on 2023-09-27 11:10:00
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\contact-confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65138ef8e100e5_66639593',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '383710efb5439d37d93a66faf419262f61e706dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\contact-confirmation.tpl',
      1 => 1695779353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65138ef8e100e5_66639593 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form method='POST'">
        <div class="container-field" >
                <div class="form-wrapper">
                    <h1>お問い合わせ内容</h1>
                    <table>
                        <div class="element_wrap">
                            <label>氏名</label>
                            <input type="text" class="form-control" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>フリガナ</label>
                            <input type="text" class="form-control" name="kana" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>メールアドレス</label>
                            <input type="text" class="form-control" name="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <div class="element_wrap">
                            <label>電話番号</label>
                            <input type="text" class="form-control" name="tel" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div> 
                        <div class="element_wrap">
                            <label>お問い合わせ内容</label>
                            <input type="text" class="form-control" name="text" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"readonly>
                        </div>
                        <p> <class="label-text">上記の内容でよろしいですか。</p>   
                        <input type="submit" name="btn_back" action="/contacts/contactform" value="キャンセル">
                        <input type="submit" name="btn_submit" action="/contacts/contact-complete" value="送信">
                    </table>
                </div>
        </div>
    </form>
</body><?php }
}
