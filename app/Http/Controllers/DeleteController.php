<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Models;
use App\Models\Brand;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteData(Request $request)
    {
        if ($request->obj == 'car') {
            Cars::where('id', $request->id)->delete();
            $del = "Автомобиль с id " . $request->id . " удален.";
            $object = "Автомобиля";
        }elseif ($request->obj == 'model') {
            Models::where('id', $request->id)->delete();
            $del = "Модель с id " . $request->id . " удалена.";
            $object = "Модели";
        }elseif ($request->obj == 'brand') {
            Brand::where('id', $request->id)->delete();
            $del = "Марка с id " . $request->id . " удалена.";
            $object = "Марки";
        }

        return view('admin.delete', ['del'=>$del, 'object'=>$object]);
    }
}
