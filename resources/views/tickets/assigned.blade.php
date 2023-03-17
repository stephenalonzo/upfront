<x-layout class="w-2/3">
    <div class="flex flex-col items-start space-y-6">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Subject
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Priority
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Category
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Status
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Date
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Agent
                        </th>
                    </tr>
                </thead>

                @foreach ($tickets as $ticket)
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-900">
                                <a href="/tickets/{{ $ticket->id }}" class="font-medium underline underline-offset-4">
                                    {{ $ticket->subject }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @foreach ($ticket->priorities as $priority)
                                    <span class="font-semibold text-[{{ $priority->color }}]">
                                        {{ $priority->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @foreach ($ticket->categories as $category)
                                    <span class="text-[{{ $category->color }}]">
                                        {{ $category->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @foreach ($ticket->statuses as $status)
                                    <span class="text-[{{ $status->color }}]">
                                        {{ $status->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                {{ date('m/d/Y H:i A', strtotime($ticket->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @foreach ($ticket->agents as $agent)
                                    {{ $agent->name }}
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-layout>
