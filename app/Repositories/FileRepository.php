<?php

namespace App\Repositories;

use App\Models\File as Model;

/**
 * Class FileRepository
 * @package App\Repositories
 */
class FileRepository extends CoreRepository
{
    /**
     * Количество файлов в last files
     */
    const COUNTFILES = 100;

    /**
     * На страницу
     */
    const PERPAGE = 12;

    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getWithPaginate()
    {
        $columns = [
            'id',
            'path',
            'name',
            'size',
            'created_at',
            'user_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->with([
                /*
                'user' => function($query){
                    $query->select(['id', 'email']);
                },
                */
                'user:id,username'
            ])
            ->take(self::COUNTFILES)
            ->paginate(self::PERPAGE);

        return $result;
    }
}
