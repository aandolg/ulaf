<?php /* Smarty version Smarty-3.1.18, created on 2016-03-13 02:49:56
         compiled from "simpla/design/html/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184567009556e4b7c085eec7-32881521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a68718851a33b807abd76a4d5fc5f059a9acbbbd' => 
    array (
      0 => 'simpla/design/html/article.tpl',
      1 => 1457830071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184567009556e4b7c085eec7-32881521',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e4b7c090db25_28755194',
  'variables' => 
  array (
    'manager' => 0,
    'article' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'cats' => 0,
    'category' => 0,
    'cat' => 0,
    'level' => 0,
    'categories' => 0,
    'related_products' => 0,
    'related_product' => 0,
    'related_articles' => 0,
    'related_article' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e4b7c090db25_28755194')) {function content_56e4b7c090db25_28755194($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
    <li><a href="index.php?module=BlogAdmin">Блог</a></li>
    <?php if (in_array('articles',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ArticlesAdmin','id'=>null,'page'=>null),$_smarty_tpl);?>
">Статьи</a></li>
	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ArticleCategoriesAdmin','id'=>null,'page'=>null),$_smarty_tpl);?>
">Категории статей</a></li><?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['article']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['article']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новая статья', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<script src="design/js/jquery/datepicker/jquery.ui.datepicker-ru.js"></script>
<script src="design/js/autocomplete/jquery.autocomplete-min.js"></script>

<script>
$(function() {

        
    // Удаление связанноq статьи
    $(".related_articles a.delete").live('click', function() {
         $(this).closest("div.row").fadeOut(200, function() { $(this).remove(); });
         return false;
    });

    // Добавление связанной статьи 
    var new_related_article = $('#new_related_article').clone(true);
    $('#new_related_article').remove().removeAttr('id');
 
    $("input#related_articles").autocomplete({
        serviceUrl:'ajax/search_articles.php',
        minChars:0,
        noCache: false, 
        onSelect:
            function(suggestion){
                $("input#related_articles").val('').focus().blur(); 
                new_item = new_related_article.clone().appendTo('.related_articles');
                new_item.removeAttr('id');
                new_item.find('a.related_article_name').html(suggestion.data.name);
                new_item.find('a.related_article_name').attr('href', 'index.php?module=ArticleAdmin&id='+suggestion.data.id);
                new_item.find('input[name*="related_articles"]').val(suggestion.data.id);
                new_item.show();
            },
        formatResult:
            function(suggestions, currentValue){
                var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
                var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
                  return suggestions.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
            }       

    });
        
    // Удаление связанного товара
    $(".related_products a.delete").live('click', function() {
         $(this).closest("div.row").fadeOut(200, function() { $(this).remove(); });
         return false;
    });

    // Добавление связанного товара 
    var new_related_product = $('#new_related_product').clone(true);
    $('#new_related_product').remove().removeAttr('id');
 
    $("input#related_products").autocomplete({
        serviceUrl:'ajax/search_products.php',
        minChars:0,
        noCache: false, 
        onSelect:
            function(suggestion){
                $("input#related_products").val('').focus().blur(); 
                new_item = new_related_product.clone().appendTo('.related_products');
                new_item.removeAttr('id');
                new_item.find('a.related_product_name').html(suggestion.data.name);
                new_item.find('a.related_product_name').attr('href', 'index.php?module=ProductAdmin&id='+suggestion.data.id);
                new_item.find('input[name*="related_products"]').val(suggestion.data.id);
                if(suggestion.data.image)
                    new_item.find('img.product_icon').attr("src", suggestion.data.image);
                else
                    new_item.find('img.product_icon').remove();
                new_item.show();
            },
        formatResult:
            function(suggestions, currentValue){
                var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
                var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
                  return (suggestions.data.image?"<img align=absmiddle src='"+suggestions.data.image+"'> ":'') + suggestions.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
            }
    });
 
 

    $('input[name="date"]').datepicker({
        regional:'ru'
    });
    
    // Автозаполнение мета-тегов
    meta_title_touched = true;
    meta_keywords_touched = true;
    meta_description_touched = true;
    url_touched = true;
    
    if($('input[name="meta_title"]').val() == generate_meta_title() || $('input[name="meta_title"]').val() == '')
        meta_title_touched = false;
    if($('input[name="meta_keywords"]').val() == generate_meta_keywords() || $('input[name="meta_keywords"]').val() == '')
        meta_keywords_touched = false;
    if($('textarea[name="meta_description"]').val() == generate_meta_description() || $('textarea[name="meta_description"]').val() == '')
        meta_description_touched = false;
    if($('input[name="url"]').val() == generate_url() || $('input[name="url"]').val() == '')
        url_touched = false;
        
    $('input[name="meta_title"]').change(function() { meta_title_touched = true; });
    $('input[name="meta_keywords"]').change(function() { meta_keywords_touched = true; });
    $('textarea[name="meta_description"]').change(function() { meta_description_touched = true; });
    $('input[name="url"]').change(function() { url_touched = true; });
    
    $('input[name="name"]').keyup(function() { set_meta(); });
    $('select[name="brand_id"]').change(function() { set_meta(); });
    $('select[name="categories[]"]').change(function() { set_meta(); });
    
});

function set_meta()
{
    if(!meta_title_touched)
        $('input[name="meta_title"]').val(generate_meta_title());
    if(!meta_keywords_touched)
        $('input[name="meta_keywords"]').val(generate_meta_keywords());
    if(!meta_description_touched)
    {
        descr = $('textarea[name="meta_description"]');
        descr.val(generate_meta_description());
        descr.scrollTop(descr.outerHeight());
    }
    if(!url_touched)
        $('input[name="url"]').val(generate_url());
}

function generate_meta_title()
{
    name = $('input[name="name"]').val();
    return name;
}

function generate_meta_keywords()
{
    name = $('input[name="name"]').val();
    return name;
}

function generate_meta_description()
{
    if(typeof(tinyMCE.get("annotation")) =='object')
    {
        description = tinyMCE.get("annotation").getContent().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
        return description;
    }
    else
        return $('textarea[name=annotation]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
}

function generate_url()
{
    url = $('input[name="name"]').val();
    url = url.replace(/[\s]+/gi, '-');
    url = translit(url);
    url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();    
    return url;
}

function translit(str)
{
    var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")   
    var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")   
     var res = '';
    for(var i=0, l=str.length; i<l; i++)
    { 
        var s = str.charAt(i), n = ru.indexOf(s); 
        if(n >= 0) { res += en[n]; } 
        else { res += s; } 
    } 
    return res;  
}

</script>

<style>
.autocomplete-suggestions{
background-color: #ffffff; width: 100px; overflow: hidden;
border: 1px solid #e0e0e0;
padding: 5px;
}
.autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
.autocomplete-suggestions .selected { background:#F0F0F0; }
.autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
.autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
</style>


<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
    <span><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Запись добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Запись обновлена<?php }?></span>
    <a class="link" target="_blank" href="../article/<?php echo $_smarty_tpl->tpl_vars['article']->value->url;?>
">Открыть запись на сайте</a>
    <?php if ($_GET['return']) {?>
    <a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
    <?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
    <span><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Запись с таким адресом уже существует<?php }?></span>
    <a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
    <div id="name">
        <input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
        <input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
        <div class="checkbox">
            <input name=visible value='1' type="checkbox" id="active_checkbox" <?php if ($_smarty_tpl->tpl_vars['article']->value->visible) {?>checked<?php }?>/> <label for="active_checkbox">Активна</label>
        </div>

    </div>
    
    <div id="product_categories">

    </div>

    <!-- Левая колонка свойств товара -->
    <div id="column_left">
            
        <!-- Параметры страницы -->
        <div class="block">
            <ul>
                <li><label class=property>Дата</label><input type=text name=date value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['article']->value->date);?>
'></li>
                <li><label class=property>Категория</label>
                    <select name="category_id">
                        <option value='0'>Корневая категория</option>
                        <?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['category']->value->id!=$_smarty_tpl->tpl_vars['cat']->value->id) {?>
                                <option value='<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['article']->value->category_id==$_smarty_tpl->tpl_vars['cat']->value->id) {?>selected<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
</option>
                                <?php smarty_template_function_category_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['cat']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

                            <?php }?>
                        <?php } ?>
                        <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

                        <?php smarty_template_function_category_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['categories']->value));?>

                    </select>
                </li>
            </ul>
        </div>
        <div class="block layer">
        <!-- Параметры страницы (The End)-->
            <h2>Параметры страницы</h2>
        <!-- Параметры страницы -->
            <ul>
                <li><label class=property>Адрес</label><div class="page_url"> /article/</div><input name="url" class="page_url" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
                <li><label class=property>Заголовок</label><input name="meta_title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
                <li><label class=property>Ключевые слова</label><input name="meta_keywords"  type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
                <li><label class=property>Описание</label><textarea name="meta_description" /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea></li>
            </ul>
        </div>
        <!-- Параметры страницы (The End)-->


            
    </div>
    <!-- Левая колонка свойств товара (The End)--> 
    
    <!-- Правая колонка свойств товара -->    
    <div id="column_right">

        <div class="block layer">
            <h2>Ссылки на игроко</h2>
            <div id=list class="sortable related_products">
                <?php  $_smarty_tpl->tpl_vars['related_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_product']->key => $_smarty_tpl->tpl_vars['related_product']->value) {
$_smarty_tpl->tpl_vars['related_product']->_loop = true;
?>
                <div class="row">
                    <div class="move cell">
                        <div class="move_zone"></div>
                    </div>
                    <div class="image cell">
                    <input type=hidden name=related_products[] value='<?php echo $_smarty_tpl->tpl_vars['related_product']->value->id;?>
'>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['related_product']->value->id),$_smarty_tpl);?>
">
                    <img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['related_product']->value->images[0]->filename,35,35);?>
'>
                    </a>
                    </div>
                    <div class="name cell">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['related_product']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['related_product']->value->name;?>
</a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php } ?>
                <div id="new_related_product" class="row" style='display:none;'>
                    <div class="move cell">
                        <div class="move_zone"></div>
                    </div>
                    <div class="image cell">
                    <input type=hidden name=related_products[] value=''>
                    <img class=product_icon src=''>
                    </div>
                    <div class="name cell">
                    <a class="related_product_name" href=""></a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <input type=text name=related id='related_products' class="input_autocomplete" placeholder='Выберите товар чтобы добавить его'>
        </div>

        <div class="block layer">
            <h2>Связанные статьи</h2>
            <div id=list class="related_articles">
                <?php  $_smarty_tpl->tpl_vars['related_article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_article']->key => $_smarty_tpl->tpl_vars['related_article']->value) {
$_smarty_tpl->tpl_vars['related_article']->_loop = true;
?>
                <div class="row">
                    <div class="name cell">
                    <input type=hidden name=related_articles[] value='<?php echo $_smarty_tpl->tpl_vars['related_article']->value->id;?>
'>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['related_article']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['related_article']->value->name;?>
</a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php } ?>
                <div id="new_related_article" class="row" style='display:none;'>
                    <div class="name cell">
                    <input type=hidden name=related_articles[] value=''>
                    <a class="related_article_name" href=""></a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <input type=text name=related id='related_articles' class="input_autocomplete" placeholder='Выберите статью чтобы добавить ее'>
        </div>

        <input class="button_green button_save" type="submit" name="" value="Сохранить" />        
        
    </div>
    <!-- Правая колонка свойств товара (The End)--> 
    
    <!-- Описагние товара -->
    <div class="block layer">
        <h2>Краткое описание</h2>
        <textarea name="annotation" class='editor_small'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->annotation, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>
        
    <div class="block">
        <h2>Полное  описание</h2>
        <textarea name="body"  class='editor_large'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value->text, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>
    <!-- Описание товара (The End)-->
    <input class="button_green button_save" type="submit" name="" value="Сохранить" />
    
</form>
<!-- Основная форма (The End) -->
<?php }} ?>
