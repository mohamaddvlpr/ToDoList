<?php

basePath('functions.php');

basePath(categoriesPath('head.php'));

basePath(categoriesPath('nav.php'));

?>

<div class="mx-auto max-w-7xl">
    <h1 class="text-right text-red-600 font-bold px-2 py-6 sm:px-6 lg:px-10">
        خطای ۴۰۳
    </h1>
    <h1 class="text-right font-bold text-red-600 text-red px-2 py-6 sm:px-6 lg:px-15">
        برای حق دسترسی به این صفحه باید عضو شوید.
    </h1>
    <a href="/login" class="text-right font-bold text-sky-600 hover:underline">ورود</a>

</div>

</body>
<?php basePath(categoriesPath('footer.php')) ?>

</html>