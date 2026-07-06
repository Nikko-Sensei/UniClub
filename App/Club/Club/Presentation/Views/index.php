<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Clubs' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
    .stat-card {
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px -8px rgba(0, 0, 0, 0.08);
    }

    .table-row:hover {
        background: #f8fafc;
    }
    </style>
</head>

<body class="bg-slate-50">

    <div class="max-w-7xl mx-auto px-4 py-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Club Management</h1>
                <p class="text-sm text-slate-500">Manage all university clubs</p>
            </div>

            <a href="/clubs/create"
                class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                <i class="fa fa-plus"></i>
                Add Club
            </a>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

            <div class="stat-card bg-white p-5 rounded-xl border">
                <div class="text-slate-500 text-sm">Total Clubs</div>
                <div class="text-2xl font-bold"><?= count($clubs) ?></div>
            </div>

            <div class="stat-card bg-white p-5 rounded-xl border">
                <div class="text-slate-500 text-sm">Active Clubs</div>
                <div class="text-2xl font-bold">
                    <?= count(array_filter($clubs, fn($c) => $c['status'] === 'active')) ?>
                </div>
            </div>

            <div class="stat-card bg-white p-5 rounded-xl border">
                <div class="text-slate-500 text-sm">Inactive Clubs</div>
                <div class="text-2xl font-bold">
                    <?= count(array_filter($clubs, fn($c) => $c['status'] === 'inactive')) ?>
                </div>
            </div>

            <div class="stat-card bg-white p-5 rounded-xl border">
                <div class="text-slate-500 text-sm">Categories</div>
                <div class="text-2xl font-bold">
                    <?= count(array_unique(array_column($clubs, 'category_id'))) ?>
                </div>
            </div>

        </div>

        <!-- FILTER BAR -->
        <div class="bg-white p-4 rounded-xl border mb-6 flex flex-wrap gap-3 items-center">

            <input type="text" placeholder="Search clubs..." class="border rounded-lg px-4 py-2 w-64 text-sm">

            <select class="border rounded-lg px-3 py-2 text-sm">
                <option>All Categories</option>
            </select>

            <select class="border rounded-lg px-3 py-2 text-sm">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-xl border overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-slate-100 text-left text-slate-600">
                    <tr>
                        <th class="p-4">Club</th>
                        <th>Category</th>
                        <th>Members</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="text-right p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($clubs as $club): ?>
                    <tr class="border-t table-row">

                        <!-- CLUB -->
                        <td class="p-4 font-medium text-slate-800">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold">
                                    <?= strtoupper(substr($club['name'], 0, 2)) ?>
                                </div>
                                <?= htmlspecialchars($club['name']) ?>
                            </div>
                        </td>

                        <!-- CATEGORY -->
                        <td class="text-slate-600">
                            <?= $club['category_id'] ?>
                        </td>

                        <!-- MEMBERS -->
                        <td class="text-slate-700">
                            <?= $club['member_limit'] ?? 0 ?>
                        </td>

                        <!-- STATUS -->
                        <td>
                            <?php if ($club['status'] === 'active'): ?>
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Active
                            </span>
                            <?php else: ?>
                            <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                Inactive
                            </span>
                            <?php endif; ?>
                        </td>

                        <!-- CREATED -->
                        <td class="text-slate-600">
                            <?= $club['created_at'] ?>
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-4 text-right">
                            <a href="/clubs/edit/<?= $club['id'] ?>" class="text-indigo-600 hover:text-indigo-800 mr-3">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="/clubs/delete/<?= $club['id'] ?>" onclick="return confirm('Delete this club?')"
                                class="text-red-600 hover:text-red-800">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </div>

</body>

</html>