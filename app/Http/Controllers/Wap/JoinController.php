<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageRecruitRepositoryInterface;

class JoinController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page_repository = app(PageRepositoryInterface::class);
        $this->recruit_repository = app(PageRecruitRepositoryInterface::class);
    }
    public function index(Request $request)
    {
        $recruits = $this->recruit_repository->all();
        return $this->response->title('')
            ->view('join.index', true)
            ->data(compact('recruits'))
            ->output();
    }
}
