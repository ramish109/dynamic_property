<?php
namespace App\Services;

use App\Repositories\IPropertyRequestRepository;

class PropertyRequestService
{
    private $_propertyRequestRepository;

    public function __construct(IPropertyRequestRepository $repository)
    {
        $this->_propertyRequestRepository = $repository;
    } 

    public function getAll()
    {
        return $this->_propertyRequestRepository->getAll();
    }

    // public function getById($id)
    // {
    //     return $this->_userRepository->getById($id);
    // }
    // public function getAgents()
    // {
    //     return $this->_userRepository->getAgents();
    // }
    // public function add($data)
    // {
    //     $this->_userRepository->add($data);
    // }

    // public function update($data,$id)
    // {
    //     $this->_userRepository->update($data,$id);
    // }

    // public function delete($id)
    // {
    //     $this->_userRepository->delete($id);
    // }
}