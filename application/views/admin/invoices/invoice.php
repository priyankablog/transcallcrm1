<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php init_head(); ?>

<div id="wrapper">

    <div class="content">

        <div class="row">

            <?php

            echo form_open($this->uri->uri_string(), ['id' => 'invoice-form', 'class' => '_transaction_form invoice-form']);

            if (isset($invoice)) {

                echo form_hidden('isedit');

            }

            ?>

            <div class="col-md-12">

                <h4

                    class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">

                    <span>

                        <?php echo isset($invoice) ? format_invoice_number($invoice) : _l('create_new_invoice'); ?>

                    </span>

                    <?php echo isset($invoice) ? format_invoice_status($invoice->status) : ''; ?>

                </h4>

                <?php $this->load->view('admin/invoices/invoice_template'); ?>

            </div>
            <?php echo form_close(); ?>

            <?php $this->load->view('admin/invoice_items/item'); ?>

        </div>

    </div>

</div>

<div id="invoice_calls_popup">

</div>

<?php init_tail(); ?>

<script>

$(function() {

    validate_invoice_form();

    // Init accountacy currency symbol

    init_currency();

    // Project ajax search

    init_ajax_project_search_by_customer_id();

    // Maybe items ajax search

    init_ajax_search('items', '#item_select.ajax-search', undefined, admin_url + 'items/search');

    /*iJK*/
    $('#clientid').on('change',function(e){
    e.preventDefault();
    var clientid = $(this).val();
        $.ajax({
            url: '<?php echo admin_url('invoices/get_client_items') ?>',
            type: 'POST',
            dataType: 'json',
            data: {'clientid':clientid},
        })
        .done(function(response) {                  
            $('#item_select').html(response.html);
            $("#item_select").selectpicker('refresh');
        })
        .fail(function(response) {
            console.log(response);
        });
    });

    $('body').on('change', '#invoice_calls_select_all_calls', function() {
          var checked = $(this).prop('checked');
          var name_selector;
          name_selector = 'input[name="calls[]"]';
          if (checked == true) {
              $(name_selector).not(':disabled').prop('checked', true);
          } else {
              $(name_selector).not(':disabled').prop('checked', false);
          }
      });

    // $('.add-calls-invoice').on('click',function(){
    // var client_id = $("#clientid").val();
    //     alert(client_id);
    //     return false;
    //   requestGet('clients/get_client_calls/' + client_id).done(function(response) {
    //       // $('#pre_invoice_project').html(response);
    //       // $('#pre_invoice_project_settings').modal('show');
    //   });
    // });

    /*iJK*/

});


function add_calls_invoice(){
    var client_id = $("#clientid").val();
    if(client_id == ""){
        alert('Please select client first');
        return false;
    }
    requestGet('clients/get_client_calls_to_invoice/' + client_id).done(function(response) {
      $('#invoice_calls_popup').html(response);
      $('#invoice_calls_popup_modal').modal('show');
    });
}

</script>

</body>



</html>