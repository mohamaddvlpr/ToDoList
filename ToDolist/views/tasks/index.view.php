<?php

if (isset($_SESSION['user'])) {

    basePath(categoriesPath('head.php'));

    basePath(categoriesPath('nav.php'));
?>

    <div class="mx-auto max-w-7xl">
        <p class="text-right font-bold font-bold px-4 py-6 sm:px-6 lg:px-15">
            :تسک های امروز شما
        </p>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white bg-black">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black text-white">
                <tr>
                    <?php $columnTasks = (array)(new TaskController)->column(); ?>
                    <?php foreach ($columnTasks as $columnTask): ?>
                        <th scope="col" class="px-6 py-3">
                            <?= $columnTask["COLUMN_NAME"] ?>
                        </th>
                    <?php endforeach ?>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $tasks = (array)(new TaskController)->index(); ?>
                <?php foreach ($tasks as $task): ?>
                    <tr class="odd:bg-white odd:dark:bg-black even:bg-gray-50 even:dark:bg-gray-600 border-b dark:border-gray-700">

                        <td class="px-6 py-4">
                            <?= $task["name"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $task["notification"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $task["place"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $task["date"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form class="mt-6" action="" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button class="text-sm text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>

            </tbody>
        </table>
    </div>
    <a href="/create/tasks" class="text-bold hover:underline py-4 text-blue-600">
        <p>ایجاد برنامه های بیشتر</p>
    </a>

    </body>
<?php
    basePath(categoriesPath('footer.php'));
} else {
    basePath('views/403.php');
}
?>

</html>