<?php

namespace Fully\Http\Controllers;

use Fully\Repositories\Faq\FaqInterface;

/**
 * Class FaqController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class FaqController extends Controller
{
    /**
     * @var FaqInterface
     */
    protected $faq;

    /**
     * @param FaqInterface $faq
     */
    public function __construct(FaqInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Display page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $faqs = $this->faq->all();
        return view('frontend.faq.show', compact('faqs'));
    }
}
