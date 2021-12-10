<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Sarasas extends Component
{
    protected $listeners = [
        'saved' => '$refresh',
        'edited' => '$refresh'
    ];
    public function render()
    {
        $list = User::whereHas('role', function($q) {
            $q->where('super_user', 0);
        })->get();

        return view('livewire.sarasas', [
        'kontaktai' => $list,

    ]);
    }
    public function delete($id){
        $photoName = User::where("id", $id)->get("profile_photo");
        $path = public_path('storage/images/'.$photoName[0]["profile_photo"]);

        if(file_exists($path)){
            unlink($path);
        }
        User::where("id", $id)->delete();
    }
}
