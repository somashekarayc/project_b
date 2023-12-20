<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserSettingResource;
use App\Models\UserSetting;
use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;

class UserSettingController extends Controller
{

    public function index()
    {
        return UserSettingResource::collection(UserSetting::paginate());
    }

    public function store(StoreUserSettingRequest $request)
    {
        $userSetting = UserSetting::create($request->validated());

        return response()->json(new UserSettingResource($userSetting), 201);
    }


    public function show(UserSetting $userSetting)
    {
        // return new UserSettingResource($userSetting);
        // return response()->json(UserSetting::find(1), 200);
        return response()->json(new UserSettingResource($userSetting), 200);

    }


    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {
        $userSetting->update($request->validated());

        return new UserSettingResource($userSetting);
    }


    public function destroy(UserSetting $userSetting)
    {
        UserSetting::destroy($userSetting);

        return response()->json(null, 204);
    }
}
