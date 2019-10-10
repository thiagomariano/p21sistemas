<?php

namespace AllBlacks\Repositories;

use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AllBlacks\Models\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace AllBlacks\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function create($request)
    {
        $request['password'] = Hash::make($request['password']);
        parent::create($request);
    }

    public function update($request, $id)
    {
        $request['password'] = Hash::make($request['password']);
        parent::update($request, $id);
    }
}
