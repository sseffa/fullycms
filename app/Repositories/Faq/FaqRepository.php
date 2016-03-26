<?php

namespace Fully\Repositories\Faq;

use Config;
use Fully\Models\Faq;
use Fully\Repositories\RepositoryAbstract;
use Fully\Repositories\CrudableInterface;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class FaqRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class FaqRepository extends RepositoryAbstract implements FaqInterface, CrudableInterface
{
    /**
     * @var
     */
    protected $perPage;
    /**
     * @var \Faq
     */
    protected $faq;
    /**
     * Rules.
     *
     * @var array
     */
    protected static $rules = [
        'question' => 'required',
        'answer' => 'required',
    ];

    /**
     * @param Faq $faq
     */
    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
        $config = Config::get('fully');
        $this->perPage = $config['per_page'];
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->faq->where('lang', $this->getLang())->get();
    }

    /**
     * Get paginated faqs.
     *
     * @param int  $page  Number of faqs per page
     * @param int  $limit Results per page
     * @param bool $all   Show published or all
     *
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $result = new \StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->faq->orderBy('created_at', 'DESC')->where('lang', $this->getLang());

        $faqs = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalFaqs();
        $result->items = $faqs->all();

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->faq->findOrFail($id);
    }

    /**
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function create($attributes)
    {
        if ($this->isValid($attributes)) {
            $this->faq->lang = $this->getLang();
            $this->faq->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Faq validation failed', $this->getErrors());
    }

    /**
     * @param $id
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function update($id, $attributes)
    {
        $this->faq = $this->find($id);

        if ($this->isValid($attributes)) {
            $this->faq->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Faq validation failed', $this->getErrors());
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->faq->find($id)->delete();
    }

    /**
     * Get total faq count.
     *
     * @param bool $all
     *
     * @return mixed
     */
    protected function totalFaqs()
    {
        return $this->faq->where('lang', $this->getLang())->count();
    }
}
