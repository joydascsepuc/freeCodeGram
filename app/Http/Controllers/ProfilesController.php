<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'posts.count.'.$user->id, 
            now()->addSeconds(30), 
            function () use($user) {
               return $user->posts->count();
        });

        $followerCount = Cache::remember(
            'followers.posts.'.$user->id, 
            now()->addSeconds(30), 
            function () use($user) {
               return $user->profile->followers->count();
        });

        $followingCount = Cache::remember(
            'following.posts.'.$user->id, 
            now()->addSeconds(30), 
            function () use($user) {
               return $user->following->count();
        });

        return view('profiles.index', [
            'user' => $user,
            'follows' => $follows,
            'postCount' => $postCount,
            'followerCount' => $followerCount,
            'followingCount' => $followingCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //dd($user);
        $this->authorize('update', $user->profile);
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        if ($request->image != NULL) {
    
            $data = $request->validate([
                'title' => ['required','string'],
                'description' => ['required','string'],
                'link' => ['url'],
                'image' => ['required','image']
            ]);

            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            auth()->user()->profile()->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'link' => $data['link'],
                'image' => $imagePath
            ]);

        } else {

            $data = $request->validate([
                'title' => ['required','string'],
                'description' => ['required','string'],
                'link' => ['url']
            ]);

            auth()->user()->profile()->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'link' => $data['link']
            ]);
        }
  
        return redirect('/profile/'.auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
