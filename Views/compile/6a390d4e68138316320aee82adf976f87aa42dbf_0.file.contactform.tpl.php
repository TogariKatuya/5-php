<?php
/* Smarty version 4.3.2, created on 2023-09-21 10:54:01
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\contactform.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_650ba239d88a43_84321784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a390d4e68138316320aee82adf976f87aa42dbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\contactform.tpl',
      1 => 1695261238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650ba239d88a43_84321784 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php echo '<script'; ?>
 defer src="../js/validation.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">お問い合わせ</h2>
            <form action="contact-views()" method="post" class="bg-white p-3 rounded mb-5">
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" name="email" id="inputMail" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group">
                    <label for="email">電話番号</label>
                    <input type="tell" class="form-control" name="tel" id="inputTel" placeholder="00000000000" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group">
                    <label for="email">お問い合わせ内容</label>
                    <input type="text" class="form-control" name="contact" id="inputContact" placeholder="お問い合わせ" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div action='UserController.php' method="post">
                    <button type='button' class='submit' name="add" id="btnSubmit" href="/user/contact-views">内容確認</button>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <a href="/">トップページへ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body><?php }
}
