<?php /* Smarty version Smarty-3.1.18, created on 2016-04-10 00:49:52
         compiled from "/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:935668742570441484060e1-98631025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '929f833ea368fe433c1acc4c9393c2d24808dc17' => 
    array (
      0 => '/var/www/ulafuacom/data/www/ulafua.com/design/amf_v_1_0/html/index.tpl',
      1 => 1460238591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '935668742570441484060e1-98631025',
  'function' => 
  array (
    'dmenu_tree_1' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'categories_tree_image' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570441484fdfa2_10616198',
  'variables' => 
  array (
    'config' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'canonical' => 0,
    'settings' => 0,
    'dmenu' => 0,
    'dm' => 0,
    'sli_langs' => 0,
    'val' => 0,
    'categories' => 0,
    'c' => 0,
    'module' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570441484fdfa2_10616198')) {function content_570441484fdfa2_10616198($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">

	<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
	<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />

	
	<?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
"/><?php }?>



    <!-- design//favicons -->
   
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/favicons/mstile-144x144.png">


	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/normalize.min.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/styles.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/my-style.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/jquery.sidr.light.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/mosaic.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/rs-plugin.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/tooltipster.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/mega.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/skin1.css" rel="stylesheet" type="text/css"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/full.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/media/mediaelementplayer.min.css" rel="stylesheet" type="text/css"/>
    <link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
    
    <link href="/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>

    <link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/rs-plugin/css/settings.css" rel="stylesheet" type="text/css"/>

    <link href='https://fonts.googleapis.com/css?family=Exo+2:400,200,100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>


	
	
	<script src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"  type="text/javascript"></script>
   	
</head>
<body>
<body>

<!-- Pre Header Area -->
<!-- 	<div class="outter-wrapper pre-outter-wrapper pre-header-area header-style-2">
		<div class="wrapper clearfix">

			<div class="pre-header-left left">

				<ul class="social-links boxy">
					<li><a class="fa" title="Facebook" href="#">&#xf09a;</a></li>
					<li><a class="fa" title="Twitter" href="#">&#xf099;</a></li>
					<li><a class="fa" title="Google Plus" href="#">&#xf0d5;</a></li>
					<li><a class="fa" title="RSS" href="#">&#xf09e;</a></li>
				</ul>
			</div>

			<div class="pre-header-right right">

				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="sitemap.html">Pages</a></li>
					<li><a href="styles.html">Typography</a></li>
				</ul>
			</div>

		</div>
	</div>    -->



<!-- Post Header Area -->
<div class="outter-wrapper nav-container post-header-area header-style-2">
    <div class="wrapper logo-container with-menu">

        <!-- Start Mobile Menu Icon -->
        <div id="mobile-header" class="">
            <a id="responsive-menu-button" href="#sidr-main">
                <em class="fa fa-bars"></em> Меню
            </a>
        </div>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_dmenus'][0][0]->get_dmenus_plugin(array('var'=>'dmenu','group_id'=>1),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['dmenu']->value) {?>
            <div id="navigation" class="clearfix">
                <nav class="megamenu_container" style="position: relative;">
                    <ul class="menuHideBtn">
                        <li><a id="closebtn" class="fa" href="#">&#xf00d;</a></li>
                    </ul>
                    <div class="post-header-left left adjust-left">

                        
                        <a class="logo" href="/" style="position: absolute; width: 117px; top: 50%; margin-top: -34px;">
                           
                              
                               
                               <img src="./design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/ULAF_LOGO_MALEN_KOE.png" style="width: 94px;"  alt="ULAF" />
                           
                            
                            <div style="clear: both;"></div>
                        </a>

                    </div>
                    <div class="post-header-right right adjust-right">
                        <ul id="nav" class="right megamenu">
                            <?php if (!function_exists('smarty_template_function_dmenu_tree_1')) {
    function smarty_template_function_dmenu_tree_1($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['dmenu_tree_1']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                                <?php if ($_smarty_tpl->tpl_vars['dmenu']->value) {?>
                                    <?php  $_smarty_tpl->tpl_vars['dm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dm']->key => $_smarty_tpl->tpl_vars['dm']->value) {
$_smarty_tpl->tpl_vars['dm']->_loop = true;
?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['dm']->value->level==1) {?>class="nav-parent"<?php }?>>
                                            <?php if ($_smarty_tpl->tpl_vars['dm']->value->url) {?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['dm']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['dm']->value->level==2&&$_smarty_tpl->tpl_vars['dm']->value->submenus) {?> &nbsp; <em class="fa">&#xf105;</em><?php }?></a>
                                            <?php } else { ?>
                                                <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['dm']->value->level==2&&$_smarty_tpl->tpl_vars['dm']->value->submenus) {?> &nbsp; <em class="fa">&#xf105;</em><?php }?></span>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['dm']->value->submenus) {?>
                                                <ul>
                                                    <?php smarty_template_function_dmenu_tree_1($_smarty_tpl,array('dmenu'=>$_smarty_tpl->tpl_vars['dm']->value->submenus));?>

                                                </ul>
                                            <?php }?>
                                        </li>
                                    <?php } ?>
                                <?php }?>
                            <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

                            <?php smarty_template_function_dmenu_tree_1($_smarty_tpl,array('dmenu'=>$_smarty_tpl->tpl_vars['dmenu']->value));?>

                        </ul>

                    </div>
<div style="clear: both;"></div>
                </nav>

            
                <?php if ($_smarty_tpl->tpl_vars['sli_langs']->value) {?>
                    <ul style="float:right" class="language_switch">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sli_langs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                            
                            <li <?php if ($_smarty_tpl->tpl_vars['val']->value['selected']) {?>class="selected"<?php }?>><a % href='<?php echo $_smarty_tpl->tpl_vars['val']->value['href'];?>
'><img src='/sli/static/img/flags/<?php echo $_smarty_tpl->tpl_vars['val']->value['alias'];?>
.png' alt='<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
'></a></li>
                        <?php } ?>
                    </ul>
                <?php }?>

            </div>





        <?php }?>



    </div>
</div>

<div class="teams-div outter-wrapper pre-outter-wrapper pre-header-area">
        <nav class="megamenu_container" >
            <ul id="teams-list">
                <?php if (!function_exists('smarty_template_function_categories_tree_image')) {
    function smarty_template_function_categories_tree_image($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree_image']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                    <?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
                            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                                
                                <?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['c']->value->image&&$_smarty_tpl->tpl_vars['c']->value->visible_logo) {?>
                                       <li><a href="teams/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['c']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a></li>
                                    <?php }?>
                                <?php }?>
                                <?php smarty_template_function_categories_tree_image($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories));?>

                            <?php } ?>
                    <?php }?>
                <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

                <?php smarty_template_function_categories_tree_image($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value));?>

            </ul>
        </nav>




</div>

<?php if ($_smarty_tpl->tpl_vars['module']->value!='MainView') {?>
<div class="outter-wrapper">
    <div class="wrapper ad-pad clearfix">
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php if ($_smarty_tpl->tpl_vars['module']->value!='MainView') {?>
    </div>
</div>
<?php }?>
        <!-- Start Outter Wrapper -->
<div class="outter-wrapper base-wrapper">
    <div class="wrapper clearfix">
        <div class="left">© ulafua 2016</div>

        <!-- Social Icons -->
        <ul class="social-links right">
         
            <li><a title="Email" href="mailto:info@ulafua.com"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/pochta3.png" alt="ulaf" title="ulaf"/></a></li>
            <li><a target="_blank" title="Facebook" href="https://www.facebook.com/ULAF-1701766046732430"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/cracked-facebook-logo.png" alt="ulaf Facebook" title="ulaf Facebook"/></a></li>
            <li><a title="Vk ulaf"  target="_blank" href="https://vk.com/public116822349"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/logo-V-kontakte.png" alt="ulaf VK" title="ulaf VK"/></a></li>
            <li><a title="Twitter"  target="_blank" href="https://twitter.com/ULAFCOOL"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/twitter2.png" alt="ulaf Twitter" title="ulaf Twitter"/></a></li>
            <li><a title="YouTube"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/Perezagruzka-Youtube-pri-raskryitii-kommentariev.png" alt="ulaf YouTube" title="ulaf YouTube"/></a></li>
            <li><a title="Instagram"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/logo-instagram2.png" alt="ulaf Instagram" title="ulaf Instagram"/></a></li>
        </ul>
    </div>
</div>




<!-- Load jQuery -->
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/vendor/jquery-1.8.3.min.js"></script>





<!-- Start Scripts -->
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.sidr.js"></script>

<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/cleantabs.jquery.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/fitvids.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/media/mediaelement-and-player.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/placeholder.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.stellar.min.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/mosaic.1.0.1.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.isotope.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/toggle.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.tooltipster.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.countdown.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.sticky.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/html5media.js"></script>
<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/slider-2.js"></script>

<script type="text/javascript" src="/design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/main.js"></script>

<?php if ($_SESSION['admin']=='admin') {?>
    <script src ="/js/admintooltip/admintooltip.js" type="text/javascript"></script>
    <link   href="/js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" />
<?php }?>


<script type="text/javascript" src="js/ctrlnavigate.js"></script>


<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" />



    <script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
    <style>
        .autocomplete-suggestions{
            background-color: #ffffff;
            overflow: hidden;
            border: 1px solid #e0e0e0;
            overflow-y: auto;
        }
        .autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
        .autocomplete-suggestions .selected { background:#F0F0F0; }
        .autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
        .autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
    </style>
    <script>
        $(function() {
            //  Автозаполнитель поиска
            $(".input_search").autocomplete({
                serviceUrl:'ajax/search_products.php',
                minChars:1,
                noCache: false,
                onSelect:
                        function(suggestion){
                            $(".input_search").closest('form').submit();
                        },
                formatResult:
                        function(suggestion, currentValue){
                            var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
                            var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
                            return (suggestion.data.image?"<img align=absmiddle src='"+suggestion.data.image+"'> ":'') + suggestion.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
                        }
            });
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-74914852-1', 'auto');
        ga('send', 'pageview');

    </script>
    



</body>
</html><?php }} ?>
