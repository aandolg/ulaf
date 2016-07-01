<?php /* Smarty version Smarty-3.1.18, created on 2016-04-06 01:51:23
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16256256575704416b9bf9d2-02705269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c5db8c3a14e38f946ae0121a7500135f6d08be9' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/products.tpl',
      1 => 1457893367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16256256575704416b9bf9d2-02705269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'brand' => 0,
    'keyword' => 0,
    'cat' => 0,
    'page' => 0,
    'gen_image' => 0,
    'current_page_num' => 0,
    'image' => 0,
    'config' => 0,
    'b' => 0,
    'features' => 0,
    'f' => 0,
    'key' => 0,
    'o' => 0,
    'products' => 0,
    'sort' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5704416bb1f5c8_90480514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5704416bb1f5c8_90480514')) {function content_5704416bb1f5c8_90480514($_smarty_tpl) {?>


<?php if ($_smarty_tpl->tpl_vars['category']->value&&$_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/teams/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['category']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/teams/".((string)$_smarty_tpl->tpl_vars['category']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/brands/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products?keyword=".$_tmp1, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php }?>

<!-- Хлебные крошки /-->
<div id="path">
	<a href="/">Главная</a>
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
	→ <a href="teams/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php } ?>  
	<?php if ($_smarty_tpl->tpl_vars['brand']->value) {?>
	→ <a href="teams/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php }?>
	<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>
	→ <a href="brands/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	→ Поиск
	<?php }?>
</div>
<!-- Хлебные крошки #End /-->



<div class="main-content col-1-1 right last">
    
    <?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
        <h1>Поиск <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value) {?>
        <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php } else { ?>
        <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['category']->value->images) {?>
        <?php $_smarty_tpl->tpl_vars['gen_image'] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['category']->value->images), null, 0);?>
        <div class="col-1-1"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['gen_image']->value->filename,1120,750);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
" title="<?php echo $_smarty_tpl->tpl_vars['category']->value->title;?>
"></div>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
        
        <?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>

        <?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

    <?php }?>
    <hr>

   <?php if (count($_smarty_tpl->tpl_vars['category']->value->images)>1) {?>
        <div class="clearfix teams">
            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
?>
                <?php if ($_smarty_tpl->tpl_vars['image']->index==0) {?><?php continue 1?><?php }?>
                    <div class="col-1-3 boxy <?php if ($_smarty_tpl->tpl_vars['image']->last) {?>last<?php }?>">
                        <div class="mosaic-block circle"><a href="teams/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
"  class="mosaic-overlay link fancybox" data-fancybox-group="gallery" title="<?php echo $_smarty_tpl->tpl_vars['image']->value->fio;?>
 <?php echo $_smarty_tpl->tpl_vars['image']->value->pos_in_foto;?>
" style="display: inline; opacity: 0;"></a>
                            <div class="mosaic-backdrop" style="display: block;"><img src="/<?php echo $_smarty_tpl->tpl_vars['config']->value->original_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value->fio;?>
"></div></div>
                        <div class="inner-box">
                            <h2><!-- <a href="teams/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" > --><?php echo $_smarty_tpl->tpl_vars['image']->value->fio;?>
<!-- </a> --></h2>
                            <h5><?php echo $_smarty_tpl->tpl_vars['image']->value->pos_in_foto;?>
</h5>
                           
                        </div>
                    </div>
            <?php } ?>
        </div>
    <?php }?>


    <!-- <a href="#top" class="btn-3 xsmall-btn right fa"></a>
    <h3 id="section3">Under 12 Kids</h3>
    <div class="clearfix teams">


        <div class="col-1-5 boxy">
            <img src="img/face.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face2.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face3.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face4.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy last">
            <img src="img/face5.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face6.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face7.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face8.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy">
            <img src="img/face9.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>


        <div class="col-1-5 boxy last">
            <img src="img/face10.jpg"  alt="Mock" />
            <div class="inner-box">
                <h6>James Doe</h6>
                <em>Position</em>
            </div>
        </div>

    </div>

     -->

    <!-- Finish Main Content -->
</div>






<?php if ($_smarty_tpl->tpl_vars['category']->value->brands) {?>
<div id="brands">
	<a href="teams/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" <?php if (!$_smarty_tpl->tpl_vars['brand']->value->id) {?>class="selected"<?php }?>>Все бренды</a>
	<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['b']->value->image) {?>
		<a data-brand="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" href="teams/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['b']->value->url;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->brands_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['b']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
		<?php } else { ?>
		<a data-brand="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" href="teams/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['b']->value->url;?>
" <?php if ($_smarty_tpl->tpl_vars['b']->value->id==$_smarty_tpl->tpl_vars['brand']->value->id) {?>class="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
		<?php }?>
	<?php } ?>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>

<?php echo $_smarty_tpl->tpl_vars['brand']->value->description;?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
<table id="features">
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
	<tr>
	<td class="feature_name" data-feature="<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
">
		<?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>
:
	</td>
	<td class="feature_values">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->tpl_vars['f']->value->id=>null,'page'=>null)),$_smarty_tpl);?>
" <?php if (!$_GET[$_smarty_tpl->tpl_vars['key']->value]) {?>class="selected"<?php }?>>Все</a>
		<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value->options; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->tpl_vars['f']->value->id=>$_smarty_tpl->tpl_vars['o']->value->value,'page'=>null)),$_smarty_tpl);?>
" <?php if ($_GET[$_smarty_tpl->tpl_vars['key']->value]==$_smarty_tpl->tpl_vars['o']->value->value) {?>class="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
</a>
		<?php } ?>
	</td>
	</tr>
	<?php } ?>
</table>
<?php }?>


<!--Каталог товаров-->
<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>


<?php if (count($_smarty_tpl->tpl_vars['products']->value)>0) {?>
<div class="sort">
	Сортировать по 
	<a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='position') {?> class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'position','page'=>null),$_smarty_tpl);?>
">умолчанию</a>
	
	<a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name') {?>     class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name','page'=>null),$_smarty_tpl);?>
">названию</a>
</div>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!-- Список товаров-->
<ul class="products">

	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
		<div class="image">
			<a href="players/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,200,200);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
		</div>
		<?php }?>
		<!-- Фото товара (The End) -->

		<div class="product_info">
		<!-- Название товара -->
		<h3 class="<?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?>featured<?php }?>"><a data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" href="players/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
		<!-- Название товара (The End) -->

		<!-- Описание товара -->
		<div class="annotation"><?php echo $_smarty_tpl->tpl_vars['product']->value->annotation;?>
</div>
		<!-- Описание товара (The End) -->
		
		
		
		
			
			
			
				
					
				
				
					
				
				
					
					
				
			
			
			
			
		
		
		
			
		

		</div>
		
	</li>
	<!-- Товар (The End)-->
	<?php } ?>
			
</ul>

<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
<!-- Список товаров (The End)-->

<?php } else { ?>
    
<?php }?>
<!--Каталог товаров (The End)--><?php }} ?>
