{extends "admin/pages/index.tpl"}
{block "content"}
    <h1>Добавление устройства</h1>
    <form role="form" action="/ajax/light/add" class="app-module-action">
        <div class="form-group">
            <label for="name">Название света</label>
            <input id="name" name="name" class="form-control required iname" placeholder="Введите название устройства">
        </div>
        <div class="form-group">
            <label for="address">Название на латинице</label>
            <input id="engname" name="engname" class="required iengname form-control"
                   placeholder="Введите название на латинице">
        </div>
        <div class="form-group">
            <label for="channels">Тип управляемого света</label>
            <select class="form-control required ilight_type" id="light_type" name="light_type">
                {foreach $types as $key => $type}
                    <option value="{$key}">{$type}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="channels">Устройство</label>
            <select class="form-control required iid_devices" id="id_devices" name="id_devices">
                {foreach $devices as $device}
                    <option value="{$device.id_devices}" >{$device.name} {$device.driver} [{$device.address}]</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="channels">Порт на устройстве</label>
            <select class="form-control required iport " id="port" name="port">
                {foreach $ports as $port}
                    <option value="{$port}">{$port}</option>
                {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default">Добавить устройства</button>
    </form>
{/block}