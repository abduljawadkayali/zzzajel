@extends('Editor.Dashbored.Admin')

@section('title', '| Posts')


@section('content')
    @if (count($errors) > 0)

        @foreach ($errors->all() as $error)
            @php
                toast(__($error), 'error');
            @endphp

        @endforeach


    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-lg-12 col-lg-offset-1">
        <h1><i class="fas fa-lira-sign"></i>
            @lang("Payment")
        </h1>
        <hr>
        <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">@lang("Add New ")</a>
        <br><br>

        @if (count($devices) > 0)
            <div class="row">

                <div class="col-lg-9 col-lg-offset-1">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="device_id">@lang("Saler Name")</label>
                                <select name="device_id" class="form-control">
                                    <option value="">@lang("--- Select Saler Name ---")</option>

                                    @foreach ($devices as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->SalerName) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="device_id">@lang("device number")</label>
                                <select name="device_id" class="form-control">
                                    <option value="">@lang("--- Select device ---")</option>

                                    @foreach ($devices as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->DeviceNumber) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id='empTable' class="table display nowrap  " style="width:100%">

                    <thead id="trow" style="visibility: hidden;">

                        <tr>
                            <th>@lang("Saler Name")</th>
                            <th>@lang("DeviceNumber")</th>
                            <th>@lang("sumPayment")</th>

                        </tr>
                        <tr>
                            <th> <label id="sname"></label></th>
                            <th> <label id="device"></label></th>
                            <th> <label id="sumPayment"></label></th>
                        </tr>
                        <tr>
                            <th>@lang("amount")</th>
                            <th>@lang("created")</th>
                            <th>@lang("Action")</th>
                        </tr>

                    </thead>
                </table>



            </div>
        </div>



    </div>
    </div>







    @endif

    <div class="modal fade" id="ajax-product-modal" aria-hidden="true">
        <br>
        <div class="modal-dialog">
            <br>
            <div class="modal-content">


                <div class="modal-header">
                    <h4 class="modal-title" id="productCrudModal"></h4>
                    <div class="row justify-content-center">
                        <button type="button" style=" position: left!important;" class="close text-left"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="device_id">@lang("saler name")</label>
                                <select name="device_id" class="form-control">
                                    <option value="">@lang("--- Select saler ---")</option>

                                    @foreach ($devices as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->SalerName) }}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">

                            {{ Form::label('amount', __('amount')) }}
                            {{ Form::number('amount', null, ['class' => 'form-control']) }}

                        </div>


                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>





                <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>


                <script>
                    var SITEURL = '{{ URL::to('') }}';
                    $(document).ready(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        /*  When user click add user button */
                        $('#create-new-product').click(function() {
                            $('#btn-save').val("create-product");
                            $('#product_id').val('');
                            $('#productForm').trigger("reset");
                            $('#productCrudModal').html("Add New Product");
                            $('#ajax-product-modal').modal('show');
                        });

                        /* When click edit user */
                        $('body').on('click', '.edit-product', function() {
                            var product_id = $(this).data('id');
                            $.get('product-list/' + product_id + '/edit', function(data) {
                                $('#title-error').hide();
                                $('#product_code-error').hide();
                                $('#description-error').hide();
                                $('#productCrudModal').html("Edit Product");
                                $('#btn-save').val("edit-product");
                                $('#ajax-product-modal').modal('show');
                                $('#product_id').val(data.id);
                                $('#title').val(data.title);
                                $('#product_code').val(data.product_code);
                                $('#description').val(data.description);
                            })
                        });

                        $('body').on('click', '#delete1', function() {

                            var product_id = $(this).data("id");
                            //   console.log($(this).data("id"));
                            if (confirm("Are You sure want to delete !")) {
                                $.ajax({
                                    type: "get",
                                    url: SITEURL + "payment/delete/" + product_id,
                                    success: function(data) {

                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Do you want to continue',
                                            icon: 'error',
                                            confirmButtonText: 'Cool'
                                        })
                                    },
                                    error: function(data) {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Do you want to continue',
                                            icon: 'error',
                                            confirmButtonText: 'Cool'
                                        })
                                        //   console.log('Error:', Error);
                                    }
                                });
                            }
                        });

                    });

                    if ($("#productForm").length > 0) {
                        $("#productForm").validate({

                            submitHandler: function(form) {

                                var actionType = $('#btn-save').val();
                                $('#btn-save').html('Send');

                                $.ajax({
                                    data: $('#productForm').serialize(),
                                    url: "payment/save",
                                    type: "POST",
                                    success: function(data) {


                                        var groupID = window.gid;


                                        if (groupID) {
                                            jQuery.ajax({
                                                url: '/payment/' + groupID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    $('#sname').text(data[
                                                        'sname']);
                                                    // $('#nmber').text(data['busNumber']);
                                                    $('#device').text(data[
                                                        'DeviceNumber']);
                                                    $('#sumPayment').text(data['sum']);

                                                    //  console.log(data['devic']);
                                                }
                                            });
                                            //    console.log(groupID);
                                            document.getElementById("trow").style.visibility =
                                                "visible";


                                            if (!$.fn.DataTable.isDataTable('#empTable')) {
                                                $(document).ready(function() {


                                                    // DataTable
                                                    $('#empTable').DataTable({
                                                        "order": [
                                                            [2, "desc"]
                                                        ],
                                                        dom: 'Bfrtip',
                                                        buttons: [
                                                            'excel', 'pdf',
                                                            'print'
                                                        ],
                                                        ajax: '/payment/' +
                                                            groupID,
                                                        columns: [{
                                                                data: 'amount'
                                                            },
                                                            {
                                                                data: 'cereated_at'
                                                            },
                                                            {
                                                                data: 'id'
                                                            }

                                                        ],

                                                    });

                                                });
                                            } else {
                                                var table = $('#empTable').DataTable();
                                                table.destroy();
                                                $('#empTable').DataTable({
                                                    "order": [
                                                        [2, "desc"]
                                                    ],
                                                    dom: 'Bfrtip',
                                                    buttons: [
                                                        'excel', 'pdf', 'print'
                                                    ],
                                                    ajax: '/payment/' + groupID,
                                                    columns: [{
                                                            data: 'amount'
                                                        },
                                                        {
                                                            data: 'cereated_at'
                                                        },
                                                        {
                                                            data: 'id'
                                                        }

                                                    ],
                                                });


                                            }



















                                        } else {

                                            $('select[name="branch"]').empty();
                                        }

                                        $('#ajax-product-modal').modal('hide');


                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'bottom-right',
                                            showConfirmButton: false,
                                            showCloseButton: true,
                                            timer: 4000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter',
                                                    Swal.stopTimer)
                                                toast.addEventListener('mouseleave',
                                                    Swal.resumeTimer)
                                            }
                                        })

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'تمت اضافة البيانات بنجاح',
                                        })




                                    },
                                    error: function(data) {
                                        // console.log('Error:', data);
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Do you want to continue',
                                            icon: 'error',
                                            confirmButtonText: 'Cool'
                                        })
                                        $('#btn-save').html('Save Changes');
                                    }
                                });
                            }
                        })
                    }

                </script>


                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery('select[name="device_id"]').on('change', function() {


                            var groupID = jQuery(this).val();
                            window.gid = groupID;

                            jQuery.ajax({
                                url: '/payment/' + groupID,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                 $('#sname').text(data[
                                                                                      'sname']);
                                                                                  // $('#nmber').text(data['busNumber']);
                                                                                  $('#device').text(data[
                                                                                      'DeviceNumber']);
                                                                                  $('#sumPayment').text(data['sum']);
                                }
                            });
                            //console.log(groupID);
                            if (groupID) {
                                document.getElementById("trow").style.visibility = "visible";


                                if (!$.fn.DataTable.isDataTable('#empTable')) {
                                    $(document).ready(function() {


                                        // DataTable
                                        $('#empTable').DataTable({
                                            "order": [
                                                [2, "desc"]
                                            ],
                                            dom: 'Bfrtip',
                                            buttons: [{
                                                    extend: 'pdf',
                                                    footer: true,
                                                    exportOptions: {
                                                        columns: [0, 1, 2]
                                                    }
                                                },
                                                {
                                                    extend: 'excel',
                                                    footer: true,
                                                    exportOptions: {
                                                        columns: [0, 1, 2]
                                                    }
                                                },
                                                {
                                                    extend: 'print',
                                                    footer: true,
                                                    exportOptions: {
                                                        columns: [0, 1, 2]
                                                    }
                                                }
                                            ],
                                            ajax: '/payment/' + groupID,

                                            columns: [{
                                                    data: 'amount'
                                                },
                                                {
                                                    data: 'cereated_at'
                                                },
                                                {
                                                    data: 'id'
                                                },
                                            ],
                                        });
                                    });
                                } else {
                                    var table = $('#empTable').DataTable();
                                    table.destroy();
                                    $('#empTable').DataTable({
                                        "order": [
                                            [2, "desc"]
                                        ],
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'excel', 'pdf', 'print'
                                        ],
                                        ajax: '/payment/' + groupID,
                                        columns: [{
                                                data: 'amount'
                                            },
                                            {
                                                data: 'cereated_at'
                                            },
                                            {
                                                data: 'id'
                                            }
                                        ],
                                    });


                                }






                            } else {

                                $('select[name="branch"]').empty();
                            }
                        });
                    });


                    $('#empTable').on('click', '.deleteUser', function() {
                        var id = $(this).data('id');


                        Swal.fire({
                            title: 'هل انت متأكد?',
                            text: "لن تستيطيع استعادة البيانات لاحقا!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'نعم ,قم بالمسح!'
                        }).then((result) => {

                            //console.log(result.value);

                            if (result.value) {
                                // AJAX request
                                $.ajax({
                                    url: 'payment/' + id,
                                    type: 'DELETE',
                                    success: function(response) {
                                        if (response == 1) {
                                            var groupID = window.gid;
                                            jQuery.ajax({
                                                url: '/payment/' + groupID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    $('#sname').text(data[
                                                                                                                                        'sname']);
                                                                                                                                    // $('#nmber').text(data['busNumber']);
                                                                                                                                    $('#device').text(data[
                                                                                                                                        'DeviceNumber']);
                                                                                                                                    $('#sumPayment').text(data['sum']);
                                                }
                                            });
                                            if (groupID) {
                                                //   console.log(groupID);
                                                document.getElementById("trow").style
                                                    .visibility = "visible";


                                                if (!$.fn.DataTable.isDataTable(
                                                        '#empTable')) {
                                                    $(document).ready(function() {


                                                        // DataTable
                                                        $('#empTable').DataTable({
                                                            "order": [
                                                                [2,
                                                                    "desc"
                                                                ]
                                                            ],
                                                            dom: 'Bfrtip',
                                                            buttons: [
                                                                'excel',
                                                                'pdf',
                                                                'print'
                                                            ],
                                                            ajax: '/payment/' +
                                                                groupID,
                                                            columns: [{
                                                                    data: 'amount'
                                                                },
                                                                {
                                                                    data: 'cereated_at'
                                                                },
                                                                {
                                                                    data: 'id'
                                                                }
                                                            ],
                                                        });

                                                    });
                                                } else {
                                                    var table = $('#empTable').DataTable();
                                                    table.destroy();
                                                    $('#empTable').DataTable({
                                                        "order": [
                                                            [2, "desc"]
                                                        ],
                                                        dom: 'Bfrtip',
                                                        buttons: [
                                                            'excel', 'pdf',
                                                            'print'
                                                        ],
                                                        ajax: '/payment/' + groupID,
                                                        columns: [{
                                                                data: 'amount'
                                                            },

                                                            {
                                                                data: 'cereated_at'
                                                            },
                                                            {
                                                                data: 'id'
                                                            }
                                                        ],
                                                    });


                                                }






                                            } else {

                                                $('select[name="branch"]').empty();
                                            }
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'bottom-right',
                                                showConfirmButton: false,
                                                showCloseButton: true,
                                                timer: 4000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener(
                                                        'mouseenter', Swal
                                                        .stopTimer)
                                                    toast.addEventListener(
                                                        'mouseleave', Swal
                                                        .resumeTimer)
                                                }
                                            })

                                            Toast.fire({
                                                icon: 'success',
                                                title: 'تم  مسح  البيانات بنجاح',
                                            })


                                            // Reload DataTable

                                        } else {
                                            alert("Invalid ID.");
                                        }
                                    }
                                });
                            }
                        })


                    });

                </script>

            @endsection
