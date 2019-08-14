<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{ asset('adminAssets') }}/libs/responsejs/response.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/loading-overlay/loadingoverlay.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/tether/js/tether.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/jscrollpane/jquery.jscrollpane.min.js"></script>
<script src="{{ asset('adminAssets') }}/libs/jscrollpane/jquery.mousewheel.js"></script>
{{--<script src="{{ asset('adminAssets') }}/libs/flexibility/flexibility.js"></script>--}}
{{--<script src="{{ asset('adminAssets') }}/libs/noty/noty.min.js"></script>--}}
<script src="{{ asset('adminAssets') }}/libs/velocity/velocity.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('adminAssets') }}/assets/scripts/common.min.js"></script>
<!-- END THEME LAYOUT SCRIPTS -->

{{--<script src="{{ asset('adminAssets') }}/libs/d3/d3.min.js"></script>--}}
{{--<script src="{{ asset('adminAssets') }}/libs/c3js/c3.min.js"></script>--}}
{{--<script src="{{ asset('adminAssets') }}/libs/noty/noty.min.js"></script>--}}


<script src="{{ asset('adminAssets') }}/libs/jquery-form-validator/jquery.form-validator.min.js"></script>
{{--<script type="application/javascript">--}}
    {{--(function ($) {--}}
        {{--$(document).ready(function() {--}}
            {{--$.validate({--}}
                {{--modules : 'location, date, security, file',--}}
                {{--onModulesLoaded : function() {--}}

                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--})(jQuery);--}}
{{--</script>--}}

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
            @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";


    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>