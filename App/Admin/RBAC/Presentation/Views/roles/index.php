<!-- ==================== PAGE CONTENT ==================== -->
<div class="p-6 lg:p-8 max-w-6xl mx-auto">


    <!-- Page title -->
    <div class="mb-6 flex items-center justify-between flex-wrap gap-3">

        <div>
            <h2 class="text-xl font-bold text-[#1a2634] tracking-tight">
                Roles & Permissions
            </h2>

            <p class="text-sm text-[#7a8a9e]">
                Manage user access control and system permissions.
            </p>
        </div>


        <div
            class="flex items-center gap-2 text-xs text-[#7a8a9e] bg-white px-3 py-1.5 rounded-full border border-[#eef2f7]">

            <i class="fas fa-shield-alt text-[#1a2634]"></i>

            <span>
                Role Based Access Control
            </span>

        </div>

    </div>



    <!-- ==================== ROLES TABLE ==================== -->

    <div class="bg-white rounded-2xl border border-[#eef2f7] shadow-sm overflow-hidden">


        <!-- Card Header -->

        <div class="px-6 py-4 border-b border-[#eef2f7] flex items-center gap-3">


            <div class="w-9 h-9 rounded-xl bg-[#f1f5ff] flex items-center justify-center">

                <i class="fas fa-users-cog text-[#2563eb] text-sm"></i>

            </div>


            <div>

                <h3 class="text-sm font-semibold text-[#1a2634]">
                    System Roles
                </h3>


                <p class="text-xs text-[#7a8a9e]">
                    Configure permissions for each role
                </p>

            </div>


        </div>




        <!-- Table -->

        <div class="overflow-x-auto">


            <table class="w-full">


                <thead class="bg-[#fafcff] border-b border-[#eef2f7]">


                    <tr>


                        <th class="px-6 py-3 text-left text-xs font-semibold text-[#7a8a9e] uppercase">
                            Role
                        </th>



                        <th class="px-6 py-3 text-left text-xs font-semibold text-[#7a8a9e] uppercase">
                            Permissions
                        </th>



                        <th class="px-6 py-3 text-center text-xs font-semibold text-[#7a8a9e] uppercase">
                            Action
                        </th>


                    </tr>


                </thead>



                <tbody>


                    <?php foreach($roles as $role): ?>


                    <tr class="border-b border-[#eef2f7] hover:bg-[#fafcff] transition">


                        <!-- Role -->

                        <td class="px-6 py-4">


                            <div class="flex items-center gap-3">


                                <div class="w-9 h-9 rounded-full bg-[#eff6ff] flex items-center justify-center">

                                    <i class="fas fa-user-shield text-[#2563eb] text-sm"></i>

                                </div>



                                <div>

                                    <p class="text-sm font-semibold text-[#1a2634]">

                                        <?= ucfirst(
                                            $role->getName()
                                        ) ?>

                                    </p>


                                    <p class="text-xs text-[#7a8a9e]">

                                        Role ID:
                                        <?= $role->getId() ?>

                                    </p>


                                </div>


                            </div>


                        </td>





                        <!-- Permission Count -->

                        <td class="px-6 py-4">


                            <span
                                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#f1f5ff] text-[#2563eb] text-xs font-medium">


                                <i class="fas fa-key text-xs"></i>


                                <?= count(
                                    $role->getPermissions()
                                ) ?>

                                Permissions


                            </span>


                        </td>





                        <!-- Action -->

                        <td class="px-6 py-4 text-center">


                            <a href="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-xs font-medium transition">


                                <i class="fas fa-edit"></i>


                                Manage


                            </a>


                        </td>



                    </tr>


                    <?php endforeach; ?>


                </tbody>


            </table>


        </div>


    </div>


</div>