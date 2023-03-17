<x-layout class="w-1/4">
    <div class="p-4 flex flex-col space-y-6 bg-gray-200 rounded-md">
        <div class="flex flex-col items-center jusify-center text-center space-y-1">
            <h1 class="font-semibold text-2xl">Login</h1>
            <p>Login to submit a support ticket</p>
        </div>
        <form action="/login/user" method="post" class="grid grid-flow-row gap-4 mx-auto w-2/3">
            @csrf
            <div class="flex flex-col items-start space-y-2">
                <label for="email" class="font-semibold">Email</label>
                <input type="email" name="email" id="email" class="p-2 border rounded-md w-full"
                    placeholder="Email">
            </div>
            @error('email')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
            <div class="flex flex-col items-start space-y-2">
                <label for="password" class="font-semibold">Password</label>
                <input type="password" name="password" id="password" class="p-2 border rounded-md w-full"
                    placeholder="Password">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white">Login</button>
            <span class="text-center">Don't have an account yet? <a href="/register"
                    class="font-semibold text-blue-600">Sign up</a></span>
        </form>
    </div>
</x-layout>
