<div>
    <table class="bg-white w-full pr-3">
        <thead>
        <tr class="text-center font-bold text-xs">
            <td class="border px-6 py-4">Foto</td>
            <td class="border px-6 py-4">Vardas</td>
            <td class="border px-6 py-4">Pavardė</td>
            <td class="border px-6 py-4">Telefono nr.</td>
            <td class="border px-6 py-4">Adresas</td>
            <td class="border px-6 py-4">Rolė</td>
            <td class="border px-6 py-4">Veiksmai</td>
        </tr>
        </thead>

        @foreach($kontaktai as $kontaktas)
            <tr>
                <td class="border px-6 py-4">
                    <img src="{{asset('storage/images/'.$kontaktas->profile_photo)}}">
                </td>
                <td class="border px-6 py-4">{{$kontaktas->name}}</td>
                <td class="border px-6 py-4">{{$kontaktas->surname}}</td>
                <td class="border px-6 py-4">{{$kontaktas->phone}}</td>
                <td class="border px-6 py-4">{{$kontaktas->address}}</td>
                <td class="border px-6 py-4">{{$kontaktas->role_id}}</td>
                <td class="border px-6 py-4">
                    <button class="bg-green-400 rounded px-2"  wire:click.prevent="$emit('edit', {{$kontaktas->id}})">Redaguoti</button>
                    <button class="bg-red-400 rounded px-2" wire:click.prevent="delete({{$kontaktas->id}})" >Trinti</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
