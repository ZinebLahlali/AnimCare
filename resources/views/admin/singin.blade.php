<x-layouts.app>
 <div class="w-full relative z-50 max-w-md bg-white p-8 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4 text-blue-600 text-center">
                Create Account </h2>
                  @if($errors->any())
                  <div class="text-red-500 mb-3">
                       <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach   
                       </ul>
                  </div> 
                  @endif   

                <form method="POST" action="{{ route('admin.singin') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="email" name="email" placeholder="Email" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="password" name="password" placeholder="Password" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class=" text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="text" name="specialite" placeholder="Specialite" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="text" name="fix" placeholder="Fix" class="text-sm w-full border rounded-lg p-2 mb-3">

                    <button class="w-full bg-blue-500 rounded-lg text-white p-2">
                        Register
                    </button>
                </form>

            </h2>

        </div>







</x-layouts.app>