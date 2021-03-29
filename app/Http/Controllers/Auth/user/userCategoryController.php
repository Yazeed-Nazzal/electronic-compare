<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Illuminate\Events\queueable;

class userCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($name)
    {
        switch ($name) {
            case 'laptop':
                $laptops = Item::with('laptops')->get();
                return view('category.laptops',compact('laptops'));
                break;
            case 'phone':
                $phones = Item::with('phones')->get();
                return view('category.phones',compact('phones'));
                break;
            case 'watch':
                $watches = Item::with('$watches')->get();
                return view('category.watches',compact('watches'));
                break;
            case 'headphone':
                $headphones = Item::with('headphones')->get();
                return view('headPhones.',compact('headphones'));
                break;
            default:
                abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
