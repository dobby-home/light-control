{extends "admin/pages/index.tpl"}
{block "content"}
    <h1>Управление светом</h1>
    <a href="/admin/light/add">Добавить устройство</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Свет</th>
            <th>На латинице</th>
            <th>Тип</th>
            <th>Устройство</th>
            <th>Канал</th>
        </tr>
        </thead>
        <tbody>
        {foreach $items as $item}
            <tr>
                <td>{$item.name}</td>
                <td>{$item.engname}</td>
                <td>{$types[$item.light_type]}</td>
                <td>{foreach $devices as $device}{if $device.id_devices == $item.id_devices}<a href="/admin/devices/{$device.id_devices}">{$device.name}</a>{/if}{/foreach}</td>
                <td>{$item.port}</td>
                <td><a href="/admin/light/{$item.id}">Ред</a> </td>
                <td><a href="/admin/light/set/{$item.id}">Задать цвет</a> </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/block}