<?php

basePath(categoriesPath('head.php'));
basePath(categoriesPath('nav.php'));

?>

<div class="mx-auto max-w-7xl">
    <p class="text-right font-bold font-bold px-4 py-6 sm:px-6 lg:px-15">
        : برنامه ریزی
    </p>
</div>

<form action="/create/tasks" method="POST">
    <div class="space-y-12 ml-2">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">ثبت برنامه های روزانه</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm/6 font-medium font-bold text-gray-900">چه کاری باید انجام دهید؟</label>
                    <?php if (isset($errors['name'])): ?>
                        <p class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15"><?= $errors['name'] ?></p>
                    <?php endif ?>
                    <div class="mt-2">
                        <div class="flex rounded-md m-4 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="برای مثال:درس خواندن">
                        </div>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="notification" class="block text-sm/6 font-medium font-bold text-gray-900">اعلان</label>
                    <?php if (isset($errors['notification'])): ?>
                        <li class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15"><?= $errors['notification'] ?></li>
                    <?php endif ?>
                    <div class="mt-2 m-4">
                        <textarea id="notification" name="notification" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-gray-600">نوشتن اعلان لحظه فرا رسیدن انجام دادن برنامه ها</p>
                </div>


                <div class="sm:col-span-4">
                    <label for="place" class="block text-sm/6 font-medium font-bold text-gray-900">در چه مکانی؟</label>
                    <?php if (isset($errors['place'])): ?>
                        <p class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15"><?= $errors['place'] ?></p>
                    <?php endif ?>
                    <div class="mt-2 m-4">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="place" id="place" autocomplete="place" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="برای مثال:کتابخانه">
                        </div>
                    </div>
                </div>


                <div class="sm:col-span-4">
                    <label for="username" class="block text-sm/6 font-medium font-bold text-gray-900">در چه تاریخی؟</label>
                    <?php if (isset($errors['date'])): ?>
                        <p class="text-right font-bold text-red-600 px-4 py-6 sm:px-6 lg:px-15"><?= $errors['date'] ?></p>
                    <?php endif ?>
                    <div class="mt-2 m-4">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="time" name="timestamp" id="timestamp" autocomplete="timestamp" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6">
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">لغو</button>
            <button type="submit" class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ثبت</button>
        </div>
</form>
</body>

<?php basePath(categoriesPath('footer.php')) ?>



</html>