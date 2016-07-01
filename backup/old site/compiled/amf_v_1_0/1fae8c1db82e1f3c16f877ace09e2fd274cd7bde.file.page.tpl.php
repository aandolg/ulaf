<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 02:15:11
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231084812570446ffca4618-77683036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fae8c1db82e1f3c16f877ace09e2fd274cd7bde' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/page.tpl',
      1 => 1458427981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231084812570446ffca4618-77683036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570446ffce17d2_20760235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570446ffce17d2_20760235')) {function content_570446ffce17d2_20760235($_smarty_tpl) {?>        


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<!-- Заголовок страницы -->
<h1 data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<!-- Тело страницы -->


    <?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>


    
    
<?php }} ?>
