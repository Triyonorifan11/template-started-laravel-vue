<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Interfaces\RoleInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SelectListController extends Controller
{
    private $roleInterface;
    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function roles(Request $request)
    {
        $roles = $this->roleInterface->getAll(
            select: ['*'],
            where: function (Builder $query) {
                $query->where('is_active', true)
                    ->where('roles.slug', '!=', 'developer')
                    ->where('roles.slug', '!=', 'customer');
            },
            search: function (Builder $query) use ($request) {
                $query->whereRaw("LOWER(name) LIKE '%" . strtolower($request->search) . "%'");
            },
            sortOption: [
                'orderCol' => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $request->sort_by)),
                'orderDir' => $request->order_by
            ],
            paginateOption: [
                'method' => 'selectList',
                'length' => $request->limit
            ],
        );

        return ResponseFormatter::success(RoleResource::collection($roles), 'Data retrieved successfully');
    }
}
