<?php

basePath(categoriesPath('head.php'));
basePath(categoriesPath('nav.php'));

?>


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">ویرایش کردن حساب کاربری</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/user" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <div>
                <?php if (isset($errors['userName'])): ?>
                    <li class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15">
                        <?= $errors['userName'] ?>
                    </li>
                <?php endif ?>
                <label for="userName" class="block text-sm/6 font-medium text-gray-900">نام کاربری</label>
                <div class="mt-2">
                    <input id="userName" name="userName" type="text" autocomplete="userName" required value="<?= $_SESSION['user']['username'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <?php if (isset($errors['email'])): ?>
                    <li class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15">
                        <?= $errors['email'] ?>
                    </li>
                <?php endif ?>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">ایمیل</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required value="<?= $_SESSION['user']['email'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <?php if (isset($errors['password'])): ?>
                    <li class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15">
                        <?= $errors['password'] ?>
                    </li>
                <?php endif ?>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">رمز عبور</label>
                    <div class="text-sm">
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
                <?php if (isset($errors['biography'])): ?>
                    <li class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15">
                        <?= $errors['biography'] ?>
                    </li>
                <?php endif ?>
                <div class="flex items-center justify-between">
                    <label for="biography" class="block text-sm/6 font-medium text-gray-900">بیوگرافی</label>
                    <div class="text-sm">
                    </div>
                </div>
                <div class="mt-2">
                    <textarea id="biography" name="biography" type="biography" autocomplete="biography" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">ثبت نام</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            آیا از قبل حساب کاربری دارید؟
            <a href="/login" class="font-semibold text-black hover:text-indigo-500">ورود</a>
        </p>
    </div>
</div>


</body>
<?php basePath(categoriesPath('footer.php')) ?>

</html>