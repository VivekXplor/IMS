<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\User;
use Mail;
use Spatie\QueryBuilder\QueryBuilder;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = QueryBuilder::for(Item::class)
            ->allowedFilters('name')
            ->defaultSort('created_at')
            ->paginate();
        return new ItemCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $categories = $request->categories;
        $item = Item::create($request->all());
        $item->save();
        $categories_exist = Category::first();
        if($categories_exist){
            $item->categories()->attach($categories);
        }
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        // try{
        //     Mail::send('item_created',[], function($message) use ($emails){
        //         $message->to($emails)->subject("Regarding Item Creation");
        //     });
        // }
        // catch(Exception $e){
        //     // return response($e->getMessage(), 422);
        //     Log::info('Regarding Item Creation Email Failed.');
        // }
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $categories = $request->categories;
        $categories_exist = Category::first();
        if($categories_exist){
            $item->categories()->sync($categories);
        }
        $item->update($request->all());
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        // try{
        //     Mail::send('item_updated',[], function($message) use ($emails){
        //         $message->to($emails)->subject("Regarding Item Updation");
        //     });
        // }
        // catch(Exception $e){
        //     // return response($e->getMessage(), 422);
        //     Log::info('Regarding Item Updation Email Failed.');
        // }
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

        // try{
        //     Mail::send('item_deleted',[], function($message) use ($emails){
        //         $message->to($emails)->subject("Regarding Item Deletion");
        //     });
        // }
        // catch(Exception $e){
        //     // return response($e->getMessage(), 422);
        //     Log::info('Regarding Item Deletion Email Failed.');
        // }
        return response()->json(['success' => true]);
    }
}
