<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Carbon\Carbon;

class UserRepository implements UserInterface
{
    public function getAll($select = [], $withRelations = [], $join = [], $where = null, $search = null, $sortOption = [], $paginateOption = [], $reformat = null, $filter = [])
    {
        $users = User::query();

        if (is_array($select) && count($select) > 0) {
            $users->select($select);
        }

        if (is_array($withRelations) && count($withRelations) > 0) {
            $users->with($withRelations);
        }

        if (is_array($join) && count($join) > 0) {
            foreach ($join as $key => $value) {
                if (isset($value['method']) && isset($value['table']) && isset($value['value'])) {
                    $users->{$value['method']}($value['table'], $value['value']);
                }
            }
        }

        if (is_callable($where)) {
            $users->where($where);
        }

        if (is_callable($search)) {
            $users->where($search);
        }
        if (isset($filter['start_date']) && !empty($filter['start_date']) || !isset($filter['end_date']) && !empty($filter['end_date'])) {
            $from = Carbon::parse($filter['start_date'] . ' 00:00:00')->format('Y-m-d H:i:s');
            $to = Carbon::parse($filter['end_date'] . ' 23:59:59')->format('Y-m-d H:i:s');
            $users = $users->whereBetween('created_at', [$from, $to]);
        }
        

        if (is_array($sortOption) && isset($sortOption['orderCol']) && !empty($sortOption['orderCol'])) {
            $users->orderBy($sortOption['orderCol'], $sortOption['orderDir'] ?? 'ASC');
        }

        if (is_array($paginateOption) && isset($paginateOption['method']) && !empty($paginateOption['method'])) {
            $users = $users->{$paginateOption['method']}(
                $paginateOption['length'] ?? 10,
                ['*'],
                'page',
                $paginateOption['page'] ?? null
            );
        } else {
            $users = $users->get();
        }

        if (is_callable($reformat)) {
            $users = $reformat($users);
        }

        return $users;
    }

    public function findById($id, $withRelations = [], $method = 'find')
    {
        $user = User::with($withRelations)->$method($id);

        return $user;
    }

    public function findByIdHash($id, $withRelations = [], $method = 'first')
    {
        $user = User::with($withRelations)->where('id_hash', $id)->$method();

        return $user;
    }

    public function create(array $data)
    {
        $user = new User();

        foreach ($data as $key => $value) {
            $user->$key = $value;
        }

        $user->save();
        $user->load('role');

        return $user;
    }

    public function update(array $data, $id)
    {
        $user = $this->findByIdHash(id: $id);

        foreach ($data as $key => $value) {
            $user->$key = $value;
        }

        $user->save();
        $user->load('role');

        return $user;
    }

    public function switchActiveStatus($id)
    {
        $user = $this->findByIdHash($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return $user;
    }

    public function resetPassword($id)
    {
        $user = $this->findByIdHash($id);
        $user->password = bcrypt(config('myconfig.default_password'));
        $user->save();

        return $user;
    }

    public function destroyCustomer($id)
    {
        $user = $this->findByIdHash($id);
        $user = $this->switchActiveStatus($id);
        $user->delete();
        $user->save();

        return $user;
    }
}
