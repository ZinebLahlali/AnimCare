<x-layouts.app>

    <div class="p-8 flex flex-col gap-8 max-w-6xl mx-auto overflow-auto">

        <div class="flex items-end justify-between">
            <div>
                <h2 class="text-2xl font-bold">Hello, {{Auth::user()->name}}</h2>
                <p class="text-gray-500">Here's what's happening with your pets today.</p>
            </div>
            <!-- <button class="bg-purple-500 text-white px-4 py-2 rounded-lg flex items-center gap-2 font-medium">
                        <span>Book New Appointment</span>
                    </button> -->
        </div>


        <!--My Pets-->
        <h3 class="text-lg font-semibold">My Pets</h3>
        <div class="grid grid-cols-3 gap-6">
            @foreach($animals as $animal)
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex gap-4">
                    <img src="{{asset('storage/' . $animal->photo) }}" alt="{{$animal->name}}"
                        class="w-20 h-20 rounded-lg object-cover" />
                    <div class="flex-1">
                        <div class="flex flex-col justify-between">
                            <h4 class="font-bold text-lg">{{$animal->name}}</h4>
                            <span class="text-xs bg-blue-100 text-blue-500 px-2 py-1 rounded-full">Species: {{$animal->species}}</span>
                        </div>
                        <p class="text-sm text-gray-500">Age: {{$animal->age}}. Years old</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100 flex gap-2">
                    <button class="flex-1 py-1.5 text-sm font-medium border border-blue-200 text-blue-500 rounded-lg">View Health</button>
                </div>
            </div>
            @endforeach

            <button class="border-2 border-dashed border-blue-200 rounded-xl flex flex-col items-center justify-center p-6 text-blue-500 hover:bg-blue-50 gap-2">
                <a href="{{route('pets.create')}}" class="font-semibold">Add New Pet</a>
            </button>

        </div>



        <div class="grid grid-cols-3 gap-8">
            <div class="col-span-2 flex flex-col gap-6">
                <div>
                    <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-blue-500">event_upcoming</span>
                        Upcoming Appointments
                    </h3>

                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

                        <!--Appointment-->
                        <div class="p-4 flex items-center gap-4 border-b border-gray-100">
                            @foreach($rendezvouses as $rendezvous)
                            <div class="bg-blue-100 text-blue-500 px-3 py-2 rounded-lg text-center w-16">
                                <p class="text-xs font-bold uppercase">{{$rendezvous->date}}</p>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold">{{$rendezvous->motif}}</p>
                                <p class="text-sm text-gray-500">{{$rendezvous->heure}} Dr. {{$vet->name}}</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="px-3 py-1.5 text-xs font-semibold text-gray-600 hover:bg-gray-100 rounded-lg">Reschedule</button>
                                <button class="px-3 py-1.5 text-xs font-semibold text-red-500 hover:bg-red-50 rounded-lg">Cancel</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-layouts.app>