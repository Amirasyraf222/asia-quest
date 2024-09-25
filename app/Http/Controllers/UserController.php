<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10); 
        $page = $request->query('page', 1); 

        $limit = is_numeric($limit) && $limit > 0 ? (int) $limit : 10;
        $page = is_numeric($page) && $page > 0 ? (int) $page : 1;

        $users = User::paginate($limit, ['*'], 'page', $page);

        return response()->json($users);
    }
}
