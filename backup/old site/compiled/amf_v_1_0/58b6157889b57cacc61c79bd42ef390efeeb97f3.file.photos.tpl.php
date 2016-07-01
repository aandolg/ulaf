<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 01:54:31
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/photos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:460844745570442273726a4-40951519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58b6157889b57cacc61c79bd42ef390efeeb97f3' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/photos.tpl',
      1 => 1457692107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '460844745570442273726a4-40951519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'album' => 0,
    'brand' => 0,
    'cat' => 0,
    'page' => 0,
    'albums' => 0,
    'sa' => 0,
    'config' => 0,
    'photos' => 0,
    'photo' => 0,
    'current_page_num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57044227427037_17433288',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57044227427037_17433288')) {function content_57044227427037_17433288($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['album']->value) {?>
    <?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/photos/".((string)$_smarty_tpl->tpl_vars['album']->value->url)."/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/photos", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php }?>


<div id="path">
    <a href="/">Главная</a>
    → <a href="/photos">Фотогалерея</a>
    <?php if ($_smarty_tpl->tpl_vars['album']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
            →
            <a href="photos/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
        <?php } ?>
    <?php }?>
</div>


<?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
    <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<?php } else { ?>
    <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['album']->value&&$_smarty_tpl->tpl_vars['album']->value->subcategories) {?>
    <div class="col-1-1">
        <?php  $_smarty_tpl->tpl_vars['sa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['albums']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sa']->key => $_smarty_tpl->tpl_vars['sa']->value) {
$_smarty_tpl->tpl_vars['sa']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['sa']->value->visible) {?>
                <div class="gallery-section clearfix">
                    <div class="col-1-4">
                        <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h3>
                        <?php echo $_smarty_tpl->tpl_vars['sa']->value->description;?>
 <a href="photos/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" class="read-more">Все фото.</a></p>
                    </div>

                    <div class="col-3-4 last">
                        <div class="mosaic-block circle">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['sa']->value->image;?>
" class="mosaic-overlay fancybox" style="display: inline; opacity: 0;"></a>

                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['sa']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        <?php } ?>
    </div>
    
<?php } elseif ($_smarty_tpl->tpl_vars['album']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['photos']->value) {?>
        <div class="gallery-section clearfix">
            <div class="col-4-4 last thumb-gallery super-list variable-sizes clearfix isotope">
                <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['photo']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['photo']->iteration++;
?>
                    <div class="col-1-3 element cat-1 isotope-item <?php if ($_smarty_tpl->tpl_vars['photo']->iteration%3==0) {?> last<?php }?>">
                        <div class="mosaic-block circle">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['photo']->value->filename;?>
"  class="mosaic-overlay fancybox" data-fancybox-group="gallery" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value->description, ENT_QUOTES, 'UTF-8', true);?>
" style="display: inline;"></a>
                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['photo']->value->filename;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value->description, ENT_QUOTES, 'UTF-8', true);?>
">
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        
    <?php } else { ?>
        Альбом пуст
    <?php }?>
<?php } else { ?>
    <div class="col-1-1">
        <?php  $_smarty_tpl->tpl_vars['sa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['albums']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sa']->key => $_smarty_tpl->tpl_vars['sa']->value) {
$_smarty_tpl->tpl_vars['sa']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['sa']->value->visible) {?>
                <div class="gallery-section clearfix">
                    <div class="col-1-4">
                        <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h3>
                        <?php echo $_smarty_tpl->tpl_vars['sa']->value->description;?>
 <a href="photos/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" class="read-more">Все фото.</a></p>
                    </div>

                    <div class="col-3-4 last">
                        <div class="mosaic-block circle">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['sa']->value->image;?>
" class="mosaic-overlay fancybox" style="display: inline; opacity: 0;"></a>

                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->photos_categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['sa']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sa']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        <?php } ?>
    </div>
    
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

<?php if ($_smarty_tpl->tpl_vars['album']->value&&$_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
    <?php echo $_smarty_tpl->tpl_vars['album']->value->description;?>

<?php }?>


<?php }} ?>
