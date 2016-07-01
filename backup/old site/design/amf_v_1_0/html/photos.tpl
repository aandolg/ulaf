{if $album}
    {$canonical="/photos/{$album->url}/{$brand->url}" scope=parent}
{else}
    {$canonical="/photos" scope=parent}
{/if}


<div id="path">
    <a href="/">Главная</a>
    → <a href="/photos">Фотогалерея</a>
    {if $album}
        {foreach from=$album->path item=cat}
            →
            <a href="photos/{$cat->url}">{$cat->name|escape}</a>
        {/foreach}
    {/if}
</div>


{if $page}
    <h1>{$page->name|escape}</h1>
{else}
    <h1>{$album->name|escape}</h1>
{/if}


{if $album && $album->subcategories}
    <div class="col-1-1">
        {foreach $albums as $sa}
            {if $sa->visible}
                <div class="gallery-section clearfix">
                    <div class="col-1-4">
                        <h3>{$sa->name|escape}</h3>
                        {$sa->description} <a href="photos/{$sa->url|escape}" class="read-more">Все фото.</a></p>
                    </div>

                    <div class="col-3-4 last">
                        <div class="mosaic-block circle">
                            <a href="{$config->photos_categories_images_dir}{$sa->image}" class="mosaic-overlay fancybox" style="display: inline; opacity: 0;"></a>

                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="{$config->photos_categories_images_dir}{$sa->image}" alt="{$sa->name|escape}">
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        {/foreach}
    </div>
    {*<ul class="tiny_products">
    {foreach $album->subcategories as $sa}
        {if $sa->visible}
        <li class="product">
            <div class="image">
                {if $sa->image}
                    <a href="photos/{$sa->url|escape}">
                        <img src="{$config->photos_categories_images_dir}{$sa->image}" alt="{$sa->name|escape}" style="max-width:200px;max-height:200px;">
                    </a>
                {/if}
            </div>
            <h3><a href="photos/{$sa->url}">{$sa->name|escape}</a></h3>
        </li>
        {/if}
    {/foreach}
    </ul>*}
{elseif $album}
    {if $photos}
        <div class="gallery-section clearfix">
            <div class="col-4-4 last thumb-gallery super-list variable-sizes clearfix isotope">
                {foreach $photos as $photo}
                    <div class="col-1-3 element cat-1 isotope-item {if $photo@iteration%3==0} last{/if}">
                        <div class="mosaic-block circle">
                            <a href="{$config->photos_images_dir}{$photo->filename}"  class="mosaic-overlay fancybox" data-fancybox-group="gallery" title="{$photo->description|escape}" style="display: inline;"></a>
                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="{$config->photos_images_dir}{$photo->filename}" alt="{$photo->description|escape}">
                            </div>
                        </div>
                    </div>
                {/foreach}

            </div>
            {include "pagination.tpl"}
        </div>
        {*<ul class="tiny_products">
                    {foreach $photos as $photo}
                    <li class="product">
                    <div class="image">
                    <a href="{$config->photos_images_dir}{$photo->filename}" title="{$photo->description|escape}" class="zoom" rel="photos" data-rel="photos">
                        <img src="{$config->photos_images_dir}{$photo->filename}" alt="{$photo->name|escape}" title="{$photo->name|escape}" style="max-width:200px;max-height:200px;">
                    </a>
                    </div>
                    </li>
                    {/foreach}
                </ul>
                {include "pagination.tpl"}*}
    {else}
        Альбом пуст
    {/if}
{else}
    <div class="col-1-1">
        {foreach $albums as $sa}
            {if $sa->visible}
                <div class="gallery-section clearfix">
                    <div class="col-1-4">
                        <h3>{$sa->name|escape}</h3>
                        {$sa->description} <a href="photos/{$sa->url|escape}" class="read-more">Все фото.</a></p>
                    </div>

                    <div class="col-3-4 last">
                        <div class="mosaic-block circle">
                            <a href="{$config->photos_categories_images_dir}{$sa->image}" class="mosaic-overlay fancybox" style="display: inline; opacity: 0;"></a>

                            <div class="mosaic-backdrop" style="display: block;">
                                <img src="{$config->photos_categories_images_dir}{$sa->image}" alt="{$sa->name|escape}">
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        {/foreach}
    </div>
    {*<ul class="tiny_products">
    {foreach $albums as $sa}
        {if $sa->visible}
        <li class="product">
            <div class="image">
                {if $sa->image}
                    <a href="photos/{$sa->url|escape}">
                        <img src="{$config->photos_categories_images_dir}{$sa->image}" alt="{$sa->name|escape}" style="max-width:200px;max-height:200px;">
                    </a>
                {/if}
            </div>
            <h3><a href="photos/{$sa->url}">{$sa->name|escape}</a></h3>
        </li>
        {/if}
    {/foreach}
    </ul>*}
{/if}

{$page->body}
{if $album && $current_page_num == 1}
    {$album->description}
{/if}

{* Увеличитель картинок *}{*

{literal}
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
    <script>
        $(function () {
            // Зум картинок
            $("a.zoom").fancybox({
                prevEffect: 'fade',
                nextEffect: 'fade'
            });
        });
    </script>
{/literal}*}
