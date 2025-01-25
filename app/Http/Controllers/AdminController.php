<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): Response
    {
        $admins = Admin::all();

        return view('admin.index', [
            'admins' => $admins,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('admin.create');
    }

    public function store(AdminStoreRequest $request): Response
    {
        $admin = Admin::create($request->validated());

        $request->session()->flash('admin.id', $admin->id);

        return redirect()->route('admins.index');
    }

    public function show(Request $request, Admin $admin): Response
    {
        return view('admin.show', [
            'admin' => $admin,
        ]);
    }

    public function edit(Request $request, Admin $admin): Response
    {
        return view('admin.edit', [
            'admin' => $admin,
        ]);
    }

    public function update(AdminUpdateRequest $request, Admin $admin): Response
    {
        $admin->update($request->validated());

        $request->session()->flash('admin.id', $admin->id);

        return redirect()->route('admins.index');
    }

    public function destroy(Request $request, Admin $admin): Response
    {
        $admin->delete();

        return redirect()->route('admins.index');
    }
}
