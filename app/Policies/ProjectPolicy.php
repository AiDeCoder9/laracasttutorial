<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */

    //say if you are an admin you can view all the projects and update them we can use gate to give access them
    //it will bypass the defined relationship by defiining gate method in auth service provider in boot
    public function update(User $user, Project $project)
    {

        return $project->owner_id == $user->id;
    }


}
