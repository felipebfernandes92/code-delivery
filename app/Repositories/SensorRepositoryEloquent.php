<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\SensorRepository;
use CodeDelivery\Models\Sensor;
use CodeDelivery\Validators\SensorValidator;

/**
 * Class SensorRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class SensorRepositoryEloquent extends BaseRepository implements SensorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sensor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
