<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style type="text/css">
.checkbox-success input[type=checkbox]:checked~label:before, .checkbox-success input[type=radio]:checked~label:before {
    background-color: #22c55e;
    border-color: #22c55e;
}

.checkbox input[type=checkbox]:checked~label:after, .checkbox input[type=radio]:checked~label:after {
    content: "\e013";
    font-family: Glyphicons Halflings;
}

.checkbox-success input[type=checkbox]:checked~label:after, .checkbox-success input[type=radio]:checked~label:after {
    color: #fff;
}

.modal-body-header {
    display: flex;
    justify-content: space-between;
    padding-bottom: 25px;
}


.check-box {
    display: flex;
    gap: 15px;
    align-items: center;
}

.select-item input {
    padding: 0px;
    margin: 0px;
}

.select-item lable {
    margin: 0px;
    padding: 0px;
}

.langauge-price label {
    margin: 0px;
    padding: 0px;
}

.langauge-price input {
    margin: 0px;
    padding: 0px;
    border-radius: 0;
    border: 0;
    height: 28px;
    background: transparent;
    box-shadow: none;
    border: 1px solid silver;
    border-radius: 4px;
}

.select-item input {
    margin: 0px;
    padding: 0px;
}

input#item3 {
    margin: 0px;
    padding: 0px;
}
.langauge-checkbox {
    display: flex;
    align-items: center;
    gap: 20px;
}

.langauge-checkbox input {
    margin: 0px;
    padding: 0px;
}

.select-item lable {
    margin: 0;
    padding: 0;
}

.search-input-box input {
    width: 50px;
    border-radius: 0;
    border: 0;
    height: 28px;
    background: transparent;
    box-shadow: none;
    border: 1px solid silver;
    border-radius: 4px;
}

.main-header-input input {
    width: 100% !important;
}

.select-item label {
    margin: 0px;
    padding: 0px;
}

.langauge-checkbox-input {
    display: flex;
    justify-content: space-between;
    padding-top: 0;
    margin-bottom: 15px;
    flex-wrap: wrap;
    gap: 17px;
}

.langauge-price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.select-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.langauge-price-input {
width: 35px}
</style>

<?php if (isset($client)) { ?>

<h4 class="customer-profile-group-heading"><?php echo _l('client_add_edit_profile'); ?></h4>

<?php } ?>



<div class="row">

    <?php echo form_open($this->uri->uri_string(), ['class' => 'client-form', 'autocomplete' => 'off']); ?>

    <div class="additional"></div>

    <div class="col-md-12">

        <div class="horizontal-scrollable-tabs panel-full-width-tabs">

            <div class="scroller arrow-left"><i class="fa fa-angle-left"></i></div>

            <div class="scroller arrow-right"><i class="fa fa-angle-right"></i></div>

            <div class="horizontal-tabs">

                <ul class="nav nav-tabs customer-profile-tabs nav-tabs-horizontal" role="tablist">

                    <li role="presentation" class="<?php echo !$this->input->get('tab') ? 'active' : ''; ?>">

                        <a href="#contact_info" aria-controls="contact_info" role="tab" data-toggle="tab">

                            <?php echo _l('customer_profile_details'); ?>

                        </a>

                    </li>

                    <?php

                  $customer_custom_fields = false;

                  if (total_rows(db_prefix() . 'customfields', ['fieldto' => 'customers', 'active' => 1]) > 0) {

                      $customer_custom_fields = true; ?>

                    <li role="presentation" class="<?php if ($this->input->get('tab') == 'custom_fields') {

                          echo 'active';

                      }; ?>">

                        <a href="#custom_fields" aria-controls="custom_fields" role="tab" data-toggle="tab">

                            <?php echo hooks()->apply_filters('customer_profile_tab_custom_fields_text', _l('custom_fields')); ?>

                        </a>

                    </li>

                    <?php

                  } ?>

                  <li role="presentation">

                        <a href="#data_collection_tab" aria-controls="data_collection_tab" role="tab" data-toggle="tab">Data Collection</a>

                    </li>

                    <li role="presentation">

                        <a href="#billing_and_shipping" aria-controls="billing_and_shipping" role="tab"

                            data-toggle="tab">

                            <?php echo _l('billing_shipping'); ?>

                        </a>

                    </li>

                    <?php hooks()->do_action('after_customer_billing_and_shipping_tab', isset($client) ? $client : false); ?>

                    <?php if (isset($client)) { ?>

                    <li role="presentation">

                        <a href="#customer_admins" aria-controls="customer_admins" role="tab" data-toggle="tab">

                            <?php echo _l('customer_admins'); ?>

                            <?php if (count($customer_admins) > 0) { ?>

                            <span class="badge bg-default"><?php echo count($customer_admins) ?></span>

                            <?php } ?>

                        </a>

                    </li>

                    <?php hooks()->do_action('after_customer_admins_tab', $client); ?>

                    <?php } ?>
                     <li role="presentation">

                        <a href="#billing_info" aria-controls="billing_info" role="tab" data-toggle="tab">

                            Billing Info

                        </a>

                    </li>
                    <?php
                      if(isset($client)){
                        ?>
                    <li role="presentation">

                        <a href="#language_master" aria-controls="language_master" role="tab" data-toggle="tab">

                            Language Master

                        </a>

                    </li>
                        <?php } ?>

                </ul>

            </div>

        </div>

        <div class="tab-content mtop15">

            <?php hooks()->do_action('after_custom_profile_tab_content', isset($client) ? $client : false); ?>

            <?php if ($customer_custom_fields) { ?>

            <div role="tabpanel" class="tab-pane <?php if ($this->input->get('tab') == 'custom_fields') {

                      echo ' active';

                  }; ?>" id="custom_fields">

                <?php $rel_id = (isset($client) ? $client->userid : false); ?>

                <?php echo render_custom_fields('customers', $rel_id); ?>

            </div>

            <?php } ?>

            <div role="tabpanel" class="tab-pane<?php if (!$this->input->get('tab')) {

                      echo ' active';

                  }; ?>" id="contact_info">

                <div class="row">

                    <div class="col-md-12 <?php if (isset($client) && (!is_empty_customer_company($client->userid) && total_rows(db_prefix() . 'contacts', ['userid' => $client->userid, 'is_primary' => 1]) > 0)) {

                      echo '';

                  } else {

                      echo ' hide';

                  } ?>" id="client-show-primary-contact-wrapper">

                        <div class="checkbox checkbox-info mbot20 no-mtop">

                            <input type="checkbox" name="show_primary_contact" <?php if (isset($client) && $client->show_primary_contact == 1) {

                      echo ' checked';

                  }?> value="1" id="show_primary_contact">

                            <label

                                for="show_primary_contact"><?php echo _l('show_primary_contact', _l('invoices') . ', ' . _l('estimates') . ', ' . _l('payments') . ', ' . _l('credit_notes')); ?></label>

                        </div>

                    </div>

                    <div class="col-md-<?php echo !isset($client) ? 12 : 8; ?>">

                        <?php hooks()->do_action('before_customer_profile_company_field', $client ?? null); ?>

                        <?php $value = (isset($client) ? $client->company : ''); ?>

                        <?php $attrs = (isset($client) ? [] : ['autofocus' => true]); ?>

                        <?php echo render_input('company', 'client_company', $value, 'text', $attrs); ?>

                        <div class="form-group ">

                        <label for="client_id" class="control-label">Parent Account </label>

                        <select id="client_id" name="parent_id" class="select form-control " data-live-search="true" data-width="100%" >
                        <option value="">Select</option>
                        <?php $selected = (isset($client) ? $client->parent_id : ''); ?>
                        <?php foreach($copm_master as $com){ 
                        if (isset($client) && $com['userid']==$client->userid) {
                            // code...
                        }else{?>
                        <option value="<?php echo $com['userid']; ?>"><?php echo $com['company']; ?></option>
                        <?php } }?>
                        </select>

                    </div>
                        <div id="company_exists_info" class="hide"></div>

                        <?php hooks()->do_action('after_customer_profile_company_field', $client ?? null); ?>

                        <?php if (get_option('company_requires_vat_number_field') == 1) {

                      $value = (isset($client) ? $client->vat : '');

                      echo render_input('vat', 'client_vat_number', $value);

                  } ?>

                        <?php hooks()->do_action('before_customer_profile_phone_field', $client ?? null); ?>

                        <?php $value = (isset($client) ? $client->phonenumber : ''); ?>

                        <?php echo render_input('phonenumber', 'client_phonenumber', $value); ?>

                        <?php hooks()->do_action('after_customer_profile_company_phone', $client ?? null); ?>

                        <?php if ((isset($client) && empty($client->website)) || !isset($client)) {

                      $value = (isset($client) ? $client->website : '');

                      echo render_input('website', 'client_website', $value);

                  } else { ?>

                        <div class="form-group">

                            <label for="website"><?php echo _l('client_website'); ?></label>

                            <div class="input-group">

                                <input type="text" name="website" id="website" value="<?php echo $client->website; ?>"

                                    class="form-control">

                                <span class="input-group-btn">

                                    <a href="<?php echo maybe_add_http($client->website); ?>" class="btn btn-default"

                                        target="_blank" tabindex="-1">

                                        <i class="fa fa-globe"></i></a>

                                </span>



                            </div>

                        </div>

                        <?php }

                     $selected = [];

                     if (isset($customer_groups)) {

                         foreach ($customer_groups as $group) {

                             array_push($selected, $group['groupid']);

                         }

                     }

                     if (is_admin() || get_option('staff_members_create_inline_customer_groups') == '1') {

                         echo render_select_with_input_group('groups_in[]', $groups, ['id', 'name'], 'customer_groups', $selected, '<div class="input-group-btn"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#customer_group_modal"><i class="fa fa-plus"></i></a></div>', ['multiple' => true, 'data-actions-box' => true], [], '', '', false);

                     } else {

                         echo render_select('groups_in[]', $groups, ['id', 'name'], 'customer_groups', $selected, ['multiple' => true, 'data-actions-box' => true], [], '', '', false);

                     }

                     ?>

                        <div class="row">

                            <div class="col-md-<?php echo !is_language_disabled() ? 6 : 12; ?>">

                                <i class="fa-regular fa-circle-question pull-left tw-mt-0.5 tw-mr-1"

                                    data-toggle="tooltip"

                                    data-title="<?php echo _l('customer_currency_change_notice'); ?>"></i>

                                <?php

                     $s_attrs  = ['data-none-selected-text' => _l('system_default_string')];

                     $selected = '';

                     if (isset($client) && client_have_transactions($client->userid)) {

                         $s_attrs['disabled'] = true;

                     }

                     foreach ($currencies as $currency) {

                         if (isset($client)) {

                             if ($currency['id'] == $client->default_currency) {

                                 $selected = $currency['id'];

                             }

                         }

                     }

                            // Do not remove the currency field from the customer profile!

                     echo render_select('default_currency', $currencies, ['id', 'name', 'symbol'], 'invoice_add_edit_currency', $selected, $s_attrs);

                     ?>

                            </div>

                            <?php if (!is_language_disabled()) { ?>

                            <div class="col-md-6">



                                <div class="form-group select-placeholder">

                                    <label for="default_language"

                                        class="control-label"><?php echo _l('localization_default_language'); ?>

                                    </label>

                                    <select name="default_language" id="default_language"

                                        class="form-control selectpicker"

                                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">

                                        <option value=""><?php echo _l('system_default_string'); ?></option>

                                        <?php foreach ($this->app->get_available_languages() as $availableLanguage) {

                         $selected = '';

                         if (isset($client)) {

                             if ($client->default_language == $availableLanguage) {

                                 $selected = 'selected';

                             }

                         } ?>

                                        <option value="<?php echo $availableLanguage; ?>" <?php echo $selected; ?>>

                                            <?php echo ucfirst($availableLanguage); ?></option>

                                        <?php

                     } ?>

                                    </select>

                                </div>

                            </div>

                            <?php } ?>

                        </div>

                        <hr />



                        <?php $value = (isset($client) ? $client->address : ''); ?>

                        <?php echo render_textarea('address', 'client_address', $value); ?>

                        <?php $value = (isset($client) ? $client->city : ''); ?>

                        <?php echo render_input('city', 'client_city', $value); ?>

                        <?php $value = (isset($client) ? $client->state : ''); ?>

                        <?php echo render_input('state', 'client_state', $value); ?>

                        <?php $value = (isset($client) ? $client->zip : ''); ?>

                        <?php echo render_input('zip', 'client_postal_code', $value); ?>

                        <?php $countries       = get_all_countries();

                     $customer_default_country = get_option('customer_default_country');

                     $selected                 = (isset($client) ? $client->country : $customer_default_country);

                     echo render_select('country', $countries, [ 'country_id', [ 'short_name']], 'clients_country', $selected, ['data-none-selected-text' => _l('dropdown_non_selected_tex')]);

                     ?>

                    </div>

                </div>

            </div>

            <?php if (isset($client)) { ?>

            <div role="tabpanel" class="tab-pane" id="customer_admins">

                <?php if (has_permission('customers', '', 'create') || has_permission('customers', '', 'edit')) { ?>

                <a href="#" data-toggle="modal" data-target="#customer_admins_assign"

                    class="btn btn-primary mbot30"><?php echo _l('assign_admin'); ?></a>

                <?php } ?>

                <table class="table dt-table">

                    <thead>

                        <tr>

                            <th><?php echo _l('staff_member'); ?></th>

                            <th><?php echo _l('customer_admin_date_assigned'); ?></th>

                            <?php if (has_permission('customers', '', 'create') || has_permission('customers', '', 'edit')) { ?>

                            <th><?php echo _l('options'); ?></th>

                            <?php } ?>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($customer_admins as $c_admin) { ?>

                        <tr>

                            <td><a href="<?php echo admin_url('profile/' . $c_admin['staff_id']); ?>">

                                    <?php echo staff_profile_image($c_admin['staff_id'], [

                           'staff-profile-image-small',

                           'mright5',

                           ]);

                           echo get_staff_full_name($c_admin['staff_id']); ?></a>

                            </td>

                            <td data-order="<?php echo $c_admin['date_assigned']; ?>">

                                <?php echo _dt($c_admin['date_assigned']); ?></td>

                            <?php if (has_permission('customers', '', 'create') || has_permission('customers', '', 'edit')) { ?>

                            <td>

                                <a href="<?php echo admin_url('clients/delete_customer_admin/' . $client->userid . '/' . $c_admin['staff_id']); ?>"

                                    class="tw-mt-px tw-text-neutral-500 hover:tw-text-neutral-700 focus:tw-text-neutral-700 _delete">

                                    <i class="fa-regular fa-trash-can fa-lg"></i>

                                </a>

                            </td>

                            <?php } ?>

                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

            <?php } ?>

            <div role="tabpanel" class="tab-pane" id="billing_and_shipping">

                <div class="row">

                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-md-6">

                                <h4

                                    class="tw-font-medium tw-text-base tw-text-neutral-700 tw-flex tw-justify-between tw-items-center tw-mt-0 tw-mb-6">

                                    <?php echo _l('billing_address'); ?>

                                    <a href="#"

                                        class="billing-same-as-customer tw-text-sm tw-text-neutral-500 hover:tw-text-neutral-700 active:tw-text-neutral-700">

                                        <?php echo _l('customer_billing_same_as_profile'); ?>

                                    </a>

                                </h4>



                                <?php $value = (isset($client) ? $client->billing_street : ''); ?>

                                <?php echo render_textarea('billing_street', 'billing_street', $value); ?>

                                <?php $value = (isset($client) ? $client->billing_city : ''); ?>

                                <?php echo render_input('billing_city', 'billing_city', $value); ?>

                                <?php $value = (isset($client) ? $client->billing_state : ''); ?>

                                <?php echo render_input('billing_state', 'billing_state', $value); ?>

                                <?php $value = (isset($client) ? $client->billing_zip : ''); ?>

                                <?php echo render_input('billing_zip', 'billing_zip', $value); ?>

                                <?php $selected = (isset($client) ? $client->billing_country : ''); ?>

                                <?php echo render_select('billing_country', $countries, [ 'country_id', [ 'short_name']], 'billing_country', $selected, ['data-none-selected-text' => _l('dropdown_non_selected_tex')]); ?>

                            </div>

                            <div class="col-md-6">

                                <h4

                                    class="tw-font-medium tw-text-base tw-text-neutral-700 tw-flex tw-justify-between tw-items-center tw-mt-0 tw-mb-6">

                                    <span>

                                        <i class="fa-regular fa-circle-question tw-mr-1" data-toggle="tooltip"

                                            data-title="<?php echo _l('customer_shipping_address_notice'); ?>"></i>



                                        <?php echo _l('shipping_address'); ?>

                                    </span>

                                    <a href="#"

                                        class="customer-copy-billing-address tw-text-sm tw-text-neutral-500 hover:tw-text-neutral-700 active:tw-text-neutral-700">

                                        <?php echo _l('customer_billing_copy'); ?>

                                    </a>

                                </h4>



                                <?php $value = (isset($client) ? $client->shipping_street : ''); ?>

                                <?php echo render_textarea('shipping_street', 'shipping_street', $value); ?>

                                <?php $value = (isset($client) ? $client->shipping_city : ''); ?>

                                <?php echo render_input('shipping_city', 'shipping_city', $value); ?>

                                <?php $value = (isset($client) ? $client->shipping_state : ''); ?>

                                <?php echo render_input('shipping_state', 'shipping_state', $value); ?>

                                <?php $value = (isset($client) ? $client->shipping_zip : ''); ?>

                                <?php echo render_input('shipping_zip', 'shipping_zip', $value); ?>

                                <?php $selected = (isset($client) ? $client->shipping_country : ''); ?>

                                <?php echo render_select('shipping_country', $countries, [ 'country_id', [ 'short_name']], 'shipping_country', $selected, ['data-none-selected-text' => _l('dropdown_non_selected_tex')]); ?>

                            </div>

                            <?php if (isset($client) &&

                        (total_rows(db_prefix() . 'invoices', ['clientid' => $client->userid]) > 0 || total_rows(db_prefix() . 'estimates', ['clientid' => $client->userid]) > 0 || total_rows(db_prefix() . 'creditnotes', ['clientid' => $client->userid]) > 0)) { ?>

                            <div class="col-md-12">

                                <div class="alert alert-warning">

                                    <div class="checkbox checkbox-default -tw-mb-0.5">

                                        <input type="checkbox" name="update_all_other_transactions"

                                            id="update_all_other_transactions">

                                        <label for="update_all_other_transactions">

                                            <?php echo _l('customer_update_address_info_on_invoices'); ?><br />

                                        </label>

                                    </div>

                                    <p class="tw-ml-7 tw-mb-0">

                                        <?php echo _l('customer_update_address_info_on_invoices_help'); ?>

                                    </p>

                                    <div class="checkbox checkbox-default">

                                        <input type="checkbox" name="update_credit_notes" id="update_credit_notes">

                                        <label for="update_credit_notes">

                                            <?php echo _l('customer_profile_update_credit_notes'); ?>

                                        </label>

                                    </div>

                                </div>

                            </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="billing_info">

                <div class="row">

                    <div class="col-md-6">  


                        <div class="form-group">

                        <div class="checkbox checkbox-success">

                        <input type="checkbox" <?php if ((isset($client) && $client->wire_transfer == 1)) {

                        echo 'checked';

                        } ?> name="wire_transfer" id="wire_transfer" required>

                        <label for="wire_transfer">Wire transfer</label>

                        </div>

                        </div>


                          <!--   <div class="checkbox checkbox-default">
                                <?php $check = ((isset($client) && $client->wire_transfer== 1 ) ? "checked" : "" ); ?>
                                <input type="checkbox" name="wire_transfer" id="wire_transfer" required >
                                <label for="wire_transfer">
                                    Wire transfer
                                </label>
                             </div> -->
                          <?php $value = (isset($client) ? $client->unique_id : ''); ?>
                         <input type="hidden" name="unique_id" value="<?php echo $value; ?>">
                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane" id="language_master">
               <a href="#" data-toggle="modal" data-target="#manage_language_rate" class="btn btn-primary mbot30">Update Rate </a>
                <div class="row">   
                    <table class="table dt-table" data-order-col="2" data-order-type="desc">
                    <thead>
                        <tr>
                            <th>
                                <?php echo _l('invoice_items_list_description'); ?>
                            </th>
                            <th>
                                <?php echo _l('invoice_item_long_description'); ?>
                            </th>
                            <th>
                                <?php echo _l('invoice_items_list_rate'); ?>
                            </th>
                            <th>
                                <?php echo _l('tax_1'); ?>
                            </th>
                            <th>
                                <?php echo _l('tax_2'); ?>
                            </th>
                            <th>
                                <?php echo _l('unit'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($languages as $lang){?>
                        <tr>
                            <td> <?php echo $lang['description']; ?></td>
                            <td> <?php echo $lang['long_description']; ?> </td>
                            <td> <?php echo $lang['master_rate'] ?? $lang['rate'] ; ?></td>
                            <td> <?php echo $lang['taxrate']; ?></td>
                            <td> <?php echo $lang['taxrate_2']; ?></td>
                            <td> <?php echo $lang['unit']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                    </table>

                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="data_collection_tab">
                <div class="row">
                  <div class="col-md-4">
                    <div class="checkbox checkbox-info mbot20">
                        <input type="checkbox" name="data_collection" <?= (isset($client) && $client->data_collection == 1) ? 'checked':'' ?> value="1" id="data_collection">
                        <label for="data_collection">Data Collection</label>
                    </div>
                  </div>
                  <div class="col-md-4 dc_category_div <?= (!isset($client) || $client->data_collection != 1) ? 'hide':'' ?> ">
                    <div class="form-group select-placeholder">
                      <label for="dc_category" class="control-label">Data Collection Category</label>
                      <select class="form-control selectpicker" require id="dc_category" name="dc_category">
                        <option selected="" value="">Select Category</option>
                        <?php
                        foreach ($dc_categories as $key) {
                          ?>
                            <option value="<?= $key['id']; ?>" <?= (isset($client) && $client->dc_category == $key['id'])?"selected":"" ?> ><?= $key['name'] ?></option>
                          <?php
                        }
                      ?>
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                <h4>Category Fields</h4>
                <div class="master_dc_fields">
                <?php
                    if(!empty($dc_data)){
                        foreach ($dc_data as $key) { ?>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" disabled="" name="name" value="<?= $key['name']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" disabled="" name="name" value="<?= $key['description'] ?>">
                                </div>
                            </div>
                        <?php }
                    }
                    else{
                        echo "No Fields Found";
                    }
                ?>
                </div>
                <hr>
                <?php if(isset($custom_dc_data)){?> 
                  <h4>Your Custom Fields</h4>
                  <a href="#" data-toggle="modal" data-target="#add_custom_dc_modal" class="btn btn-primary mbot30">Add Data Collection</a>
                  
                  <?php if (isset($client)) { ?>
                    <a href="<?= base_url('admin/preview_popup?cust_id=').$client->userid ?>"  target="__blank" class="btn btn-secondary mbot30 preview_data_collection <?= $client->data_collection != 1 ? 'hide' : '' ?>">Preview</a>
                  <?php
                  }
                  ?>
                  <table class="table dt-table scroll-responsive" data-order-col="0" data-order-type="desc">
                      <thead>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th><?php echo _l('options'); ?></th>
                      </thead>
                      <tbody>
                        <?php 
                        foreach ($custom_dc_data as $dc) { ?>
                          <tr>
                              <td><?= $dc['id']; ?></td>
                              <td><?= $dc['name']; ?></td>
                              <td><?= $dc['description']; ?></td>
                              <td>
                                  <a href="#" data-id="<?php echo $dc['id']; ?>" data-name="<?php echo $dc['name']; ?>" data-description="<?php echo $dc['description']; ?>" class="btn btn-default btn-icon edit_custom_dc"><i class="fa fa-pencil"></i></a>
                                  <a href="<?php echo admin_url('custom_dc_master/delete_custom_dc/' . $dc['id'].'/'.$client->userid); ?>" class="btn btn-danger btn-icon _delete"><i class="fa fa-remove"></i></a>
                              </td>
                          </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
                <?php }  ?>

                    <!-- // foreach ($custom_dc_data as $key) { ?> -->
                        <!-- <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control"  name="custom_name[]" value="<?= $key['name']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="custom_description[]" value="<?= $key['description'] ?>">
                            </div>
                        </div> -->
            </div>

        </div>

    </div>

    <?php echo form_close(); ?>

</div>
<div class="modal fade" id="add_custom_dc_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open(admin_url('custom_dc_master/custom_dc')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <input type="hidden" name="client_id" value="<?= $client->userid; ?>">
                <h4 class="modal-title">
                    <span class="add-title">Create Data Collection</span>
                </h4>
            </div>
            <div class="modal-body add_custom_div">
                <div class="row">
                    <div class="col-md-5">
                        <?php echo render_input('name[]', 'Name'); ?>

                    </div>
                    <div class="col-md-5 form-group">
                        <label for="important" class="control-label clearfix">Description</label>
                        <input type="text" class="form-control" name="description[]">
                    </div>
                    <div class="col-md-2">
                        <span for="important" class="control-label clearfix">Add</span>
                        <button class="btn btn-success add_more_custom_div p8-half" type="button"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
        <?php echo form_close(); ?>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="edit_custom_dc_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open(admin_url('custom_dc_master/edit_custom_dc')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <input type="hidden" name="client_id" value="<?= $client->userid; ?>">
                <h4 class="modal-title">
                    <span class="add-title">Edit Data Collection</span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <?php echo render_input('name', 'Name'); ?>
                        <input type="hidden" name="custom_dc_id" value="">
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="important" class="control-label clearfix">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
        <?php echo form_close(); ?>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php if (isset($client)) { ?>

<?php if (has_permission('customers', '', 'create') || has_permission('customers', '', 'edit')) { ?>

<div class="modal fade" id="customer_admins_assign" tabindex="-1" role="dialog">

    <div class="modal-dialog">

        <?php echo form_open(admin_url('clients/assign_admins/' . $client->userid)); ?>

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                        aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><?php echo _l('assign_admin'); ?></h4>

            </div>

            <div class="modal-body">

                <?php

               $selected = [];

               foreach ($customer_admins as $c_admin) {

                   array_push($selected, $c_admin['staff_id']);

               }

               echo render_select('customer_admins[]', $staff, ['staffid', ['firstname', 'lastname']], '', $selected, ['multiple' => true], [], '', '', false); ?>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                <button type="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>

            </div>

        </div>

        <!-- /.modal-content -->

        <?php echo form_close(); ?>

    </div>

    <!-- /.modal-dialog -->

</div>

<!-- /.modal -->

<?php } ?>

<?php } ?>
<div class="modal fade" id="manage_language_rate" tabindex="-1" role="dialog">

    <div class="modal-dialog">

        <?php echo form_open(admin_url('clients/change_lang_rate/' . $client->userid)); ?>

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                        aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Select Language </h4>

            </div>

            <div class="modal-body">
                <div class="modal-body-header">
                    <!-- <div class="search-input-box main-header-input">
                        <input type="text">
                    </div> -->
                    <div class="check-box">
                        <div class="select-item">
                            <input id="selectCheckbox" onclick='selects()'  type="checkbox" id="ckbCheckAll" class="selectCheckbox" name="selectCheckbox" >
                            <label for="selectCheckbox">Select all</label>
                        </div>
                        <div class="langauge-price">
                            <label for="item2">Langauge price</label>
                            <input class="langauge-price-input" type="text" name="global_price" 
                            onkeyup="changeAllPrice(this)" id="global_price" >
                        </div>
                        <div class="select-item">
                            <input id="deSelectCheckbox" type="checkbox" onclick='deSelect()' class="selectCheckbox"  name="selectCheckbox">
                            <label for="deSelectCheckbox" >Deselect all</label>
                        </div>
                        <div>
                    </div>
                </div>
            </div>
            <div class="langauge-checkbox-input">
                <?php foreach($languages as $lang){?>
                <div class="langauge-checkbox">
                    <div class="select-item">
                        <input id="<?php echo $lang['itemid']; ?>" type="checkbox" value="<?php echo $lang['itemid']; ?>" class="checkBoxClass" name="itemIds[]" data-id="inputPrice<?php echo $lang['itemid']; ?>">
                        <label for="<?php echo $lang['itemid']; ?>"><?php echo $lang['description']; ?></label>
                    </div>
                    <div class="search-input-box">
                        <input type="text" name="price[]" class="priceRate" value="<?php echo $lang['master_rate'] ?? $lang['rate'] ; ?>" id="inputPrice<?php echo $lang['itemid']; ?>">
                        <input type="hidden" name="ids[]"  value="<?php echo $lang['itemid']; ?>">
                    </div>
                </div>
                <?php } ?>
            </div>
           
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                <button type="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>

            </div>

        </div>

        <!-- /.modal-content -->

        <?php echo form_close(); ?>

    </div>

    <!-- /.modal-dialog -->

</div>

<script type="text/javascript"> 

function changeAllPrice(e) {
    var checkBox = document.getElementById("selectCheckbox");
    var checkboxes = document.getElementsByName("itemIds[]");
    if (checkBox.checked == true){
        var ele=document.getElementsByClassName('priceRate');  
        for(var i=0; i<ele.length; i++){  
                ele[i].value=e.value;
        } 
    }else if(countCheckbox() > 0 ){
        for (var i=0; i<checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                document.getElementById(checkboxes[i].dataset.id).value=e.value;
            }
        }
    }

}

function countCheckbox(){
    var checkboxes = document.getElementsByName("itemIds[]");
    var checkboxesChecked = [];
    for (var i=0; i<checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxesChecked.push(checkboxes[i]);
        }
    }
    return checkboxesChecked.length;
}

function selects(){ 
var checkBox = document.getElementById("selectCheckbox");
var ele=document.getElementsByClassName('checkBoxClass');  
if (checkBox.checked == true){
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=true;  
    }  
    document.getElementById("deSelectCheckbox").checked = false;
  } else {
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=false;  
          
    }  
  }
}  
function deSelect(){  
var checkBox = document.getElementById("selectCheckbox");
var checkBoxTwo = document.getElementById("deSelectCheckbox");
var ele=document.getElementsByClassName('checkBoxClass');  
    if (checkBox.checked == true){
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
        } 
        document.getElementById("selectCheckbox").checked = false;
    }else if(countCheckbox() > 0){
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
        } 
        document.getElementById("selectCheckbox").checked = false;
    }
    else{
        document.getElementById("deSelectCheckbox").checked = false;
    } 
}             
</script>  
<?php $this->load->view('admin/clients/client_group'); ?>