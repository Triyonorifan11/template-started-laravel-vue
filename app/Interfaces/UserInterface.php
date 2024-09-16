<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getAll($select = [], $withRelations = [], $join = [], $where = null, $search = null, $sortOption = [], $paginateOption = [], $reformat = null, $filter = []);
    public function findById($id, $withRelations = [], $method = 'find');
    public function findByIdHash($id, $withRelations = [], $method = 'first');
    public function create(array $data);
    public function update(array $data, $id);
    public function switchActiveStatus($id);
    public function resetPassword($id);
    public function destroyCustomer($id);
}
