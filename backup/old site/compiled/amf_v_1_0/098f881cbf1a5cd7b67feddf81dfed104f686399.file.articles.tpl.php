<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 02:07:39
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18742514625704453b5f75d7-78671093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '098f881cbf1a5cd7b67feddf81dfed104f686399' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/articles.tpl',
      1 => 1458440351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18742514625704453b5f75d7-78671093',
  'function' => 
  array (
    'article_categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'article_category' => 0,
    'cat' => 0,
    'keyword' => 0,
    'page' => 0,
    'categories' => 0,
    'c' => 0,
    'category' => 0,
    'article_categories' => 0,
    'articles' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5704453b666d04_59022055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5704453b666d04_59022055')) {function content_5704453b666d04_59022055($_smarty_tpl) {?>
<style>
    .article_categories { margin-bottom: 20px; }
    .article_categories ul { margin-left: 20px; }
</style>
<!-- Хлебные крошки /-->
<div id="path">
    <a href="/">Главная</a>
    
    <?php if ($_smarty_tpl->tpl_vars['article_category']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article_category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
    → <a href="articles/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
    <?php } ?>  
    <?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
    → Поиск
    <?php }?>
</div>
<!-- Хлебные крошки #End /-->

<!-- Заголовок /-->
<h1><?php if ($_smarty_tpl->tpl_vars['page']->value) {?><?php echo $_smarty_tpl->tpl_vars['page']->value->name;?>
<?php } elseif ($_smarty_tpl->tpl_vars['article_category']->value) {?><?php echo $_smarty_tpl->tpl_vars['article_category']->value->name;?>
<?php } else { ?>Полезные статьи<?php }?></h1>

<?php echo $_smarty_tpl->tpl_vars['article_category']->value->description;?>




<?php if (!function_exists('smarty_template_function_article_categories_tree')) {
    function smarty_template_function_article_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['article_categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<ul>
<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
    
    <?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="articles/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
            <?php smarty_template_function_article_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories));?>

        </li>
    <?php }?>
<?php } ?>
</ul>
<?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!$_smarty_tpl->tpl_vars['article_category']->value) {?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_article_categories'][0][0]->get_article_categories_plugin(array('var'=>'article_categories'),$_smarty_tpl);?>

<div class="article_categories">    
<?php smarty_template_function_article_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['article_categories']->value));?>

</div>    
<?php } else { ?>



<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="article_categories">
<?php smarty_template_function_article_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['article_category']->value->subcategories));?>

</div>

<!-- Статьи /-->
<ul id="blog" class="article_list">
    <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
    <li>
        <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h3>
        <h3></h3>
        
        
        <?php echo $_smarty_tpl->tpl_vars['a']->value->text;?>

        <div style="clear:both;"></div>
    </li>
    <?php } ?>
</ul>
<!-- Статьи #End /-->    

<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
<?php }?>


          <?php }} ?>
