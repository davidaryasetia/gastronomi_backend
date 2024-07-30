<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,restaurant_id,photo_path', 
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional', 
            'menus.foods:food_id,name,category'
        ])->get();

        return view('sections.restaurant.restaurant', [
            'title' => 'Restaurant Data', 
            'restaurant' => $restaurant,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('sections.restaurant.create', [
        'title' => 'Add Restaurant', 
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,photo_path', 
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional', 
            'menus.foods:food_id,name,category', 
        ])->findOrFail($id);

        return view('sections.restaurant.detail', [
            'title' => 'Detail Restaurant', 
            'restaurant' => $restaurant, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,photo_path',
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional', 
            'menus.foods:food_id,name,category',
        ])->findOrFail($id);

        return view('sections.restaurant.edit', [
            'title' => 'Edit Restaurant', 
            'restaurant' => $restaurant, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
