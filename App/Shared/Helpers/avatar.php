<?php

function renderAvatar(
    ?string $name,
    ?string $image = null,
    string $size = 'w-8 h-8'
): string {

    ob_start();
    ?>

<div class="<?= $size ?> rounded-full bg-blue-600 flex items-center justify-center 
                font-bold text-white overflow-hidden flex-shrink-0">

    <?php if (!empty($image)): ?>

    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($image) ?>" class="w-full h-full object-cover"
        alt="Profile">

    <?php else: ?>

    <?php
            $name = trim($name ?? 'User');
            $words = preg_split('/\s+/', $name);

            if (count($words) >= 2) {
                $initials = strtoupper(
                    substr($words[0], 0, 1) .
                    substr($words[1], 0, 1)
                );
            } else {
                $initials = strtoupper(substr($words[0], 0, 1));
            }

            echo htmlspecialchars($initials);
            ?>

    <?php endif; ?>

</div>

<?php

    return ob_get_clean();
}