<?php

namespace AllBlacks\Repositories;

use AllBlacks\Models\Import;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ImportRepositoryEloquent.
 *
 * @package namespace AllBlacks\Repositories;
 */
class ImportRepositoryEloquent extends BaseRepository implements ImportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Import::class;
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
        parent::create($request);
    }

}
