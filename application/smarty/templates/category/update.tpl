<h3 style="text-align: center;">{$this->title}</h3>
<div class="mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-5"
        onsubmit="onSubmitForm('{{$this->url(['controller' => 'category', 'action' => 'update'])}}?id={$detail_category.id}')"
        method="post" id="formAdd">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Danh Mục</label>
            <div class="col-sm-10">
                {if isset($error_value.category_name)}
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{$error_value.category_name}">
                {else}
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{$detail_category.category_name}">
                {/if}
                
                {if isset($error_input.category_name)}
                    {foreach $error_input.category_name as $err}
                        <span class="err_input">{$err}</span><br>
                    {/foreach}
                {/if}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div>