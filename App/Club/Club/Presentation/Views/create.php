<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Create Club' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
    .card {
        transition: all 0.2s ease;
    }

    .card:hover {
        box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body class="bg-slate-50">

    <div class="max-w-6xl mx-auto px-4 py-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-slate-800">Create Club</h1>
            <p class="text-sm text-slate-500">Fill in the details to register a new club</p>
        </div>

        <form action="/clubs/store" method="POST" enctype="multipart/form-data">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- LEFT SIDE -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- BASIC INFO -->
                    <div class="card bg-white p-6 rounded-xl border">
                        <h2 class="font-semibold text-slate-700 mb-4">Basic Information</h2>

                        <!-- CATEGORY -->
                        <label class="text-sm text-slate-600">Category</label>
                        <select name="categoryId" class="w-full border rounded-lg px-3 py-2 mb-4">
                            <option value="">Select Category</option>
                            <?php foreach ($categories ?? [] as $cat): ?>
                            <option value="<?= $cat['id'] ?>"
                                <?= (($_SESSION['old']['categoryId'] ?? '') == $cat['id']) ? 'selected' : '' ?>>
                                <?= $cat['name'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <!-- NAME -->
                        <label class="text-sm text-slate-600">Club Name</label>
                        <input type="text" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>"
                            class="w-full border rounded-lg px-3 py-2 mb-4">

                        <!-- SHORT NAME -->
                        <label class="text-sm text-slate-600">Short Name</label>
                        <input type="text" name="shortName" value="<?= $_SESSION['old']['shortName'] ?? '' ?>"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="card bg-white p-6 rounded-xl border">
                        <h2 class="font-semibold text-slate-700 mb-4">Description</h2>

                        <label class="text-sm text-slate-600">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full border rounded-lg px-3 py-2 mb-4"><?= $_SESSION['old']['description'] ?? '' ?></textarea>

                        <label class="text-sm text-slate-600">Mission</label>
                        <textarea name="mission" rows="2" class="w-full border rounded-lg px-3 py-2 mb-4"></textarea>

                        <label class="text-sm text-slate-600">Vision</label>
                        <textarea name="vision" rows="2" class="w-full border rounded-lg px-3 py-2"></textarea>
                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="space-y-6">

                    <!-- MEDIA -->
                    <div class="card bg-white p-6 rounded-xl border">
                        <h2 class="font-semibold text-slate-700 mb-4">Media</h2>

                        <label class="text-sm text-slate-600">Logo</label>
                        <input type="file" name="logo" class="w-full border rounded-lg px-3 py-2 mb-4">

                        <label class="text-sm text-slate-600">Banner</label>
                        <input type="file" name="banner" class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <!-- CONTACT -->
                    <div class="card bg-white p-6 rounded-xl border">
                        <h2 class="font-semibold text-slate-700 mb-4">Contact</h2>

                        <input type="email" name="email" placeholder="Email"
                            class="w-full border rounded-lg px-3 py-2 mb-3">

                        <input type="text" name="phone" placeholder="Phone" class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <!-- SETTINGS -->
                    <div class="card bg-white p-6 rounded-xl border">
                        <h2 class="font-semibold text-slate-700 mb-4">Settings</h2>

                        <label class="text-sm text-slate-600">Established Date</label>
                        <input type="date" name="establishedDate" class="w-full border rounded-lg px-3 py-2 mb-4">

                        <label class="text-sm text-slate-600">Member Limit</label>
                        <input type="number" name="memberLimit" class="w-full border rounded-lg px-3 py-2 mb-4">

                        <label class="text-sm text-slate-600">Status</label>
                        <select name="status" class="w-full border rounded-lg px-3 py-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- BUTTONS -->
                    <div class="flex gap-3">
                        <a href="/clubs" class="w-1/2 text-center bg-slate-200 py-2 rounded-lg hover:bg-slate-300">
                            Cancel
                        </a>

                        <button type="submit"
                            class="w-1/2 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                            Create Club
                        </button>
                    </div>

                </div>

            </div>

        </form>

    </div>

</body>

</html>