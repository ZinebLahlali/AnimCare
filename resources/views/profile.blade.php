<x-layouts.app>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold text-blue-600 mb-2">
            Edit Profile
        </h2>

        <p class="text-sm text-gray-400 mb-6">
            Update your personal information
        </p>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Name
                </label>
                <input type="text" name="name" value="{{$user->name}}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Email
                </label>
                <input type="email" name="email" value="{{$user->email}}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    New Password
                </label>
                <input type="password" name="password"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Confirm Password
                </label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            @if($user->role === "Owner")
             <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Phone Number
                </label>
                <input type="text" name="phoneNum" value="{{$user->phoneNum}}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            @endif

            @if($user->role === "Vet")
             <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Specialite
                </label>
                <input type="text" name="specialite" value="{{$user->specialite}}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
             <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700">
                    Fix
                </label>
                <input type="text" name="fix" value="{{$user->fix}}"
                    class="w-full border border-gray-200 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            @endif

            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition">
                Update Profile
            </button>

        </form>

    </div>

</div>

</x-layouts.app>