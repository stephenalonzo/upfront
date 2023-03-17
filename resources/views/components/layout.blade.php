<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpFront</title>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main>
        <header>
            <nav class="p-4 bg-black/95 text-white">
                <div class="flex flex-row items-center justify-between">
                    <a href="/" class="font-bold text-2xl">UpFront</a>
                    @auth
                        @if (auth()->user()->id == 1 || auth()->user()->id == 2 || auth()->user()->id == 3)
                            <div class="flex flex-row items-center space-x-8">
                                <ul class="flex flex-row items-center space-x-4">
                                    <li><a href="/tickets/assigned">Assigned Tickets</a></li>
                                </ul>
                                <a href="/logout" class="px-4 py-2 rounded-md bg-blue-600 text-white">Logout</a>
                            </div>
                        @else
                            <div class="flex flex-row items-center space-x-8">
                                <ul class="flex flex-row items-center space-x-4">
                                    <li><a href="/">My Tickets</a></li>
                                </ul>
                                <div class="flex flex-row items-center space-x-4">
                                    <a href="/tickets/create" class="px-4 py-2 rounded-md bg-purple-800 text-white">Create a
                                        Ticket</a>
                                    <a href="/logout" class="px-4 py-2 rounded-md bg-blue-600 text-white">Logout</a>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </nav>
        </header>
        <section class="px-4 py-6">
            <div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
                {{ $slot }}
            </div>
        </section>
    </main>
</body>

</html>