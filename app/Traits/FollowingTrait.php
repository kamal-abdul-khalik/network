<?php

namespace App\Traits;

use App\Models\User;

/**
 * Trait following
 */
trait FollowingTrait
{


    //aksi untuk follow user
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    //aksi untuk unfollow user
    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    //aksi mengecek apakah user sudah kita follow atau tidak
    public function hasFollows(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
