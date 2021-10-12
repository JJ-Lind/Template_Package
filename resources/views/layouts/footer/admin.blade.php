<footer class="float-right flex items-center mt-4 px-4 py-2 bg-transparent">
    <div class="flex flex-nowrap items-center justify-between w-full px-6 mx-auto">
        <div class="inline-flex items-center space-x-6">
            <x-footer.link href="#" link="{{ __('About Us') }}"/>
            <x-footer.link href="#" link="{{ __('About Them') }}"/>
        </div>
        <div class="inline-flex items-center justify-end">
            <span>{{ '© ' .  date('Y') . ', ' . __('Created by') }}</span>
            <a class="pl-1.5 text-red-800 hover:text-red-600 hover:underline transition ease-in-out duration-300" href="https://github.com/JJ-Lind">Jordan Lind</a>
        </div>
    </div>
</footer>
