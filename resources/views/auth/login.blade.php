<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login - AnimCare</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms,container-queries"></script>
    </head>

    
    <body class="min-h-screen flex items-center justify-center bg-cover bg-center">
        <div class="absolute inset-0 bg-blue-400"></div>
  
        <div class="w-full relative z-10 max-w-md bg-white p-8 rounded-xl shadow">
                <h2 class="text-2xl font-blod text-blue-600 text-center mb-5">
                    Welcome to AnimCare
                </h2>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <input type="email" name="email" placeholder="Email" class="w-full border p-2 mb-4 rounded-lg">
                    <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-4 rounded-lg ">
                    <button name="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                        Login
                    </button>
                            <div class="text-center mt-3 text-sm">
                                Create new account 
                                <a href="{{route('register')}}" class="text-blue-500">
                                    Register
                                </a>
                            </div>
                </form>
            </div>
       
    </body>

</html>