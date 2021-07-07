@extends('dashboard.master', ['form'=>1])

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">إنشاء صلاحية</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('permissions.index') }}" class="btn btn-primary float-right">كل الصلاحيات</a>
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
                    <h6>إنشاء صلاحية</h6>
                    <hr>
                    @php $cols = 3; @endphp
                    @include('dashboard.users.permissions.createModel')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

