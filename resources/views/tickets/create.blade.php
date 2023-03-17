<x-layout>
    <div class="flex flex-col items-start space-y-6">
        <form action="/tickets" method="POST" enctype="multipart/form-data" class="flex flex-col items-start space-y-4 w-full">
            @csrf
            <div class="grid grid-cols-2 gap-4 w-full">
                <div class="flex flex-col items-start space-y-2 col-span-2">
                    <label for="subject" class="font-semibold">Subject</label>
                    <input type="text" name="subject" id="subject" class="p-2 border rounded-md w-full"
                        placeholder="What happened?">
                    @error('subject')
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col items-start space-y-2 col-span-2">
                    <label for="description" class="font-semibold">Description</label>
                    <textarea name="description" id="description" class="p-2 border rounded-md h-52 w-full"
                        placeholder="How would you like us to help?" cols="30" rows="10"></textarea>
                    @error('description')
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col items-start space-y-2">
                    <span class="font-semibold">Categories</span>
                    <div class="flex flex-row items-center space-x-4">
                        <div class="flex flex-row items-center space-x-2">
                            <label for="categories_one">Bug</label>
                            <input type="radio" name="categories" value="1" id="categories_one">
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <label for="categories_two">Support</label>
                            <input type="radio" name="categories" value="2" id="categories_two">
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <label for="categories_three">Question</label>
                            <input type="radio" name="categories" value="3" id="categories_three">
                        </div>
                        <div class="flex flex-row items-center space-x-2">
                            <label for="categories_four">New Installation</label>
                            <input type="radio" name="categories" value="4" id="categories_four">
                        </div>
                    </div>
                    @error('categories')
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col items-start space-y-2">
                    <label for="files" class="font-semibold">Attach a file</label>
                    <input type="file" name="files" id="files" class="p-2 border rounded-md w-full">
                </div>
                <div class="flex flex-col items-start space-y-2">
                    <label for="priority" class="font-semibold">Priority</label>
                    <select name="priority" id="priority" class="p-2 border rounded-md w-full">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    @error('priority')
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col items-start space-y-2">
                    <label for="agent" class="font-semibold">Choose an agent</label>
                    <select name="agent_id" id="agent" class="p-2 border rounded-md w-full">
                        <option value="1">Steve Rogers</option>
                        <option value="2">Tony Stark</option>
                        <option value="3">Bruce Banner</option>
                    </select>
                    @error('agent')
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" name="submit" class="px-4 py-2 rounded-md bg-green-600 text-white">Submit</button>
        </form>
    </div>
</x-layout>
