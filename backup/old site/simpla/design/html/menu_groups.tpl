{* Вкладки *}
{capture name=tabs}
	{if in_array('pages', $manager->permissions)}
	{foreach from=$menus item=m}
		<li><a href="{url module=PagesAdmin menu_id=$m->id}">{$m->name}</a></li>
	{/foreach}
	{/if}
    <li class="active"><a href="{url module=DmenusGroupsAdmin}">Группы меню</a></li>
{/capture}

{* Title *}
{$meta_title='Группы меню' scope=parent}

{* Заголовок *}
<div id="header">
	<h1>Группы меню</h1>	
	<form method="post">
		название
		<input type="text" name="add_group" style="width:300px;margin:0 20px;">
		<a class="add" href="#" style="display:inline-block;float:none">Добавить</a>
		<div class="clear"></div>
		<input type="hidden" name="session_id" value="{$smarty.session.id}">
	</form>
</div>

{if $menu_groups}
<div id="main_list" class="menu_groups">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
		
		<div id="list" class="menu_groups">	
			{foreach $menu_groups as $menu_group}
			<div class="{if !$menu_group->visible}invisible{/if} row">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="{$menu_group->id}" />				
				</div>
				<div class="cell">
					<a href="{url module=DmenusGroupAdmin menu_group_id=$menu_group->id}">{$menu_group->name|escape}</a> 	 			
				</div>
				<div class="icons cell">
                    <a class="enable" title="Активна" href="#"></a>				
					<a class="delete"  title="Удалить" href="#"></a>
				</div>
				<div class="icons cell">
					id для вывода - {$menu_group->id}
				</div>
				<div class="clear"></div>
			</div>
			{/foreach}
		</div>
		
		<div id="action">
			<label id="check_all" class="dash_link">Выбрать все</label>
			
			<span id="select">
			<select name="action">
                <option value="enable">Сделать видимыми</option>
                <option value="disable">Сделать невидимыми</option>
				<option value="delete">Удалить</option>
			</select>
			</span>
			<input id="apply_action" class="button_green" type="submit" value="Применить">
		</div>
		
	</form>
</div>
{else}
Нет групп меню
{/if}

{literal}
<script>
$(function() {
	
	$('.add').click(function(e){
		e.preventDefault();
		$(this).closest('form').submit();
	});
	
	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();	
	
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});	

	// Удалить
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Подтверждение удаления
	$("form").submit(function() {
		if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
	});
    
    // Показать категорию
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'menu_group', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.removeClass('invisible');
				else
					line.addClass('invisible');				
			},
			dataType: 'json'
		});	
		return false;	
	});
 	
});
</script>
{/literal}
