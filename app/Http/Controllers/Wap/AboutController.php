<?php

namespace App\Http\Controllers\Wap;

use Log,Tree;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;

class AboutController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page_repository = app(PageRepositoryInterface::class);
        $this->view_prefix = 'about.';
    }
    public function index(Request $request)
    {
        $company = $this->page_repository->findBySlug('about-company');

        return $this->response->title('关于我们')
            ->data([
                'company' => $company,
            ])
            ->view($this->view_prefix.'index', true)
            ->output();
    }
}
