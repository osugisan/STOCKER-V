<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Requests\Request;
use App\Models\Group;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GroupController extends Controller
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
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $user = Auth::user();
        $code = uniqid();

        $group = Group::create([
            'name' => $request->name,
            'code' => $code,
        ]);

        if ($request->main_group) {
            $user->main_group = $group->id;
        }
        $user->current_group = $group->id;
        $user->save();

        $group->users()->attach($user->id, [ 'owner' => true ]);


        return to_route('groups.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        $current_group = Group::find($user->current_group);
        dd($current_group->users()->pivot->owner);

        $members = $current_group->users;

        $tags = Tag::select('id', 'name', 'bg_color', 'text_color', 'group_id')->where('group_id', $current_group->id)->get();

        return Inertia::render('Groups', [
            'user' => $user,
            'groups' => $user->groups,
            'current_group' => $current_group,
            'members' => $members,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->name = $request->name;
        $group->save();

        return to_route('groups.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, Group $group)
    {
        $user = Auth::user();

        if($request->type === 'select') {
            $user->current_group = $group->id;
        }
        if($request->type === 'change') {
            $user->main_group = $group->id;
        }
        $user->save();

        return to_route('groups.edit');
    }

    public function fire(Request $request, User $user)
    {
        $group = Group::find($request->group);
        $oldMembers = $group->users->toArray();
        $oldMemberIds = array_column($oldMembers, 'id');
        
        $newMemberIds = array_filter($oldMemberIds, function($memberId) use ($user) {
            return $memberId !== $user->id;
        });

        $group->users()->sync($newMemberIds);

        return to_route('groups.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $users = $group->users;
        $deleteId = $group->id;

        $group->delete();
        
        foreach($users as $user) {
            $newGroup = $user->groups()->first();
            if ($user->main_group === $deleteId) {
                $user->main_group = $newGroup->id;
            }
            if ($user->current_group === $deleteId) {
                $user->current_group = $newGroup->id;
            }
            $user->save();
        }

        return to_route('profile.edit');
    }
}
