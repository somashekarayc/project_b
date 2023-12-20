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
        return UserSettingResource::collection(UserSetting::all());
    }

    public function store(StoreUserSettingRequest $request)
    {
        $userSetting = UserSetting::create($request->validated());

        return UserSettingResource::make($userSetting);
    }


    public function show(UserSetting $userSetting)
    {
        return UserSettingResource::make($userSetting);

    }


    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {
        $userSetting->update($request->all());

        return UserSettingResource::make($userSetting);

    }


    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
