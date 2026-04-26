<x-layouts.app>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold text-blue-600 mb-2">
            Edit Appointment
        </h2>

        <p class="text-sm text-gray-400 mb-6">
            Update appointment information
        </p>

        @if(session('error'))
         <script>
            alert("{{session('error')}}");
         </script>
         @endif

         @if(session('success'))
            <script>
                alert("{{session('success')}}")
            </script>
         @endif   

        <form method="POST" action="{{route('update.appointment', $appointments->id)}}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Date
                </label>
                <input type="date" name="date" value="{{ old('date', \Carbon\Carbon::parse($appointments->date)->format('Y-m-d')) }}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Heure
                </label>
                <input type="time" name="heure" value="{{ old('heure', substr($appointments->heure, 0, 5)) }}"
                class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Motif
                </label>
                <textarea name="motif" rows="4" class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{old ('motif', $appointments->motif)}}</textarea>
            </div>

            <button  type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition">
                Update Appointment
            </button>

        </form>

    </div>

</div>

</x-layouts.app>