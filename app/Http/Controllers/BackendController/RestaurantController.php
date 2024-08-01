<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Restaurant_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($request->toArray());    

        $restaurant = $request->validate([
            'name_restaurant' => 'required|string',
            'description' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'url_link_map' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'photo_path' => 'nullable',
            'detail_restaurant_photos.*' => 'nullable',

            // Insert into menu
            'menu' => 'required|array',
            'type_food' => 'required|array',
            'is_traditional' => 'required|array',
        ]);

        $restaurant_photo = $request->file('photo_path')->store('restaurant_photo', 'public');

        $restaurant_data = [
            'name_restaurant' => $request->input('name_restaurant'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'url_link_map' => $request->input('url_link_map'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'open_at' => $request->input('open_at'),
            'close_at' => $request->input('close_at'),
            'photo_path' => $restaurant_photo,
        ];

        // Data ke table menu 
        $menu = $request->input('menu');
        $type_food = $request->input('type_food');
        $is_traditional = $request->input('is_traditional');

        // Simpan Data 
        $insert_data_restaurant = Restaurant::create($restaurant_data);

        // Menyimpan foto detail restaurant
        if ($request->hasFile('detail_restaurant_photos')) {
            foreach ($request->file('detail_restaurant_photos') as $detail_restaurant_photo) {
                $path = $detail_restaurant_photo->store('detail_restaurant_photo', 'public');
                Restaurant_Photo::create([
                    'restaurant_id' => $insert_data_restaurant->restaurant_id,
                    'photo_path' => $path,
                ]);
            }
        }

        // Logic simpan data menu
        $data_menu = [];
        foreach ($menu as $index => $menus) {
            $data_menu[] = [
                'restaurant_id' => $insert_data_restaurant->restaurant_id,
                'name' => $menus,
                'type_food' => $type_food[$index],
                'is_traditional' => $is_traditional[$index],
            ];
        }
        $insert_menu = Menu::insert($data_menu);

        if ($insert_data_restaurant && $insert_menu) {
            return redirect('/restaurant')->with('success', 'Data Restaurant Successfully Addedd');
        } else {
            return redirect('/restaurant')->with('error', 'Data Restaurant Failed To Addedd !!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,restaurant_id,photo_path',
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional',
            'menus.foods:menu_id,food_id,name,category',
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
        // dd($request->toArray());

        $validated = $request->validate([
            'name_restaurant' => 'required',
            'description' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'url_link_map' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            // 'photo_path' => 'nullable',
            // 'detail_restaurant_photos.*' => 'nullable',

            // Update Menu
            'menu' => 'required|array',
            'type_food' => 'required|array',
            'is_tradition' => 'required|array',
        ]);

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update([
            'name_restaurant' => $request->input('name_restaurant'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'url_link_map' => $request->input('url_link_map'),
            'open_at' => $request->input('open_at'),
            'close_at' => $request->input('close_at'),
        ]);

        // Update Data Menu
        // $menu = $request->input('menu');
        // $type_food = $request->input('type_food');
        // $is_traditional = $request->input('is_traditional');

        // Hapus Data Menu Lama
        Menu::where('restaurant_id', $restaurant->restaurant_id)->delete();

        // Simpan Data Menu Baru 
        // $data_menu = [];
        // foreach ($menu as $index => $menus) {
        //     $data_menu[] = [
        //         'restaurant_id' => $restaurant->restaurant_id,
        //         'name' => $menus,
        //         'type_food' => $type_food[$index],
        //         'is_traditional' => $is_traditional[$index],
        //     ];
        // }

        // $insert_menu = Menu::insert($data_menu);

        if ($restaurant)     {
            return redirect('/restaurant')->with('success', 'Data Restaurant Successfully Addeed !!!');
        } else {
            return redirect('restaurant')->with('error', 'Data Restaurant Succesffully Updated !!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if (!empty($restaurant->photo_path)) {
            Storage::disk('public')->delete($restaurant->photo_path);
        }

        // Hapus Foto Restaurant
        foreach ($restaurant->restaurant_photos as $restaurant_photo) {
            if (!empty($restaurant_photo->photo_path)) {
                Storage::disk('public')->delete($restaurant_photo->photo_path);
            }
            $restaurant_photo->delete();
        }

        // Hapus Menus 
        foreach ($restaurant->menus as $menu) {
            $menu->delete();
        }

        $restaurant->delete();

        if ($restaurant) {
            return redirect('/restaurant')->with('success', 'Data Restaurant Successfully Deleted !!!');
        } else {
            return redirect('/restaurant')->with('error', 'Data Restaurant Failed To Deleted !!!');
        }

    }
}
