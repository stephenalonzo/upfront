<x-layout class="w-1/2">
    <div class="flex flex-col items-start space-y-6">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 w-32">
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
                            
                        </th>
                    </tr>
                </thead>

                @foreach ($tickets as $ticket)
                    <tbody class="divide-y divide-gray-200">
                        <tr class="">
                            <td class="whitespace-nowrap px-4 py-2 text-gray-900">
                                {{ $ticket->subject }}
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
                                    <span class="font-semibold text-[{{ $category->color }}]">
                                        {{ $category->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @foreach ($ticket->statuses as $status)
                                    <span class="font-semibold text-[{{ $status->color }}]">
                                        {{ $status->title }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                {{ date('m/d/Y H:i A', strtotime($ticket->created_at)) }}
                            </td>
                            <td class="whitespace-nowrap p-4">
                                <a href="/tickets/{{ $ticket->id }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">View Ticket</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div class="mt-6 p-4">
        {{ $tickets->links() }}
    </div>
</x-layout>
