@extends('dashboard.master', ['form'=>1])

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">تعديل عضو</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('manageusers.index') }}" class="btn btn-primary float-right">كل الأعضاء</a>
                <a href="{{ route('manageusers.changePass', $user->id) }}" class="btn btn-success float-right mx-1 ">تعديل كلمة المرور</a>
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
                    <h6>تعديل العضو: {{ $user->name }}</h6>
                    <hr>
                    <form method="POST" action="{{ route('manageusers.update', $user->id) }}" class="form-horizontal form-material" id="loginform">
                        @csrf
                        <input type='hidden' name='_method' value='PUT'>
                        <input type='hidden' name='id' value='{{ $user->id }}'>

                        @include('dashboard.includes.alerts.success')
                        @include('dashboard.includes.alerts.errors')
                        <div class="row">
                            {!! input(['errors'=>$errors, 'edit'=>$user, 'name'=>'name', 'transval'=>'اسم المستخدم', 'maxlength'=>20, 'required'=>'required', 'cols'=>4]) !!}
                            {!! input(['errors'=>$errors, 'edit'=>$user, 'name'=>'fName', 'transval'=>'الأسم الأول', 'maxlength'=>30, 'required'=>'required', 'cols'=>4]) !!}
                            {!! input(['errors'=>$errors, 'edit'=>$user, 'name'=>'lName', 'transval'=>'باقي الأسم', 'maxlength'=>100, 'required'=>'required', 'cols'=>4]) !!}
                            {!! input(['errors'=>$errors, 'edit'=>$user, 'name'=>'email', 'transval'=>'البريد الإلكتروني', 'maxlength'=>50, 'required'=>'required', 'cols'=>4]) !!}

                            {!! select(['errors'=>$errors, 'name'=>'role_id', 'frkName'=>'name', 'rows'=>$roles, 'transval'=>'الرتبة', 'label'=>true, 'required'=>'required', 'cols'=>4, 'select_id'=>$select_id ]) !!}
                            {!! select(['errors'=>$errors, 'name'=>'fac_id', 'frkName'=>'fac_name', 'rows'=>$facs, 'transval'=>'الكلية', 'label'=>true, 'required'=>'required', 'cols'=>4, 'select_id'=>$user->fac_id ]) !!}
                        </div>

                        <div class="row">
                            {!! checkbox(['errors'=>$errors, 'edit'=>$user, 'name'=>'is_active', 'trans'=>'Active', 'cols'=>12, 'class'=>'switcher']) !!}
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

