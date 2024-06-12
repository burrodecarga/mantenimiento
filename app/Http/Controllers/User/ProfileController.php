<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user=User::find($id);
        $profile=$user->profile;
        if(is_null($profile)){
           Profile::create([
                'user_id'=>$id,
                ]);
        }
        $user=User::find($id);
        return view('profiles.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $profile=$user->profile;
        if(is_null($profile)){
           Profile::create([
                'user_id'=>$id,
                ]);
        }
        $user=User::find($id);
        //dd($user->profile);
        $title="user";
        $btn="modify";
        return view('profiles.edit',compact('user','title','btn'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->only('profession','specialty','twitter','linkedin','facebook','instagram','youtube','whatsapp','wechat','qq','costo');
        $user=User::find($id);
        $user->profile()->update($data);
        return redirect()->route('home');

    }

    public function user($id)
    {
        $user=User::find($id);
        $profile=$user->profile;
        if(is_null($profile)){
           Profile::create([
                'user_id'=>$id,
                ]);
        }
        $user=User::find($id);
        $title="user";
        $btn="modify";
        return view('profiles.user',compact('user','title','btn'));

    }
}
