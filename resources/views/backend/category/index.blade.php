@extends('layouts.back-end.app')
@section('title','Category')
@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/back-end/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('assets/back-end/plugins/datatables/buttons.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href=" {{ asset('assets/back-end/plugins/datatables/responsive.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Category
                        <small>Admin Panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Products Category</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="needs-validation" id="category_form" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="name" class="mb-1">Category Name :</label>
                                                    <input class="form-control" id="name" name="name" type="text" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="mb-1">Category Url :</label>
                                                    <input class="form-control" id="url" name="url" type="text">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-form-label"><span>*</span> Status</label>
                                                    <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                        <label class="d-block" for="s_on">
                                                            <input class="radio_animated" id="s_on" type="radio" name="status" value="1">
                                                            Enable
                                                        </label>
                                                        <label class="d-block" for="s_off">
                                                            <input class="radio_animated" id="s_off" type="radio" name="status" value="0">
                                                            Disable
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="form-group mb-0">
                                                    <label for="category_image" class="mb-1">Category Image :</label>
                                                    <input class="form-control" name="category_image" id="category_image" type="file">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="save_category" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="category_table table table-striped table-bordered w-100">
                            <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>Category Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                    
                    
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""><span class="btn btn-soft-warning btn-sm"><i class="mdi mdi-table-edit"></i></span></a>
                                        <button onclick="deleteCategory()" class="btn btn-soft-danger btn-sm "><i class="mdi mdi-delete-forever"></i></button>
                                        <form action="" method="post"
                                                style="display: none" id="delete-form-">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    <a href=""><span class="btn btn-soft-info btn-sm"><i class="mdi mdi-eye"></i></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/back-end/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/back-end/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/back-end/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/back-end/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src=" {{ asset('assets/back-end/plugins/datatables/responsive.bootstrap4.min.js') }} "></script>
    <!-- Datatable init js -->
    <script src=" {{ asset('assets/back-end/pages/jquery.table-datatable.js') }} "></script>
    <script type="text/javascript">
        /* Encode string to slug */
        function convertToSlug( str ) {
            // console.log(str);
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
            
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');
            
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');	
            document.getElementById("url").value = str;
            //return str;
        }
        
        var form = document.getElementById("category_form"),
            form_submit = document.getElementById("save_category");
            if (form_submit) {
                form_submit.addEventListener("click",function(e){
                    e.preventDefault();
                    form_submit.setAttribute("disabled", "");
                    var name = document.getElementById("name").value,
                        url  = document.getElementById("url").value,
                        values = document.getElementsByName("status");
                        for(var i = 0; i < values.length; i++) {
                            if(values[i].checked == true) {
                                status = values[i].value;
                            }
                        }
                        image = document.getElementById("category_image").files[0].name;
                        
                        jQuery.ajax({
                            url: "{{route('backend.category.store')}}",
                            type: 'post',
                            data: {
                                name: name,
                                url: url,
                                status: status,
                                image: image,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(response);
                                // message.textContent = "Successfully Inserted!";
                                // message.style.color = "#4CAF50";
                                form.reset();
                                form_submit.removeAttribute("disabled");
                                
                                $('.category_table').DataTable().ajax().reload();
                            }
                        });

                });
            }
    </script> 
@endpush