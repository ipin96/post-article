<?php

namespace App\Http\Controllers;

use App\Helpers\API_Article;
use Illuminate\Http\Request;
use App\Helpers\ArrayPaginator;

class PreviewController extends Controller
{
    public function __construct()
    {
        $this->apiArticle = new API_Article;
    }

    public function index(ArrayPaginator $paginator)
    {
        $article    = $this->apiArticle->articleByStatus('Publish');
        $response   = $article->response;
        
        $data       = $paginator->paginate($response, 10);
        return view('preview.index', compact('data'));
    }
}
