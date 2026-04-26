

<x-layouts.app>
    
      
    <div class="p-8 overflow-y-auto gap-8 max-w-6xl mx-auto">
        
            <div class="px-8 py-6 bg-white border-b border-gray-200 sticky top-0 z-50">
                <div>
                <h2 class="text-3xl font-black">My Pets</h2>
                <p class="text-sm text-gray-400">Manage your furry friends and their health records.</p>
                </div>
            </div>
     
     
      <div class="grid grid-cols-3 gap-8 px-8 pb-12 mt-3">
       
        @foreach($animaux as $animal)
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
          <div class="relative h-70">
            <img  src="{{asset('storage/'. $animal->photo)}}"  alt="{{$animal->name}}" class="w-full h-full object-cover"/>
          </div>
          <div class="p-6 flex flex-col gap-4">
            <div>
              <div class="flex justify-between items-start">
                <h3 class="text-xl font-black">{{$animal->name}}</h3>
                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">{{$animal->age}} Years Old</span>
              </div>
              <p class="text-sm text-gray-400">Speices:{{$animal->species}}</p>
            </div>
            <div class="flex flex-col gap-2">
              <div class="flex items-center gap-2 text-xs text-gray-500">
                <span class="material-symbols-outlined text-sm text-purple-500">schedule</span>
                <span>Last visit: 2 weeks ago</span>
              </div>
              <div class="flex items-center gap-2 text-xs text-gray-500">
                <span class="material-symbols-outlined text-sm text-purple-500">medical_information</span>
                <span>Vaccinations up to date</span>
              </div>
            </div>
            <div class="flex gap-4">
              <button class="px-3 py-2 w-full rounded-lg bg-blue-50 text-purple-500 text-xs font-bold">Health Records</button>
              <a href="{{route('pets.addAppointment', $animal->id)}}" class="px-3 py-2 w-full rounded-lg bg-blue-50 text-purple-500 text-xs font-bold">Book Appointment</a>
            </div>
            <div class="flex gap-6">
                 <a href="{{route('pets.edit', $animal->id)}}" class="flex-1 py-2.5 rounded-lg border border-gray-200 text-white bg-yellow-300 text-xs text-center font-bold">Edit Profile</a>
                  <a href="#" class="flex-1 py-2.5 rounded-lg border border-gray-200 text-white bg-red-500 text-xs text-center font-bold">Delete</a>
            </div>
          </div>
        </div>
        @endforeach
       

      </div>
     

    </div>
    </div>
   

</x-layouts.app>


