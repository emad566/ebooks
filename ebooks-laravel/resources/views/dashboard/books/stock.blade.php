@extends('dashboard.master', ['datatable'=>1, 'form'=>1])

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">جرد المخازن</h4>
        </div>
        <div class="col-md-7 align-self-center text-right" dir="rtl">
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
                    <?php $store_id = ($store)? $store->id : null ?>
                    {!! select(['errors'=>$errors, 'edit'=>$store_id, 'name'=>'store_id', 'frkName'=>'Store_Name', 'rows'=>$stores, 'transval'=>"إختر مخزن لجرده", 'label'=>true, 'required'=>'required', 'cols'=>12]) !!}

                    @if($store && $store->products)

                        @php
                            $products =$store->products->where('q_net', '>', 0);
                            $fields = [
                                ['product->Product_code', 'transval'=>'كود المنتج'],
                                ['Product_Name', 'transAttr'=>true],
                                ['runID', 'transAttr'=>true],
                                ['expire_date', 'transAttr'=>true],
                                ['Public_Price', 'transAttr'=>true],
                                ['q_net', 'transval'=>'الكمية'],
                            ];
                        @endphp

                        <div class="table-responsive m-t-40">
                            {!! indexTable([
                                'objs'=>$products,
                                'table'=>'stores',
                                'title'=>'Store_Name',
                                'trans'=>'',
                                'transval'=>':المخزن',
                                'active'=>false,
                                'action'=>false,
                                'indexDel'=>false,
                                'isread'=>false,
                                'view'=>false,
                                'vars'=>false,
                                'fields'=>$fields,
                            ]) !!}
                        </div>
                    @endif
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
<script>
$(document).ready(function(){
    $(document).on("change", "#store_id", function(e){
        store_id = $(this).val()
        window.location.href = "{{ url('dashboard/store/stock/') }}/"+store_id;
    })
})
</script>
@endsection

