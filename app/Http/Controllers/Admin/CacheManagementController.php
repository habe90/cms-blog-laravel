<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CacheManagement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CacheManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cache_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cache-management.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cache_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cache-management.create');
    }

    public function edit(CacheManagement $cacheManagement)
    {
        abort_if(Gate::denies('cache_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cache-management.edit', compact('cacheManagement'));
    }

    public function show(CacheManagement $cacheManagement)
    {
        abort_if(Gate::denies('cache_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cache-management.show', compact('cacheManagement'));
    }
}
