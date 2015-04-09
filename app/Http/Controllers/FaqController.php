<?php namespace Fully\Http\Controllers;

use Fully\Repositories\Faq\FaqInterface;

/**
 * Class FaqController
 * @author Sefa Karagöz
 */
class FaqController extends Controller {

    /**
     * @var Fully\Repositories\Faq\FaqInterface
     */
    protected $faq;

    /**
     * @param FaqInterface $faq
     */
    public function __construct(FaqInterface $faq) {

        $this->faq = $faq;
    }

    /**
     * Display page
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show() {

        $faqs = $this->faq->all();

        return view('frontend.faq.show', compact('faqs'));
    }
}
