<header class="bg-white border-b px-6 py-4">

    <div class="flex justify-between items-center">

        <h2 class="text-xl font-semibold">
            Dashboard
        </h2>

        <div class="flex items-center gap-4">

            <span>
                {{ auth()->user()->nama }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    class="bg-red-500 text-white px-4 py-2 rounded-lg"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</header>