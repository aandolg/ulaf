{* Страница отдельной записи блога *}

<!-- Хлебные крошки /-->
<div id="path">
    <a href="./">Главная</a>
    → <a href="articles">Статьи</a>    
    {foreach from=$article->category->path item=cat}
    → <a href="articles/{$cat->url}">{$cat->name|escape}</a>
    {/foreach}
    →  {$article->name|escape}                
</div>
<!-- Хлебные крошки #End /-->

<!-- Заголовок /-->
<h1>{$article->name|escape}</h1>
<p>{$article->date|date}</p>

<!-- Тело поста /-->
{$article->text}

<!-- Соседние записи /-->
<div id="back_forward">
	{if $prev_article}
		←&nbsp;<a class="back" id="PrevLink" href="article/{$prev_article->url}">{$prev_article->name}</a>
	{/if}
	{if $next_post}
		<a class="forward" id="NextLink" href="article/{$next_article->url}">{$next_article->name}</a>&nbsp;→
	{/if}
</div>
    
    {if $related_products}
    <h2>Ссылки на игроков</h2>
    <ul>
        {foreach $related_products as $p}
        <li><a href="players/{$p->url}">{$p->name}</a></li>
        {/foreach}
    </ul>
    {/if}
    <br/>
    <br/>
    {if $related_articles}
    <h2>Также советуем посмотреть</h2>
    <ul>
        {foreach $related_articles as $a}
        <li><a href="article/{$a->url}">{$a->name}</a></li>
        {/foreach}
    </ul>
    {/if}
    <br/>
    <br/>
{*

<!-- Комментарии -->
<div id="comments">

	<h2>Комментарии</h2>
	
	{if $comments}
	<!-- Список с комментариями -->
	<ul class="comment_list">
		{foreach $comments as $comment}
		<a name="comment_{$comment->id}"></a>
		<li>
			<!-- Имя и дата комментария-->
			<div class="comment_header">	
				{$comment->name|escape} <i>{$comment->date|date}, {$comment->date|time}</i>
				{if !$comment->approved}ожидает модерации</b>{/if}
			</div>
			<!-- Имя и дата комментария (The End)-->
			
			<!-- Комментарий -->
			{$comment->text|escape|nl2br}
			<!-- Комментарий (The End)-->
		</li>
		{/foreach}
	</ul>
	<!-- Список с комментариями (The End)-->
	{else}
	<p>
		Пока нет комментариев
	</p>
	{/if}
	
	<!--Форма отправления комментария-->

	<!--Подключаем js-проверку формы -->
	<script src="/js/baloon/js/default.js" language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/validate.js" language="JavaScript" type="text/javascript"></script>
	<script src="/js/baloon/js/baloon.js" language="JavaScript" type="text/javascript"></script>
	<link href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 
	
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
		<textarea class="comment_textarea" id="comment_text" name="text" format=".+" notice="Введите комментарий">{$comment_text}</textarea><br />
		<div>
		<label for="comment_name">Имя</label>
		<input class="input_name" type="text" id="comment_name" name="name" value="{$comment_name}" format=".+" notice="Введите имя"/><br />

		<input class="button" type="submit" name="comment" value="Отправить" />
		
		<label for="comment_captcha">Число</label>
		<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}"/></div> 
		<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" format="\d\d\d\d" notice="Введите капчу"/>
		
		</div>
	</form>
	<!--Форма отправления комментария (The End)-->
	
</div>
<!-- Комментарии (The End) -->

*}
{* Скрипт для листания через ctrl → *}{*

*}
{* Ссылки на соседние страницы должны иметь id PrevLink и NextLink *}{*

<script type="text/javascript" src="js/ctrlnavigate.js"></script>           
*}
