<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TransportType;
use App\Helpers\Compile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){


        $user = User::find(10001);

        $permitions = $user->getRoleNames();

        if($user->can('create-users')){

        }

        return view('frontend.pages.index');
    }

    public function store(){

    }
}
