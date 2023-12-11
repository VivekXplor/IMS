<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\User;
use Mail;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ItemCollection(Item::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $item = Item::create($request->all());
    //     return response()->json($item, 201);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->all());
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        Mail::send('item_created',[], function($message) use ($emails){
            $message->to($emails)->subject("Regarding Item Creation");
        });

        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Item $item)
    // {
        
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->all());
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        Mail::send('item_updated',[], function($message) use ($emails){
            $message->to($emails)->subject("Regarding Item Updation");
        });

        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        Mail::send('item_deleted',[], function($message) use ($emails){
            $message->to($emails)->subject("Regarding Item Deletion");
        });

        return response()->json(['success' => true]);
    }
}
