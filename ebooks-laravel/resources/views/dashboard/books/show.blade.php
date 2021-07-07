@extends('dashboard.master', ['form'=>1])

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">تعديل قسم</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('deps.index') }}" class="btn btn-primary float-right">كل الأقسام</a>
                <a href="{{ route('deps.destroy', $dep->id) }}" class="btn btn-danger float-right mx-2"><i class="fas fa-trash-alt"></i> حذف</a>
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
                    <h6>تعديل القسم: {{ $dep->dep_name }}</h6>
                    <hr>
                    <form method="POST" action="{{ route('deps.update', $dep->id) }}" class="form-horizontal form-material" id="loginform">
                        @csrf
                        <input type='hidden' name='_method' value='PUT'>
                        <input type='hidden' name='id' value='{{ $dep->id }}'>

                        @include('dashboard.includes.alerts.success')
                        @include('dashboard.includes.alerts.errors')

                        <div class="row">
                            @if(Auth::user()->can(['SupperAdmin']))
                            {!! select(['errors'=>$errors, 'name'=>'fac_id', 'frkName'=>'fac_name', 'rows'=>$facs, 'transval'=>'الكلية', 'label'=>true, 'required'=>'required', 'select_id'=>$dep->fac_id, 'cols'=>4 ]) !!}
                            @endif
                            {!! select(['errors'=>$errors, 'name'=>'level_id', 'frkName'=>'level_name', 'rows'=>$levels, 'transval'=>'الفرقة', 'label'=>true, 'select_id'=>$dep->level_id, 'cols'=>4 ]) !!}
                            {!! input(['errors'=>$errors, 'edit'=>$dep, 'name'=>'dep_name', 'transval'=>'اسم القسم', 'maxlength'=>50, 'required'=>'required', 'cols'=>4]) !!}
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

