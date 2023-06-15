<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo;
use Illuminate\Http\Request;
use \Yajra\Datatables\Datatables;

class UserAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Usersinfo::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
  
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm editUser" data-id="'.$row->id.'" data-original-title="Edit" >Edit</a>';
                      $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm deleteUser" data-id="'.$row->id.'" data-original-title="Delete" >Delete</a>';
                      return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('yajra');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usersinfo::updateOrCreate(['id' => $request->id],
                ['name' => $request->name, 'email' => $request->email, 'p_no' => $request->p_no, 'country' => $request->country]);        
   
        return response()->json(['success'=>'Product saved successfully.']);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Usersinfo $usersinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user =Usersinfo::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usersinfo $usersinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

 
        Usersinfo::find($id)->delete();     
        return response()->json(['success'=>'User deleted successfully.']);
     
    }
}
