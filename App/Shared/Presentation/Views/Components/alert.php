<?php

use App\Shared\Helpers\Flash;

if ($message = Flash::get('success')) :
?>

<div class="mb-4 rounded-lg bg-green-100 p-4 text-green-700">

    <?= htmlspecialchars($message) ?>

</div>

<?php endif; ?>