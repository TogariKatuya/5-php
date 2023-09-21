<?php
/* Smarty version 4.3.2, created on 2023-09-20 16:58:52
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\contact-views.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_650aa63c66f682_23980142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '418ce8693f99202f5191daa5882ae53dda0e7afc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\contact-views.tpl',
      1 => 1695196516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650aa63c66f682_23980142 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="main">
    <div class="container-field" >
            <div class="form-wrapper">
                <h1>お問い合わせ内容</h1>
                <div class="form-item">
                    <p class="label-text">氏名</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">ふりがな</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->kana;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">メールアドレス</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->email;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">お問い合わせ内容</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->body;?>
</p>
                </div>
                <div class="form-item">
                    <p class="label-text">上記の内容でよろしいですか。/p>
                </div>
                <div class="edit-button">
                    <a href="/user/edit" class="button">キャンセル</a>
                    <a href="/user/edit" class="button">送信</a>
                </div>
            </div>
    </div>
</body><?php }
}
