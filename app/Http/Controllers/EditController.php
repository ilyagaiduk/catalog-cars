<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cars;
use App\Models\Models;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function editDataBrand(Request $request)
    {

        $id = $request->id;
        if (isset($request->name)) {
            $data = [];
            $data['name'] = $request->name;
            Brand::where('id', $request->id)->update($data);
        }

        return view('admin.edit.brand', ['id' => $id, ]);
    }
    public function editDataModel(Request $request)
    {

        $id = $request->id;
        if ($request->isMethod('post')) {

            // валидация формы
            $request->validate([
                'name'  => 'required|max:255',
            ]);
            $data = [];
            $data['name'] = $request->name;
            Models::where('id', $request->id)->update($data);

        }
        return view('admin.edit.model', ['id' => $id, ]);
    }
    public function editDataCar(Request $request)
    {

        $id = $request->id;
        $models = Models::all();
        $cars = Cars::all();
        if ($request->isMethod('post')) {

            // валидация формы
            $request->validate([
                'photo' => 'image|nullable|max:1999',
                'year' => 'required|max:4',
            ]);
            $fileName = $request->file('image')->getClientOriginalName();
            $fileUrl = public_path('uploads/' . $fileName);
            $saveFile = $request->image->move(public_path('uploads/'), $fileName);
            $pathForBase = "/uploads/".$fileName;
            $data = [];
            $data['model'] = $request->model;
            $data['photo'] = $pathForBase;
            $data['year'] = $request->year;
            $data['color'] = $request->color;
            $data['transmission'] = $request->transmission;
            $data['price'] = $request->price;
            Cars::where('id', $request->id)->update($data);

        }
        return view('admin.edit.car', ['id' => $id, 'models' => $models, 'cars' => $cars]);
    }
}
