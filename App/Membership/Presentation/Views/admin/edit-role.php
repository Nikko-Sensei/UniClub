<div class="max-w-xl">

    <div class="bg-white rounded-xl border p-6">


        <h1 class="text-xl font-bold text-slate-800 mb-6">

            Change Member Role

        </h1>


        <div class="mb-5">


            <p class="font-semibold">

                <?= htmlspecialchars(
                    $membership['name']
                ) ?>

            </p>


            <p class="text-sm text-slate-500">

                <?= htmlspecialchars(
                    $membership['email']
                ) ?>

            </p>


        </div>



        <form method="POST" action="<?= BASE_URL ?>/admin/memberships/update-role">


            <input type="hidden" name="membership_id" value="<?= $membership['id'] ?>">



            <input type="hidden" name="club_id" value="<?= $membership['club_id'] ?>">



            <label class="block text-sm font-medium mb-2">

                Assign Role

            </label>



            <select name="role_id" class="w-full border rounded-lg px-4 py-3 mb-5">


                <?php foreach($roles as $role): ?>


                <option value="<?= $role['id'] ?>" <?= $membership['club_role_id'] == $role['id']
                        ? 'selected'
                        : ''
                    ?>>


                    <?= htmlspecialchars(
                        $role['name']
                    ) ?>


                </option>


                <?php endforeach; ?>


            </select>




            <button class="px-5 py-3 bg-blue-600 text-white rounded-lg">

                Update Role

            </button>


        </form>


    </div>

</div>