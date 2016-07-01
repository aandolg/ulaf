<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 10:50:54
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7564714955704bfdec89723-42959121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc12f729182ca85317c3d5c15f656fd61cb31235' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/feedback.tpl',
      1 => 1457473090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7564714955704bfdec89723-42959121',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5704bfdecbffa0_29043665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5704bfdecbffa0_29043665')) {function content_5704bfdecbffa0_29043665($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>





	


	
	
		
		
		
		
		
		
		
		
		
	
	
	
	
 
	
	
	
	
	

	

	
	
	

<?php }} ?>
