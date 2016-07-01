<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 03:11:20
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52449613257045428019c65-76947458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412fd50456fa4a36bbcfc04966ad7a2e433f893c' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/article.tpl',
      1 => 1457830302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52449613257045428019c65-76947458',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
    'cat' => 0,
    'prev_article' => 0,
    'next_post' => 0,
    'next_article' => 0,
    'related_products' => 0,
    'p' => 0,
    'related_articles' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57045428088d65_45302422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57045428088d65_45302422')) {function content_57045428088d65_45302422($_smarty_tpl) {?>

<!-- Хлебные крошки /-->
<div id="path">
    <a href="./">Главная</a>
    → <a href="articles">Статьи</a>    
    <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article']->value->category->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
    → <a href="articles/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
    <?php } ?>
    →  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->name, ENT_QUOTES, 'UTF-8', true);?>
                
</div>
<!-- Хлебные крошки #End /-->

<!-- Заголовок /-->
<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['article']->value->date);?>
</p>

<!-- Тело поста /-->
<?php echo $_smarty_tpl->tpl_vars['article']->value->text;?>


<!-- Соседние записи /-->
<div id="back_forward">
	<?php if ($_smarty_tpl->tpl_vars['prev_article']->value) {?>
		←&nbsp;<a class="back" id="PrevLink" href="article/<?php echo $_smarty_tpl->tpl_vars['prev_article']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['prev_article']->value->name;?>
</a>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['next_post']->value) {?>
		<a class="forward" id="NextLink" href="article/<?php echo $_smarty_tpl->tpl_vars['next_article']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['next_article']->value->name;?>
</a>&nbsp;→
	<?php }?>
</div>
    
    <?php if ($_smarty_tpl->tpl_vars['related_products']->value) {?>
    <h2>Ссылки на игроков</h2>
    <ul>
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <li><a href="players/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></li>
        <?php } ?>
    </ul>
    <?php }?>
    <br/>
    <br/>
    <?php if ($_smarty_tpl->tpl_vars['related_articles']->value) {?>
    <h2>Также советуем посмотреть</h2>
    <ul>
        <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
        <li><a href="article/<?php echo $_smarty_tpl->tpl_vars['a']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value->name;?>
</a></li>
        <?php } ?>
    </ul>
    <?php }?>
    <br/>
    <br/>



<?php }} ?>
