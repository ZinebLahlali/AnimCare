<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pet</title>
   <script src="https://cdn.tailwindcss.com/?plugins=forms,container-queries"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-purple-600 mb-6">
          Add New Pet
        </h1>
        <form method="POST" action="{{route('pets.store')}}" enctype="multipart/form-data">
           @csrf
           <input type="text" name="name" placeholder="Pet Name" class="w-full border rounded-lg p-2 mb-4">
           <input type="text" name="species" placeholder="Species" class="w-full border rounded-lg p-2 mb-4">
           <input type="text" name="age" placeholder="Age" class="w-full border rounded-lg p-2 mb-4">
           <select name="gender" id="gender" class="w-full border rounded-lg p-2 mb-4">
            <option value="">Select Gender</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
           </select>
           <input type="text" name="weight" placeholder="Weight" class="w-full border rounded-lg p-2 mb-4">
           <input type="file" name="image" id="image"  class="w-full border p-2 mb-4 rounded">

           <button class="bg-purple-500 text-white px-4 py-2 rounded">
               Save Pet
           </button>





        </form>

    </div>

</body>
</html>