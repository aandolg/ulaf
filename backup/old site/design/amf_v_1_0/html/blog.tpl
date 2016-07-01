{* Список записей блога *}
{* Канонический адрес страницы *}
{$canonical="/blog" scope=parent}

        {*<h1>{$page->name}</h1>*}

        {include file='pagination.tpl'}
        {foreach $posts as $post}
            <div class="post-excerpt clearfix">
                <div class="col-1-3 mosaic-block circle">

                        <a href="news/{$post->url}" class="mosaic-overlay link" title="{$post->name|escape}" style="display: inline;"></a>
                        <div class="mosaic-backdrop" style="display: block;">
                            <img src="{if $post->image}{$config->posts_images_dir}{$post->image}{else}design/{$settings->theme|escape}/img/brand.jpg{/if}" alt="{$post->name|escape}"/>
                        </div>
                </div>

                <div class="col-2-3 last">
                    <h3><a data-post="{$post->id}" href="news/{$post->url}">{$post->name|escape}</a></h3>
                    <p class="lead">{$post->date|date}</p>
                    <p>{$post->annotation}</p>…<a href="news/{$post->url}" class="read-more">Читать полностью</a></p>
                </div>
            </div>
        {/foreach}

        {include file='pagination.tpl'}
