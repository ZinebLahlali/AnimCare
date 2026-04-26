<x-layouts.app>

    <div class="flex-1 flex flex-col overflow-y-auto">

        <div class="p-8 flex flex-col gap-8">

            <div class="grid grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-400">Total Doctors</p>
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500">
                            <span class="material-symbols-outlined">stethoscope</span>
                        </div>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-bold">24</h3>
                        <span class="text-green-500 text-sm font-medium flex items-center mb-1">
                            <span class="material-symbols-outlined text-sm">arrow_upward</span>
                            2.4%
                        </span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-400">Treated Animals</p>
                        <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center text-purple-500">
                            <span class="material-symbols-outlined">pets</span>
                        </div>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-bold">1,284</h3>
                    </div>
                </div>

            </div>

            <div class="flex flex-col gap-4">

                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold">Manage Doctors</h3>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">add</span>
                        Add New Doctor
                    </button>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-400">Doctor Name</th>
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-400">Specialization</th>
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-400">Status</th>
                                <th class="px-6 py-4 text-xs font-semibold uppercase text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCz5TASzI_SVENhrtku0siCAg3kcX1Ttns6wx5FQrY0QFB77qejCFhF5Ym3ijjnRpwNZhZtANBqotV1lQUnfD5eGaG2WkkCHBA8j-UFBxCuyBHZI86zprfRgZyLKHT3H8EaiYm9AoME9MnrgyFhuzyA9kwHtyRODHVQGUcQYpoBxOsFgVWCb8LWef-wxIr4b_zCgWDsfW24WfOeeVr6t0X0GDoN5kv1xtYNGSqjVPqjfxhKBKXfoV7VGJFmdYu-EXw_OpegUrIWUeHs"
                                            alt="Dr. Sarah Smith"
                                            class="w-8 h-8 rounded-full object-cover" />
                                        <span class="font-medium">Dr. Sarah Smith</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">Surgeon</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-gray-400 hover:text-blue-500">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>




            <div class="grid grid-cols-2 gap-8">

                <!--Users-->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-bold">Recent Users</h3>
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

                        <div class="p-4 flex flex-col gap-2">

                            <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold">Emily Parker</p>
                                        <p class="text-xs text-gray-400">Pet: Max (Golden Retriever)</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400">2h ago</span>
                            </div>

                        </div>

                        <div class="p-4 bg-gray-50 border-t border-gray-200 text-center">
                            <button class="text-sm font-semibold text-blue-500">View All Users</button>
                        </div>

                    </div>
                </div>

            </div>


</x-layouts.app>