<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Dep;
use App\Models\Fac;
use App\Models\Level;
use App\Models\User;
use DB;
use Auth;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facs = Fac::all();
        if(Auth::user()->can(['SupperAdmin'])){
            $levels = Level::all();
        }else{
            $levels = Level::where('id', '<=', Auth::user()->fac->level_num)->get();
        }

        if(Auth::user()->can(['SupperAdmin'])){
            $deps = Dep::all();
        }else{
            $deps = Dep::where('fac_id', Auth::user()->fac_id)->get();
        }

        $deps = Dep::all();

        return view('dashboard.deps.index', compact(['facs', 'levels', 'deps']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facs = Fac::all();
        if(Auth::user()->can(['SupperAdmin'])){
            $levels = Level::all();
        }else{
            $levels = Level::where('id', '<=', Auth::user()->fac->level_num)->get();
        }

        return view('dashboard.deps.create', compact('facs', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {


        $inputs = $request->except('_token');

        if(!Auth::user()->can(['SupperAdmin'])){
            $inputs['fac_id'] = Auth::user()->fac_id;
        }

        $depOld = Dep::where(['fac_id'=>$inputs['fac_id'], 'level_id'=>$inputs['level_id']])->first();

        if($depOld){
            $notification = notification('عذرا، هذا  القسم موجود مسبقا داخل نفس الفرقة والكلية', false);
            return back()->withInput($request->all())->with($notification);
        }

        $dep = Dep::create($inputs);

        $notification = array(
            'message' => 'تم الإضافة بنجاح',
            'alert-type' => 'success',
            'success' => 'تم الإضافة بنجاح',
        );

        return redirect()->route('deps.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function show(Dep $dep)
    {
        $facs = Fac::all();
        if(Auth::user()->can(['SupperAdmin'])){
            $levels = Level::all();
        }else{
            $levels = Level::where('id', '<=', Auth::user()->fac->level_num)->get();
        }

        return view('dashboard.deps.edit', compact('dep', 'facs', 'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function edit(Dep $dep)
    {
        $facs = Fac::all();
        if(Auth::user()->can(['SupperAdmin'])){
            $levels = Level::all();
        }else{
            $levels = Level::where('id', '<=', Auth::user()->fac->level_num)->get();
        }

        return view('dashboard.deps.edit', compact('dep', 'facs', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookRequest  $request
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Dep $dep)
    {
        $inputs = $request->except('_token');

        if(!Auth::user()->can(['SupperAdmin'])){
            $inputs['fac_id'] = Auth::user()->fac_id;
        }

        $depOld = Dep::where(['fac_id'=>$inputs['fac_id'], 'level_id'=>$inputs['level_id']])->where('id', '<>', $dep->id)->first();

        if($depOld){
            $notification = notification('عذرا، هذا  القسم موجود مسبقا داخل نفس الفرقة والكلية', false);
            return back()->withInput($request->all())->with($notification);
        }

        $dep->update($inputs);

        $notification = array(
            'message' => 'تم الإضافة بنجاح',
            'alert-type' => 'success',
            'success' => 'تم الإضافة بنجاح',
        );

        return redirect()->route('deps.edit', $dep->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function destroy($dep_id)
    {

        $dep = Dep::findOrFail($dep_id);

        try {
            $dep->forceDelete();
        } catch (\Throwable $th) {
            $dep = Dep::findOrFail($dep_id);
            $dep->delete();
        }


        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success',
            'success' => 'تم الحذف بنجاح',
        );
        return redirect()->route('deps.index')->with($notification);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $dep_ids = $request->deps;
        if($dep_ids){
            foreach($dep_ids as $dep_id){
                $dep = Dep::find($dep_id);
                if($dep){
                    try {
                        $dep->forceDelete();
                    } catch (\Throwable $th) {
                        $dep = Dep::find($dep_id);
                        $dep->delete();
                    }
                }

            }

            DB::commit();
            $notification = array(
                'message' => 'تم الحذف بنجاح',
                'alert-type' => 'success',
                'success' => 'تم الحذف بنجاح',
            );
        }else{
            DB::commit();
            $notification = array(
                'message' => 'حدث خطأ حاول مرة أخري، إذا تكررت المشكلة تواصل مع الدعم الفني.',
                'alert-type' => 'error',
                'error' => 'حدث خطأ حاول مرة أخري، إذا تكررت المشكلة تواصل مع الدعم الفني.',
            );
        }

        return redirect()->route('deps.index')->with($notification);
    }
}
