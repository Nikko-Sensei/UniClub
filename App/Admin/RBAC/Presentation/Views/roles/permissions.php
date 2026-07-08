<div class="p-6">


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Manage Permissions
        </h1>


        <p class="text-slate-500">
            Role:
            <?= ucfirst($role->getName()) ?>
        </p>

    </div>




    <div class="bg-white rounded-xl shadow p-6">


        <form method="POST" action="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions">



            <?php foreach ($permissions as $permission): ?>


            <div class="flex items-center gap-3 mb-4">


                <input type="checkbox" name="permissions[]" value="<?= $permission->getId() ?>" <?php if (
                            in_array(
                                $permission->getId(),
                                $selectedPermissions
                            )
                        ): ?> checked <?php endif; ?>>


                <label>

                    <?= ucfirst(
                            $permission->getName()
                        ) ?>

                </label>


            </div>



            <?php endforeach; ?>



            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg">

                Save Permissions

            </button>



        </form>


    </div>


</div>