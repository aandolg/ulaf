<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">

	<base href="{$config->root_url}/"/>
	<title>{$meta_title|escape}</title>
	
	{* Метатеги *}
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="{$meta_description|escape}" />
	<meta name="keywords"    content="{$meta_keywords|escape}" />

	{* Канонический адрес страницы *}
	{if isset($canonical)}<link rel="canonical" href="{$config->root_url}{$canonical}"/>{/if}



    <!-- design/{*{$settings->theme|escape}*}/favicons -->
   {* <link rel="apple-touch-icon" sizes="57x57" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="{$config->root_url}/design/{$settings->theme|escape}/favicons/favicon-32x32.png" sizes="32x32">*}
    <link rel="icon" href="{$config->root_url}/design/{$settings->theme|escape}/images/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="design/{$settings->theme|escape}/favicons/mstile-144x144.png">

{* Стили *}
	<link href="design/{$settings->theme|escape}/css/normalize.min.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/styles.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/my-style.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/jquery.sidr.light.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/mosaic.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/rs-plugin.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/tooltipster.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/mega.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/skin1.css" rel="stylesheet" type="text/css"/>
	<link href="design/{$settings->theme|escape}/css/full.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href="design/{$settings->theme|escape}/js/media/mediaelementplayer.min.css" rel="stylesheet" type="text/css"/>
    <link href="design/{$settings->theme|escape}/js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
    {*<link href="design/{$settings->theme|escape}/js/fancybox/jquery.fancybox.css-v=2.1.4.css" rel="stylesheet" type="text/css"/>*}
    <link href="/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>

    <link href="design/{$settings->theme|escape}/js/rs-plugin/css/settings.css" rel="stylesheet" type="text/css"/>

    <link href='https://fonts.googleapis.com/css?family=Exo+2:400,200,100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>


	{* JQuery *}
	{*<script src="js/jquery/jquery.js"  type="text/javascript"></script>*}
	<script src="/design/{$settings->theme|escape}/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"  type="text/javascript"></script>
   	{* Всплывающие подсказки для администратора *}
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
        {get_dmenus var=dmenu group_id=1}
        {if $dmenu}
            <div id="navigation" class="clearfix">
                <nav class="megamenu_container" style="position: relative;">
                    <ul class="menuHideBtn">
                        <li><a id="closebtn" class="fa" href="#">&#xf00d;</a></li>
                    </ul>
                    <div class="post-header-left left adjust-left">

                        {*<a class="logo" href="/" style="    position: absolute;width: 170px;top: 50%;margin-top: -18px;">*}
                        <a class="logo" href="/" style="position: absolute; width: 117px; top: 50%; margin-top: -34px;">
                           {*<div class="new_l">*}
                              {* <div class="name_l">Ulaf</div>
                                <div class="sub_logo">Ukrainian league of American football</div>*}
                               {*<img src="./design/{$settings->theme|escape}/img/logo_3t.png" height="50" width="200"  alt="ULAF" />*}
                               <img src="./design/{$settings->theme|escape}/img/ULAF_LOGO_MALEN_KOE.png" style="width: 94px;"  alt="ULAF" />
                           {*</div>*}
                            {*<img src="./design/{$settings->theme|escape}/img/logo_ulaf.png" style="width:50px;" alt="ULAF" />*}
                            <div style="clear: both;"></div>
                        </a>

                    </div>
                    <div class="post-header-right right adjust-right">
                        <ul id="nav" class="right megamenu">
                            {function name=dmenu_tree_1}
                                {if $dmenu}
                                    {foreach $dmenu as $dm}
                                        <li {if $dm->level==1}class="nav-parent"{/if}>
                                            {if $dm->url}
                                                <a href="{$dm->url}">{$dm->name|escape} {if $dm->level==2 && $dm->submenus} &nbsp; <em class="fa">&#xf105;</em>{/if}</a>
                                            {else}
                                                <span>{$dm->name|escape} {if $dm->level==2 && $dm->submenus} &nbsp; <em class="fa">&#xf105;</em>{/if}</span>
                                            {/if}
                                            {if $dm->submenus}
                                                <ul>
                                                    {dmenu_tree_1 dmenu=$dm->submenus}
                                                </ul>
                                            {/if}
                                        </li>
                                    {/foreach}
                                {/if}
                            {/function}
                            {dmenu_tree_1 dmenu=$dmenu}
                        </ul>

                    </div>
<div style="clear: both;"></div>
                </nav>

            
                {if $sli_langs}
                    <ul style="float:right" class="language_switch">
                        {foreach $sli_langs as $val}
                            {*{var_dump($val)}*}
                            <li {if $val['selected']}class="selected"{/if}><a % href='{$val['href']}'><img src='/sli/static/img/flags/{$val['alias']}.png' alt='{$val['title']}' title='{$val['title']}'></a></li>
                        {/foreach}
                    </ul>
                {/if}

            </div>





        {/if}



    </div>
</div>

<div class="teams-div outter-wrapper pre-outter-wrapper pre-header-area">
        <nav class="megamenu_container" >
            <ul id="teams-list">
                {function name=categories_tree_image}
                    {if $categories}
                            {foreach $categories as $c}
                                {* Показываем только видимые категории *}
                                {if $c->visible}
                                    {if $c->image && $c->visible_logo}
                                       <li><a href="teams/{$c->url}"><img src="{$config->categories_images_dir}{$c->image}" alt="{$c->name|escape}" title="{$c->name|escape}"></a></li>
                                    {/if}
                                {/if}
                                {categories_tree_image categories=$c->subcategories}
                            {/foreach}
                    {/if}
                {/function}
                {categories_tree_image categories=$categories}
            </ul>
        </nav>




</div>

{if $module!='MainView'}
<div class="outter-wrapper">
    <div class="wrapper ad-pad clearfix">
{/if}
{$content}
{if $module!='MainView'}
    </div>
</div>
{/if}
        <!-- Start Outter Wrapper -->
<div class="outter-wrapper base-wrapper">
    <div class="wrapper clearfix">
        <div class="left">© ulafua 2016</div>

        <!-- Social Icons -->
        <ul class="social-links right">
         {*   <li><a class="fa" target="_blank" title="Facebook" href="https://www.facebook.com/ULAF-1701766046732430"><img src="/design/{$settings->theme|escape}/img/facebook.png" alt="ulaf Facebook" title="ulaf Facebook"/></a></li>
            <li><a title="Vk ulaf"  target="_blank" href="https://vk.com/public116822349"><i class="fa fa-vk"></i></a></li>
            <li><a title="Twitter"  target="_blank" href="https://vk.com/public116822349"><img src="/design/{$settings->theme|escape}/img/twitter.png" alt="ulaf Twitter" title="ulaf Twitter"/></a></li>
            <li><a title="YouTube"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/{$settings->theme|escape}/img/youtube.png" alt="ulaf YouTube" title="ulaf YouTube"/></a></li>
            <li><a title="Instagram"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/{$settings->theme|escape}/img/instagram.png" alt="ulaf Instagram" title="ulaf Instagram"/></a></li>*}
            <li><a title="Email" href="mailto:info@ulafua.com"><img src="/design/{$settings->theme|escape}/img/pochta3.png" alt="ulaf" title="ulaf"/></a></li>
            <li><a target="_blank" title="Facebook" href="https://www.facebook.com/ULAF-1701766046732430"><img src="/design/{$settings->theme|escape}/img/cracked-facebook-logo.png" alt="ulaf Facebook" title="ulaf Facebook"/></a></li>
            <li><a title="Vk ulaf"  target="_blank" href="https://vk.com/public116822349"><img src="/design/{$settings->theme|escape}/img/logo-V-kontakte.png" alt="ulaf VK" title="ulaf VK"/></a></li>
            <li><a title="Twitter"  target="_blank" href="https://twitter.com/ULAFCOOL"><img src="/design/{$settings->theme|escape}/img/twitter2.png" alt="ulaf Twitter" title="ulaf Twitter"/></a></li>
            <li><a title="YouTube"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/{$settings->theme|escape}/img/Perezagruzka-Youtube-pri-raskryitii-kommentariev.png" alt="ulaf YouTube" title="ulaf YouTube"/></a></li>
            <li><a title="Instagram"  target="_blank" href="https://www.instagram.com/ULAFCOOL/"><img src="/design/{$settings->theme|escape}/img/logo-instagram2.png" alt="ulaf Instagram" title="ulaf Instagram"/></a></li>
        </ul>
    </div>
</div>




<!-- Load jQuery -->
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/vendor/jquery-1.8.3.min.js"></script>





<!-- Start Scripts -->
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.sidr.js"></script>
{*<script type="text/javascript" src="/design/{$settings->theme|escape}/js/fancybox/jquery.fancybox.js-v=2.1.4.js"></script>*}
<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/cleantabs.jquery.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/fitvids.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/media/mediaelement-and-player.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/placeholder.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.stellar.min.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/mosaic.1.0.1.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.isotope.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/toggle.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.tooltipster.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.countdown.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/jquery.sticky.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/html5media.js"></script>
<script type="text/javascript" src="/design/{$settings->theme|escape}/js/slider-2.js"></script>

<script type="text/javascript" src="/design/{$settings->theme|escape}/js/main.js"></script>

{if $smarty.session.admin == 'admin'}
    <script src ="/js/admintooltip/admintooltip.js" type="text/javascript"></script>
    <link   href="/js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" />
{/if}

{* Ctrl-навигация на соседние товары *}
<script type="text/javascript" src="js/ctrlnavigate.js"></script>

{* js-проверка форм *}
<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" />

{* Автозаполнитель поиска *}
{literal}
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
    
{/literal}


</body>
</html>