<?php

namespace Fully\Repositories;

/**
 * Class RepositoryInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Get al data.
     *
     * @return mixed
     */
    public function all();

    /**
     * Get data with paginate.
     *
     * @param int  $page
     * @param int  $limit
     * @param bool $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false);
}
