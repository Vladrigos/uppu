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
    const PERPAGE = 25;
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
            'name',
            'size',
            'comment',
            'created_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->with(['user:id,name'])
            ->take(self::COUNTFILES)
            ->paginate(self::PERPAGE);


        return $result;
    }
}
