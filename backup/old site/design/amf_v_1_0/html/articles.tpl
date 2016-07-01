{* Список записей блога *}
<style>
    .article_categories { margin-bottom: 20px; }
    .article_categories ul { margin-left: 20px; }
</style>
<!-- Хлебные крошки /-->
<div id="path">
    <a href="/">Главная</a>
    {*→ <a href="articles">Статьи</a>*}
    {if $article_category}
    {foreach from=$article_category->path item=cat}
    → <a href="articles/{$cat->url}">{$cat->name|escape}</a>
    {/foreach}  
    {elseif $keyword}
    → Поиск
    {/if}
</div>
<!-- Хлебные крошки #End /-->

<!-- Заголовок /-->
<h1>{if $page}{$page->name}{elseif $article_category}{$article_category->name}{else}Полезные статьи{/if}</h1>

{$article_category->description}


{* Рекурсивная функция вывода дерева категорий *}
{function name=article_categories_tree}
{if $categories}
<ul>
{foreach $categories as $c}
    {* Показываем только видимые категории *}
    {if $c->visible}
        <li>
            <a {if $category->id == $c->id}class="selected"{/if} href="articles/{$c->url}">{$c->name}</a>
            {article_categories_tree categories=$c->subcategories}
        </li>
    {/if}
{/foreach}
</ul>
{/if}
{/function}

{if !$article_category}
{get_article_categories var=article_categories}
<div class="article_categories">    
{article_categories_tree categories=$article_categories}
</div>    
{else}



{include file='pagination.tpl'}

<div class="article_categories">
{article_categories_tree categories=$article_category->subcategories}
</div>

<!-- Статьи /-->
<ul id="blog" class="article_list">
    {foreach $articles as $a}
    <li>
        <h3>{*<a href="article/{$a->url}">*}{$a->name|escape}{*</a>*}</h3>
        <h3>{*<a href="article/{$a->url}">*}{*</a>*}</h3>
        {*<p>{$a->date|date} → <a href="articles/{$a->category_url}">{$a->category}</a></p>*}
        {*<p>{$a->text}</p>*}
        {$a->text}
        <div style="clear:both;"></div>
    </li>
    {/foreach}
</ul>
<!-- Статьи #End /-->    

{include file='pagination.tpl'}
 
{/if}


          