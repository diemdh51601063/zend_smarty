<div>
    <p>
        {$hello}
        <a href="{$this->url(['controller' => 'index', 'action' => 'view'])}">view</a>
        <a href="{$this->url(['controller' => 'admin', 'action' => 'index'])}">admin</a>
    </p>
    <h1>LOGIN ADMIN</h1>
    {*<form>
        <label for="fname">Account:</label>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Password:</label>
        <input type="text" id="lname" name="lname"><br><br>
        <input type="submit" value="Submit">
    </form>*}


    <div>
        <table id="table_example" style="width: 100%">
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
            {foreach $listItem as $item}
                <tr style="text-align: center">
                    <td>{$item.actor_id}</td>
                    <td>{$item.first_name}</td>
                    <td>{$item.last_name}</td>
                    <td>{$item.last_update}</td>
                    <td><button style="padding-right: 10px">Edit</button>   <button>Delete</button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"></script>
