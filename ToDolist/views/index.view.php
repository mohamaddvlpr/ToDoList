<?php basePath(categoriesPath('head.php')) ?>

<?php basePath(categoriesPath('nav.php')) ?>



<header>
    <div class="mx-auto max-w-7xl">
        <p class="text-right font-bold px-4 py-6 sm:px-6 lg:px-15">
            <!-- سلام به<?= isset($_SESSION['users']) ? $_SESSION['users']['username'] : 'Guest' ?> صفحه اصلی خوش آمدید -->
            Hello <?= $_SESSION['user']['username'] ?? 'Guest' ?> , Welcome To Main Page
        </p>
    </div>
</header>

<div class="mx-auto max-w-7xl">
    <p class="text-right px-4 py-6 sm:px-2 lg:px-15">
        <a href="/users" class="text-right text-blue-600 px-4 py-6 sm:px-0 lg:px-3 hover:underline">دیدن اطلاعات کاربر فعلی</a>
    </p>
    <p class="text-right px-2 py-2 sm:px-2 lg:px-15">
        <a href="/create/tasks" class="text-right text-blue-600 px-4 py-6 sm:px-0 lg:px-3 hover:underline">برنامه ریزی</a>
    </p>
</div>




</body>

<?php basePath(categoriesPath('footer.php')) ?>



</html>