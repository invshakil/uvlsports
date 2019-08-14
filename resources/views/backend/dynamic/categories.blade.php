@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 id="form-validation-basic-demo">Create Category</h4>
                        <div class="card panel">
                            <div class="card-block" style="min-height: 875px">
                                <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="form-group @if ($errors->has('name')) has-danger @endif">
                                        <label class="form-control-label">Name</label>
                                        <input type="text"
                                               name="name"
                                               value="{{ old('name') }}"
                                               class="form-control form-control-danger"
                                               placeholder="Enter Name">

                                        @if ($errors->has('name'))
                                            <div class="has-error">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('bangla_name')) has-danger @endif">
                                        <label class="form-control-label">Bangla Name</label>
                                        <input type="text"
                                               name="bangla_name"
                                               value="{{ old('bangla_name') }}"
                                               class="form-control form-control-danger"
                                               placeholder="Enter Bangla Name">

                                        @if ($errors->has('bangla_name'))
                                            <div class="has-error">
                                                <strong>{{ $errors->first('bangla_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('logo')) has-danger @endif">
                                        <label class="form-control-label">Category Image</label>
                                        <button class="btn btn-primary ks-btn-file">
                                            <span class="la la-cloud-upload ks-icon"></span>
                                            <span class="ks-text">Choose file</span>
                                            <input type="file" name="logo" class="form-control-danger" onchange="readURL(this);">
                                        </button>
                                        <br>
                                        <br>
                                        <img id="blah"
                                             src="http://placehold.it/620x340"
                                             class="img-responsive img-thumbnail" alt="your image"/>

                                        @if ($errors->has('logo'))
                                            <div class="has-error">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-group @if ($errors->has('description')) has-danger @endif">
                                        <label class="form-control-label">Description</label>
                                        <textarea type="text" name="description" class="form-control form-control-danger"
                                                  placeholder="Description of this category"></textarea>
                                        @if ($errors->has('description'))
                                            <div class="has-error">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Is it a League?</label>
                                        <select name="is_league" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Category</button>
                                        <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">Category List</h4>
                        <div class="card panel">
                            <div class="card-block" style="min-height: 875px">
                                <div class="ks-user-list-view-table">

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <form action="{{ url()->current() }}" method="get">
                                                <div class="input-group">
                                                    <input type="text" name="string"
                                                           value="@if(isset($_GET['string'])) {{ $_GET['string'] }} @endif"
                                                           class="form-control"
                                                           placeholder="Search by Name">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="ks-full-table">
                                        <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap"
                                               width="100%" data-pagination="true">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Bangla Name</th>
                                                <th>Image</th>
                                                <th>Description/th>
                                                <th>Status</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $category->bangla_name }}
                                                    </td>
                                                    <td>
                                                        <img src="@if(isset($category->image)) {{ asset($category->image) }} @endif"
                                                             class="ks-avatar" alt="" width="36" height="36">
                                                    </td>
                                                    <td>
                                                        {!! $category->description  !!}
                                                    </td>
                                                    <td>
                                                        @if($category->status == 1)
                                                            <span class="badge badge-success">Active</span>

                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="pull-left">
                                                            <a href="javascript:void(0)"
                                                               class="btn btn-info btn-sm edit-category"
                                                               data-id="{{ $category->id }}"
                                                               data-name="{{ $category->name }}"
                                                               data-description="{{ $category->description }}"
                                                               data-image="{{ $category->image }}"
                                                               data-status="{{ $category->status }}"
                                                               data-bangla_name="{{ $category->bangla_name }}"
                                                               data-is_league="{{ $category->is_league }}"
                                                               data-toggle="modal"
                                                               data-target="#EditCategory"><i
                                                                        class="la la-pencil-square-o"></i>Edit
                                                            </a>
                                                        </div>

                                                        <div class="pull-right">
                                                            <a href="{{ route('delete.category', ['id'=>$category->id]) }}"
                                                               onclick="return confirm('Are you sure about to delete this category?')"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                        <nav>
                                            @if(count($categories) > 0)

                                                <div class="alert alert-info">
                                                    Showing {{ $categories->firstItem() }}
                                                    to {{ $categories->lastItem() }}
                                                    Category of
                                                    Total {{ $categories->total() }} Categories.
                                                </div>

                                                <nav aria-label="Page navigation">
                                                    @if ($categories->lastPage() > 1)
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item {{ ($categories->currentPage() == 1) ? ' disabled' : '' }}">
                                                                <a class="page-link" href="{{ $categories->url(1) }}">Previous</a>
                                                            </li>
                                                            @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                                                <li class="page-item {{ ($categories->currentPage() == $i) ? 'page active' : '' }}">
                                                                    <a class="page-link"
                                                                       href="{{ $categories->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                            <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' disabled' : '' }}">
                                                                <a class="page-link"
                                                                   href="{{ $categories->url($categories->currentPage()+1) }}">Next</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </nav>
                                            @else
                                                <div class="alert alert-danger">
                                                    No Result Found!
                                                </div>
                                            @endif

                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('after_js')

    <div class="modal fade" id="EditCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card panel">
                        <div class="card-block">
                            <form action="{{ route('update.category') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="c-id">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="c-name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control"
                                           placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label>Bangla Name</label>
                                    <input type="text" id="c-bangla_name"
                                           name="bangla_name"
                                           value="{{ old('bangla_name') }}"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           data-validation="required"
                                           data-validation-length="6-30"
                                           data-validation-error-msg="System name has to be an alphanumeric value (6-30 chars)">
                                </div>

                                <div class="form-group">
                                    <label>Category Image</label>
                                    <button class="btn btn-primary ks-btn-file">
                                        <span class="la la-cloud-upload ks-icon"></span>
                                        <span class="ks-text">Choose file</span>
                                        <input type="file" name="logo" onchange="readURL(this);">
                                    </button>
                                    <br>
                                    <br>
                                    <img id="blah"
                                         src="http://placehold.it/300x90"
                                         class="img-responsive img-thumbnail c-image" alt="your image"/>
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="c-description" class="form-control"
                                              placeholder="Description of this category"
                                              data-validation="required"
                                              data-validation-length="6-30"
                                              data-validation-error-msg="Description value (6-150 chars)">

                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="c-status">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Is it a League?</label>
                                    <select name="is_league" class="form-control" id="c-is_league">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                    <button type="reset" class="btn btn-primary-outline ks-light">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline ks-light" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('#EditCategory').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var name = $(e.relatedTarget).data('name');
                var bangla_name = $(e.relatedTarget).data('bangla_name');
                var description = $(e.relatedTarget).data('description');

                var image = $(e.relatedTarget).data('image');
                var status = $(e.relatedTarget).data('status');
                var is_league = $(e.relatedTarget).data('is_league');


                $('#c-id').val(id);
                $('#c-name').val(name);
                $('#c-bangla_name').val(bangla_name);
                $('#c-description').val(description);

                $('select#c-status').val(status);
                $('select#c-is_league').val(is_league);

                $('img.c-image').attr('src', '{{ url('/') }}/' + image);


            });


        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection