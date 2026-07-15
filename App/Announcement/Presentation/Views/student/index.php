<?php $type = $_GET['type'] ?? 'all'; ?>

<div class="space-y-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-blue-600 mb-1.5">University Updates</p>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">Announcements</h1>
            <p class="text-slate-500 mt-2">Stay updated with the latest university and club information.</p>
        </div>

        <div class="flex items-center gap-2 text-sm text-slate-500">
            <i data-lucide="bell" class="w-4 h-4 text-blue-500"></i>
            <?= count($announcements) ?> updates
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- Quick Filter -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-200 p-5 lg:sticky lg:top-20">
                <h3 class="font-bold text-slate-800 mb-4">Quick Filter</h3>
                <div class="space-y-1.5">
                    <?php
                    $filters = ['all' => 'All Updates', 'club' => 'Club Updates', 'event' => 'Event Updates', 'academic' => 'Academic'];
                    foreach ($filters as $key => $label):
                    ?>
                    <a href="?type=<?= $key ?>"
                        class="block w-full text-left px-4 py-2.5 rounded-xl text-sm transition <?= $type === $key ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-slate-600 hover:bg-slate-50' ?>">
                        <?= $label ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Announcement Feed -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

                <?php if (empty($announcements)): ?>
                <div class="py-16 text-center">
                    <i data-lucide="bell-off" class="w-10 h-10 mx-auto text-blue-400"></i>
                    <h3 class="mt-4 font-bold text-slate-800">No announcements</h3>
                    <p class="text-sm text-slate-500 mt-1.5">New updates will appear here.</p>
                </div>

                <?php else: foreach ($announcements as $announcement):
                    $priority = $announcement->getPriority();
                    $priorityClass = match($priority) {
                        'high'   => 'bg-red-50 text-red-600',
                        'medium' => 'bg-amber-50 text-amber-600',
                        default  => 'bg-blue-50 text-blue-600',
                    };
                ?>
                <a href="<?= BASE_URL ?>/announcements/<?= $announcement->getId() ?>"
                    class="flex gap-4 p-5 border-b last:border-b-0 border-slate-100 hover:bg-slate-50 transition">

                    <div class="w-14 h-14 rounded-xl bg-blue-50 flex flex-col items-center justify-center shrink-0">
                        <span
                            class="text-lg font-bold text-blue-600 leading-none"><?= date('d', strtotime($announcement->getCreatedAt())) ?></span>
                        <span
                            class="text-[10px] text-slate-500 mt-0.5"><?= date('M', strtotime($announcement->getCreatedAt())) ?></span>
                    </div>

                    <div class="flex-1 min-w-0">
                        <span
                            class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mb-1.5 <?= $priorityClass ?>">
                            <?= ucfirst($priority) ?>
                        </span>
                        <h3 class="font-bold text-slate-800 hover:text-blue-600 line-clamp-1">
                            <?= htmlspecialchars($announcement->getTitle()) ?></h3>
                        <p class="mt-1 text-sm text-slate-500 line-clamp-2">
                            <?= htmlspecialchars($announcement->getContent()) ?></p>
                    </div>

                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 self-center flex-shrink-0"></i>
                </a>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>