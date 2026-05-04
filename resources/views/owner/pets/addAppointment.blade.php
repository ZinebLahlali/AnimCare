 <x-layouts.app>
     <div class="max-w-xl mx-auto px-6 py-10">
         <div class="p-6">
             @if(session('error'))
             <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
               {{session('error')}}
             </div>
             @endif
             
             <form method="POST" action="{{route('pets.rendezvous')}}" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="animal_id" value="{{$animal->id}}">
                 <input type="date" name="date" class="w-full border rounded-lg p-2 mb-4">
                 <input type="time" name="heure" min="09:00" max="16:00" class="w-full border rounded-lg p-2 mb-4">
                   @error('heure')
                   <div class="bg-red-100 text-red-600 p-2 rounded-lg mb-2">
                    {{ $message }}
                   </div>
                 @enderror
                 <textarea type="text" name="motif" placeholder="Motif" class="w-full border rounded-lg p-2 mb-4"></textarea>
                 <label class="block mb-2 font-semibold">Appointment Type</label>

                 <select name="type" id="type" class="w-full border p-2 mb-4 rounded">
                     <option value="normal">Normal</option>
                     <option value="urgence">Urgence</option>
                 </select>
                 <div id="urgenceBox" class="hidden bg-red-100 text-red-600 p-4 rounded mb-4">
                     <p class="font-bold">Emergency</p>
                     <p>For emergencies, please call the veterinarian directly.</p>
                     <a href="tel:0612345678" class="font-bold text-blue-600">
                         06 12 34 56 78
                     </a>
                 </div>

                 <button name="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                     Save
                 </button>

             </form>
         </div>


     </div>





     <script>
         const typeSelect = document.getElementById('type');
         const urgenceBox = document.getElementById('urgenceBox');

         typeSelect.addEventListener('change', function() {
             if (this.value === 'urgence') {
                 urgenceBox.classList.remove('hidden');
             } else {
                 urgenceBox.classList.add('hidden');
             }
         });
     </script>



 </x-layouts.app>