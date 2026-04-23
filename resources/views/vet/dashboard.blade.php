
<x-layouts.app>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        Welcome Dr. {{ Auth::user()->name }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div>
            <h2 class="text-lg font-bold mb-3 text-blue-600">Today</h2>

            @forelse($todayAppointments as $appointment)
            <div class="bg-white p-4 rounded-xl shadow-sm mb-2 border-l-4 border-blue-500">
                <p class="font-bold text-gray-700">{{ $appointment->heure }}</p>
                <p class="text-sm text-gray-400">{{ $appointment->date }}</p>
            </div>
            @empty
            <p class="text-gray-400 text-sm">No appointments today</p>
            @endforelse
        </div>

        <div>
            <h2 class="text-lg font-bold mb-3 text-blue-600">This Week</h2>

            @forelse($weekAppointments as $appointment)
            <div class="bg-white p-4 rounded-xl shadow-sm mb-2 border-l-4 border-blue-500">
                <p class="font-bold text-gray-700">{{ $appointment->heure }}</p>
                <p class="text-sm text-gray-400">{{ $appointment->date }}</p>
            </div>
            @empty
            <p class="text-gray-400 text-sm">No appointments this week</p>
            @endforelse
        </div>

        <div>
            <h2 class="text-lg font-bold mb-3 text-blue-600">This Month</h2>

            @forelse($monthAppointments as $appointment)
            <div class="bg-white p-4 rounded-xl shadow-sm mb-2 border-l-4 border-blue-500">
                <p class="font-bold text-gray-700">{{ $appointment->heure }}</p>
                <p class="text-sm text-gray-400">{{ $appointment->date }}</p>
            </div>
            @empty
            <p class="text-gray-400 text-sm">No appointments this month</p>
            @endforelse
        </div>

    </div>

  
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">

        <div class="bg-blue-400 p-4 rounded-xl text-white text-center shadow">
            <p class="text-sm">Confirmed</p>
            <p class="text-2xl font-bold">{{ $enCours }}</p>
        </div>

        <div class="bg-blue-500 p-4 rounded-xl text-white text-center shadow">
            <p class="text-sm">Completed</p>
            <p class="text-2xl font-bold">{{ $termine }}</p>
        </div>

        <div class="bg-blue-300 p-4 rounded-xl text-white text-center shadow">
            <p class="text-sm">Pending</p>
            <p class="text-2xl font-bold">{{ $enAttente }}</p>
        </div>

    </div>

</div>

</x-layouts.app>