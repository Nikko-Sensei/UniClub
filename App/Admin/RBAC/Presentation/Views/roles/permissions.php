<div class="space-y-8">


    <!-- HEADER -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <p class="text-sm font-semibold text-blue-600">
                RBAC Management
            </p>


            <h1 class="text-2xl font-bold text-slate-800 mt-1">
                Manage Permissions
            </h1>


            <p class="text-sm text-slate-500 mt-1">
                Configure access permissions for
                <span class="font-semibold text-slate-700">
                    <?= ucfirst($role->getName()) ?>
                </span>
            </p>


        </div>



        <a href="<?= BASE_URL ?>/admin/settings/roles" class="inline-flex items-center justify-center gap-2
                  px-4 py-2.5
                  text-sm font-medium
                  text-slate-700
                  bg-white
                  border border-slate-200
                  rounded-xl
                  hover:bg-slate-50
                  transition">


            <i data-lucide="arrow-left" class="w-4 h-4"></i>


            Back to Roles


        </a>


    </div>





    <!-- PERMISSIONS CARD -->


    <div class="bg-white
                rounded-2xl
                border border-slate-200
                shadow-sm
                p-6">


        <form method="POST" action="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions">


            <!-- ROLE BADGE -->


            <div class="flex items-center gap-3 mb-6">


                <div class="p-3 bg-blue-50 rounded-xl">


                    <i data-lucide="shield-check" class="w-6 h-6 text-blue-600">
                    </i>


                </div>


                <div>


                    <p class="text-sm text-slate-500">
                        Current Role
                    </p>


                    <h2 class="text-lg font-semibold text-slate-800">

                        <?= ucfirst($role->getName()) ?>

                    </h2>


                </div>


            </div>





            <!-- PERMISSION GRID -->


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">



                <?php foreach ($permissions as $permission): ?>


                <label class="group flex items-start gap-3
                              p-4
                              rounded-xl
                              border border-slate-200
                              cursor-pointer
                              hover:border-blue-300
                              hover:bg-blue-50/50
                              transition">


                    <input type="checkbox" name="permissions[]" value="<?= $permission->getId() ?>"
                        class="mt-1 w-4 h-4 text-blue-600 rounded border-slate-300 focus:ring-blue-500" <?php if (
                                in_array(
                                    $permission->getId(),
                                    $selectedPermissions
                                )
                           ): ?> checked <?php endif; ?>>



                    <div>


                        <p class="text-sm font-semibold text-slate-700 group-hover:text-blue-700">


                            <?= ucfirst(
                                $permission->getName()
                            ) ?>


                        </p>



                        <p class="text-xs text-slate-500 mt-1">


                            <?= $permission->getDescription() ?>


                        </p>



                        <span class="inline-flex mt-2
                                     px-2 py-1
                                     text-xs
                                     font-medium
                                     rounded-lg
                                     bg-slate-100
                                     text-slate-600">


                            <?= $permission->getSlug() ?>


                        </span>


                    </div>


                </label>



                <?php endforeach; ?>


            </div>





            <!-- ACTION -->


            <div class="flex justify-end mt-8 pt-6 border-t border-slate-100">


                <button type="submit" class="inline-flex items-center gap-2
                               px-6 py-3
                               text-sm
                               font-semibold
                               text-white
                               bg-blue-600
                               hover:bg-blue-700
                               rounded-xl
                               shadow-sm
                               transition">


                    <i data-lucide="save" class="w-4 h-4"></i>


                    Save Permissions


                </button>


            </div>



        </form>


    </div>


</div>