<?php

namespace App\Http\Controllers;

use App\Hdcashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HdcashierController extends Controller
{
    // funcion para ver el index
    public function index(){
        $hdcashiers = DB::table('hdcashiers')->select('id', 'name', 'last_name', 'email', 'phone', 'business','city', 'theyre_new','created_at')->paginate(10);
        return view('hdcashier.index', compact('hdcashiers'));

    }
    public function destroy($id)
    {
        Hdcashier::destroy($id);
        return redirect('hdcashier');
    }
}
