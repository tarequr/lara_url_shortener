<?php

namespace App\Http\Controllers;

use App\Models\UrlShortener;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        //check url exists
        $url = UrlShortener::whereUrl($request->url)->first();

        if ($url ==  null) {
            $short = $this->generateShortURL();
            UrlShortener::create([
                'url' => $request->url,
                'shortener' => $short,
            ]);

            $url = UrlShortener::whereUrl($request->url)->first();
        }

        return view('welcome2',compact('url'));
    }

    public function generateShortURL()
    {
        $result = base_convert(rand(10000,999999), 10, 35);
        $data = UrlShortener::whereShortener($result)->first();

        if ($data != null) {
            $this->generateShortURL();
        }

        return $result;
    }

    public function shortenerLink($link)
    {
        $urlRedirect = UrlShortener::whereShortener($link)->first();
        return redirect($urlRedirect->url);
    }

}
