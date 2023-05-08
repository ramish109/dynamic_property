<?php
namespace App\Repositories;

use App\Models\User;

class PropertyRequestRepository extends Repository implements IPropertyRequestRepository
{
    public function __construct(User $user)
    {
        parent::setModel($user);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function getById($id) 
    {
        return parent::get($id);
    }

    public function getPropertyRequest()
    {
        // return User::where('type','user')->get();
        return User::whereIn('type', ['builder','user','individual'])->get();
    }
    public function add($data)
    {
        return parent::add($data);
    }

    public function update($data,$id)
    {
        parent::update($data,$id);
    }

    public function delete($id)
    {
        parent::delete($id);
    }
}