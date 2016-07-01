<?php /* Smarty version Smarty-3.1.18, created on 2016-05-07 21:01:41
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/password_remind.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275424123572e2d85a058f0-95218508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c16dafa8088c63b20da6443826f6753252b403' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/password_remind.tpl',
      1 => 1456869750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275424123572e2d85a058f0-95218508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email_sent' => 0,
    'email' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572e2d85a674d3_92427629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572e2d85a674d3_92427629')) {function content_572e2d85a674d3_92427629($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/password_remind", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php if ($_smarty_tpl->tpl_vars['email_sent']->value) {?>
<h1>Вам отправлено письмо</h1>

<p>На <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
 отправлено письмо для восстановления пароля.</p>
<?php } else { ?>
<h1>Напоминание пароля</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found') {?>Пользователь не найден
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>

<form class="form" method="post">
	<label>Введите email, который вы указывали при регистрации</label>
	<input type="text" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
"  maxlength="255"/>
	<input type="submit" class="button_submit" value="Вспомнить" />
</form>
<?php }?><?php }} ?>
