<?php

namespace App\Service;


use App\Repository\ProfileRepository;
use Illuminate\Support\Facades\Storage;


/**
 * class Audit Service
 */
class ProfileService
{
    /**
     * @var profileRepository
     */
    protected $profileRepository;

    /**
     * @param ProfileRepository $profileRepository
     */
    public function __construct(ProfileRepository $profileRepository){
        $this->profileRepository=$profileRepository;
    }

    /**
     * Edits profile page
     *
     * @param $id
     * @return array
     */
    public function edit($id){
        $gender = $this->profileRepository->all();
        $status = $this->profileRepository->getStatus();
        $profile = $this->profileRepository->findWithRelation($id);
        $arr=[];
        array_push($arr, $gender, $status, $profile);
        return $arr;
    }

    /**
     * Updates profile page
     *
     * @param $data
     * @param $id
     */
    public function update($data, $id){
        $gender = $this->profileRepository->all();
        $status = $this->profileRepository->getStatus();
        $profile = $this->profileRepository->findWithRelation($id);


        $profile->phone_number = $data->number;
        $profile->gender_id = $data->gender;
        $profile->status_id = $data->status;
        $profile->save();
        $arr=[];
        array_push($arr, $gender, $status, $profile);
        return $arr;
    }
}
