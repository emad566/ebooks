<form method="POST" action="{{ route('manageusers.store') }}" class="form-horizontal form-material" id="loginform">
    @csrf
    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')
    <div class="row">
        {!! input(['errors'=>$errors, 'name'=>'name', 'transval'=>'اسم المستخدم', 'maxlength'=>20, 'required'=>'required', 'cols'=>3]) !!}
        {!! input(['errors'=>$errors, 'name'=>'email', 'transval'=>'البريد الإلكتروني', 'maxlength'=>50, 'required'=>'required', 'cols'=>3]) !!}
        {!! input(['errors'=>$errors, 'type'=>'password', 'name'=>'password', 'transval'=>'كلمة المرور', 'maxlength'=>20, 'required'=>'required', 'cols'=>3]) !!}
        {!! input(['errors'=>$errors, 'type'=>'password', 'name'=>'password_confirmation', 'transval'=>'تأكيد كلمة المرور', 'maxlength'=>20, 'required'=>'required', 'cols'=>3]) !!}
        {!! input(['errors'=>$errors, 'name'=>'fName', 'transval'=>'الأسم الأول', 'maxlength'=>30, 'required'=>'required', 'cols'=>6]) !!}
        {!! input(['errors'=>$errors, 'name'=>'lName', 'transval'=>'باقي الأسم', 'maxlength'=>100, 'required'=>'required', 'cols'=>6]) !!}
    </div>

    <div class="row">
        {!! select(['errors'=>$errors, 'name'=>'role_id', 'frkName'=>'name', 'rows'=>$roles, 'transval'=>'الرتبة', 'label'=>false, 'required'=>'required', 'cols'=>6 ]) !!}
        {!! select(['errors'=>$errors, 'name'=>'fac_id', 'frkName'=>'fac_name', 'rows'=>$facs, 'transval'=>'الكلية', 'label'=>false, 'required'=>'required', 'cols'=>6 ]) !!}
    </div>
    <div class="row">
        {!! checkbox(['errors'=>$errors, 'name'=>'is_active', 'trans'=>'Active', 'cols'=>12, 'class'=>'switcher']) !!}
    </div>

    <div class="row">
        {!! buttonAction() !!}
    </div>
</form>
