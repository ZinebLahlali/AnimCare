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
                    <a href="#">About Our Veterinary</a>
                    <a href="{{'login'}}">Login</a>
                    <a href="{{'register'}}">Register</a>  
                </div>
            </div>
        </div>


        <div class="min-h-screen bg-blue-100 p-6">
            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow p-8">
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-bold text-blue-600">About Our Veterinarian</h1>

                    <p class="text-gray-400 mt-2">Professional pet care and veterinary support</p>
                </div>

                <div class="space-y-4 text-gray-600 leading-relaxed">

                    <p>
                      {{$vet->name}} is a professional and compassionate veterinarian with over 7 years of experience in animal healthcare.
                    </p>

                    <p>
                        She graduated from the Hassan II Agronomic and Veterinary Institute in Rabat, where she studied veterinary medicine and developed strong knowledge in animal diagnosis, treatment, and preventive care.
                    </p>

                    <p>
                        Her main specialization is general veterinary care, including pet check-ups, vaccinations, nutrition advice, and preventive medicine. She also has experience in minor surgical procedures and emergency first aid for pets.
                    </p>

                    <p>
                        Before joining our platform, Dr. {{$vet->name}} worked in a veterinary clinic in Casablanca, where she treated different types of animals, especially cats and dogs.
                    </p>

                    <p>
                        Dr. {{$vet->name}} believes that every pet deserves attention, kindness, and professional medical care.
                    </p>

                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                    <div class="bg-blue-50 p-4 rounded-xl">
                        <p class="font-bold text-blue-600">Speciality</p>
                        <p class="text-gray-600">General Veterinary Care</p>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-xl">
                        <p class="font-bold text-blue-600">Experience</p>
                        <p class="text-gray-600">7+ years</p>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-xl">
                        <p class="font-bold text-blue-600">Location</p>
                        <p class="text-gray-600">Safi, Morocco</p>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-xl">
                        <p class="font-bold text-blue-600">Email</p>
                        <p class="text-gray-600">{{$vet->email}}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>