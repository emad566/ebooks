<form method="POST" action="{{ route('deps.store') }}" class="form-horizontal form-material" id="loginform">
    @csrf
    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')

    <div class="row">
        @if(Auth::user()->can(['SupperAdmin']))
        {!! select(['errors'=>$errors, 'name'=>'fac_id', 'frkName'=>'fac_name', 'rows'=>$facs, 'transval'=>'الكلية', 'label'=>true, 'required'=>'required', 'cols'=>4 ]) !!}
        @endif
        {!! select(['errors'=>$errors, 'name'=>'level_id', 'frkName'=>'level_name', 'rows'=>$levels, 'transval'=>'الفرقة', 'label'=>true, 'cols'=>4 ]) !!}
        {!! input(['errors'=>$errors, 'name'=>'dep_name', 'transval'=>'اسم القسم', 'maxlength'=>50, 'required'=>'required', 'cols'=>4]) !!}
    </div>


    <div class="row">
        {!! buttonAction() !!}
    </div>
</form>
