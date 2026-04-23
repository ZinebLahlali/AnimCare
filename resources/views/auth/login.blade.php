<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login - AnimCare</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms,container-queries"></script>
    </head>

    
    <body class="min-h-screen flex items-center justify-center bg-cover bg-center"
            style="background-image: url('{{asset('')}}')">

        <div class="absolute inset-0 bg-black/50"></div>
        <!--form login -->
        <div class="w-full relative z-10 max-w-md bg-white p-8 rounded-xl shadow">
         <h2 class="text-2xl font-blod text-purple-600 text-center mb-5">
              Welcome to AnimCare
         </h2>
         <form method="POST" action="{{route('login')}}">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full border p-2 mb-4 rounded">
            <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-4 rounded ">
            <button name="submit" class="w-full bg-purple-500 text-white py-2 rounded hover:bg-purple-600">
                Login
            </button>
         </form>
        </div>
    </body>

</html>