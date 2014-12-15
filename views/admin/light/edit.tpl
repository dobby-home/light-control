{extends "admin/pages/index.tpl"}
{block "content"}
    <h1>Редактирование комнаты</h1>
    <form role="form"  action="/ajax/light/edit" class="app-module-action">
        <div class="form-group">
            <label for="name">Название света</label>
            <input id="name" name="name" class="form-control required iname" value="{$item.name}" placeholder="Введите название устройства">
        </div>
        <div class="form-group">
            <label for="address">Название на латинице</label>
            <input id="engname" name="engname" class="required iengname form-control"
                   placeholder="Введите название на латинице" value="{$item.engname}">
        </div>
        <div class="form-group">
            <label for="channels">Тип управляемого света</label>
            <select class="form-control required ilight_type" id="light_type" name="light_type">
                {foreach $types as $key => $type}
                    <option value="{$key}" {if $key == $item.light_type}selected="selected"{/if}>{$type}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="channels">Устройство</label>
            <select class="form-control required iid_devices" id="id_devices" name="id_devices">
                {foreach $devices as $device}
                    <option value="{$device.id_devices}" {if $device.id_devices == $item.device_id}selected="selected"{/if}>{$device.name} {$device.driver} [{$device.address}]</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="channels">Порт на устройстве</label>
            <select class="form-control required iport " id="port" name="port">
                {foreach $ports as $port}
                    <option value="{$port}"{if $port == $item.port}selected="selected" {/if}>{$port}</option>
                {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default">Сохранить</button>
        <input type="hidden" name="id" value="{$item.id}">
    </form>
{/block}