<x-layouts::auth.simple>
    <div class="px-4 dark:bg-gray-950 flex items-center justify-center">
        <div class="w-full max-w-md">

            <!-- Card -->
            <div
                class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm
                       dark:border-gray-800 dark:bg-gray-900 dark:shadow-none">

                <!-- Heading -->
                <div class="text-center">
                    <h1
                        class="text-2xl font-semibold tracking-tight
                               text-gray-900 dark:text-white">
                        Welcome back
                    </h1>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Sign in to continue to your account
                    </p>
                </div>


                <!-- Error Message -->
                @if (session('error'))
                    <div class="mt-6 flex items-start gap-3 rounded-xl border
                               border-red-200 bg-red-50 p-4
                               dark:border-red-900/50 dark:bg-red-950/40"
                        role="alert">
                        <!-- Error Icon -->
                        <div
                            class="flex h-6 w-6 shrink-0 items-center justify-center
                                   rounded-full bg-red-100 text-sm font-bold text-red-600
                                   dark:bg-red-900/50 dark:text-red-400">
                            !
                        </div>

                        <!-- Error Text -->
                        <div>
                            <p class="text-sm font-semibold text-red-800 dark:text-red-300">
                                Unable to sign in
                            </p>

                            <p class="mt-1 text-sm leading-5 text-red-700 dark:text-red-400">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                @endif


                <!-- Google Sign In -->
                <div class="mt-8">
                    <a href="/auth/google"
                        class="flex h-12 w-full items-center justify-center gap-3
                               rounded-lg border border-gray-300 bg-white px-4
                               text-sm font-medium text-gray-700 shadow-sm
                               transition

                               hover:bg-gray-50

                               focus:outline-none
                               focus:ring-2
                               focus:ring-indigo-500
                               focus:ring-offset-2

                               dark:border-gray-700
                               dark:bg-gray-800
                               dark:text-gray-100
                               dark:shadow-none
                               dark:hover:bg-gray-700
                               dark:focus:ring-offset-gray-900">
                        <!-- Google Logo -->
                        <svg class="h-5 w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="#4285F4"
                                d="M21.35 12.27c0-.79-.07-1.54-.2-2.27H12v4.3h5.24a4.48 4.48 0 0 1-1.94 2.94v2.45h3.14c1.84-1.69 2.91-4.18 2.91-7.42z" />

                            <path fill="#34A853"
                                d="M12 21.5c2.63 0 4.84-.87 6.45-2.35l-3.14-2.45c-.87.58-1.98.92-3.31.92-2.54 0-4.69-1.72-5.46-4.03H3.3v2.53A9.74 9.74 0 0 0 12 21.5z" />

                            <path fill="#FBBC05"
                                d="M6.54 13.59A5.85 5.85 0 0 1 6.23 12c0-.55.1-1.09.31-1.59V7.88H3.3A9.74 9.74 0 0 0 2.25 12c0 1.57.38 3.06 1.05 4.12l3.24-2.53z" />

                            <path fill="#EA4335"
                                d="M12 6.38c1.43 0 2.71.49 3.72 1.46l2.79-2.79C16.83 3.42 14.63 2.5 12 2.5a9.74 9.74 0 0 0-8.7 5.38l3.24 2.53C7.31 8.1 9.46 6.38 12 6.38z" />
                        </svg>

                        <span>Continue with Google</span>
                    </a>
                </div>


                <!-- Security note -->
                <p
                    class="mt-6 text-center text-xs leading-5
                           text-gray-400 dark:text-gray-500">
                    You'll be securely redirected to Google to sign in.
                </p>

            </div>
        </div>
    </div>
</x-layouts::auth.simple>
