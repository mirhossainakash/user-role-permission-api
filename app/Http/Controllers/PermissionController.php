<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
    // Create a new permission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->name]);

        return response()->json(['message' => 'Permission created successfully', 'permission' => $permission], 201);
    }

    // Assign a permission to a role
    public function assignPermissionToRole(Request $request, $id)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->permissions);

        return response()->json(['message' => 'Permissions assigned to role successfully'], 200);
    }
}
