<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-0 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <textarea type="text" name="body" id="body"
                                    class="block min-w-0 grow py-2.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6 h-20"
                                    placeholder="Here's an idea for a note..."><?= $note['body'] ?></textarea>
                            </div>
                            <?php if (isset($errors['body'])): ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value ="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form> -->


            <div class="mt-6 flex items-center justify-end gap-x-2">
                <button type="button" class="text-red-500 mr-auto"
                    onclick="document.querySelector('#delete-form').submit()">Delete</button>

                <a href="/notes"
                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>

         <form id="delete-form" class="hidden" method="POST" action="/note">Add commentMore actions
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                </form>

    </div>
</main>


<?php require base_path('views/partials/footer.php') ?>