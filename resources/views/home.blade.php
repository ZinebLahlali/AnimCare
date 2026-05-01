<!DOCTYPE html>
<html lang="fr">
  <head> 
    <meta charset="UTF-8">
    <title>AnimCare</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms,container-queries"></script>
  </head>
<body class="bg-white">
 <div class="w-full bg-blue-600 text-white text-sm">
  <div class="w-full bg-white">
            <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-blue-700">AnimCare</h1>
                    <p class="text-sm text-blue-500">animal hospital</p>
                </div>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-blue-600">
                        <a href="{{'home'}}">Home</a>
                        <a href="{{'about'}}">About Our Veterinary</a>
                        <a href="{{'login'}}">Login</a>
                        <a href="{{'register'}}">Register</a>
                       
                </div>
            </div>

        </div>
        <section class="w-full bg-blue-50 mb-8">
            <div class="max-w-7xl  px-6 py-16 grid md:grid-cols-2 items-center gap-10">
                <div>
                   <h2 class="text-5xl font-bold text-black">Gentle care,
                    <span class="text-blue-600">advanced treatment.</span></h2>

                    <p class="mt-6 text-gray-700 text-lg">AnimCare offers professional veterinary services focused on keeping your pets healthy,
                        safe, and happy every day.</p>
                </div>
                <div class="flex justify-center ">
                      <img src="{{asset('images/anim.png')}}" alt="" class="max-h-[500px] object-contain  mb-8 -mt-16">
                </div>
            </div>
        </section>

        <div class="p-10 text-center">
            <h2 class="text-2xl font-blod mb-6">About Our Clinik</h2>
            <div class="flex justify-center gap-6">
                <div class="w-64">
                     <img src="{{asset('images/cabinet.jpeg')}}" alt="" class="w-full h-40 object-cover rounded mb-3">
                     <p class="text-gary-700">
                        A clean and welcoming clinic environment designed for pet comfort and care.
                     </p>
                </div>
                 <div class="w-64">
                     <img src="{{asset('images/clinique.jpg')}}" alt="" class="w-full h-40 object-cover rounded mb-3">
                     <p class="text-gary-700">
                         Our veterinary clinic offers a professional and accessible space for pet owners and their animals.
                     </p>
                </div>
                 <div class="w-64">
                     <img src="{{asset('images/dogy.jpg')}}" alt="" class="w-full h-40 object-cover rounded mb-3">
                     <p class="text-gary-700">
                        Our veterinarian provides attentive care and professional treatment for every pet.
                     </p>
                </div>



            </div>

        </div>

        <footer class="bg-gray-900 text-white mt-10 p-6">
            <h2 class="text-xl font-bold mb-2">AnimCare</h2>
            <p class="text-gray-400 mb-4">
                   AnimCare is a platform that helps pet owners manage their animals and consult veterinarians online.
            </p>
            <p class="text-gray-400">Email: contact@animcare.com</p>
            <p class="text-gray-400">Phone: +212 524-505689</p>
            
            <div class="border-t border-gray-700 mt-4 pt-4 text-center text-gray-500">
                 © 2026 AnimCare. All rights reserved.
            </div>

        </footer>
           
      
 </div>



</body>
</html>