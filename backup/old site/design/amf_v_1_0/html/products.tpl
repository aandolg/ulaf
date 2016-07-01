{* Список товаров *}

{* Канонический адрес страницы *}
{if $category && $brand}
{$canonical="/teams/{$category->url}/{$brand->url}" scope=parent}
{elseif $category}
{$canonical="/teams/{$category->url}" scope=parent}
{elseif $brand}
{$canonical="/brands/{$brand->url}" scope=parent}
{elseif $keyword}
{$canonical="/products?keyword={$keyword|escape}" scope=parent}
{else}
{$canonical="/products" scope=parent}
{/if}

<!-- Хлебные крошки /-->
<div id="path">
	<a href="/">Главная</a>
	{if $category}
	{foreach $category->path as $cat}
	→ <a href="teams/{$cat->url}">{$cat->name|escape}</a>
	{/foreach}  
	{if $brand}
	→ <a href="teams/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>
	{/if}
	{elseif $brand}
	→ <a href="brands/{$brand->url}">{$brand->name|escape}</a>
	{elseif $keyword}
	→ Поиск
	{/if}
</div>
<!-- Хлебные крошки #End /-->



<div class="main-content col-1-1 right last">
    {* Заголовок страницы *}
    {if $keyword}
        <h1>Поиск {$keyword|escape}</h1>
    {elseif $page}
        <h1>{$page->name|escape}</h1>
    {else}
        <h1>{$category->name|escape} {$brand->name|escape}</h1>
    {/if}
    {if $category->images}
        {$gen_image = reset($category->images)}
        <div class="col-1-1"><img src="{$gen_image->filename|resize:1120:750}" alt="{$category->name}" title="{$category->title}"></div>
    {/if}
    {* Описание страницы (если задана) *}
    {if $current_page_num==1}
        {* Описание категории *}
        {$category->description}
        {$page->body}
    {/if}
    <hr>

   {if count($category->images) > 1}
        <div class="clearfix teams">
            {foreach $category->images as $image}
                {if $image@index == 0}{continue}{/if}
                    <div class="col-1-3 boxy {if $image@last}last{/if}">
                        <div class="mosaic-block circle"><a href="teams/{$category->url}"  class="mosaic-overlay link fancybox" data-fancybox-group="gallery" title="{$image->fio} {$image->pos_in_foto}" style="display: inline; opacity: 0;"></a>
                            <div class="mosaic-backdrop" style="display: block;"><img src="/{$config->original_images_dir}{$image->filename}" alt="{$image->fio}"></div></div>
                        <div class="inner-box">
                            <h2><!-- <a href="teams/{$category->url}" > -->{$image->fio}<!-- </a> --></h2>
                            <h5>{$image->pos_in_foto}</h5>
                           {* <ul class="social-link">
                                <li><a class="fa fa-facebook-square" href="#"></a></li>
                                <li><a class="fa fa-twitter-square" href="#"></a></li>
                                <li><a class="fa fa-linkedin-square" href="#"></a></li>
                                <li><a class="fa fa-instagram" href="#"></a></li>
                            </ul>*}
                        </div>
                    </div>
            {/foreach}
        </div>
    {/if}


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





{* Фильтр по брендам *}
{if $category->brands}
<div id="brands">
	<a href="teams/{$category->url}" {if !$brand->id}class="selected"{/if}>Все бренды</a>
	{foreach $category->brands as $b}
		{if $b->image}
		<a data-brand="{$b->id}" href="teams/{$category->url}/{$b->url}"><img src="{$config->brands_images_dir}{$b->image}" alt="{$b->name|escape}"></a>
		{else}
		<a data-brand="{$b->id}" href="teams/{$category->url}/{$b->url}" {if $b->id == $brand->id}class="selected"{/if}>{$b->name|escape}</a>
		{/if}
	{/foreach}
</div>
{/if}

{if $current_page_num==1}
{* Описание бренда *}
{$brand->description}
{/if}

{* Фильтр по свойствам *}
{if $features}
<table id="features">
	{foreach $features as $key=>$f}
	<tr>
	<td class="feature_name" data-feature="{$f->id}">
		{$f->name}:
	</td>
	<td class="feature_values">
		<a href="{url params=[$f->id=>null, page=>null]}" {if !$smarty.get.$key}class="selected"{/if}>Все</a>
		{foreach $f->options as $o}
		<a href="{url params=[$f->id=>$o->value, page=>null]}" {if $smarty.get.$key == $o->value}class="selected"{/if}>{$o->value|escape}</a>
		{/foreach}
	</td>
	</tr>
	{/foreach}
</table>
{/if}


<!--Каталог товаров-->
{if $products}

{* Сортировка *}
{if $products|count>0}
<div class="sort">
	Сортировать по 
	<a {if $sort=='position'} class="selected"{/if} href="{url sort=position page=null}">умолчанию</a>
	{*<a {if $sort=='price'}    class="selected"{/if} href="{url sort=price page=null}">цене</a>*}
	<a {if $sort=='name'}     class="selected"{/if} href="{url sort=name page=null}">названию</a>
</div>
{/if}


{include file='pagination.tpl'}


<!-- Список товаров-->
<ul class="products">

	{foreach $products as $product}
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		{if $product->image}
		<div class="image">
			<a href="players/{$product->url}"><img src="{$product->image->filename|resize:200:200}" alt="{$product->name|escape}"/></a>
		</div>
		{/if}
		<!-- Фото товара (The End) -->

		<div class="product_info">
		<!-- Название товара -->
		<h3 class="{if $product->featured}featured{/if}"><a data-product="{$product->id}" href="players/{$product->url}">{$product->name|escape}</a></h3>
		<!-- Название товара (The End) -->

		<!-- Описание товара -->
		<div class="annotation">{$product->annotation}</div>
		<!-- Описание товара (The End) -->
		
		{*{if $product->variants|count > 0}*}
		{*<!-- Выбор варианта товара -->*}
		{*<form class="variants" action="/cart">*}
			{*<table>*}
			{*{foreach $product->variants as $v}*}
			{*<tr class="variant">*}
				{*<td>*}
					{*<input id="variants_{$v->id}" name="variant" value="{$v->id}" type="radio" class="variant_radiobutton" {if $v@first}checked{/if} {if $product->variants|count<2}style="display:none;"{/if}/>*}
				{*</td>*}
				{*<td>*}
					{*{if $v->name}<label class="variant_name" for="variants_{$v->id}">{$v->name}</label>{/if}*}
				{*</td>*}
				{*<td>*}
					{*{if $v->compare_price > 0}<span class="compare_price">{$v->compare_price|convert}</span>{/if}*}
					{*<span class="price">{$v->price|convert} <span class="currency">{$currency->sign|escape}</span></span>*}
				{*</td>*}
			{*</tr>*}
			{*{/foreach}*}
			{*</table>*}
			{*<input type="submit" class="button" value="в корзину" data-result-text="добавлено"/>*}
		{*</form>*}
		{*<!-- Выбор варианта товара (The End) -->*}
		{*{else}*}
			{*Нет в наличии*}
		{*{/if}*}

		</div>
		
	</li>
	<!-- Товар (The End)-->
	{/foreach}
			
</ul>

{include file='pagination.tpl'}	
<!-- Список товаров (The End)-->

{else}
    {*Информация отсутствует*}
{/if}
<!--Каталог товаров (The End)-->