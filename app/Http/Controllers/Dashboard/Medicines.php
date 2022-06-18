<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Categorie;
use Illuminate\Support\Facades\DB;

class Medicines extends Controller
{
    public function index(){
        return view('medicines.medicines', ['medicines' => DB::table('medicines')
        ->join('categories','medicines.categorie' , '=', 'categories.id')
        ->select('medicines.*', 'categories.name as categoryname')
        ->get() ]);
    }

    public function create(){
        
        return view('medicines.create' , ["categories" => Categorie::all()]);
    }

    
}