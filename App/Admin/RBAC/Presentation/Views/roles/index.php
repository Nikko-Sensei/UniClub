<div class="space-y-6">

    <!-- Header with Save button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight flex items-center gap-2">
                <i class="fas fa-sliders-h text-blue-600 text-2xl"></i>
                System Settings
            </h1>
            <p class="text-slate-500 text-sm mt-0.5">
                Configure your university portal settings and preferences.
            </p>
        </div>
        <button
            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors flex items-center gap-2">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </div>

    <!-- Settings Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- ============================================ -->
        <!-- LEFT COLUMN: General Settings + System Features -->
        <!-- ============================================ -->
        <div class="lg:col-span-2 space-y-6">

            <!-- General Settings Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center gap-2">
                    <i class="fas fa-cog text-blue-500 text-sm"></i>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">
                        General Settings
                    </h2>
                </div>
                <div class="p-6 space-y-5">
                    <!-- University Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-university text-slate-400 mr-2 text-xs"></i> University Name
                        </label>
                        <input type="text" value="Stanford Global University"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                    </div>

                    <!-- System Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-code text-slate-400 mr-2 text-xs"></i> System Name
                        </label>
                        <input type="text" value="UniCube Portal v2.0"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                    </div>

                    <!-- System Email -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-envelope text-slate-400 mr-2 text-xs"></i> System Email
                        </label>
                        <input type="email" value="admin@stanford-global.edu"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-phone text-slate-400 mr-2 text-xs"></i> Phone Number
                        </label>
                        <input type="text" value="+1 (800) 723-2300"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-map-pin text-slate-400 mr-2 text-xs"></i> University Address
                        </label>
                        <input type="text" value="450 Serra Mall, Stanford, CA 94305, United States"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                    </div>

                    <!-- University Logo Upload -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            <i class="fas fa-image text-slate-400 mr-2 text-xs"></i> University Logo
                        </label>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center text-slate-400 bg-slate-50/50 hover:border-blue-400 transition-colors">
                                <i class="fas fa-cloud-upload-alt text-2xl"></i>
                            </div>
                            <div>
                                <button
                                    class="px-4 py-2 text-sm border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors flex items-center gap-2">
                                    <i class="fas fa-folder-open"></i> Upload Logo
                                </button>
                                <p class="text-xs text-slate-400 mt-1">PNG, JPG, SVG. Max 2MB.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Features Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center gap-2">
                    <i class="fas fa-toggle-on text-blue-500 text-sm"></i>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">
                        System Features
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <!-- Feature Toggles -->
                    <div
                        class="flex items-center justify-between py-1 hover:bg-slate-50/50 px-2 -mx-2 rounded-lg transition-colors">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Enable CaaS Registration</p>
                            <p class="text-xs text-slate-400">Allow students to register for Clubs as a Service</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-blue-600 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-2 peer-focus:ring-blue-500/30 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                            </div>
                        </label>
                    </div>

                    <div
                        class="flex items-center justify-between py-1 hover:bg-slate-50/50 px-2 -mx-2 rounded-lg transition-colors">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Enable Event Registration</p>
                            <p class="text-xs text-slate-400">Allow students to register for university events</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-blue-600 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-2 peer-focus:ring-blue-500/30 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                            </div>
                        </label>
                    </div>

                    <div
                        class="flex items-center justify-between py-1 hover:bg-slate-50/50 px-2 -mx-2 rounded-lg transition-colors">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Enable Announcements</p>
                            <p class="text-xs text-slate-400">Allow admins to publish announcements</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-blue-600 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-2 peer-focus:ring-blue-500/30 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                            </div>
                        </label>
                    </div>

                    <div
                        class="flex items-center justify-between py-1 hover:bg-slate-50/50 px-2 -mx-2 rounded-lg transition-colors">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Enable Feedback System</p>
                            <p class="text-xs text-slate-400">Allow students to submit feedback</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-2 peer-focus:ring-blue-500/30 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                            </div>
                        </label>
                    </div>

                    <div
                        class="flex items-center justify-between py-1 hover:bg-slate-50/50 px-2 -mx-2 rounded-lg transition-colors">
                        <div>
                            <p class="text-sm font-medium text-slate-700">Enable Certificate Generator</p>
                            <p class="text-xs text-slate-400">Allow generation of participation certificates</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-2 peer-focus:ring-blue-500/30 transition-all after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- RIGHT COLUMN: Security + Role & Access Control -->
        <!-- ============================================ -->
        <div class="space-y-6">

            <!-- Security Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center gap-2">
                    <i class="fas fa-lock text-blue-500 text-sm"></i>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">
                        Security
                    </h2>
                </div>
                <div class="p-6 space-y-5">
                    <!-- Current Password -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Current Password
                        </label>
                        <div class="relative">
                            <input type="password" value="password123"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                            <button type="button"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            New Password
                        </label>
                        <div class="relative">
                            <input type="password" value="newpassword123"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                            <button type="button"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <input type="password" value="newpassword123"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50 hover:bg-white" />
                            <button type="button"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <button
                        class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-key"></i> Change Password
                    </button>
                </div>
            </div>

            <!-- Role & Access Control Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                <div
                    class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center gap-2">
                    <i class="fas fa-users-cog text-blue-500 text-sm"></i>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">
                        Role &amp; Access Control
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <!-- Role Permissions -->
                    <div class="space-y-3">
                        <div class="flex items-center justify-between py-1 border-b border-slate-100 px-1">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Administrator</p>
                                <p class="text-xs text-slate-400">Full system access</p>
                            </div>
                            <span
                                class="px-2.5 py-0.5 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">Full</span>
                        </div>

                        <div class="flex items-center justify-between py-1 border-b border-slate-100 px-1">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Club Manager</p>
                                <p class="text-xs text-slate-400">Manage clubs &amp; events</p>
                            </div>
                            <span
                                class="px-2.5 py-0.5 text-xs font-medium bg-emerald-100 text-emerald-700 rounded-full">Custom</span>
                        </div>

                        <div class="flex items-center justify-between py-1 border-b border-slate-100 px-1">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Student</p>
                                <p class="text-xs text-slate-400">Basic user access</p>
                            </div>
                            <span
                                class="px-2.5 py-0.5 text-xs font-medium bg-slate-100 text-slate-600 rounded-full">Limited</span>
                        </div>

                        <div class="flex items-center justify-between py-1 px-1">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Guest</p>
                                <p class="text-xs text-slate-400">Read-only access</p>
                            </div>
                            <span
                                class="px-2.5 py-0.5 text-xs font-medium bg-slate-100 text-slate-600 rounded-full">Read</span>
                        </div>
                    </div>

                    <button
                        class="w-full px-4 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-pen-to-square"></i> Manage Roles
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Sticky Bottom Save Button -->
    <div class="flex justify-end pt-4 border-t border-slate-200/60 mt-6">
        <button
            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors flex items-center gap-2">
            <i class="fas fa-floppy-disk"></i> Save All Changes
        </button>
    </div>

</div>