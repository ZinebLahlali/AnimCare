<x-layouts.app>

    <div class="flex-1 flex flex-col overflow-y-auto">

        <div class="p-8 flex flex-col gap-8">

            <div class="grid grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-400">Total Users</p>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-bold">{{$totalOwner}}</h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-400">Total Doctors</p>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-bold">{{$totalVet}}</h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-400">Treated Animals</p>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-bold">{{$totalAnimals}}</h3>
                    </div>
                </div>

            </div>

            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold">Manage Doctors</h3>
                    <a href="{{route('admin.singin')}}"  class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2">
                        Add New Doctor
                    </a>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Doctor Name</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Specialization</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Email</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Phone</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <p class="text-sm text-gray-700">{{$vet->name}}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{$vet->specialite}}</td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{$vet->email}}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{$vet->fix}}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">

                                        <form action="{{ route('user.ban', $vet->id) }}" method="POST">
                                            @csrf
                                           @method('PUT') 
                                             @if($vet->isBanned == 0)
                                            <button class="text-red-500 text-sm">Ban</button>

                                            @else
                                            <button class="text-green-500 text-sm">Unba</button>
                                
                                            @endif
                                        </form> 

                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>




            <div class="grid grid-cols-2 gap-8">

                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-bold">Recent Users</h3>
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                   
                                    <div>
                                        <p class="text-sm font-semibold">{{$user->name}}</p>
                                        <p class="text-xs text-gray-400">Pet:{{ $animal->name ?? 'No animal' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-4 bg-gray-50 border-t border-gray-200 text-center">
                            <a href="{{route('admin.users')}}" class="text-sm font-semibold text-blue-500">View All Users</a>
                        </div>

                    </div>
                </div>

            </div>


</x-layouts.app>