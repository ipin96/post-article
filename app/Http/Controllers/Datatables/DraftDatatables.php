<?php

namespace App\Http\Controllers\Datatables;

use App\Helpers\API_Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DraftDatatables extends Controller
{
    public function __construct()
    {
        $this->apiArticle = new API_Article;
    }
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $result = $this->apiArticle->articleByStatus('Draft');
        $query  = $result->response;
        
        return DataTables::of($query)
            ->addIndexColumn('DT_RowIndex')
            ->addColumn('Title', function ($query){
                return $query->title ?? '';
            })
            ->addColumn('Category', function ($query){
                return $query->category ?? '';
            })
            ->addColumn('action', function ($query){
                return view('posts.customColumn.action', compact('query'));
            })
            ->make(true);
    }
}
