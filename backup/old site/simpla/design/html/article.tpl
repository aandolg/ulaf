{capture name=tabs}
    <li><a href="index.php?module=BlogAdmin">Блог</a></li>
    {if in_array('articles', $manager->permissions)}<li class="active"><a href="{url module=ArticlesAdmin id=null page=null}">Статьи</a></li>
	<li><a href="{url module=ArticleCategoriesAdmin id=null page=null}">Категории статей</a></li>{/if}
{/capture}

{if $article->id}
{$meta_title = $article->name scope=parent}
{else}
{$meta_title = 'Новая статья' scope=parent}
{/if}

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

{* On document load *}
{literal}
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
{/literal}

{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
    <span>{if $message_success == 'added'}Запись добавлена{elseif $message_success == 'updated'}Запись обновлена{/if}</span>
    <a class="link" target="_blank" href="../article/{$article->url}">Открыть запись на сайте</a>
    {if $smarty.get.return}
    <a class="button" href="{$smarty.get.return}">Вернуться</a>
    {/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
    <span>{if $message_error == 'url_exists'}Запись с таким адресом уже существует{/if}</span>
    <a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
    <div id="name">
        <input class="name" name=name type="text" value="{$article->name|escape}"/> 
        <input name=id type="hidden" value="{$article->id|escape}"/> 
        <div class="checkbox">
            <input name=visible value='1' type="checkbox" id="active_checkbox" {if $article->visible}checked{/if}/> <label for="active_checkbox">Активна</label>
        </div>

    </div>
    
    <div id="product_categories">

    </div>

    <!-- Левая колонка свойств товара -->
    <div id="column_left">
            
        <!-- Параметры страницы -->
        <div class="block">
            <ul>
                <li><label class=property>Дата</label><input type=text name=date value='{$article->date|date}'></li>
                <li><label class=property>Категория</label>
                    <select name="category_id">
                        <option value='0'>Корневая категория</option>
                        {function name=category_select level=0}
                        {foreach from=$cats item=cat}
                            {if $category->id != $cat->id}
                                <option value='{$cat->id}' {if $article->category_id == $cat->id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$cat->name}</option>
                                {category_select cats=$cat->subcategories level=$level+1}
                            {/if}
                        {/foreach}
                        {/function}
                        {category_select cats=$categories}
                    </select>
                </li>
            </ul>
        </div>
        <div class="block layer">
        <!-- Параметры страницы (The End)-->
            <h2>Параметры страницы</h2>
        <!-- Параметры страницы -->
            <ul>
                <li><label class=property>Адрес</label><div class="page_url"> /article/</div><input name="url" class="page_url" type="text" value="{$article->url|escape}" /></li>
                <li><label class=property>Заголовок</label><input name="meta_title" type="text" value="{$article->meta_title|escape}" /></li>
                <li><label class=property>Ключевые слова</label><input name="meta_keywords"  type="text" value="{$article->meta_keywords|escape}" /></li>
                <li><label class=property>Описание</label><textarea name="meta_description" />{$article->meta_description|escape}</textarea></li>
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
                {foreach from=$related_products item=related_product}
                <div class="row">
                    <div class="move cell">
                        <div class="move_zone"></div>
                    </div>
                    <div class="image cell">
                    <input type=hidden name=related_products[] value='{$related_product->id}'>
                    <a href="{url id=$related_product->id}">
                    <img class=product_icon src='{$related_product->images[0]->filename|resize:35:35}'>
                    </a>
                    </div>
                    <div class="name cell">
                    <a href="{url id=$related_product->id}">{$related_product->name}</a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                {/foreach}
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
                {foreach from=$related_articles item=related_article}
                <div class="row">
                    <div class="name cell">
                    <input type=hidden name=related_articles[] value='{$related_article->id}'>
                    <a href="{url id=$related_article->id}">{$related_article->name}</a>
                    </div>
                    <div class="icons cell">
                    <a href='#' class="delete"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                {/foreach}
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
        <textarea name="annotation" class='editor_small'>{$article->annotation|escape}</textarea>
    </div>
        
    <div class="block">
        <h2>Полное  описание</h2>
        <textarea name="body"  class='editor_large'>{$article->text|escape}</textarea>
    </div>
    <!-- Описание товара (The End)-->
    <input class="button_green button_save" type="submit" name="" value="Сохранить" />
    
</form>
<!-- Основная форма (The End) -->
