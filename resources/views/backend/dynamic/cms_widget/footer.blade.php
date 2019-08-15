@extends('backend.index')

@section('content')

    <div class="ks-page-content">
        <div class="ks-page-content-body ">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card panel">
                            <div class="card-block">
                                <h4 id="form-validation-basic-demo">About Us</h4>
                                <form method="post" action="{{ url('admin/save-footer-content') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group @if ($errors->has('footer_content')) has-danger @endif">
                                        <label class="form-control-label" for="footer">Content</label>
                                        <textarea type="text"
                                                  id="footer"
                                                  name="footer_content"
                                                  class="form-control form-control-danger">{{ old('footer_content', \App\Widget::getWidget('footer_content')) }}</textarea>

                                        @if ($errors->has('footer_content'))
                                            <div class="has-error">
                                                <strong>{{ $errors->first('footer_content') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Footer</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card panel">
                            <div class="card-block">
                                <h4 id="form-validation-length">Footer Links</h4>
                                <form method="post" action="{{ url('admin/save-footer-links') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="input_fields_wrap">
                                            <button class="add_field_button btn btn-info btn-sm">
                                                Add More Links
                                            </button>

                                            @php $links = json_decode(\App\Widget::getWidget('links')) @endphp
                                            @if($links)
                                                @foreach($links as $link)
                                                    <div>
                                                        <input type="text" name="name[]" value="{{ $link->title }}"
                                                               required class="form-control name"
                                                               placeholder="Enter URL Title">
                                                        <input type="url" name="link[]" value="{{ $link->link }}"
                                                               required
                                                               class="form-control link"
                                                               placeholder="Enter URL">
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div>
                                                    <input type="text" name="name[]"
                                                           required class="form-control name"
                                                           placeholder="Enter URL Title">
                                                    <input type="url" name="link[]"
                                                           required
                                                           class="form-control link"
                                                           placeholder="Enter URL">
                                                    <hr>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Links</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after_js')
    <style>
        .form-control {
            margin: 10px 0;
            display: inline-block;
        }
    </style>
    <script>
        $(document).ready(function () {
            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).on("click", function (e) { //on add input button click
                e.preventDefault();

                let allow = true;
                $('input.name').each(function (index) {
                    if ($(this).val() === '') {
                        alert('Please Enter title of URL ' + (index + 1))
                        allow = false;
                    }
                });
                $('input.link').each(function (index) {
                    if ($(this).val() === '') {
                        alert('Please Enter URL ' + (index + 1))
                        allow = false;
                    } else {
                        if (!isValidURL($(this).val())) {
                            alert('Please Enter Valid URL ' + (index + 1))
                            allow = false;
                        }
                    }
                });
                if (x < max_fields && allow) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div>' +
                        '<input type="text" required name="name[]" class="form-control name" placeholder="Enter URL Title">\n' +
                        '<input type="url" required name="link[]" class="form-control link" placeholder="Enter URL">' +
                        '<a href="#" class="btn btn-danger btn-sm remove_field">Remove</a><hr>' +
                        '</div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

        function isValidURL(string) {
            var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
            return (res !== null)
        };
    </script>
@endsection