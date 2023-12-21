<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
    }

    public function index()
    {
        $subscribers = $this->repo->all(Subscribers::class);
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
