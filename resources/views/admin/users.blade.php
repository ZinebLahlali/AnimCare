<x-layouts.app>

 <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">User Name</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Email</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Phone Nummber</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Animals Number</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $user)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <p class="text-sm text-gray-700">{{$user->user_name}}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{$user->email}}</td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{$user->phoneNum}}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{$user->animals_count}}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">

                                        <form action="{{ route('user.ban', $user->id) }}" method="POST">
                                            @csrf
                                           @method('PUT') 
                                             @if($user->isBanned == 0)
                                            <button class="text-red-500 text-sm">Ban</button>

                                            @else
                                            <button class="text-green-500 text-sm">Unba</button>
                                
                                            @endif
                                        </form> 

                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>






</x-layouts.app>