<div class="space-y-6">

    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/clubs"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Clubs</span>
        </a>
    </div>
    <!-- Header -->

    <div class="
        flex
        flex-col
        md:flex-row
        md:items-center
        md:justify-between
        gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Membership Requests
            </h1>


            <p class="text-slate-500 mt-1">
                Review and manage student club membership applications.
            </p>


        </div>


    </div>





    <!-- Statistics -->

    <div class="
        grid
        grid-cols-1
        sm:grid-cols-3
        gap-4">


        <!-- Pending -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-yellow-50
                text-yellow-600
                flex
                items-center
                justify-center">

                <i data-lucide="clock-3" class="w-5 h-5"></i>

            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Pending Requests

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['pending_requests'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Waiting approval

                </p>


            </div>


        </div>






        <!-- Today -->


        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center">


                <i data-lucide="calendar-plus" class="w-5 h-5"></i>


            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Today Requests

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['today_requests'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    New applications

                </p>


            </div>


        </div>







        <!-- Approved -->


        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-green-50
                text-green-600
                flex
                items-center
                justify-center">


                <i data-lucide="users" class="w-5 h-5"></i>


            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Approved Members

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['approved_members'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Active memberships

                </p>


            </div>


        </div>


    </div>








    <!-- Membership Table -->

    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        overflow-hidden">



        <?php if (empty($memberships)): ?>


            <!-- Empty State -->


            <div class="py-16 text-center">


                <div class="
                w-14
                h-14
                mx-auto
                rounded-xl
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center">


                    <i data-lucide="users-round" class="w-7 h-7"></i>


                </div>



                <h3 class="
                mt-4
                text-lg
                font-bold
                text-slate-800">

                    No Pending Requests

                </h3>



                <p class="
                text-sm
                text-slate-500
                mt-2">

                    All membership requests have been processed.

                </p>


            </div>





        <?php else: ?>




            <!-- Desktop Table -->


            <!-- Desktop Table -->

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-slate-700">

                    <thead class="
            bg-slate-50/80
            text-xs
            font-semibold
            text-slate-500
            uppercase
            tracking-wider
            border-b
            border-slate-200">

                        <tr>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Student
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Student ID
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Club
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Department
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Year
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Status
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <?php foreach ($memberships as $membership): ?>

                            <tr class="
                hover:bg-slate-50/60
                transition-colors">

                                <!-- Student -->

                                <!-- Student -->

                                <td class="px-5 py-3.5">

                                    <div class="flex items-center gap-3">

                                        <!-- Profile Avatar -->

                                        <div class="
            w-9 h-9
            rounded-full
            overflow-hidden
            flex
            items-center
            justify-center
            bg-gradient-to-br
            from-blue-100
            to-blue-200
            text-blue-700
            font-semibold
            text-xs
            shadow-sm
            flex-shrink-0
        ">

                                            <?php if (!empty($membership['profile_image'])): ?>

                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($membership['profile_image']) ?>"
                                                    alt="<?= htmlspecialchars($membership['student_name']) ?>"
                                                    class="w-full h-full object-cover" loading="lazy">

                                            <?php else: ?>

                                                <?php
                                                $name = trim($membership['student_name'] ?? '');
                                                $words = preg_split('/\s+/', $name);

                                                if (count($words) >= 2) {
                                                    $initials = strtoupper(
                                                        substr($words[0], 0, 1) .
                                                            substr($words[1], 0, 1)
                                                    );
                                                } else {
                                                    $initials = strtoupper(
                                                        substr($words[0] ?? 'U', 0, 1)
                                                    );
                                                }
                                                ?>

                                                <?= htmlspecialchars($initials) ?>

                                            <?php endif; ?>

                                        </div>


                                        <!-- Student Information -->

                                        <div class="min-w-0">

                                            <p class="
                                            font-medium
                                            text-slate-800
                                            whitespace-nowrap
                                        ">

                                                <?= htmlspecialchars($membership['student_name']) ?>

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Student ID -->

                                <td class="px-5 py-3.5">

                                    <span class="
                        text-sm
                        font-medium
                        text-slate-600
                        whitespace-nowrap">

                                        <?= htmlspecialchars(
                                            $membership['student_id']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Club -->

                                <td class="px-5 py-3.5">

                                    <p class="
                        font-medium
                        text-slate-700
                        whitespace-nowrap">

                                        <?= htmlspecialchars(
                                            $membership['club_name']
                                        ) ?>

                                    </p>

                                </td>


                                <!-- Department -->

                                <td class="px-5 py-3.5 text-slate-600">

                                    <?= htmlspecialchars(
                                        $membership['department_name']
                                            ?? '-'
                                    ) ?>

                                </td>


                                <!-- Year -->

                                <td class="px-5 py-3.5 text-slate-600 whitespace-nowrap">

                                    <?= htmlspecialchars(
                                        $membership['academic_year']
                                            ?? '-'
                                    ) ?>

                                </td>


                                <!-- Status -->

                                <td class="px-5 py-3.5">

                                    <span class="
                        inline-flex
                        items-center
                        px-3
                        py-1
                        rounded-full
                        bg-amber-50
                        text-amber-700
                        text-xs
                        font-medium">

                                        <span class="
                            w-2
                            h-2
                            rounded-full
                            bg-amber-500
                            mr-1.5">
                                        </span>

                                        Pending

                                    </span>

                                </td>


                                <!-- Actions -->

                                <td class="px-5 py-3.5 text-right">

                                    <div class="
    flex
    justify-end
    gap-2">


                                        <!-- Approve -->

                                        <form method="POST"
                                            action="<?= BASE_URL ?>/admin/memberships/<?= (int)$membership['id'] ?>/approve"
                                            class="approve-membership-form">

                                            <button type="button" class="
                approve-membership-btn
                px-4
                py-2
                inline-flex
                items-center
                gap-2
                rounded-lg
                bg-green-600
                hover:bg-green-700
                text-white
                text-xs
                font-semibold
                transition
            " data-member-name="<?= htmlspecialchars($membership['user_name'] ?? 'this member', ENT_QUOTES, 'UTF-8') ?>">

                                                <i data-lucide="circle-check" class="w-4 h-4"></i>

                                                Approve

                                            </button>

                                        </form>





                                        <!-- Reject -->

                                        <form method="POST"
                                            action="<?= BASE_URL ?>/admin/memberships/<?= (int)$membership['id'] ?>/reject"
                                            class="reject-membership-form">

                                            <button type="button" class="
                reject-membership-btn
                px-4
                py-2
                inline-flex
                items-center
                gap-2
                rounded-lg
                border
                border-red-200
                text-red-600
                hover:bg-red-50
                text-xs
                font-semibold
                transition
            " data-member-name="<?= htmlspecialchars(
                                    $membership['user_name'] ?? 'this member',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>">

                                                <i data-lucide="circle-x" class="w-4 h-4"></i>

                                                Reject

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>





        <?php endif; ?>



    </div>


</div>

<!-- Approve Membership Modal -->
<div id="approveMembershipModal" class="fixed inset-0 z-[100] hidden">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm" onclick="closeApproveModal()"></div>

    <!-- Modal Container -->
    <div class="relative min-h-full flex items-center justify-center p-4">

        <div id="approveModalContent" class="
                w-full
                max-w-md
                bg-white
                rounded-2xl
                shadow-2xl
                overflow-hidden
                transform
                scale-95
                opacity-0
                transition-all
                duration-200
             ">

            <!-- Header -->
            <div class="px-6 pt-6">

                <div class="flex items-start gap-4">

                    <!-- Icon -->
                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-green-100
                        text-green-600
                        flex
                        items-center
                        justify-center
                        shrink-0
                    ">
                        <i data-lucide="circle-check" class="w-6 h-6"></i>
                    </div>

                    <div class="flex-1">

                        <h3 class="
                            text-lg
                            font-bold
                            text-slate-900
                        ">
                            Approve Membership?
                        </h3>

                        <p class="
                            mt-1
                            text-sm
                            text-slate-500
                            leading-6
                        ">
                            You are about to approve the membership request
                            for
                            <span id="approveMemberName" class="font-semibold text-slate-700">
                            </span>.
                        </p>

                    </div>

                    <!-- Close -->
                    <button type="button" onclick="closeApproveModal()" class="
                                w-8
                                h-8
                                rounded-lg
                                text-slate-400
                                hover:text-slate-600
                                hover:bg-slate-100
                                flex
                                items-center
                                justify-center
                                transition
                            ">

                        <i data-lucide="x" class="w-5 h-5"></i>

                    </button>

                </div>

            </div>

            <!-- Information -->
            <div class="px-6 py-5">

                <div class="
                    rounded-xl
                    border
                    border-green-200
                    bg-green-50
                    p-4
                ">

                    <div class="flex gap-3">

                        <i data-lucide="info" class="
                                w-5
                                h-5
                                text-green-600
                                shrink-0
                                mt-0.5
                           ">
                        </i>

                        <div>

                            <p class="
                                text-sm
                                font-semibold
                                text-green-800
                            ">
                                Membership will become active
                            </p>

                            <p class="
                                mt-1
                                text-xs
                                leading-5
                                text-green-700
                            ">
                                The member will be able to access the club
                                and its member-only features.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Actions -->
            <div class="
                px-6
                py-4
                bg-slate-50
                border-t
                border-slate-200
                flex
                items-center
                justify-end
                gap-3
            ">

                <button type="button" onclick="closeApproveModal()" class="
                            px-4
                            py-2.5
                            rounded-xl
                            border
                            border-slate-200
                            bg-white
                            text-slate-700
                            text-sm
                            font-semibold
                            hover:bg-slate-100
                            transition
                        ">
                    Cancel
                </button>

                <button type="button" id="confirmApproveButton" onclick="confirmApproveMembership()" class="
                            px-4
                            py-2.5
                            rounded-xl
                            bg-green-600
                            hover:bg-green-700
                            text-white
                            text-sm
                            font-semibold
                            inline-flex
                            items-center
                            gap-2
                            shadow-sm
                            transition
                        ">

                    <i data-lucide="check" class="w-4 h-4"></i>

                    Approve Membership

                </button>

            </div>

        </div>

    </div>

</div>

<!-- Reject Membership Modal -->
<div id="rejectMembershipModal" class="fixed inset-0 z-[100] hidden">

    <!-- Backdrop -->
    <div class="
        absolute
        inset-0
        bg-slate-950/60
        backdrop-blur-sm
    " onclick="closeRejectModal()"></div>


    <!-- Modal -->
    <div class="
        relative
        min-h-full
        flex
        items-center
        justify-center
        p-4
    ">

        <div id="rejectModalContent" class="
                w-full
                max-w-md
                bg-white
                rounded-2xl
                shadow-2xl
                overflow-hidden
                scale-95
                opacity-0
                transition-all
                duration-200
             ">

            <!-- Header -->
            <div class="px-6 pt-6">

                <div class="flex items-start gap-4">

                    <!-- Icon -->
                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-red-100
                        text-red-600
                        flex
                        items-center
                        justify-center
                        shrink-0
                    ">

                        <i data-lucide="circle-x" class="w-6 h-6"></i>

                    </div>


                    <!-- Text -->
                    <div class="flex-1">

                        <h3 class="
                            text-lg
                            font-bold
                            text-slate-900
                        ">
                            Reject Membership?
                        </h3>

                        <p class="
                            mt-1
                            text-sm
                            text-slate-500
                            leading-6
                        ">
                            Are you sure you want to reject the
                            membership request for

                            <span id="rejectMemberName" class="
                                    font-semibold
                                    text-slate-700
                                  ">
                            </span>?
                        </p>

                    </div>


                    <!-- Close -->
                    <button type="button" onclick="closeRejectModal()" class="
                                w-8
                                h-8
                                rounded-lg
                                text-slate-400
                                hover:text-slate-600
                                hover:bg-slate-100
                                flex
                                items-center
                                justify-center
                                transition
                            ">

                        <i data-lucide="x" class="w-5 h-5"></i>

                    </button>

                </div>

            </div>


            <!-- Warning -->
            <div class="px-6 py-5">

                <div class="
                    rounded-xl
                    border
                    border-red-200
                    bg-red-50
                    p-4
                ">

                    <div class="flex items-start gap-3">

                        <i data-lucide="triangle-alert" class="
                                w-5
                                h-5
                                text-red-600
                                shrink-0
                                mt-0.5
                           ">
                        </i>

                        <p class="
                            text-sm
                            leading-6
                            text-red-700
                        ">
                            This membership request will be marked
                            as rejected.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Footer -->
            <div class="
                px-6
                py-4
                bg-slate-50
                border-t
                border-slate-200
                flex
                items-center
                justify-end
                gap-3
            ">

                <button type="button" onclick="closeRejectModal()" class="
                            px-4
                            py-2.5
                            rounded-xl
                            border
                            border-slate-200
                            bg-white
                            text-slate-700
                            text-sm
                            font-semibold
                            hover:bg-slate-100
                            transition
                        ">

                    Cancel

                </button>


                <button type="button" id="confirmRejectButton" onclick="confirmRejectMembership()" class="
                            px-4
                            py-2.5
                            rounded-xl
                            bg-red-600
                            hover:bg-red-700
                            text-white
                            text-sm
                            font-semibold
                            inline-flex
                            items-center
                            gap-2
                            shadow-sm
                            transition
                        ">

                    <i data-lucide="circle-x" class="w-4 h-4"></i>

                    Reject Membership

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const approveButtons = document.querySelectorAll('.approve-membership-btn');

        approveButtons.forEach(function(button) {

            button.addEventListener('click', function() {

                const form = this.closest('.approve-membership-form');

                const memberName = this.dataset.memberName || 'this member';

                openApproveModal(memberName, form);

            });

        });

    });


    let approveForm = null;


    function openApproveModal(memberName, form) {

        approveForm = form;

        const modal = document.getElementById('approveMembershipModal');
        const content = document.getElementById('approveModalContent');
        const nameElement = document.getElementById('approveMemberName');

        nameElement.textContent = memberName;

        modal.classList.remove('hidden');

        requestAnimationFrame(function() {

            content.classList.remove('scale-95', 'opacity-0');

            content.classList.add(
                'scale-100',
                'opacity-100'
            );

        });

        document.body.classList.add('overflow-hidden');

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }


    function closeApproveModal() {

        const modal = document.getElementById('approveMembershipModal');
        const content = document.getElementById('approveModalContent');

        content.classList.remove(
            'scale-100',
            'opacity-100'
        );

        content.classList.add(
            'scale-95',
            'opacity-0'
        );

        setTimeout(function() {

            modal.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

            approveForm = null;

        }, 200);
    }


    function confirmApproveMembership() {

        if (!approveForm) {
            return;
        }

        const button = document.getElementById('confirmApproveButton');

        button.disabled = true;

        button.innerHTML = `
        <i data-lucide="loader-2"
           class="w-4 h-4 animate-spin"></i>
        Approving...
    `;

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        approveForm.submit();
    }


    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {
            closeApproveModal();
        }

    });
</script>
<script>
    let rejectForm = null;


    /* Open modal */
    document.addEventListener('DOMContentLoaded', function() {

        document
            .querySelectorAll('.reject-membership-btn')
            .forEach(function(button) {

                button.addEventListener('click', function() {

                    const form =
                        this.closest('.reject-membership-form');

                    const memberName =
                        this.dataset.memberName || 'this member';

                    openRejectModal(memberName, form);

                });

            });

    });


    function openRejectModal(memberName, form) {

        rejectForm = form;

        const modal =
            document.getElementById('rejectMembershipModal');

        const content =
            document.getElementById('rejectModalContent');

        const nameElement =
            document.getElementById('rejectMemberName');


        nameElement.textContent = memberName;

        modal.classList.remove('hidden');


        requestAnimationFrame(function() {

            content.classList.remove(
                'scale-95',
                'opacity-0'
            );

            content.classList.add(
                'scale-100',
                'opacity-100'
            );

        });


        document.body.classList.add('overflow-hidden');


        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

    }


    function closeRejectModal() {

        const modal =
            document.getElementById('rejectMembershipModal');

        const content =
            document.getElementById('rejectModalContent');


        content.classList.remove(
            'scale-100',
            'opacity-100'
        );

        content.classList.add(
            'scale-95',
            'opacity-0'
        );


        setTimeout(function() {

            modal.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

            rejectForm = null;

        }, 200);

    }


    function confirmRejectMembership() {

        if (!rejectForm) {
            return;
        }


        const button =
            document.getElementById('confirmRejectButton');


        // Prevent double submission
        button.disabled = true;


        button.innerHTML = `
        <i data-lucide="loader-2"
           class="w-4 h-4 animate-spin"></i>
        Rejecting...
    `;


        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }


        rejectForm.submit();

    }


    /* Escape key */
    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {
            closeRejectModal();
        }

    });
</script>