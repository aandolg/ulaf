<?php /* Smarty version Smarty-3.1.18, created on 2016-05-07 21:01:37
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1639020300572e2d8147acf5-97971827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82c95e0e2fdeb9d19050d0c5b64d326fc53effd3' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/login.tpl',
      1 => 1456869750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1639020300572e2d8147acf5-97971827',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572e2d81540c36_64108763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572e2d81540c36_64108763')) {function content_572e2d81540c36_64108763($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/login", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Вход", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
   
<h1>Вход</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='login_incorrect') {?>Неверный логин или пароль
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_disabled') {?>Ваш аккаунт еще не активирован.
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>

<form class="form login_form" method="post">
	<label>Email</label>
	<input type="text" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" />

    <label>Пароль (<a href="user/password_remind">напомнить</a>)</label>
    <input type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" />

	<input type="submit" class="button" name="login" value="Войти">
</form><?php }} ?>
