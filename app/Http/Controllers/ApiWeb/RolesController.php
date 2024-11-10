<?php

namespace App\Http\Controllers\ApiWeb;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Interfaces\RoleInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    private $roleInterface;
    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $beoEngineerings = $this->roleInterface->getAll(
            select: ['*'],
            search: function (Builder $query) use ($request) {
                $query->where('name', 'ILIKE', "%{$request->search}%");
                    // ->orWhere('description', 'ILIKE', "%{$request->search}%");
            },
            sortOption: [
                'orderCol' => $request->sort_by,
                'orderDir' => $request->order_by
            ],
            paginateOption: [
                'method' => 'paginate',
                'length' => $request->limit ?? 10,
                'page' => $request->page
            ],
            reformat: function ($data) {
                return $data->through(function ($item) {
                    $result = $item->toArray();
                    $result['id'] = $result['id_hash'];
                    unset($result['id_hash']);
                    $orderedResult = array_merge(['id' => $result['id']], $result);

                    return $orderedResult;
                });
            }
        );

        return ResponseFormatter::success($beoEngineerings, 'Data retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
