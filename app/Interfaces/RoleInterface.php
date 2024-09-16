<?php

namespace App\Interfaces;

interface RoleInterface
{
    public function getAll($select = [], $withRelations = [], $join = [], $filter = [], $where = null, $search = null, $sortOption = [], $paginateOption = [], $reformat = null);
    public function findByIdHash($id, $withRelations = [], $where = null ,$method = 'first');
}
