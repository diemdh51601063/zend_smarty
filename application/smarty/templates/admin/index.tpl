{* <a href="{$this->url(['controller' => 'index', 'action' => 'index'])}">home</a>
<a href="{$this->url(['controller' => 'index', 'action' => 'view'])}">view</a>
<a href="{$this->url(['controller' => 'admin', 'action' => 'product'])}">product</a> *}




<table id="table_orders" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th style="width: 30%">First Name</th>
            <th style="width: 30%">Last Name</th>
            <th>Last Update</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {* {foreach $listItem as $item}
                            <tr style="text-align: center">
                                <td>{$item.id}</td>
                                <td>{$item.name}</td>
                                <td>{$item.price}</td>
                                <td>{$item.quantily}</td>
                                <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
                            </tr>
                        {/foreach} *}
    </tbody>
</table>