<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;


class IndexController extends Controller
{


    public function index()
    {
        return view("backend.pages.index", [
            'listClass' => 'usersList',
            'listRoute' => route('users.get')
        ]);
    }

    public function getUsers(Request $request){
        if($request->ajax()){
            $users = User::query();

            if ($request->has('search')) {
                $users->where('email', 'LIKE', '%' . $request->get('search') . "%" );
            }

            $data['count'] = $users->count('id');
            $data['max'] = ceil($data['count'] / $request->get('limit'));
            $data['items'] = $users->latest()
                ->offset($request->get('limit') * ( $request->get('page')-1))
                ->limit($request->get('limit'))
                ->get();

            $data['render'] = View::make('backend.modules.users.list-item', ['users' => $data['items']])->render();

            unset($data['items']);

            return response()->json($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
