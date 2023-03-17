<x-layout class="w-1/4">
    <div class="p-4 flex flex-col space-y-6 bg-gray-200 rounded-md">
        <div class="flex flex-col items-center jusify-center text-center space-y-1">
            <h1 class="font-semibold text-2xl">Register</h1>
            <p>Create an account to start submitting a support ticket</p>
        </div>
        <form action="/user/register" method="post" class="grid grid-flow-row gap-4 mx-auto w-2/3">
            @csrf
            <div class="flex flex-col items-start space-y-2">
                <label for="name" class="font-semibold">Full Name</label>
                <input type="text" name="name" id="name" class="p-2 border rounded-md w-full"
                    placeholder="Enter your full name">
            </div>
            <div class="flex flex-col items-start space-y-2">
                <label for="email" class="font-semibold">Email</label>
                <input type="email" name="email" id="email" class="p-2 border rounded-md w-full"
                    placeholder="Enter your email">
            </div>
            <div class="flex flex-col items-start space-y-2">
                <label for="password" class="font-semibold">Password</label>
                <input type="password" name="password" id="password" class="p-2 border rounded-md w-full"
                    placeholder="Enter your password">
            </div>
            <div class="flex flex-col items-start space-y-2">
                <label for="password_confirmation" class="font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="p-2 border rounded-md w-full" placeholder="Re-enter your password">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white">Register</button>
            <span class="text-center">Already have an account? <a href="/login" class="font-semibold text-blue-600">Login</a></span>
        </form>
    </div>
</x-layout>
