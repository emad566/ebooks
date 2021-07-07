@extends('dashboard.master', ['datatable'=>1, 'form'=>1])

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">الأقسام</h4>
        </div>
        <div class="col-md-7 align-self-center text-right" dir="rtl">

            <div class="d-flex justify-content-end align-items-center">
                <div id="verticalcenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="vcenter">أضف قسم</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body text-left">
                                @php $cols = 12; @endphp
                                @include('dashboard.deps.createModel')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">{{ trans('main.Close') }}</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <a href="{{ route('deps.create') }}" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info  m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('main.Add New') }}</a>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- /End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">المخازن</h4>

                    {{-- <h6 class="card-subtitle">{{ trans('main.Export data to Copy, CSV, Excel, PDF & Print') }}</h6> --}}

                    <form id='delete-formMulti' class='delete-formMulti'
                        method='post'
                        action='{{ route('deps.delete') }}'>
                        @csrf
                        <input type='hidden' name='_method' value='post'>

                        @include('dashboard.includes.alerts.success')
                        @include('dashboard.includes.alerts.errors')


                        @php
                            $fields = [
                                ['dep_name', 'transval'=>'القسم'],
                                ['level->level_name', 'transval'=>'الفرقة'],
                                ['fac->fac_name', 'transval'=>'الكلية'],
                                ];
                        @endphp

                        <div class="table-responsive m-t-40">
                            {!! indexTable([
                                'objs'=>$deps,
                                'table'=>'deps',
                                'title'=>'dep_name',
                                'trans'=>'',
                                'transval'=>':القسم',
                                'active'=>false,
                                'indexEdit'=>true,
                                'indexDel'=>true,
                                'isread'=>false,
                                'view'=>true,
                                'vars'=>false,
                                'fields'=>$fields,
                            ]) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

@endsection

@section('script')

@endsection

