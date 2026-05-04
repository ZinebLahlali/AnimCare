<x-layouts.app>

    <div class="grid grid-cols-3 gap-8 mb-8">

        <div class="col-span-2 flex flex-col gap-4">

            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Today's Schedule</h2>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Time</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Patient & Owner</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Date</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach($appointments as $appointment)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-semibold text-gray-700 whitespace-nowrap">{{$appointment->heure}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img src="{{asset('/storage/'. $appointment->animal_photo)}}" alt="" class="w-8 h-8 rounded-full object-cover" />
                                    <div>
                                        <p class="text-sm font-bold">{{$appointment->animal_name}}</p>
                                        <p class="text-xs text-gray-400">{{$appointment->user_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-xs text-gray-400">{{$appointment->date}}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm 
                                    @if($appointment->statut == 'confirmed')
                                    text-green-600
                                    @else
                                      text-red-600
                                    @endif
                                    
                                    ">{{$appointment->statut}}</span>
                                </div>
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Recent Requests</h2>
            </div>

           <!--Notifications-->
            <div class="flex flex-col gap-3">
                @foreach($notifications as $notification)               
                <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div>
                                <p class="text-sm font-bold">{{$notification->data['content']}}</p>
                                <p class="text-xs text-gray-400">{{$notification->created_at}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('appointments.accept') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$notification->data['rendezvous_id']}}">
                            <button type="submit" class="bg-blue-400 text-white px-2 py-1 rounded">
                                Accept
                            </button>
                        </form>
                        <form method="POST" action="{{ route('appointments.cancel') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$notification->data['rendezvous_id']}}">
                            <button type="submit" class="bg-white text-blue-400  px-2 py-1 rounded border">
                                Cancel
                            </button>
                        </form>                    
                    </div>
                </div> 
                @endforeach
            </div>
        </div>

    </div>

</x-layouts.app>