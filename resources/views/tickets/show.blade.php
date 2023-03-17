<x-layout>
    <div class="grid grid-cols-4 gap-6">
        <div class="p-4 flex flex-col items-start space-y-6 col-span-3">
            <div class="flex flex-col items-start space-y-2 w-full">
                <div class="flex flex-row items-center justify-between w-full">
                    <h1 class="font-semibold text-2xl">{{ $ticket->subject }}</h1>
                    <div class="flex flex-row items-center space-x-4">
                        @if ($ticket->files)
                            <a href="{{ asset('storage/' . $ticket->files) }}"
                                class="flex flex-row items-center space-x-2 p-2 bg-gray-200 text-gray-600 rounded-md" target="_blank" rel="noopener noreferrer">
                                <i class="fa-solid fa-file"></i>
                                <span class="text-sm">
                                    Attachment(s)
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
                <p>
                    {{ $ticket->description }}
                </p>
            </div>
            <hr class="border-inherit text-gray-600 w-full">
            @foreach ($ticket->responses as $response)
                {{-- {{ $response->response }} --}}
                <div class="flex flex-col items-start space-y-6 w-full">
                    <div class="flex flex-row items-center justify-between w-full">
                        <div class="flex flex-col items-start">
                            <span class="font-semibold text-lg">
                                {{ $response->users->name }}
                            </span>
                        </div>
                        <span class="text-gray-400">Responded on:
                            {{ date('m/d/Y H:i A', strtotime($response->created_at)) }}</span>
                    </div>
                    <div class="flex flex-col items-start space-y-4">
                        <span>{{ $response->response }}</span>
                    </div>
                    <hr class="border-inherit text-gray-600 w-full">
                </div>
            @endforeach
            @foreach ($ticket->statuses as $status)
                @if ($status->title != 'Closed')
                    <div class="flex flex-col items-start space-y-4 w-full">
                        <form action="/tickets/assigned/{{ $ticket->id }}/email/response" method="post"
                            class="flex flex-col items-start space-y-2 w-full">
                            @csrf
                            <textarea name="response" cols="30" rows="10" class="px-3 py-2 border rounded-md h-52 w-full resize-none"
                                placeholder="Enter response..."></textarea>
                            <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white">Send</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="flex flex-col items-start space-y-4">
            <div class="flex flex-col items-start border rounded-md w-full h-[340px]">
                <span class="font-semibold px-4 py-2 bg-gray-200 w-full">Details</span>
                <ul class="p-4 space-y-4 w-full">
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Ticket ID:</span>
                        <span>{{ $ticket->id }}</span>
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Priority:</span>
                        @foreach ($ticket->priorities as $priority)
                            <span class="font-semibold text-[{{ $priority->color }}]">
                                {{ $priority->title }}
                            </span>
                        @endforeach
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Category:</span>
                        @foreach ($ticket->categories as $category)
                            <span class="font-semibold text-[{{ $category->color }}]">
                                {{ $category->title }}
                            </span>
                        @endforeach
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Status:</span>
                        @foreach ($ticket->statuses as $status)
                            <span class="font-semibold text-[{{ $status->color }}]">
                                {{ $status->title }}
                            </span>
                        @endforeach
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Assigned to:</span>
                        <span>
                            @foreach ($ticket->agents as $agent)
                                {{ $agent->name }}
                            @endforeach
                        </span>
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">From:</span>
                        <span>{{ $ticket->name }}</span>
                    </li>
                    <li class="flex flex-row items-center justify-between">
                        <span class="font-semibold">Created on:</span>
                        <span>{{ date('m/d/Y H:i A', strtotime($ticket->created_at)) }}</span>
                    </li>
                </ul>
            </div>
            @auth
                @if (auth()->user()->id == 1 | auth()->user()->id == 2 | auth()->user()->id == 3)
                    <a href="/tickets/close/{{ $ticket->id }}" class="px-4 py-2 rounded-md bg-black text-white">
                        Close Ticket</a>
                @endif
            @endauth
        </div>
    </div>
</x-layout>
