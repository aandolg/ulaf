<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 01:51:49
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80496217857044185bb14d8-79857181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c151ad21a7228933bb0cc003802213333b6a5fb' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/blog.tpl',
      1 => 1457240603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80496217857044185bb14d8-79857181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
    'config' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57044185bff3d9_97568536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57044185bff3d9_97568536')) {function content_57044185bff3d9_97568536($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/blog", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

        

        <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
            <div class="post-excerpt clearfix">
                <div class="col-1-3 mosaic-block circle">

                        <a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
" class="mosaic-overlay link" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" style="display: inline;"></a>
                        <div class="mosaic-backdrop" style="display: block;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['post']->value->image) {?><?php echo $_smarty_tpl->tpl_vars['config']->value->posts_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['post']->value->image;?>
<?php } else { ?>design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/brand.jpg<?php }?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/>
                        </div>
                </div>

                <div class="col-2-3 last">
                    <h3><a data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
" href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
                    <p class="lead"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>
</p>…<a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
" class="read-more">Читать полностью</a></p>
                </div>
            </div>
        <?php } ?>

        <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
