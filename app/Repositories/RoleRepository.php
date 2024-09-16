<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\Roles;

class RoleRepository implements RoleInterface
{
    public function getAll($select = [], $withRelations = [], $join = [], $filter = [], $where = null, $search = null, $sortOption = [], $paginateOption = [], $reformat = null)
    {
        $roles = Roles::query();

        if (isset($select) && count($select) > 0) {
            $roles->select($select);
        }

        if (isset($withRelations) && count($withRelations) > 0) {
            $roles->with($withRelations);
        }

        if (isset($join) && count($join) > 0) {
            foreach ($join as $key => $value) {
                $roles->{$value['method']}($value['table'], $value['value']);
            }
        }

        if (isset($where) && is_callable($where)) {
            $roles->where($where);
        }

        if (isset($search) && is_callable($search)) {
            $roles->where($search);
        }

        if (isset($sortOption['orderCol']) && !empty($sortOption['orderCol'])) {
            $roles->orderBy($sortOption['orderCol'], $sortOption['orderDir'] ?? 'ASC');
        }

        if (isset($paginateOption['method']) && !empty($paginateOption['method']) && $paginateOption['method'] == 'selectList') {
            $roles = $roles->limit($paginateOption['length'])->get();
        } elseif (isset($paginateOption['method']) && !empty($paginateOption['method'])) {
            $roles = $roles->{$paginateOption['method']}(perPage: $paginateOption['length'] ?? 10, page: $paginateOption['page'] ?? 1);
        } else {
            $roles = $roles->get();
        }

        if (isset($reformat) && is_callable($reformat)) {
            $roles = $reformat($roles);
        }

        return $roles;
    }

    public function findByIdHash($id, $withRelations = [], $where = null, $method = 'first')
    {
        $role = Roles::with($withRelations)
        ->where('id_hash', $id)
        ->$method();

        return $role;
    }
}
