<?php

namespace App\Helpers;

class API_Article 
{
    function __construct()
    {
        $this->url = env('URL_SERVICE');
    }
    
    public function curlApiArticle($url, $mode, $data = '')
    {
        $mainUrl    = $this->url;
        
        $header     = [
            'Accept' => 'application/json'
        ];
        try {
            if ($mode == 'GET') {
                $response = \Http::withHeaders($header)->get($mainUrl.$url, $data);
            } else if ($mode == 'POST') {
                $response = \Http::withHeaders($header)->post($mainUrl.$url, $data);
            }
        } catch (\Throwable $th) {
            $response = json_encode([
                'code' => 500,
                'message' => 'error',
                'response' => [
                    'error' => 'Maaf terjadi error. Silahkan coba beberapa saat lagi'
                ]
            ]);

            return json_decode($response);
        }

        $hasilResponse = json_decode($response->getBody()->getContents());
        return $hasilResponse; 
    }

    public function articleByStatus($status)
    {
        // Url
        $url = 'posts/article/'.$status.'/get';
        // Mode
        $mode = 'GET';
        // Data
        $data = [];
       
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }

    public function articleByLimitandOffset($limit, $offset)
    {
        // Url
        $url = 'posts/article/show/'.$limit.'/'.$offset;
        // Mode
        $mode = 'GET';
        // Data
        $data = [];
       
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }

    public function articleById($id)
    {
        // Url
        $url = 'posts/article/'.$id.'/edit';
        // Mode
        $mode = 'GET';
        // Data
        $data = [];
       
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }

    public function articlePost($title, $content, $category, $status)
    {
        // Url
        $url = 'posts/article';
        // Mode
        $mode = 'POST';
        // Data
        $data = [
            'title'     => $title,
            'content'   => $content,
            'category'  => $category,
            'status'    => $status
        ];
        
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }

    public function articleUpdate($id, $title, $content, $category, $status)
    {
        // Url
        $url = 'posts/article/'.$id.'/update';
        // Mode
        $mode = 'POST';
        // Data
        $data = [
            'title'     => $title,
            'content'   => $content,
            'category'  => $category,
            'status'    => $status
        ];
        
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }

    public function articleDelete($id)
    {
        // Url
        $url = 'posts/article/'.$id.'/destroy';
        // Mode
        $mode = 'POST';
        // Data
        $data = [];
        
        $response = $this->curlApiArticle($url, $mode, $data);
        return $response;
    }
}
