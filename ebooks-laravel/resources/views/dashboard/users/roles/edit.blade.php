@extends('dashboard.master', ['form'=>1])
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">تعديل رتبة</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('roles.index') }}" class="btn btn-primary float-right">كل الرتب</a>
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
                    <h6>تعديل رتبة: {{ $role->name }}</h6>
                    <hr>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <form class="form" action="{{route('roles.update', $role->id)}}" method="POST">
                        @csrf
                        <input type='hidden' name='_method' value='PUT'>
                        <input type='hidden' name='id' value='{{ $role->id }}'>

                        <div class="row">
                            {!! input(['errors'=>$errors, 'edit'=>$role, 'name'=>'name', 'transval'=>'اسم الرتبة', 'maxlength'=>191, 'required'=>'required', 'cols'=>12]) !!}

                            @if(!$permissions->isEmpty())
                                <h5 class="col-xs-12 col-lg-12">الصلاحيات <hr> </h5>
                                @foreach ($permissions as $permission)
                                    <?php $check = (in_array($permission->id, $rolePermissionIds))? true : false; ?>
                                    {!! checkbox(['errors'=>$errors, 'value'=>$permission->id, 'name'=>'permissions[]', 'transval'=>$permission->name, 'cols'=>3, 'check'=>$check]) !!}
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            {!! buttonAction() !!}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

