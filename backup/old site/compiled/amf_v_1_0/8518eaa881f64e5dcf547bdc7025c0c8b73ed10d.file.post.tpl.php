<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 01:57:53
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:979212687570442f1e63099-85520570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8518eaa881f64e5dcf547bdc7025c0c8b73ed10d' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/post.tpl',
      1 => 1457826586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '979212687570442f1e63099-85520570',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570442f1e9d217_95484737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570442f1e9d217_95484737')) {function content_570442f1e9d217_95484737($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/news/".((string)$_smarty_tpl->tpl_vars['post']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


        <!-- Start Main Column  -->
        <div class="col-xs-12">
            <div class="clearfix post">
                <h1 class="title" data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
                <?php if ($_smarty_tpl->tpl_vars['post']->value->image) {?>
                <div class="mosaic-block circle" style="text-align: center;background: #0D1A3B;">
                    
                    <img style="width: auto!important;" src="<?php echo $_smarty_tpl->tpl_vars['config']->value->posts_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['post']->value->image;?>
" alt="Mock"></div>
            </div>
            <?php }?>

            <h6 class="meta"><a class="date" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</a></h6>
            <?php echo $_smarty_tpl->tpl_vars['post']->value->text;?>

        </div>



<div style="clear: both;"></div>
       
    </div>

<?php }} ?>
