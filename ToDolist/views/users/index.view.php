<?php if (isset($_SESSION['user'])): ?>

    <?php basePath(categoriesPath('head.php')) ?>

    <?php basePath(categoriesPath('nav.php')) ?>


    <div class="mx-auto max-w-7xl">
        <p class="text-right font-bold px-4 py-6 sm:px-6 lg:px-15">
            :کاربران ثبت شده

        </p>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white bg-black">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black text-white">
                <tr>
                    <?php $columns = (new UserController)->column(); ?>
                    <?php foreach ($columns as $column): ?>
                        <th scope="col" class="px-6 py-3">
                            <?= $column["COLUMN_NAME"] ?>
                        </th>
                    <?php endforeach ?>

                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $users = (new UserController)->index(); ?>
                <?php foreach ($users as $user): ?>
                    <tr class="odd:bg-white odd:dark:bg-black even:bg-gray-50 even:dark:bg-gray-600 border-b dark:border-gray-700">

                        <td class="px-6 py-4">
                            <?= $user["username"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $user["email"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $user["biography"] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/edit/user" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <!-- // When user logged in in app this two line code is working -->
                        <!-- <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 m-4 dark:text-red-500 hover:underline">Delete</a>
                    </td> -->
                    </tr>


                <?php endforeach; ?>

                </tr>


            </tbody>
        </table>

    </div>

    <a href="/create/users" class="text-bold hover:underline py-4 text-blue-600">
        <p>ایجاد حساب کاربری</p>
    </a>

    </body>


    <?php basePath(categoriesPath('footer.php')) ?>

<?php else: ?>

    <?php basePath('views/403.php') ?>

<?php endif ?>

</html>