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
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-website-subscribers', ['only' => 'index']);
    }

    public function index()
    {
        $subscribers = $this->repo->all(Subscribers::class);
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
