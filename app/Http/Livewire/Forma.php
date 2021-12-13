<?php

namespace App\Http\Livewire;

use App\Models\role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Forma extends Component
{
    use WithFileUploads;
    public $name, $surname, $phone, $address, $profile_photo, $role_id;
    // jeigu edit = 1 forma bus skirta editinimui o ne savinimui
    public $edit = 0;
    public $editId;

    protected $listeners = [
        'edit' => 'editForma',
    ];
    protected $rules = [
        'name' => 'required|max:255',
        'surname' => 'required|max:255',
        'phone' => 'required',
        'address' => 'required',
        'role_id' => 'required',
        ];
    protected $messages = [
        'name.required' => 'Būtina užpildyti',
        'surname.required' => 'Būtina užpildyti',
        'phone.required'=>'Būtina užpildyti',
        'address.required' => 'Būtina užpildyti',
        'role_id.required' => 'Būtina pasirinkti',
    ];

    public function render()
    {
        return view('livewire.forma',[
            'roles' => role::all(),
        ]);
    }
    public function save()
    {
        $this->validate();

        $photoName = $this->checkFoto();

        User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'address' => $this->address,
            'profile_photo' => $photoName,
            'role_id' => $this->role_id,
        ]);

        $this->profile_photo->storeAs('public/images', $photoName);

        $this->name = "";
        $this->surname = "";
        $this->phone = "";
        $this->address = "";
        $this->profile_photo = "";
        $this->resetErrorBag();
        $this->emit('saved');
        }

    public function checkFoto()
    {
        if(is_string($this->profile_photo)) {
            $PhotoName = $this->profile_photo;
        }else {
            $PhotoName = $this->profile_photo->getClientOriginalName();
            $i = 1;
            if (file_exists(storage_path('app/public/images/') . $PhotoName)) {
                while (file_exists(storage_path('app/public/images/') . $PhotoName)) {
                    $i++;
                    $PhotoName = "($i)" . $PhotoName;
                }
            }
            $this->profile_photo->storeAs('public/images/', $PhotoName);
        }
        return $PhotoName;
    }

    public function editForma($id)
    {
        $this->editId = $id;
        $this->edit = 1;
        $kontaktas = User::where('id', $id)->get();

        $this->name = $kontaktas[0]['name'];
        $this->surname = $kontaktas[0]['surname'];
        $this->phone = $kontaktas[0]['phone'];
        $this->address = $kontaktas[0]['address'];
        $this->role_id = $kontaktas[0]['role_id'];
        $this->profile_photo = $kontaktas[0]['profile_photo'];
    }

    public function edit(){
            $photoName = $this->checkFoto();
        User::where("id", $this->editId)->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'address' => $this->address,
            'profile_photo' => $photoName,
            'role_id' => $this->role_id,
        ]);

        $this->name = '';
        $this->surname = '';
        $this->phone = '';
        $this->address = '';
        $this->role_id = '';
        $this->editId = 0;
        $this->edit = 0;

        $this->emit('edited');
    }

    public function clear(){
        $this->name = '';
        $this->surname = '';
        $this->phone = '';
        $this->address = '';
        $this->role_id = '';
        $this->editId = 0;
        $this->edit = 0;
    }
}
