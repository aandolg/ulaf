{* Страница отдельной записи блога *}

{* Канонический адрес страницы *}
{$canonical="/news/{$post->url}" scope=parent}


        <!-- Start Main Column  -->
        <div class="col-xs-12">
            <div class="clearfix post">
                <h1 class="title" data-post="{$post->id}">{$post->name|escape}</h1>
                {if $post->image}
                <div class="mosaic-block circle" style="text-align: center;background: #0D1A3B;">
                    {*<a href="post.html" class="mosaic-overlay link" title="{$post->name|escape}" style="display: inline; opacity: 0;"></a><div class="mosaic-backdrop" style="display: block;">*}
                    <img style="width: auto!important;" src="{$config->posts_images_dir}{$post->image}" alt="Mock"></div>
            </div>
            {/if}

            <h6 class="meta"><a class="date" href="#">{$post->date|date}</a></h6>
            {$post->text}
        </div>



<div style="clear: both;"></div>
       {* <div id="comments">

            <h2>Комментарии</h2>

            {if $comments}
                <ul class="comment_list">
                    {foreach $comments as $comment}
                        <a name="comment_{$comment->id}"></a>
                        <li>
                            <div class="comment_header">
                                {$comment->name|escape} <i>{$comment->date|date}, {$comment->date|time}</i>
                                {if !$comment->approved}<b>ожидает модерации</b>{/if}
                            </div>
                            {$comment->text|escape|nl2br}
                        </li>
                    {/foreach}
                </ul>
            {else}
                <p>
                    Пока нет комментариев
                </p>
            {/if}
            <script src="/js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
            <script src="/js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
            <script src="/js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
            <link href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css"/>

            <form class="comment_form" method="post" action="">
                <h2>Написать комментарий</h2>
                {if $error}
                    <div class="message_error">
                        {if $error=='captcha'}
                            Неверно введена капча
                        {elseif $error=='empty_name'}
                            Введите имя
                        {elseif $error=='empty_comment'}
                            Введите комментарий
                        {/if}
                    </div>
                {/if}
                <textarea class="comment_textarea" id="comment_text" name="text" data-format=".+" data-notice="Введите комментарий">{$comment_text}</textarea><br/>

                <div>
                    <label for="comment_name">Имя</label>
                    <input class="input_name" type="text" id="comment_name" name="name" value="{$comment_name|escape}" data-format=".+" data-notice="Введите имя"/><br/>

                    <input class="button" type="submit" name="comment" value="Отправить"/>

                    <label for="comment_captcha">Число</label>

                    <div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}"/></div>
                    <input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>

                </div>
            </form>

        </div>*}
    </div>

