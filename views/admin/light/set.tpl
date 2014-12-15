{extends "admin/pages/index.tpl"}
{block "content"}
    <h1>Задать цвет</h1>
    <h2>{$item.name}</h2>
    {if $item.light_type==0}
        <span class="hsl" data-r="{$value[0]}" data-g="{$value[1]}" data-b="{$value[2]}"></span>
    {/if}
    {if $item.light_type==1}
        <span class="picker-bright" data-r="{$value[0]}"></span>
    {/if}
    {if $item.light_type==0}
        <a href="#" class="js-light-rgb-off">Выключить</a>
    {/if}
    {if $item.light_type==1}
        <a href="#" class="js-light-light-off">Выключить</a>
    {/if}
    <div class="form-group">
        <label for="smooth">Плавность</label>
        <input id="smooth" name="smooth" class="form-control"
               placeholder="Плавность перехода целочисленный" value="10">
    </div>
    <input type="hidden" id="id" value="{$item.id}">
{/block}