{capture name=tabs}
	{if in_array('blog', $manager->permissions)}<li><a href="index.php?module=BlogAdmin">Блог</a></li>{/if} 	
    <li class="active"><a href="index.php?module=PhotosAdmin">Фотографии</a></li>
	<li><a href="index.php?module=PhotosCategoriesAdmin">Альбомы фотографий</a></li>  
{/capture}

{if $post->id}
{$meta_title = $post->name scope=parent}
{else}
{$meta_title = 'Новая фотография' scope=parent}
{/if}

{* On document load *}
{literal}

<script>
$(function() {

	
	
});

</script>
{/literal}

{if $photo->category_id}
    {$selected_id = $photo->category_id}
{else}
    {$selected_id = $smarty.get.category_id}
{/if}
{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">
        {if $message_success == 'added'}Фотография добавлена{elseif $message_success == 'updated'}Фотография обновлена{/if}
        <a href="{url module=PhotoAdmin category_id=$photo->category_id return=null id=null}">Добавить еще фото</a>
    </span>
</div>
<!-- Системное сообщение (The End)-->
{/if}


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
	<div id="name">
		<input class="name" name=name type="text" value="{$photo->name|escape}" placeholder="Название (Alt)"/> 
		<input name=id type="hidden" value="{$photo->id|escape}"/>
        <div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" {if $photo->visible}checked{/if}/> <label for="active_checkbox">Активна</label>
		</div> 
	</div> 
	
	<div id="product_categories" {if !$categories}style='display:none;'{/if}>
		<label>Категория</label>
		<div>
			<ul>
				<li>
					<select name="category_id">
						{function name=categories_tree level=0}
							{foreach $categories as $category}
									<option value='{$category->id}' {if $category->id == $selected_id}selected{/if}>
									{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}
									{$category->name|escape}
									</option>
									{categories_tree categories=$category->subcategories level=$level+1}
							{/foreach}
						{/function}
						{categories_tree categories=$categories}
					</select>
				</li>
			</ul>
		</div>
	</div>
 		
	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<ul>
				<li><label class=property>Описание (title)</label><input name="description" type="text" value="{$photo->description|escape}" /></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
		
			
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">
	
		<!-- Изображение категории -->	
		<div class="block layer images">
			<h2>Изображение</h2>
			<input class='upload_image' name=image type=file>			
			<input type=hidden name="delete_image" value="">
			{if $photo->filename}
			<ul>
				<li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="../{$config->photos_images_dir}{$photo->filename}" alt="" />
				</li>
			</ul>
			{/if}
		</div>
		
	</div>
	<!-- Правая колонка свойств товара (The End)--> 
	
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
	
</form>
<!-- Основная форма (The End) -->
