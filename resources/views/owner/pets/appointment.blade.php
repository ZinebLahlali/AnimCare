<x-layouts.app>
    <div class="flex-1 overflow-y-auto">

        <div class="px-8 py-6 flex flex-col gap-8">

            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-3xl font-black">Manage Appointments</h2>
                    <p class="text-sm text-gray-400 mt-1">Keep track of your pet's healthcare schedule.</p>
                </div>
                <button class="flex items-center gap-2 bg-purple-500 text-white font-bold py-3 px-6 rounded-xl">Book New Appointment</button>
            </div>


            <div>

                <div class="grid grid-cols-2 gap-6">

                    <div class="bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-4">
                        <div class="flex items-start gap-4">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpRn5nyVtziudUtwZwbGXQmzr_vmaHdhUtDZZNB5Z8izW-CB6fklABDb1E9Sm4KYCLZCphm0beJG2-Rt4lcZ2AlbeE_aSvs-0ZuiUa_wnvWBiXBG38gjHVxoF6WLR7XtgcPGC7omDsZtFBzR7piIhvxG_9lrO8_LjGOjvg7BqepClg-XGQwXe0Wq8_n-6Df9-f8dKxsU17_NnruTnQ_IXAys7uj2PVjOclglBXfgXYsB_hz9bqqwxRwAphdKWoSzDkGnsnfmdqJS5p"
                                alt="Buddy"
                                class="w-16 h-16 rounded-lg object-cover" />
                            <div class="flex-1">
                                <p class="text-xs font-bold text-green-500 uppercase mb-1">Confirmed</p>
                                <p class="text-lg font-black">Buddy • Annual Checkup</p>
                                <div class="flex items-center gap-2 text-sm text-gray-500 mt-1">
                                    <span class="material-symbols-outlined text-sm">person</span>
                                    <span>Dr. Sarah Smith</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-500 mt-1">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    <span>10:00 AM (45 min)</span>
                                </div>
                            </div>
                            <div class="bg-purple-500 text-white text-center px-3 py-2 rounded-lg min-w-12">
                                <p class="text-xs font-bold uppercase">Oct</p>
                                <p class="text-2xl font-black leading-none">24</p>
                            </div>
                        </div>
                        <div class="flex gap-3 border-t border-gray-100 pt-4">
                            <button class="flex-1 flex items-center justify-center gap-2 py-2 border border-gray-200 rounded-lg text-sm font-semibold text-gray-600 hover:bg-gray-50">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                Reschedule
                            </button>
                            <button class="flex-1 flex items-center justify-center gap-2 py-2 border border-red-200 rounded-lg text-sm font-semibold text-red-500 hover:bg-red-50">
                               
                                Cancel
                            </button>
                        </div>
                    </div>

                </div>
            </div>


            <div>
                <h3 class="text-lg font-bold flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-purple-500">history</span>
                    Past Appointments
                </h3>

                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="grid grid-cols-4 px-3 py-2 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-bold text-gray-400 uppercase">Pet</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Doctor & Service</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Date & Time</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Status</p>
                    </div>

                    <div class="grid grid-cols-4 px-3 py-2 border-b border-gray-100 items-center">

                        <div class="flex items-center gap-3">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpRn5nyVtziudUtwZwbGXQmzr_vmaHdhUtDZZNB5Z8izW-CB6fklABDb1E9Sm4KYCLZCphm0beJG2-Rt4lcZ2AlbeE_aSvs-0ZuiUa_wnvWBiXBG38gjHVxoF6WLR7XtgcPGC7omDsZtFBzR7piIhvxG_9lrO8_LjGOjvg7BqepClg-XGQwXe0Wq8_n-6Df9-f8dKxsU17_NnruTnQ_IXAys7uj2PVjOclglBXfgXYsB_hz9bqqwxRwAphdKWoSzDkGnsnfmdqJS5p"
                                alt="Buddy"
                                class="w-8 h-8 rounded-full object-cover" />
                            <span class="text-sm font-semibold">Buddy</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Grooming Session</p>
                            <p class="text-xs text-gray-400">Specialist: Anna Lee</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Sep 12, 2023</p>
                            <p class="text-xs text-gray-400">03:00 PM</p>
                        </div>
                        <div>
                            <span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full">Completed</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</x-layouts.app>