<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    >

    <title>
        {{ $isPaid ? 'Payment Confirmed' : 'Payment Required' }}
    </title>

    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-950 dark:text-white">

    <main class="mx-auto flex min-h-screen w-full max-w-lg flex-col px-4 py-6">
        @if ($isPaid)

            <!-- ========================================================= -->
            <!-- PAID STATE                                                -->
            <!-- ========================================================= -->

            <section
                class="overflow-hidden rounded-3xl border border-green-200
                       bg-white shadow-xl shadow-green-100/50
                       dark:border-green-900 dark:bg-gray-900
                       dark:shadow-none"
            >

                <!-- Green Status Header -->
                <div
                    class="bg-linear-to-br from-green-500 to-emerald-600
                           px-6 py-8 text-center text-white"
                >
                    <div
                        class="mx-auto mb-4 flex h-24 w-24 items-center
                               justify-center rounded-full bg-white/20
                               ring-8 ring-white/10"
                    >
                        <span class="text-5xl">
                            ✓
                        </span>
                    </div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-green-100">
                        Subscription Status
                    </p>

                    <h2 class="mt-1 text-5xl font-black tracking-tight">
                        PAID
                    </h2>

                    <p class="mt-3 text-base font-medium text-green-50">
                        ✅ Valid for bus travel
                    </p>
                </div>


                <!-- Passenger Information -->
                <div class="px-6 py-6">

                    <div class="mb-6 text-center">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Passenger
                        </p>

                        <p class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $passengerName }}
                        </p>
                    </div>


                    <!-- Service -->
                    <div
                        class="rounded-2xl border border-gray-200 bg-gray-50 p-4
                               dark:border-gray-800 dark:bg-gray-950"
                    >
                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-12 w-12 shrink-0 items-center
                                       justify-center rounded-xl bg-indigo-100
                                       text-2xl dark:bg-indigo-950"
                            >
                                🚌
                            </div>

                            <div class="min-w-0">
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                    Subscription
                                </p>

                                <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">
                                    City Bus Monthly Pass
                                </p>
                            </div>

                        </div>
                    </div>


                    <!-- Validity -->
                    <div class="mt-4 grid grid-cols-2 gap-3">

                        <div
                            class="rounded-2xl bg-gray-50 p-4
                                   dark:bg-gray-950"
                        >
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Valid From
                            </p>

                            <p class="mt-1 font-bold text-gray-900 dark:text-white">
                                {{ $validFrom }}
                            </p>
                        </div>

                        <div
                            class="rounded-2xl bg-gray-50 p-4
                                   dark:bg-gray-950"
                        >
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Valid Until
                            </p>

                            <p class="mt-1 font-bold text-gray-900 dark:text-white">
                                {{ $validUntil }}
                            </p>
                        </div>

                    </div>


                    <!-- Payment Reference -->
                    <div class="mt-4 text-center">

                        <p class="text-xs font-medium uppercase tracking-wider text-gray-400">
                            Payment Reference
                        </p>

                        <p
                            class="mt-1 font-mono text-lg font-bold tracking-wider
                                   text-gray-800 dark:text-gray-200"
                        >
                            {{ $paymentReference }}
                        </p>

                    </div>


                    <!-- Verification message -->
                    <div
                        class="mt-6 flex items-center gap-3 rounded-2xl
                               border border-green-200 bg-green-50 p-4
                               dark:border-green-900 dark:bg-green-950/40"
                    >
                        <span class="text-2xl">
                            🟢
                        </span>

                        <div>
                            <p class="font-bold text-green-800 dark:text-green-300">
                                Payment verified
                            </p>

                            <p class="text-sm text-green-700 dark:text-green-400">
                                This passenger is authorized to use the bus service.
                            </p>
                        </div>
                    </div>

                </div>
            </section>


            <!-- Driver instruction -->
            <div class="mt-5 text-center">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    👆 Show this screen to the driver
                </p>
            </div>


        @else

            <!-- ========================================================= -->
            <!-- NOT PAID STATE                                            -->
            <!-- ========================================================= -->

            <section
                class="overflow-hidden rounded-3xl border border-red-200
                       bg-white shadow-xl shadow-red-100/50
                       dark:border-red-900 dark:bg-gray-900
                       dark:shadow-none"
            >

                <!-- Red Status Header -->
                <div
                    class="bg-gradient-to-br from-red-500 to-rose-600
                           px-6 py-8 text-center text-white"
                >
                    <div
                        class="mx-auto mb-4 flex h-24 w-24 items-center
                               justify-center rounded-full bg-white/20
                               ring-8 ring-white/10"
                    >
                        <span class="text-5xl">
                            !
                        </span>
                    </div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-red-100">
                        Subscription Status
                    </p>

                    <h2 class="mt-1 text-5xl font-black tracking-tight">
                        NOT PAID
                    </h2>

                    <p class="mt-3 text-base font-medium text-red-50">
                        ❌ Not valid for bus travel
                    </p>
                </div>


                <!-- Passenger Information -->
                <div class="px-6 py-6">

                    <div class="mb-6 text-center">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Passenger
                        </p>

                        <p class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $passengerName }}
                        </p>
                    </div>


                    <!-- Service -->
                    <div
                        class="rounded-2xl border border-gray-200 bg-gray-50 p-4
                               dark:border-gray-800 dark:bg-gray-950"
                    >
                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-12 w-12 shrink-0 items-center
                                       justify-center rounded-xl bg-gray-200
                                       text-2xl dark:bg-gray-800"
                            >
                                🚌
                            </div>

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                    Subscription
                                </p>

                                <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">
                                    {{ $serviceName }}
                                </p>
                            </div>

                        </div>
                    </div>


                    <!-- Warning -->
                    <div
                        class="mt-6 rounded-2xl border-2 border-red-200
                               bg-red-50 p-5 text-center
                               dark:border-red-900 dark:bg-red-950/40"
                    >
                        <p class="text-2xl">
                            🚫
                        </p>

                        <p class="mt-2 text-lg font-black text-red-700 dark:text-red-300">
                            PAYMENT REQUIRED
                        </p>

                        <p class="mt-1 text-sm font-medium text-red-600 dark:text-red-400">
                            This passenger does not currently have a valid
                            paid subscription.
                        </p>
                    </div>

                </div>
            </section>


            <!-- Driver instruction -->
            <div class="mt-5 text-center">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    ⚠️ Do not allow travel without a valid subscription
                </p>
            </div>

        @endif


        <!-- Footer -->
        <footer class="mt-auto pt-8 text-center">
            <p class="text-xs text-gray-400 dark:text-gray-600">
                This page is for bus service verification.
            </p>
        </footer>

    </main>

</body>
</html>
