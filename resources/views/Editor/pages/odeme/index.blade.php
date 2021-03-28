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
        <h1><i class="fas fa-hand-holding-usd"></i>
            @lang("odeme")
        </h1>
        <hr>
        <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">@lang("Add New")</a>
        <br><br>

        @if (count($buses) > 0)
            <div class="row">

                <div class="col-lg-9 col-lg-offset-1">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bus_id">@lang("Bus Driver")</label>
                                <select name="bus_id" class="form-control">
                                    <option value="">@lang("--- Select Bus Driver---")</option>

                                    @foreach ($buses as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->busDriver) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bus_id">@lang("Bus number")</label>
                                <select name="bus_id" class="form-control">
                                    <option value="">@lang("--- Select Bus number---")</option>

                                    @foreach ($buses as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->busNumber) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bus_id">@lang("device number")</label>
                                <select id="sbus" name="bus_id" class="form-control">
                                    <option value="">@lang("--- Select device number ---")</option>

                                    @foreach ($buses as $key => $value)

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
        <div class="col-md-8">
            <div class="table-responsive">
                <table id='empTable' class="table display nowrap  " style="width:100%">

                    <thead id="trow" style="visibility: hidden;">

                        <tr>
                            <th>@lang("Bus driver")</th>
                            <th>@lang("busNumber")</th>
                            <th>@lang("DeviceNumber")</th>
                            <th>@lang("sumPayment")</th>

                        </tr>
                        <tr>
                            <th> <label id="driver"></label></th>
                            <th> <label id="nmber"></label></th>
                            <th> <label id="device"></label></th>
                            <th> <label id="sumPayment"></label></th>
                        </tr>
                        <tr>
                            <th>@lang("amount")</th>
                            <th>@lang("not")</th>
                            <th>@lang("created")</th>
                            <th>@lang("Action")</th>
                        </tr>

                    </thead>
                </table>



            </div>
        </div>

        <div class="col-md-4">
            <div class="table-responsive">
                <table id='embus' class="table display nowrap  " style="width:100%">

                    <thead id="srow" style="visibility: hidden;">
                        <tr>
                            <th>@lang("sum payment ")</th>
                            <th>@lang("kalan")</th>


                        </tr>
                        <tr>
                            <th> <label id="paymentSum"></label></th>
                            <th> <label id="kalan"></label></th>

                        </tr>
                        <tr>
                            <th>@lang("payment")</th>
                            <th>@lang("created")</th>

                        </tr>

                    </thead>
                </table>

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
                    <h4 class="modal-title" id="productCrudModal">@lang("Add odeme")</h4>

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
                                <label for="bus">@lang("Bus Driver")</label>
                                <select name="bus" class="form-control">
                                    <option value="">@lang("--- Select Bus ---")</option>

                                    @foreach ($buses as $key => $value)

                                        <option value="{{ $value->id }}">{{ __($value->busDriver) }}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">

                            {{ Form::label('amount', __('amount')) }}
                            {{ Form::number('amount', null, ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">

                                {{ Form::label('Description', __('Description')) }}
                                {{ Form::textarea('Description', null, ['class' => 'form-control', 'style' => 'height:150px;']) }}
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">@lang("Save")
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
                                    url: SITEURL + "odeme/delete/" + product_id,
                                    success: function(data) {

                                        Swal.fire({
                                            title: 'خطأ!',
                                            text: 'الرجاء ادخال البيانات بشكل صحيح',
                                            icon: 'error',
                                            confirmButtonText: 'موافق'
                                        })
                                    },
                                    error: function(data) {
                                        Swal.fire({
                                            title: 'خطأ!',
                                            text: 'الرجاء ادخال البيانات بشكل صحيح',
                                            icon: 'error',
                                            confirmButtonText: 'موافق'
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
                                    url: "odeme/save",
                                    type: "POST",
                                    success: function(data) {


                                        var groupID = window.gid;


                                        if (groupID) {
                                            jQuery.ajax({
                                                url: '/odeme/' + groupID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    $('#driver').text(data[
                                                        'drvirbus']);
                                                    // $('#nmber').text(data['busNumber']);
                                                    $('#device').text(data[
                                                        'DeviceNumber']);
                                                    $('#sumPayment').text(data['sum']);
                                                    $('#paymentSum').text(data['sum2']);
                                                    $('#kalan').text(data['kalan']);

                                                    //  console.log(data['devic']);
                                                }
                                            });
                                            //    console.log(groupID);
                                            document.getElementById("trow").style.visibility =
                                                "visible";
                                            document.getElementById("srow").style.visibility =
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
                                                        ajax: '/odeme/' +
                                                            groupID,
                                                        columns: [{
                                                                data: 'amount'
                                                            },
                                                            {
                                                                data: 'Description'
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
                                                    ajax: '/odeme/' + groupID,
                                                    columns: [{
                                                            data: 'amount'
                                                        },
                                                        {
                                                            data: 'Description'
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
                                                            title: 'خطأ!',
                                                                                   text: 'الرجاء ادخال البيانات بشكل صحيح',
                                            icon: 'error',
                                            confirmButtonText: 'موافق'
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
                        jQuery('select[name="bus_id"]').on('change', function() {


                            var groupID = jQuery(this).val();
                            window.gid = groupID;

                            jQuery.ajax({
                                url: '/odeme/' + groupID,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                    $('#driver').text(data['drvirbus']);
                                    $('#nmber').text(data['busNumber']);
                                    $('#device').text(data['DeviceNumber']);
                                    $('#sumPayment').text(data['sum']);
                                    $('#paymentSum').text(data['sum2']);
                                    $('#kalan').text(data['kalan']);
                                    //console.log(data['devic']);
                                }
                            });
                            //console.log(groupID);
                            if (groupID) {
                                document.getElementById("trow").style.visibility = "visible";
                                document.getElementById("srow").style.visibility = "visible";
                                if (!$.fn.DataTable.isDataTable('#embus')) {
                                    $(document).ready(function() {
                                        $('#embus').DataTable({
                                            "searching": false,
                                            "ordering": true,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'excel', 'pdf',
                                                'print'
                                            ],
                                            ajax: '/odeme/getbalance/' + groupID,
                                            columns: [{
                                                    data: 'balanc'
                                                },
                                                {
                                                    data: 'cereaed_at'
                                                }

                                            ],

                                        });
                                    });
                                } else {
                                    var table = $('#embus').DataTable();
                                    table.destroy();
                                    $('#embus').DataTable({
                                        "searching": false,
                                        "ordering": true,
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'excel', 'pdf', 'print'
                                        ],
                                        ajax: '/odeme/getbalance/' + groupID,
                                        columns: [{
                                                data: 'balanc'
                                            },
                                            {
                                                data: 'cereaed_at'
                                            }

                                        ],
                                    });


                                }

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
                                            ajax: '/odeme/' + groupID,

                                            columns: [{
                                                    data: 'amount'
                                                },
                                                {
                                                    data: 'Description'
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
                                        ajax: '/odeme/' + groupID,
                                        columns: [{
                                                data: 'amount'
                                            },
                                            {
                                                data: 'Description'
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
                            title: 'هل انت متأكد ؟',
                            text: "لن تستيطيع استعادة البيانات لاحقا!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'نعم ,قم بالمسح !'
                        }).then((result) => {

                            //console.log(result.value);

                            if (result.value) {
                                // AJAX request
                                $.ajax({
                                    url: 'odeme/' + id,
                                    type: 'DELETE',
                                    success: function(response) {
                                        if (response == 1) {
                                            var groupID = window.gid;
                                            jQuery.ajax({
                                                url: '/odeme/' + groupID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    $('#driver').text(data[
                                                        'drvirbus']);
                                                    $('#nmber').text(data[
                                                        'busNumber']);
                                                    $('#device').text(data[
                                                        'DeviceNumber']);
                                                    $('#sumPayment').text(data[
                                                        'sum']);
                                                    $('#paymentSum').text(data[
                                                        'sum2']);
                                                    $('#kalan').text(data['kalan']);
                                                    //console.log(data['devic']);
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
                                                            ajax: '/odeme/' +
                                                                groupID,
                                                            columns: [{
                                                                    data: 'amount'
                                                                },
                                                                {
                                                                    data: 'Description'
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
                                                        ajax: '/odeme/' + groupID,
                                                        columns: [{
                                                                data: 'amount'
                                                            },
                                                            {
                                                                data: 'Description'
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

 if (!$.fn.DataTable.isDataTable('#embus')) {
                                                    $(document).ready(function() {
                                                        $('#embus').DataTable({
                                                            "searching": false,
                                                            "ordering": true,
                                                            dom: 'Bfrtip',
                                                            buttons: [
                                                                'excel',
                                                                'pdf',
                                                                'print'
                                                            ],
                                                            ajax: '/odeme/getbalance/' +
                                                                groupID,
                                                            columns: [{
                                                                    data: 'balanc'
                                                                },
                                                                {
                                                                    data: 'cereaed_at'
                                                                }

                                                            ],

                                                        });
                                                    });
                                                } else {
                                                    var table = $('#embus').DataTable();
                                                    table.destroy();
                                                    $('#embus').DataTable({
                                                        "searching": false,
                                                        "ordering": true,
                                                        dom: 'Bfrtip',
                                                        buttons: [
                                                            'excel', 'pdf', 'print'
                                                        ],
                                                        ajax: '/odeme/getbalance/' +
                                                            groupID,
                                                        columns: [{
                                                                data: 'balanc'
                                                            },
                                                            {
                                                                data: 'cereaed_at'
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
