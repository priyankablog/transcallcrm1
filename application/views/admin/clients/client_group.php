<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="modal fade" id="customer_group_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button group="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">

                    <span class="edit-title"><?php echo _l('customer_group_edit_heading'); ?></span>

                    <span class="add-title"><?php echo _l('customer_group_add_heading'); ?></span>

                </h4>

            </div>

            <?php echo form_open('admin/clients/group', ['id' => 'customer-group-modal']); ?>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <?php echo render_input('name', 'customer_group_name'); ?>

                        <?php echo form_hidden('id'); ?>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button group="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                <button group="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>

                <?php echo form_close(); ?>

            </div>

        </div>

    </div>

</div>

<script>
    window.addEventListener('load',function(){

       appValidateForm($('#customer-group-modal'), {

        name: 'required'

    }, manage_customer_groups);


        // dc
        $("#data_collection").click(function() {
                $(".dc_category_div").toggleClass("hide");
                $(".preview_data_collection").toggleClass("hide");
        });
        $("body").on('click', '.add_more_custom_div', function() {

            var newdiv = $('.add_custom_div').find('.row').eq(0).clone().appendTo('.add_custom_div');
            newdiv.find('input').val('');
            newdiv.find('i').removeClass('fa-plus').addClass('fa-minus');
            newdiv.find('span').text('Remove');
            newdiv.find('button').removeClass('add_more_custom_div').addClass('remove_custom_div').removeClass('btn-success').addClass('btn-danger');
        });
        // Remove attachment
        $("body").on('click', '.remove_custom_div', function() {
            $(this).closest('.row').remove();
        });
        $("#dc_category").on("change",function(){
            var id = $(this).val();
            $.ajax({
                url: admin_url+'dc_master/get_dc_from_cat',
                type: 'POST',                
                data: {id:id},
                dataType: "html",
            })
            .done(function(html) {
                $(".master_dc_fields").html(html);
            });
        });
        $('.edit_custom_dc').on("click",function(){
            var id = $(this).data('id')
            var name = $(this).data('name');
            var description = $(this).data('description');
            $('#edit_custom_dc_modal input[name="name"]').val(name);
            $('#edit_custom_dc_modal input[name="description"]').val(description);      
            $('#edit_custom_dc_modal input[name="custom_dc_id"]').val(id);
            $('#edit_custom_dc_modal').modal('show');
        });
        // dc 
       $('#customer_group_modal').on('show.bs.modal', function(e) {

        var invoker = $(e.relatedTarget);

        var group_id = $(invoker).data('id');

        $('#customer_group_modal .add-title').removeClass('hide');

        $('#customer_group_modal .edit-title').addClass('hide');

        $('#customer_group_modal input[name="id"]').val('');

        $('#customer_group_modal input[name="name"]').val('');

        // is from the edit button

        if (typeof(group_id) !== 'undefined') {

            $('#customer_group_modal input[name="id"]').val(group_id);

            $('#customer_group_modal .add-title').addClass('hide');

            $('#customer_group_modal .edit-title').removeClass('hide');

            $('#customer_group_modal input[name="name"]').val($(invoker).parents('tr').find('td').eq(0).text());

        }

    });

   });

    function manage_customer_groups(form) {

        var data = $(form).serialize();

        var url = form.action;

        $.post(url, data).done(function(response) {

            response = JSON.parse(response);

            if (response.success == true) {

                if($.fn.DataTable.isDataTable('.table-customer-groups')){

                    $('.table-customer-groups').DataTable().ajax.reload();

                }

                if($('body').hasClass('dynamic-create-groups') && typeof(response.id) != 'undefined') {

                    var groups = $('select[name="groups_in[]"]');

                    groups.prepend('<option value="'+response.id+'">'+response.name+'</option>');

                    groups.selectpicker('refresh');

                }

                alert_float('success', response.message);

            }

            $('#customer_group_modal').modal('hide');

        });

        return false;

    }



</script>

