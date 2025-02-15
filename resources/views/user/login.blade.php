<x-layouts.enterPage :title="$title">

    <div class="flex items-center justify-center align-center" style="flex-direction: column">
        <p>Don't have a My Investors App account?</p>

        <a href="./signup"
            style="text-decoration: underline; font-weight: 700; color: rgb(0, 0, 0); cursor: pointer;">Sign Up here!</a>
    </div>
    @if ($errors->get('login'))
        <ul class="list-none p-2 text-red-500 font-semibold">
            @foreach ($errors->get('email') as $error)
                <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
            @endforeach
    @endif
    <div class="flex items-center justify-center">

        <form action="./login" method="POST" class="w-full max-w-sm">
            @csrf

            <x-input :for="'email'" :name="'email'" :id="'email'" :type="'email'" :label="'Email:'"
                :value="'email'" />
            @if ($errors->get('email'))
                <ul class="list-none p-2 text-red-500 font-semibold">
                    @foreach ($errors->get('email') as $error)
                        <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
                    @endforeach
            @endif
            <x-input :for="'password'" :name="'password'" :id="'password'" :type="'password'" :label="'Password:'"
                :value="'password'" />
            @if ($errors->get('password'))
                <ul class="list-none p-2 text-red-500 font-semibold">
                    @foreach ($errors->get('password') as $error)
                        <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
                    @endforeach
            @endif
    
            <div class="flex items-center mt-5">
                <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">Remember me.</label>
            </div>

            <div class="md:flex md:items-center pt-5">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <x-button name="crear">Sign In</x-button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.enterPage>
