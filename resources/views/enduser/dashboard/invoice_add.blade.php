@extends('layouts.enduser.dashboard.master')

@section('content')
<style>
    .form-horizontal .control-label {
        text-align: left;
        margin-bottom: 0;
        padding-top: 7px;
        font-weight: bold;
        color: #666;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857;
        vertical-align: middle;
        border-top: 1px solid #e7ecf1;
    }

    .middle-td {
        text-align: center;
    }

    table.dataTable.select tbody tr,
    table.dataTable thead th:first-child {
        cursor: pointer;
    }

    .item-desc {
        height: 34px;
    }
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Invoice Add</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid vehicle_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        New Invoice
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveVehicleForm">
                    <div class="text-dark kt-form">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Customer Name</label>
                                        <div class="col-md-8 ">

                                            <select name="customer_name" id="customer_name" class="form-control kt-select2-2">
                                                <option value="1">Select one</option>
                                                <option value="2">Select two</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Address</label>
                                        <div class="col-md-8">
                                            <div id="loadingNote" style="display:none; text-align:center;">
                                                <img src="http://bull.gomaxautomation.com//assets/images/loading-image.gif">

                                            </div>
                                            <textarea id="address" name="address" class="form-control" rows="2">
                                        </textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Invoice Date</label>
                                        <div class="col-md-8">
                                            <input name="receipt_date" id="receipt_date" placeholder="yyyy-mm-dd" class="form-control " type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">PO Number</label>
                                        <div class="col-md-8">
                                            <input name="po_number" id="po_number" placeholder="PO number" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Invoice Prefix</label>
                                        <div class="col-md-8">
                                            <input name="prefix" id="prefix" placeholder="Invoice Prefix" class="form-control" type="text" value="BBL">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Invoice #</label>
                                        <div class="col-md-8">
                                            <input id="starting_no" name="receipt_no" placeholder="Invoice No." class="form-control" type="text" value="46">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Invoice Suffix</label>
                                    <div class="col-md-8">
                                        <input name="suffix" id="suffix" placeholder="Invoice suffix" class="form-control" type="text" value="INB">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Invoice Format</label>
                                    <div class="col-md-8">
                                        <input type="hidden" id="seperator" value="/">
                                        <input name="receipt_no" id="inv_format" class="form-control" type="text">
                                        <div style="display:none;"> <span id="prx">BBL</span><span>/</span>46<span>/</span><span id="sfx">INB</span>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Payment Terms</label>
                                    <div class="col-md-8">
                                        <select name="payment_terms" id="payment_terms" class="form-control kt-select2-2">
                                            <option value="0">Due on Receipt</option>
                                            <option value="5">+5 days</option>
                                            <option value="7">+7 days</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Invoice Status</label>
                                    <div class="col-md-8">
                                        <select name="status" id="status" class="form-control kt-select2-2">
                                            <option value="paid">Paid</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Currency</label>
                                    <div class="col-md-8">
                                        <select name="currency" id="currency" class="form-control kt-select2-2">
                                            <option value="">Select</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row d-none">
                                    <label class="col-form-label col-md-6">Conversion Rate</label>
                                    <div class="col-md-6 inner-addon right-addon">
                                        <div class="input-group">
                                            <input type="text" name="conversion_rate" id="conversion_rate" class="form-control" value="1">
                                            <div class="input-group-prepend"><span class="input-group-text">BDT</span></div>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Send Reminder</label>
                                    <div class="col-md-8">
                                        <select class="form-control kt-select2-2" name="reminder" id="reminder">
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Sales Tax</label>
                                    <div class="col-md-8 ">

                                        <select name="tax" id="tax" class="form-control kt-select2-2">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Shipping</label>
                                    <div class="col-md-8">
                                        <select name="shipping" id="shipping" class="form-control kt-select2-2">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Shipping Charge</label>
                                    <div class="col-md-8">
                                        <input name="shipping_charge" id="shipping_charge" placeholder="Shipping charge" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row d-none">
                                    <label class="col-form-label col-md-3">Payment Mode</label>
                                    <div class="checkbox-list col-md-8">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="mode_of_payment[]" id="bank_method" value="bank"> Bank </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="mode_of_payment[]" id="cheque_method" value="cheque"> Cheque </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="mode_of_payment[]" id="gateway_method" value="gateway"> Online Gateway </label>
                                    </div>
                                </div>
                            </div><!--  end of col-md-6       -->
                        </div>
                        <div class="clearfix">
                            <p></p>
                        </div>

                        <div class="row">
                            <!-- the main content of any page... -->
                            <div class="col-lg-12">
                                <!--begin: Datatable -->
                                <table class="table invoice_item_table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th> Product Description </th>
                                            <th> Unit Price </th>
                                            <th> Qty </th>
                                            <th> Discount</th>
                                            <th> </th>
                                            <th> Tax/VAT(<i class="fa fa-percent"></i>) </th>
                                            <th> Total </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <tr class="invoice_item_row">
                                            <td>
                                                <span class="counter_span"></span><input type="hidden" name="itemID[]" id="itemID_1" value="0">
                                            </td>
                                            <td style="min-width: 150px;">
                                                <textarea name="item_desc[]" id="item_desc_1" class="form-control item-desc" rows="1"></textarea>
                                            </td>
                                            <td>
                                                <input name="unit_price[]" id="unit_price_1" class="form-control input-xsmall middle-td row_unit_price row_calculation" type="text">
                                            </td>
                                            <td style="max-width: 110px;">
                                                <input name="qty[]" id="qty_1" class="form-control input-xsmall middle-td row_quantity row_calculation" type="text">
                                            </td>
                                            <td style="padding: 0; max-width: 110px;">
                                                <input name="discount[]" id="discount_1" class="form-control row_discount row_calculation" type="text">
                                            </td>
                                            <td style="padding-left:0;">
                                                <select class="form-control row_discount_type" style="width: 40px; padding:0;" name="discount_type[]" id="discount_type_1">
                                                    <option value="1">%</option>
                                                    <option value="2">$</option>
                                                </select>
                                            </td>
                                            <td style="max-width: 110px;">
                                                <input name="tax_vat[]" id="tax_vat_1" class="form-control input-xsmall middle-td vat_tax row_vat_tax row_calculation" type="text">
                                            </td>
                                            <td>
                                                <input name="total[]" id="total_1" class="form-control input-small middle-td row_subtotal row_calculation" type="text">
                                            </td>
                                            <td>
                                                <!--<a href="javascript:;" class="btn btn-icon-only btn-outline-danger"> <i class="fa fa-times"></i></a>-->
                                                #
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" id="total_item" name="total_item" value="1">
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <div>
                                <a href="javascript:;" class="add_field btn btn-sm btn-outline-primary mr-1"> <i class="fa fa-plus"></i> Add Blank Fields </a>
                                <a href="javascript:;" onclick="add_item()" class="btn btn-sm btn-outline-success mr-1"> <i class="fa fa-plus"></i> Add Product / Service</a>
                                <a href="javascript:;" class="reset_all btn btn-sm btn-outline-danger"> <i class="fa fa-plus"></i> Reset</a>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-8 col-sm-8">
                                <div class="clearfix"></div>
                                <div class="tabbable-custom">
                                    <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" role="tablist">
                                        <li class="nav-item active"><a class="nav-link active" href="#terms_tab" data-toggle="tab"> Terms & Conditions </a></li>
                                        <li class="nav-item"><a class="nav-link" href="#note_tab" data-toggle="tab"> Note / Remarks </a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="terms_tab">
                                            <div>
                                                <textarea name="terms_condition" class="summernote" cols="30" rows="10">No product will be returned after sold</textarea>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="note_tab">
                                            <div>
                                                <textarea name="note_section" class="summernote" cols="30" rows="10" placeholder="Enter note or remarks"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end of tab panel....-->
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4" style="margin-top:50px !important;">
                                <div class="portlet light bordered invoice_total_section mt-4">
                                    <strong>Sub Total: </strong> <span id="overall_subtotal">0.00</span> <br>
                                    <strong>Discount: </strong> <span id="overall_discount">0.00</span> <br>
                                    <strong>Vat/Tax: </strong> <span id="overall_vat_tax">0.00</span> <br>
                                    <strong>Shipment: </strong> <span id="overall_shipment">0</span> <br>
                                    <strong>Total: </strong> <span id="overall_net_total">0.00</span> <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="form-button">

                                <button type="button" id="reset" class="btn btn-danger btn-sm">Reset</button>

                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->

<script>
    $(document).ready(function() {
        $('.custom-button-class').removeClass('btn-secondary ');
    });

    window.overall_subtotal = 0;
    window.overall_discount = 0;
    window.overall_vat_tax = 0;
    window.overall_shipping = 0;
    window.overall_net_total = 0;

    function updateDataTableSelectAllCtrl(table) {
        var $table = table.table().node();
        var $chkbox_all = $('tbody input[type="checkbox"]', $table);
        var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
        var chkbox_select_all = $('thead input[name="select_all"]', $table).get(0);
        // If none of the checkboxes are checked
        if ($chkbox_checked.length === 0) {
            chkbox_select_all.checked = false;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }
            // If all of the checkboxes are checked
        } else if ($chkbox_checked.length === $chkbox_all.length) {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }
            // If some of the checkboxes are checked
        } else {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = true;
            }
        }
    }

    function reset_counter() {
        $(".counter_span").each(function(i, obj) {
            $(this).text(parseInt(i + 1));
        });
    }
    $(document).ready(function() {
        var SN = $('.field_wrapper tr').length;
        // $('#serial_no').html(SN);
        reset_counter()
        $('.hidden-div').hide();
        var table = $('#example').DataTable({
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function(data, type, full, meta) {
                    return '<input type="hidden" name="id[]" checked="' + data;
                }
            }],
            'order': [1, 'asc']
        });

        // Handle click on "Select all" control
        $('#example-select-all').on('click', function() {
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({
                'search': 'applied'
            }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function() {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    el.indeterminate = true;
                }
            }
        });

        $("#product_form").submit(function(e) {
            var allVals = [];
            var item_desc = [];
            var itemID = [];
            var price = [];
            var counter = 1;
            var vat = $('#tax_vat_1').val();
            $('input[class="prd_checkbox"]:checked').each(function() {
                var data = table.row($(this).parents('tr')).data();
                var item_id = $(this).val();
                item_desc = data[1];
                price = data[2];
                itemID = $(this).val();
                allVals.push($(this).val());
                $('#modal_product').modal('hide'); // hide bootstrap modal
                var wrapper = $('.field_wrapper'); //Input field wrapper
                counter += 1;
                SN += 1;
                fieldHTML = '<tr class="invoice_item_row"><td><span class="counter_span"></span><input type="hidden" class="form-control input-xsmall middle-td" style="border:none; max-width:50px;" name="itemID[]" id ="itemID_' + counter + '" value="' + itemID + '"></td><td><textarea name="item_desc[]" id="item_desc_' + counter + '" class="form-control item-desc" rows="1">' + item_desc + '</textarea> </td> <td> <input style="min-width: 150px;" name="unit_price[]" id="unit_price_' + counter + '" class="form-control input-xsmall middle-td row_unit_price row_calculation" type="text" value="' + price + '"> </td><td> <input style="max-width: 110px;" name="qty[]" id="qty_' + counter + '" class="form-control input-xsmall middle-td row_quantity row_calculation" type="text" value="1"> </td><td style="padding:0; max-width:110px;"><input name="discount[]" id="discount_' + counter + '" class="form-control row_discount row_calculation" type="text"></td><td style="padding-left:0;"><select class="form-control row_discount_type" style="width: 40px; padding:0;" name="discount_type[]" id="discount_type_' + counter + '"><option value="1"><i class="glyphicon" style="line-height:0.8;">%</i></option><option value="2"><i class="glyphicon" style="line-height:0.8;">$</i></option></select></td><td> <input name="tax_vat[]" id="tax_vat_' + counter + '" class="form-control input-xsmall middle-td vat_tax row_vat_tax row_calculation" type="text" value="' + vat + '"> </td><td> <input name="total[]" id="total_' + counter + '" class="form-control input-small middle-td row_subtotal" type="text" readonly="readonly"> </td><td><a href="javascript:;" class="item_remove btn btn-sm btn-icon-only btn-outline-danger"> <i class="fa fa-times"></i></a></td></tr>'; //New input field html 
                $('.field_wrapper').append(fieldHTML); // Add field html
                $('#total_item').val(counter);
            });

            invoice_utility();
            tax_rules();
            e.preventDefault();
        });

        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        $("#contact_category").change(function() {
            var val = $("#contact_category").val();
            if (val == 0) {
                $('.hidden-div').hide();
            }
            if (val == 1) {
                $('#loadingmessage').addClass('show');
                $('.hidden-div').show();
                $('#company_label').removeClass('d-none');
                $('#company_label').addClass('show');
                $('#tax_label').removeClass('d-none');
                $('#tax_label').addClass('show');
                $('#fax_label').removeClass('d-none');
                $('#fax_label').addClass('show');
                $('#website_label').removeClass('d-none');
                $('#website_label').addClass('show');
                $('#loadingmessage').removeClass('show');
            }

            if (val == 2) {
                $('#loadingmessage').addClass('show');
                $('.hidden-div').show();
                $('#company_label').removeClass('show');
                $('#company_label').addClass('d-none');
                $('#tax_label').removeClass('show');
                $('#tax_label').addClass('d-none');
                $('#fax_label').removeClass('show');
                $('#fax_label').addClass('d-none');
                $('#website_label').removeClass('show');
                $('#website_label').addClass('d-none');
                $('#loadingmessage').removeClass('show');

            }
        });

        $("#customer_name").change(function() {
            var val = $("#customer_name").val();
            // $('[name="customer_name"]').val(val);
            $('#address').removeClass('show'); //change button text
            $('#address').addClass('d-none');
            $('#loadingNote').show();
            if (val > 0) {
                $.ajax({
                    url: "http://bull.gomaxautomation.com/client/ajax_edit/" + val,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="address"]').val(data.address);
                        $('#loadingNote').hide();
                        $('#address').removeClass('d-none');
                        $('#address').addClass('show'); //change button text
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#address').removeClass('show');
                        $('#address').addClass('d-none'); //change button text
                    }
                });
            } // end of if any client found...
            else {
                $('#loadingNote').hide();
                $('#address').removeClass('show');
                $('#address').addClass('d-none'); //change button text }
            }
        });

        $("#currency").change(function() {
            $('#conversionRate').addClass('show');
        });

        //$('.vat_tax').attr('readonly', true);
        $('.vat_tax').val();

        var counter = 1;
        var vat = $('#tax_vat_1').val();
        $('.add_field').click(function() { //Once add button is clicked
            SN += 1;
            counter += 1;
            fieldHTML = '<tr class="invoice_item_row"><td><span class="counter_span"></span><input type="hidden" name="itemID[]" id ="itemID_' + counter + '" value="0"></td><td><textarea name="item_desc[]" id="item_desc_' + counter + '" class="form-control item-desc" rows="1"></textarea> </td> <td> <input name="unit_price[]" id="unit_price_' + counter + '" class="form-control input-xsmall middle-td row_unit_price row_calculation" type="text"> </td><td> <input name="qty[]" id="qty_' + counter + '" class="form-control input-xsmall middle-td row_quantity row_calculation" type="text"> </td><td style="padding:0;"><input name="discount[]" id="discount_' + counter + '" class="form-control row_discount row_calculation" type="text"></td><td style="padding-left:0;"><select class="form-control row_discount_type" style="width: 40px; padding:0;" name="discount_type[]" id="discount_type_' + counter + '"><option value="1"><i class="glyphicon" style="line-height:0.8;">%</i></option><option value="2"><i class="glyphicon" style="line-height:0.8;">$</i></option></select> </td><td> <input name="tax_vat[]" id="tax_vat_' + counter + '" class="form-control input-xsmall middle-td vat_tax row_vat_tax row_calculation" type="text" value="' + vat + '"> </td><td> <input name="total[]" id="total_' + counter + '" class="form-control input-small middle-td row_subtotal row_calculation" type="text" readonly="readonly"> </td><td><a href="javascript:;" class="item_remove btn btn-sm btn-icon-only btn-outline-danger"> <i class="fa fa-times"></i></a></td></tr>'; //New input field html 
            $('.field_wrapper').append(fieldHTML); // Add field html
            $('#total_item').val(counter);
            invoice_utility();
            tax_rules();
            reset_counter();
        });
        $('.field_wrapper').on('click', '.item_remove', function(e) {
            e.preventDefault();
            delete_row($(this).parent().parent('tr'), SN);
        });

        $('.bank_group').addClass('inactiveLink');
        $('.cheque_group').addClass('inactiveLink');
        $('.gateway_group').addClass('inactiveLink');

        var prefix = $('#prefix').val();
        var suffix = $('#suffix').val();
        var starting_no = $('#starting_no').val();
        var seperator = $('#seperator').val();
        $('#inv_format').val(prefix + seperator + starting_no + seperator + suffix);
        $("#prefix").keyup(function(event) {
            var new_prefix = $(this).val();
            $('#prx').text(new_prefix);
            var starting_no = $('#starting_no').val();
            var seperator = $('#seperator').val();
            var sfx = $('#sfx').text();
            $('#inv_format').val(new_prefix + seperator + starting_no + seperator + sfx);
        });

        $("#suffix").keyup(function(event) {
            var new_suffix = $(this).val();
            $('#sfx').text(new_suffix);
            var starting_no = $('#starting_no').val();
            var seperator = $('#seperator').val();
            var prx = $('#prx').text();
            $('#inv_format').val(prx + seperator + starting_no + seperator + new_suffix);
        });

    }); // end of document ready function.....

    $(function() {
        $('#bank_mode').click(function() {
            if ($(this).is(':checked')) {
                $('.bank_group').removeClass('inactiveLink');
            } else {
                $('.bank_group').addClass('inactiveLink');
            }
        });

        $('#cheque_mode').click(function() {
            if ($(this).is(':checked')) {
                $('.cheque_group').removeClass('inactiveLink');
            } else {
                $('.cheque_group').addClass('inactiveLink');
            }
        });

        $('#gateway_mode').click(function() {
            if ($(this).is(':checked')) {
                $('.gateway_group').removeClass('inactiveLink');
            } else {
                $('.gateway_group').addClass('inactiveLink');
            }
        });

    });

    function delete_row(item, serial) {

        bootbox.confirm({
            title: "Delete Confirmation",
            message: "Do you want to delete?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success btn-sm'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger btn-sm'
                }
            },
            callback: function(result) {
                if (result) {
                    item.remove();
                    serial -= 1;
                    invoice_utility();
                    reset_counter();
                }
            }
        });
    }

    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;
        url = "http://bull.gomaxautomation.com/invoice/ajax_add_for_receipt";
        var myparty;
        if ($('#new_party').val() == '') {
            myparty = $('#party_id').val();
        } else {
            myparty = $('#new_party').val();
        }
        var receipt_type = $('#receipt_type').val();
        var receipt_date = $('#receipt_date').val();
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: {
                party_id: myparty,
                receipt_type: receipt_type,
                receipt_date: receipt_date
            }, //$('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    $('#btnSave').text('Save Changes'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable
                    $('html, body').animate({
                        scrollTop: $('.alert-success').offset().top
                    }, 'slow');
                    $('.alert-success').show();
                    $('#form')[0].reset(); // reset form on modals
                    $('.alert-success').html('your data has been updated successfully');
                    setTimeout(function() {
                        $(".alert-success").hide();
                    }, 5000);
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('invalid-feedback'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Create Receipt'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable   
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('Create Receipt'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 
            }
        });
    }

    // add new party
    function add_party() {
        $('#party_form')[0].reset(); // reset form on modals
        $('.party-form').removeClass('has-error'); // clear error class
        $('.party-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add New Contact'); // Set Title to Bootstrap modal title
    }

    // add new sales tax
    function add_sales_tax() {
        $('#tax_form')[0].reset(); // reset form on modals
        $('.tax-form').removeClass('has-error'); // clear error class
        $('.tax-block').empty(); // clear error string
        $('#modal_tax_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add New VAT/Tax'); // Set Title to Bootstrap modal title
    }

    //add new sales tax/vat
    function save_tax() {
        url = "http://bull.gomaxautomation.com/invoice/add_new_tax";
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#tax_form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    $('#modal_tax_form').modal('hide');
                    $('[name="new_tax"]').val(data.id);
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnTax').text('Save'); //change button text
                $('#btnTax').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding data');
                $('#btnTax').text('Save'); //change button text
                $('#btnTax').attr('disabled', false); //set button enable 
            }
        });
    }

    function save_party() {
        var l = Ladda.create(document.querySelector('#btnParty'));
        l.start();
        var url;
        url = "http://bull.gomaxautomation.com/client/ajax_add";
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#party_form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    $('#modal_form').modal('hide');
                    $('[name="new_party"]').val(data.id);
                    $('#party_id').attr('disabled', true);
                    show_success_msg("Data Saved Successfully");
                    l.stop();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                    l.stop();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                show_err_msg("something wrong !!!");
                l.stop();
            }
        });
    }

    // add new party
    function add_item() {
        $('#modal_product').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add New Product/Service'); // Set Title to Bootstrap modal title
    }

    //add items into receipt_meta table....
    function save_invoice() {
        var l = Ladda.create(document.querySelector('#btnSave_only'));
        l.start();
        var url;
        url = "http://bull.gomaxautomation.com/invoice/ajax_add";
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    show_success_msg("Data Saved Successfully");
                    window.location.replace("http://bull.gomaxautomation.com//invoice/edit_invoice/" + data.id);
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                    l.stop();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                show_err_msg("something wrong !!!");
                l.stop();
            }
        });
    }

    function save_n_close() {
        var l = Ladda.create(document.querySelector('#btnSave_close'));
        l.start();
        var url;
        url = "http://bull.gomaxautomation.com/invoice/ajax_add";
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    show_success_msg("Data Saved Successfully");
                    window.location.replace("http://bull.gomaxautomation.com//invoice/view/" + data.id);
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                    l.stop();
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                show_err_msg("something wrong !!!");
                l.stop();
            }
        });
    }

    function row_total() {
        $("tr.invoice_item_row").each(function() {
            var price = ($(this).find("input.row_unit_price").val() == '') ? 0 : parseFloat($(this).find("input.row_unit_price").val()).toFixed(2);

            var quantity = ($(this).find("input.row_quantity").val() == '') ? 0 : parseInt($(this).find("input.row_quantity").val());

            var discount = ($(this).find("input.row_discount").val() == '') ? 0 : parseFloat($(this).find("input.row_discount").val()).toFixed(2);

            var discount_type = $(this).find("select.row_discount_type").val();

            var vat_tax = ($(this).find("input.row_vat_tax").val() == '') ? 0 : parseFloat($(this).find("input.row_vat_tax").val()).toFixed(2);

            var total_discount = (discount_type == 1) ? parseFloat((price * quantity * discount) / 100) : parseFloat(discount);

            var total_vat_tax = parseFloat((price * quantity * vat_tax) / 100);

            var sub_total = parseFloat(((price * quantity) - total_discount) + parseFloat(total_vat_tax)).toFixed(2);

            $(this).find("input.row_subtotal").val(sub_total);
            final_subtotal();
        });
    }

    function calculate_row_total() {
        $(".row_calculation").each(function() {
            $(this).keyup(function() {
                var price = $(this).parentsUntil('.invoice_item_row').find('input.row_unit_price').val();
                price = (price == '') ? 0 : parseFloat(price).toFixed(2);

                var quantity = $(this).parentsUntil('.invoice_item_row').find('input.row_quantity').val();
                quantity = (quantity == '') ? 0 : parseInt(quantity);

                var discount = $(this).parentsUntil('.invoice_item_row').find('input.row_discount').val();
                discount = (discount == '') ? 0 : parseFloat(discount).toFixed(2);

                var discount_type = $(this).parentsUntil('.invoice_item_row').find('select.row_discount_type').val();
                discount = (discount_type == 1) ? parseFloat((price * quantity * discount) / 100) : parseFloat(discount);

                var vat_tax = $(this).parentsUntil('.invoice_item_row').find('input.row_vat_tax').val();
                vat_tax = (vat_tax == '') ? 0 : parseFloat(vat_tax).toFixed(2);
                row_total();
                //var sub_total = parseFloat(((price*quantity)-discount)+vat_tax).toFixed(2);
                //$(this).parentsUntil('.invoice_item_row').find("input.row_subtotal").val(sub_total);
                //console.log(price,quantity,discount,vat_tax);
            });

        });

    }

    function invoice_utility() {
        row_total();
        calculate_row_total();

        $(".row_discount_type").on('change', function() {
            var total_discount = 0;
            var discount = ($(this).closest('.invoice_item_row').find("input.row_discount").val() == '') ? 0 : parseFloat($(this).closest('.invoice_item_row').find("input.row_discount").val()).toFixed(2);
            var price = ($(this).closest('.invoice_item_row').find("input.row_unit_price").val() == '') ? 0 : parseFloat($(this).closest('.invoice_item_row').find("input.row_unit_price").val()).toFixed(2);

            var quantity = ($(this).closest('.invoice_item_row').find("input.row_quantity").val() == '') ? 0 : parseInt($(this).closest('.invoice_item_row').find("input.row_quantity").val());

            var vat_tax = ($(this).closest("tr").find('input.row_vat_tax').val() == '') ? 0 : parseFloat($(this).closest("tr").find('input.row_vat_tax').val()).toFixed(2);

            var total_vat_tax = parseFloat((price * quantity * vat_tax) / 100);
            total_vat_tax = (total_vat_tax == '') ? 0 : total_vat_tax;
            total_discount = (this.value == 1) ? parseFloat((price * quantity * discount) / 100) : parseFloat(discount);

            var sub_total = ((price * quantity) - total_discount) + parseFloat(total_vat_tax);

            $(this).closest('.invoice_item_row').find("input.row_subtotal").val(sub_total);
            //console.log(price, quantity, total_discount, total_vat_tax, sub_total);
            calculate_row_total();
            final_subtotal();
        });
    }

    function tax_rules() {
        var val = $('#tax').val();
        var text = $('#tax').find("option:selected").data('amount');
        if (val == 'custom') {
            $('.vat_tax').attr('readonly', false);
        } else {
            $('.vat_tax').attr('readonly', true);
            $('.vat_tax').val(text);
        }
    }

    function final_subtotal() {
        overall_subtotal = 0;
        overall_discount = 0;
        overall_vat_tax = 0;
        overall_net_total = 0;
        $('tr.invoice_item_row').each(function() {
            overall_subtotal += ($(this).find("input.row_subtotal").val() != '') ? parseFloat($(this).find("input.row_subtotal").val()) : 0;
            var price = ($(this).find("input.row_unit_price").val() == '') ? 0 : parseFloat($(this).find("input.row_unit_price").val()).toFixed(2);

            var quantity = ($(this).find("input.row_quantity").val() == '') ? 0 : parseInt($(this).closest('.invoice_item_row').find("input.row_quantity").val());

            var discount = $(this).find('input.row_discount').val();
            discount = (discount == '') ? 0 : parseFloat(discount).toFixed(2);

            var discount_type = $(this).find('select.row_discount_type').val();

            var discount = (discount_type == 1) ? parseFloat((price * quantity * discount) / 100) : parseFloat(discount);

            overall_discount += discount;
            overall_vat_tax += ($(this).find("input.row_vat_tax").val() != '') ? parseFloat($(this).find("input.row_vat_tax").val()) : 0;
        });
        overall_shipping = ($("#shipping_charge").val() != '') ? parseFloat($("#shipping_charge").val()) : 0;
        document.getElementById("overall_shipment").innerHTML = overall_shipping;
        document.getElementById("overall_subtotal").innerHTML = parseFloat(overall_subtotal).toFixed(2);
        document.getElementById("overall_discount").innerHTML = parseFloat(overall_discount).toFixed(2);
        document.getElementById("overall_vat_tax").innerHTML = parseFloat(overall_vat_tax).toFixed(2);
        overall_net_total = parseFloat((overall_subtotal - overall_discount) + overall_vat_tax + overall_shipping).toFixed(2);
        document.getElementById("overall_net_total").innerHTML = overall_net_total;
    }

    $(document).ready(function() {
        invoice_utility();
        $("#shipping_charge").keyup(function() {
            final_subtotal();
        });
        $('#tax').on('change', function(e) {
            var val = $(e.target).find("option:selected").val();
            var text = $(e.target).find("option:selected").data('amount');
            if (val == 'custom') {
                $('.vat_tax').attr('readonly', false);
            } else {
                $('.vat_tax').attr('readonly', true);
                $('.vat_tax').val(text);
            }
        });
    });
</script>
@endsection