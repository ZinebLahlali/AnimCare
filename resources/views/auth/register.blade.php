<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register - AnimCare</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms,container-queries"></script>
    </head>
    <body class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-xl shadow w-80">
            <h2 class="text-xl font-bold mb-4 text-center">
                Create Account </h2>
                  @if ($errors->any())
                  <div class="text-red-500 mb-3">
                       <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach   
                       </ul>
                  </div> 
                  @endif   

                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="email" name="email" placeholder="Email" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="password" name="password" placeholder="Password" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class=" text-sm w-full border rounded-lg p-2 mb-3">
                    <input type="text" name="phone" placeholder="Phone Nummber" class="text-sm w-full border rounded-lg p-2 mb-3">
                    <button class="w-full bg-purple-500 rounded-lg text-white p-2">
                        Register
                    </button>
                    <div class="text-center mt-3 text-sm">
                          Already have an account? 
                          <a href="{{route('login')}}" class="text-purple-500">
                            Login
                          </a>
                    </div>
                </form>

            </h2>

        </div>
    </body>