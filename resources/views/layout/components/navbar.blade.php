<nav class="bg-white dark:bg-gray-900 w-full  border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">

            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ Auth::user()->name ?? 'Guest' }}</span>
        </a>
        <div class="flex md:order-2 space-x-6 md:space-x-0 rtl:space-x-reverse">
            @if (Auth::user())
                <button type="button"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Logout</button>
            @endif

        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 {{ url()->current() == '/' ? 'text-white bg-blue-700' : 'text-gray-900 hover:bg-gray-100' }}  rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">User Management</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3  rounded  md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Attendance</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
