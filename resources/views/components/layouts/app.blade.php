<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>AnimCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900 font-[Inter]">
    <div class="flex h-screen ">

            <!--Sidebar-->
            <div class="w-52 bg-blue-300 h-full flex flex-col border-r border-gray-200 p-4">

                        <div class="flex items-center gap-3 px-2 mb-6">
                            <img  src="" alt=""  class="w-12 h-12 rounded-full object-cover border-2 border-white"/>
                        <div>
                            <p class="text-base font-bold">{{Auth::user()->name}}</p>
                        </div>
                        </div>

                        @if(Auth::user()->role === "Owner")
                        <div class="flex flex-col gap-1 flex-1">

                            <a href="{{route('owner.dashboard')}}" class="flex items-center gap-3 px-3 py-3 rounded-lg text-gray-500 hover:bg-gray-100">
                            <span class="text-sm  text-white  font-bold">Dashboard</span>
                            </a>

                            <a href="{{route('pets.index')}}" class="flex items-center gap-3 px-3 py-3 rounded-lg  text-purple-500">
                            <span class="text-sm  text-white font-bold">My Pets</span>
                            </a>

                            <a href="{{route('pets.appointment')}}" class="flex items-center gap-3 px-3 py-3 rounded-lg text-gray-500 hover:bg-gray-100">
                            <span class="text-sm  text-white  font-bold">Appointments</span>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-500 hover:bg-gray-100">
                                <span class="text-sm  text-white  font-bold">Profile</span> 
                            </a>
                        </div> 
                            <div class="mt-auto">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class=" px-3 py-2 rounded-lg bg-red-200 text-red-400">
                                        Logout
                                    </button>
                                </form>                            
                            </div>
                        @elseif(Auth::user()->role === "Vet")
                         <div class="flex flex-col items-center gap-1 flex-1">

                            <a href="{{route('vet.dashboard')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-500">
                            <span class="text-sm text-white font-bold">Dashboard</span>
                            </a>

                            <a href="{{route('vet.appointment')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-500">
                            <span class="text-sm text-white font-bold">Appointments</span>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-500 ">
                                <span class="text-sm text-white font-bold">Profile</span> 
                            </a>

                        </div> 
                         <div class="mt-auto">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class=" px-3 py-2 rounded-lg bg-red-200 text-red-400">
                                        Logout
                                    </button>
                                </form>                            
                            </div>
                        @else
                         <div class="flex flex-col gap-1 flex-1">

                            <a href="{{route('admin.dashboard')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-500 hover:bg-gray-100">
                            <span class="text-sm text-white  font-bold">Dashboard</span>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-blue-50 text-purple-500">
                            <span class="text-sm  text-white  font-bold">Users List</span>
                            </a>

                             <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-blue-50 text-purple-500">
                            <span class="text-sm  text-white  font-bold">veterinary</span>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-500 hover:bg-gray-100">
                            <span class="text-sm text-white font-bold">Statistics</span>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-500 hover:bg-gray-100">
                                <span class="text-sm text-white  font-bold">Profile</span> 
                            </a>

                        </div>
                         <div class="mt-auto">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="px-1 py-2 rounded-lg bg-red-100 text-red-400">
                                        Logout
                                    </button>
                                </form>                            
                            </div>
                        @endif

                </div>
         
        <div class="flex-1 flex flex-col overflow-hidden"> 
       
                <div class="flex-1 p-6 overflow-y-auto">
                    {{ $slot }}
                </div>
         </div>
          

    </div> 
</body>
</html>
