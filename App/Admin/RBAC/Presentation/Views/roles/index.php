<div class="space-y-8">


    <!-- HEADER -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>

            <p class="text-sm font-semibold text-blue-600">
                RBAC Management
            </p>


            <h1 class="text-2xl font-bold text-slate-800">
                Roles & Permissions
            </h1>


            <p class="text-sm text-slate-500 mt-1">
                Manage system roles and access permissions
            </p>

        </div>


    </div>




    <!-- ROLE CARDS -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


        <?php foreach($roles as $role): ?>


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <!-- ICON -->

            <div class="flex items-center justify-between mb-5">


                <div class="p-3 bg-blue-50 rounded-xl">

                    <i data-lucide="shield-check" class="w-6 h-6 text-blue-600"></i>

                </div>


                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    bg-slate-100 text-slate-600">

                    <?= ucfirst($role->getName()) ?>

                </span>


            </div>




            <!-- ROLE INFO -->


            <h2 class="text-lg font-semibold text-slate-800">

                <?= ucfirst($role->getName()) ?>

            </h2>


            <p class="text-sm text-slate-500 mt-2">

                <?= count($role->getPermissions()) ?>
                permissions assigned

            </p>




            <!-- ACTION -->


            <div class="mt-6">


                <?php if ($permission->can('rbac.manage')): ?>


                <a href="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions" class="inline-flex items-center gap-2
                          px-4 py-2
                          text-sm font-medium
                          text-white
                          bg-blue-600
                          hover:bg-blue-700
                          rounded-lg
                          transition">


                    <i data-lucide="settings" class="w-4 h-4"></i>


                    Manage Permissions


                </a>


                <?php endif; ?>


            </div>



        </div>



        <?php endforeach; ?>



    </div>



</div>