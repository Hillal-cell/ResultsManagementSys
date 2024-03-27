<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        
        return view('pages.results');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function editResults(Request $request)
    {
        // Retrieve the ID from the query parameters
        $id = $request->query('id');

        // Use the $id parameter as needed
        // For example, you can directly access it in your method
        $idValue = $id;

        return view('pages.edit',['id' => $idValue]);
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display delete page
     *
     * @return \Illuminate\View\View
     */
    public function deleteResults(Request $request)
    {
        $id = $request->query('id');

        $idValue = $id;

        return view('pages.remove',['id' => $idValue]);
    }
}
