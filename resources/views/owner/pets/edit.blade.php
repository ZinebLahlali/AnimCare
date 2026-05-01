<x-layouts.app>
    <div class="max-w-xl mx-auto px-6 py-10">

        <form method="POST" action="{{route('pets.update', $animal->id)}}" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <input type="text" name="name" value="{{$animal->name}}" class="w-full border rounded-lg p-2 mb-4">
           <input type="text" name="species" value="{{$animal->species}}" class="w-full border rounded-lg p-2 mb-4">
           <input type="text" name="age" value="{{$animal->age}}" class="w-full border rounded-lg p-2 mb-4">
           <select name="gender" id="gender" class="w-full border rounded-lg p-2 mb-4">
            <option value="female" {{ $animal->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="male" {{ $animal->gender == 'male' ? 'selected' : ''}}>Male</option>
           </select>
           <input type="text" name="weight"value="{{$animal->weight}}" class="w-full border rounded-lg p-2 mb-4">
           <input type="file" name="image" id="image"  class="w-full border p-2 mb-4 rounded">
             @if($animal->photo)
           <img src="{{ asset('storage/' . $animal->photo)}}" class="w-full border p-2 mb-4 rounded">
           @endif

           <button class="bg-purple-500 text-white px-4 py-2 rounded">
               Update Pet
           </button>

        </form>

    </div>
</x-layouts.app>

