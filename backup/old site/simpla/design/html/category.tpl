{* Вкладки *}
{capture name=tabs}
	{if in_array('products', $manager->permissions)}<li><a href="index.php?module=ProductsAdmin">Игроки</a></li>{/if}
	<li class="active"><a href="index.php?module=CategoriesAdmin">Команды</a></li>
	{if in_array('brands', $manager->permissions)}<li><a href="index.php?module=BrandsAdmin">Спонсоры</a></li>{/if}
	{if in_array('features', $manager->permissions)}<li><a href="index.php?module=FeaturesAdmin">Свойства</a></li>{/if}
{/capture}

{if $category->id}
{$meta_title = $category->name scope=parent}
{else}
{$meta_title = 'Новая категория' scope=parent}
{/if}

{* Подключаем Tiny MCE *}
{include file='tinymce_init.tpl'}

{* On document load *}
{literal}
<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>
<script src="design/js/autocomplete/jquery.autocomplete-min.js"></script>
<style>
.autocomplete-w1 { background:url(img/shadow.png) no-repeat bottom right; position:absolute; top:0px; left:0px; margin:6px 0 0 6px; /* IE6 fix: */ _background:none; _margin:1px 0 0 0; }
.autocomplete { border:1px solid #999; background:#FFF; cursor:default; text-align:left; overflow-x:auto; min-width: 300px; overflow-y: auto; margin:-6px 6px 6px -6px; /* IE6 specific: */ _height:350px;  _margin:0; _overflow-x:hidden; }
.autocomplete .selected { background:#F0F0F0; }
.autocomplete div { padding:2px 5px; white-space:nowrap; }
.autocomplete strong { font-weight:normal; color:#3399FF; }
</style>

<script>
$(function() {


	// Удаление изображений
	$(".images_logo a.delete").click( function() {
		$("input[name='delete_image']").val('1');
		$(this).closest("ul").fadeOut(200, function() { $(this).remove(); });
		return false;
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
	  
});

function set_meta()
{
	if(!meta_title_touched)
		$('input[name="meta_title"]').val(generate_meta_title());
	if(!meta_keywords_touched)
		$('input[name="meta_keywords"]').val(generate_meta_keywords());
	if(!meta_description_touched)
		$('textarea[name="meta_description"]').val(generate_meta_description());
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
	if(typeof(tinyMCE.get("description")) =='object')
	{
		description = tinyMCE.get("description").getContent().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
		return description;
	}
	else
		return $('textarea[name=description]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
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
 
{/literal}


{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success=='added'}Команда добавлена{elseif $message_success=='updated'}Команда  обновлена{else}{$message_success}{/if}</span>
	<a class="link" target="_blank" href="../teams/{$category->url}">Открыть команду на сайте</a>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
	
	<span class="share">		
		<a href="#" onClick='window.open("http://vkontakte.ru/share.php?url={$config->root_url|urlencode}/teams/{$category->url|urlencode}&title={$category->name|urlencode}&description={$category->description|urlencode}&image={$config->root_url|urlencode}/files/categories/{$category->image|urlencode}&noparse=true","displayWindow","width=700,height=400,left=250,top=170,status=no,toolbar=no,menubar=no");return false;'>
  		<img src="{$config->root_url}/simpla/design/images/vk_icon.png" /></a>
		<a href="#" onClick='window.open("http://www.facebook.com/sharer.php?u={$config->root_url|urlencode}/teams/{$category->url|urlencode}","displayWindow","width=700,height=400,left=250,top=170,status=no,toolbar=no,menubar=no");return false;'>
  		<img src="{$config->root_url}/simpla/design/images/facebook_icon.png" /></a>
		<a href="#" onClick='window.open("http://twitter.com/share?text={$category->name|urlencode}&url={$config->root_url|urlencode}/teams/{$category->url|urlencode}&hashtags={$category->meta_keywords|replace:' ':''|urlencode}","displayWindow","width=700,height=400,left=250,top=170,status=no,toolbar=no,menubar=no");return false;'>
  		<img src="{$config->root_url}/simpla/design/images/twitter_icon.png" /></a>
	</span>
	
	
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{if $message_error=='url_exists'}Команда с таким адресом уже существует{else}{$message_error}{/if}</span>
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
	<div id="name">
		<input class="name" name=name type="text" value="{$category->name|escape}"/> 
		<input name=id type="hidden" value="{$category->id|escape}"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" {if $category->visible}checked{/if}/> <label for="active_checkbox">Активна</label>
			<input name=visible_logo value='1' type="checkbox" id="visible_logo" {if $category->visible_logo}checked{/if}/> <label for="visible_logo">Отображать лого</label>
		</div>
	</div> 

	<div id="product_categories">
			<select name="parent_id">
				<option value='0'>Корневая категория</option>
				{function name=category_select level=0}
				{foreach $cats as $cat}
					{if $category->id != $cat->id}
						<option value='{$cat->id}' {if $category->parent_id == $cat->id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$cat->name}</option>
						{category_select cats=$cat->subcategories level=$level+1}
					{/if}
				{/foreach}
				{/function}
				{category_select cats=$categories}
			</select>
	</div>
		
	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Параметры страницы</h2>
			<ul>
				<li><label class=property>Адрес</label><div class="page_url">/teams/</div><input name="url" class="page_url" type="text" value="{$category->url|escape}" /></li>
                <li><label class=property>Город</label><input name="city" class="simpla_inp" type="text" value="{$category->city|escape}" /></li>
                <li><label class=property>Президент</label><input name="head" class="simpla_inp" type="text" value="{$category->head|escape}" /></li>
                <li><label class=property>Тренеры</label><input name="coach" class="simpla_inp" type="text" value="{$category->coach|escape}" /></li>
                <li><label class=property>Создан</label><input name="create_club" class="simpla_inp" type="text" value="{$category->create_club|escape}" /></li>
                <li><label class=property>Сайт</label><input name="site" class="simpla_inp" type="text" value="{$category->site|escape}" /></li>
                <li><label class=property>Заголовок</label><input name="meta_title" class="simpla_inp" type="text" value="{$category->meta_title|escape}" /></li>
                <li><label class=property>Ключевые слова</label><input name="meta_keywords" class="simpla_inp" type="text" value="{$category->meta_keywords|escape}" /></li>
                <li><label class=property>Описание</label><textarea name="meta_description" class="simpla_inp">{$category->meta_description|escape}</textarea></li>
            </ul>
		</div>
		<!-- Параметры страницы (The End)-->
		
 		{*
		<!-- Экспорт-->
		<div class="block">
			<h2>Экспорт товара</h2>
			<ul>
				<li><input id="exp_yad" type="checkbox" /> <label for="exp_yad">Яндекс Маркет</label> Бид <input class="simpla_inp" type="" name="" value="12" /> руб.</li>
				<li><input id="exp_goog" type="checkbox" /> <label for="exp_goog">Google Base</label> </li>
			</ul>
		</div>
		<!-- Свойства товара (The End)-->
		*}
			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">
		
		<!-- Изображение категории -->	
		<div class="block layer images_logo">
			<h2>Изображение лого</h2>
			<input class='upload_image' name=image type=file>			
			<input type=hidden name="delete_image" value="">
			{if $category->image}
			<ul>
				<li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="../{$config->categories_images_dir}{$category->image}" alt="" />
				</li>
			</ul>
			{/if}
		</div>
        <div class="block layer images">
            <h2>Изображения команды
                <a href="#" id=images_wizard><img src="design/images/wand.png" alt="Подобрать автоматически" title="Подобрать автоматически"/></a>
            </h2>
            <ul>{foreach $product_images as $image}<li>
                    <a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
                    <img src="{$image->filename|resize:100:100}" alt="" />
                    <input type=hidden name='images[]' value='{$image->id}'>
                    <div class="info">
                        <input name="fios[]" value="{$image->fio}" placeholder="ФИО"/>
                        <input name="pos_in_foto[]" value="{$image->pos_in_foto}" placeholder="Должность"/>
                    </div>
                    </li>{/foreach}</ul>
            <div id=dropZone>
                <div id=dropMessage>Перетащите файлы сюда</div>
                <input type="file" name="dropped_images[]" multiple class="dropInput">
            </div>
            <div id="add_image"></div>
            <span class=upload_image><i class="dash_link" id="upload_image">Добавить изображение</i></span> или <span class=add_image_url><i class="dash_link" id="add_image_url">загрузить из интернета</i></span>
        </div>

    </div>
	<!-- Правая колонка свойств товара (The End)--> 

	<!-- Описагние категории -->
	<div class="block layer">
		<h2>Описание</h2>
		<textarea name="description" class="editor_large">{$category->description|escape}</textarea>
	</div>
	<!-- Описание категории (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->
{literal}
<script>
    $(function() {
        // Сортировка изображений
        $(".images ul").sortable({ tolerance: 'pointer'});

        // Удаление изображений
        $(".images a.delete").live('click', function() {
            $(this).closest("li").fadeOut(200, function() { $(this).remove(); });
            return false;
        });
        // Загрузить изображение с компьютера
        $('#upload_image').click(function() {
            $("<input class='upload_image' name=images[] type=file multiple  accept='image/jpeg,image/png,image/gif'>").appendTo('div#add_image').focus().click();
        });
        // Или с URL
        $('#add_image_url').click(function() {
            $("<input class='remote_image' name=images_urls[] type=text value='http://'>").appendTo('div#add_image').focus().select();
        });
        // Или перетаскиванием
        if(window.File && window.FileReader && window.FileList)
        {
            $("#dropZone").show();
            $("#dropZone").on('dragover', function (e){
                $(this).css('border', '1px solid #8cbf32');
            });
            $(document).on('dragenter', function (e){
                $("#dropZone").css('border', '1px dotted #8cbf32').css('background-color', '#c5ff8d');
            });

            dropInput = $('.dropInput').last().clone();

            function handleFileSelect(evt){
                var files = evt.target.files; // FileList object
                // Loop through the FileList and render image files as thumbnails.
                for (var i = 0, f; f = files[i]; i++) {
                    // Only process image files.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
                    var reader = new FileReader();
                    // Closure to capture the file information.
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Render thumbnail.
                            $("<li class=wizard><a href='' class='delete'><img src='design/images/cross-circle-frame.png'></a><img onerror='$(this).closest(\"li\").remove();' src='"+e.target.result+"' /><input name=images_urls[] type=hidden value='"+theFile.name+"'></li>").appendTo('div .images ul');
                            temp_input =  dropInput.clone();
                            $('.dropInput').hide();
                            $('#dropZone').append(temp_input);
                            $("#dropZone").css('border', '1px solid #d0d0d0').css('background-color', '#ffffff');
                            clone_input.show();
                        };
                    })(f);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
            }
            $('.dropInput').live("change", handleFileSelect);
        };
    });
</script>
{/literal}
