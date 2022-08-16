<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmailRepository;
use App\Entities\Email;
use App\Validators\EmailValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class EmailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmailRepositoryEloquent extends BaseRepository implements EmailRepository, CacheableInterface
{
    use CacheableRepository;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Email::class;
    }

    
    /**
     * Searchable Fields
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'to',
        'from'
    ];
    
    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EmailValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
     /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return "App\\Presenters\\EmailPresenter";
    }
    
}
