<nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="#">
            {{-- Dashboard --}}
        </a>

        {{-- If you use user icon and menu add margin mr-3 to search --}}
        {{-- <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"> --}}
        <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto">

        </form>



        @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
            <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                <livewire:language-switcher />
            </ul>
        @endif

        {{-- User icon and menu --}}
        {{--
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="https://demos.creative-tim.com/notus-js/assets/img/team-1-800x800.jpg" /></span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="user-dropdown">
                <a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another action</a><a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something else here</a>
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a href="#pablo" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated link</a>
            </div>
        </ul>
         --}}
    </div>
</nav>