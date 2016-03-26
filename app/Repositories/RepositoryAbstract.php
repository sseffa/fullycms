<?php

namespace Fully\Repositories;

/**
 * Class RepositoryAbstract.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class RepositoryAbstract extends AbstractValidator
{
    /**
     * Get language.
     *
     * @return mixed
     */
    protected function getLang()
    {
        return getLang();
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    protected function slug($string)
    {
        return filter_var(str_replace(' ', '-', strtolower(trim($string))), FILTER_SANITIZE_URL);
    }
}
