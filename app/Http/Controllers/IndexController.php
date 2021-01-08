<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class IndexController extends Controller
{
    public function brandAll()
    {
        $model = new Brand();
        $brand = $model->getBrand();
        return view('admin.brand', ['brand'=>$brand]);
    }
    public function modelsAll()
    {
        $models = Brand::with('models')->get();

        return view('admin.models', ['models'=>$models]);
    }
    public function carsAll()
    {
        $models = Brand::with(['models', 'cars'])->get();

        return view('admin.cars', ['models'=>$models]);
    }
}
