<div>
    <span>
    @if($edit == 1)
        <button class="float-right text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded" type="button" wire:click.prevent="clear">Išjungti redagavima</button>
    @endif
    </span>
    <form class="w-full max-w-lg mx-auto overflow-hidden" method="post" wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">

                <div class="w-full px-3 mt-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Vardas
                </label>
                <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text" placeholder="Vardas">
                @error('name') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Pavardė
                </label>
                <input wire:model="surname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id='unit_of_measurement' type="text" placeholder="Pavardė">
                @error('surname') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Roles pasirinkimas
                </label>
                <div class="relative">
                    <select wire:model="role_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option> Rolė </option>
                        @foreach( $roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role_id') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>



            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Telefono nr.
                </label>
                <input wire:model="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="model" type="number" placeholder="Telefono numeris">
                @error('phone') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="height">
                    Adresas
                </label>
                <input wire:model="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Adresas">
                @error('address') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="photo">
                    Foto
                </label>
                <input wire:model="profile_photo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="photo" type="file" placeholder="tvora.jpg">
                @error('profile_photo') <span class="error text-sm text-red-400">{{ $message }}</span> @enderror
            </div>

            </div>
        </div>
        @if($edit == 0)
        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Saugoti</button>
    </form>
        @else
        </form>
            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="button" wire:click="edit()">Redaguoti</button>
        @endif
</div>
