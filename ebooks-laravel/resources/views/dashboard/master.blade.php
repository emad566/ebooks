<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <?php $ver='1.0'; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/dashboard/eliteadmin-theme/assets/images/favicon.png') }}">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- This page CSS -->

    @isset($charts)
        <!-- chartist CSS -->
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    @endisset

    @isset($toast)
        <!--Toaster Popup message CSS -->
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    @endisset

    @isset($form)
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    @endisset

    <!-- Font Aweseme -->
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/assets/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dashboard/eliteadmin-theme/css/style.min.css?v=11') }}" rel="stylesheet">

    @isset($dashboard1)
        <!-- Dashboard 1 Page CSS -->
        <link href="{{ asset('assets/dashboard/eliteadmin-theme/css/pages/dashboard1.css') }}" rel="stylesheet">
    @endisset

    <!-- toaster -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @isset($form)
        <!-- Strat Form CSS -->
        <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/dashboard/eliteadmin-theme/css/perfect-scrollbar.min.css') }}" />
        <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/dashboard/eliteadmin-theme/css/select2.min.css') }}" />
        <!-- /End Form CSS -->
    @endempty

    <!-- Emad CSS -->
    @empty($emad_rtl)
        <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/dashboard/css/emad-rtl.css?v='.$ver) }}" />
    @endempty

    <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/dashboard/css/emad-web.css?v='.$ver) }}" />
    @yield('style')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    @include('dashboard.layouts.preloader')

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                @include('dashboard.layouts.navbar-header')

                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        {{-- @include('dashboard.layouts.comments') --}}
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        {{-- @include('dashboard.layouts.messages') --}}
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        {{-- @include('dashboard.layouts.mega-dropdown') --}}
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        @include('dashboard.layouts.user-profile')
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('dashboard.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            @yield('content')
            @include('dashboard.layouts.right-sidebar')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('dashboard.layouts.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme//js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme//js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme//js/sidebarmenu.js') }}"></script>
    @empty($ishome)
        <!--stickey kit -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    @endempty
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/dashboard/eliteadmin-theme//js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    @isset($morris)
        <!--morris JavaScript -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/morrisjs/morris.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    @endisset

    @isset($toast)
        <!-- Popup message jquery -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    @endisset

    @isset($dashboard1)
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/js/dashboard1.js') }}"></script>
    @endisset

    @isset($charts)
        <!-- Chart JS -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    @endisset



    @isset($datatable)
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>

        <!-- dataTable Libs -->
        <!-- This is data table -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/datatables/datatables.min.js') }}"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <!-- end - This is for export functionality only -->
        <!-- datadtable JS Commands -->
        <script>
            $(function() {

                // $('.datatable').DataTable();
                $(function() {
                    var table = $('.datatable').DataTable({
                        "language": {
                            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json'
                        },
                        "dom": 'Bfrtip',
                        "buttons": [
                            'copy', 'csv', 'excel', 'pdf', 'print',
                        ],

                        "displayLength": 200,

                    });
                    // Order by the grouping
                    $('.datatable tbody').on('click', 'tr.group', function() {
                        var currentOrder = table.order()[0];
                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                            table.order([2, 'desc']).draw();
                        } else {
                            table.order([2, 'asc']).draw();
                        }
                    });
                });
                //Style DataTable mobile
                $(".datatable").parent('div').addClass('responsive-container')
                txt = $(".datatable").parents('div.card-body').children('h4.card-title')
                txt.append(' <label class="labelshowastable" for="showastable">(<input id="showastable" type="checkbox">  عرض كجدول  )</label>')
                $i=1;
                $(".datatable thead tr th").each(function () {
                    // alert($(this).text())
                    $(".datatable tr td:nth-child("+ $i++ +")").attr('data-th', $(this).text())
                })

                $(document).on("change", "#showastable", function () {
                    if($(this).prop("checked") == true){
                        $(".responsive-container").removeClass("responsive-container")
                    }else{
                        $(".datatable").parent('div').addClass('responsive-container')
                    }
                })
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

        </script>

    @endisset <!-- /End isset DataTable -->


    @isset($form)
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/js/highlight.pack.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/js/select2.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script> --}}
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/dff/dff.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/multiselect/js/jquery.multi-select.js') }}"></script>
        <script>
            /** Start Select2 */
            $(function(){

                'use strict';

                $('.select2').select2({
                minimumResultsForSearch: Infinity
                });

                // Select2 by showing the search
                $('.select2-show-search').select2({
                minimumResultsForSearch: ''
                });

                // Select2 with tagging support
                $('.select2-tag').select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                });
            });
            /** /End Select2 */

            $(function () {
                // Switchery
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                $('.js-switch').each(function () {
                    new Switchery($(this)[0], $(this).data());
                });
                // For select 2
                $(".select2").select2();
                $('.selectpicker').selectpicker();
                //Bootstrap-TouchSpin
                $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                var vspinTrue = $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                if (vspinTrue) {
                    $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                }
                $("input[name='tch1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%'
                });
                $("input[name='tch2']").TouchSpin({
                    min: -1000000000,
                    max: 1000000000,
                    stepinterval: 50,
                    maxboostedstep: 10000000,
                    prefix: '$'
                });
                $("input[name='tch3']").TouchSpin();
                $("input[name='tch3_22']").TouchSpin({
                    initval: 40
                });
                $("input[name='tch5']").TouchSpin({
                    prefix: "pre",
                    postfix: "post"
                });
                // For multiselect
                $('#pre-selected-options').multiSelect();
                $('#optgroup').multiSelect({
                    selectableOptgroup: true
                });
                $('#public-methods').multiSelect();
                $('#select-all').click(function () {
                    $('#public-methods').multiSelect('select_all');
                    return false;
                });
                $('#deselect-all').click(function () {
                    $('#public-methods').multiSelect('deselect_all');
                    return false;
                });
                $('#refresh').on('click', function () {
                    $('#public-methods').multiSelect('refresh');
                    return false;
                });
                $('#add-option').on('click', function () {
                    $('#public-methods').multiSelect('addOption', {
                        value: 42,
                        text: 'test 42',
                        index: 0
                    });
                    return false;
                });
                $(".ajax").select2({
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    //templateResult: formatRepo, // omitted for brevity, see the source of this page
                    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });
            });
        </script>
    @endisset <!-- /End isset Form -->

    @isset($textEeditor)
        <script src="https://cdn.tiny.cloud/1/6te8nxu8ugbz1akvw3cxy805yq5paofquv20a2vtc50ksxd2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        {{-- <script src="{{ asset('assets/dashboard/eliteadmin-theme/assets/node_modules/tinymce/tinymce.min.js') }}"></script> --}}
        <script>
           tinymce.init({
                selector: ".textEeditor",
                plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable',
  tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
  tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
  tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
  tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
  mobile: {
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
  },
  menu: {
    tc: {
      title: 'TinyComments',
      items: 'addcomment showcomments deleteallconversations'
    }
  },
  menubar: 'file edit view insert format tools table tc help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 300,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  spellchecker_whitelist: ['Ephox', 'Moxiecode'],
  tinycomments_mode: 'embedded',
  content_style: '.mymention{ color: gray; }',
  contextmenu: 'link image imagetools table configurepermanentpen',
  a11y_advanced_options: true,
//   skin: useDarkMode ? 'oxide-dark' : 'oxide',
//   content_css: useDarkMode ? 'dark' : 'default',
  /*
  The following settings require more configuration than shown here.
  For information on configuring the mentions plugin, see:
  https://www.tiny.cloud/docs/plugins/premium/mentions/.
  */
  mentions_selector: '.mymention',
//   mentions_fetch: mentions_fetch,
//   mentions_menu_hover: mentions_menu_hover,
//   mentions_menu_complete: mentions_menu_complete,
//   mentions_select: mentions_select
            });
        </script>
    @endisset


    <!-- swal alert Files -->
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- /swal alert Files -->

    <!-- toaster -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- manual Scripts -->
    @empty($manualScripts)
        <script>
            @if(Session::has('message') || Session::has('error') )
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}")
                    break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}")
                    break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}")
                    break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}")
                    break;

                    default:
                        toastr.info("ALERT");
                    break;
                }
            @endif

            $(document).ready(function(){
                /* ======================================
                priew image before uploaded
                ===================================== */
                $('.uploadbtn').change(function(){
                    if ($(this).prop('files') && $(this).prop('files')[0]) {
                        var reader = new FileReader();
                        $imgId = $(this).attr('img');
                        reader.onload = function (e) {

                            $('.uploadbtnDiv img.'+$imgId).attr('src', e.target.result);
                            $('.uploadbtnDiv img.'+$imgId).addClass('showimg');
                        }
                        imgsize = $(this).prop('files')[0]['size']
                        imgsize = Math.round(imgsize / 1024, 4) + ' KB';

                        imgname = $(this).prop('files')[0]['name']

                        $('div.'+$imgId+' #image_size').html(imgsize);
                        $('div.'+$imgId+' #image_name').html(imgname);

                        reader.readAsDataURL($(this).prop('files')[0]);
                    }
                })

                $('.pdfuploadbtn').change(function(){
                    if ($(this).prop('files') && $(this).prop('files')[0]) {
                        var reader = new FileReader();
                        $imgId = $(this).attr('img');
                        reader.onload = function (e) {

                            // $('.pdfuploadbtn img.'+$imgId).attr('src', https://mwjood.emadeldeen.com/assests/images/pdf.png);
                            $('.pdfuploadbtn img.'+$imgId).addClass('showimg');
                        }
                        imgsize = $(this).prop('files')[0]['size']
                        imgsize = Math.round(imgsize / 1024, 4) + ' KB';

                        imgname = $(this).prop('files')[0]['name']

                        $('div.'+$imgId+' #image_size').html(imgsize);
                        $('div.'+$imgId+' #image_name').html(imgname);

                        reader.readAsDataURL($(this).prop('files')[0]);
                    }
                })

                //Delete Verfy
                $(document).on("click", ".deleteMe", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var msg = $(this).attr("msg");
                    var formId = $(this).attr("formId");
                    if(!msg) msg = "هل حقا تريد الحذف، سيتم الحذف بشكل نهائي.!"
                    swal({
                        title: "هل حقا تريد الحذف؟",
                        text: msg,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                        if(formId)
                            document.getElementById(formId).submit();
                        else
                            window.location.href = link;
                        } else {
                        swal("لم يتم الحذف.");
                        }
                    });
                });

                //UpdateIsActive
                $('.updateIsActive').change(function(){
                    action = $(this).attr('action')
                    window.location.href = action;
                })

                // MultiSelect checkbox for delete
                $(document).on("change", '#allItems', function(event) {
                    if($(this).is(':checked')){
                        $('.boxItem').prop('checked', true)
                    }else{
                        $('.boxItem').prop('checked', false)
                    }
                });

                //Prevent form submit on Enter
                $("form").on("keypress", function (event) {
                    console.log("aaya");
                    var keyPressed = event.keyCode || event.which;
                    if (keyPressed === 13) {
                        // alert("You pressed the Enter key!!");
                        event.preventDefault();
                        return false;
                    }
                });

            })
        </script>
    @endempty <!-- /end empty manual Scripts -->

    @yield('script')
</body>

</html>
