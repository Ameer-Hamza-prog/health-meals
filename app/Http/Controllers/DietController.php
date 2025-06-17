<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $diets = Diet::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10);

        return view('dashboardadmin.diets.index', compact('diets', 'search'));
    }

    public function create()
    {
        return view('dashboardadmin.diets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:diets,name',
            'description' => 'nullable|string',
        ]);

        Diet::create($request->only('name', 'description'));

        return redirect()->route('diets.index')->with('success', 'تم إضافة النظام الغذائي بنجاح');
    }

    public function edit(Diet $diet)
    {
        return view('dashboardadmin.diets.edit', compact('diet'));
    }

    public function update(Request $request, Diet $diet)
    {
        $request->validate([
            'name' => "required|string|max:255|unique:diets,name,{$diet->id}",
            'description' => 'nullable|string',
        ]);

        $diet->update($request->only('name', 'description'));

        return redirect()->route('diets.index')->with('success', 'تم تحديث النظام الغذائي');
    }

    public function destroy(Diet $diet)
    {
        $diet->delete();

        return redirect()->route('diets.index')->with('success', 'تم حذف النظام الغذائي');
    }
}
