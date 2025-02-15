<x-layouts.enterPage :title="$title">

<div class="flex items-center justify-center align-center" style="flex-direction: column">
    <p>Already have a My Investors App Account? Great!</p>
    
    <a href="./login" style="text-decoration: underline; font-weight: 700; color: rgb(0, 0, 0); cursor: pointer;">Sign In here.</a>
</div>

<div class="flex items-center justify-center">
    
    <form action="./signup" method="POST" class="w-full max-w-sm">
        @csrf

        <x-input :for="'name'" :name="'name'" :id="'name'" :type="'text'" :label="'Username:'"
            :value="'name'" />
        @if ($errors->get('username'))
            <ul class="list-none p-2 text-red-500 font-semibold">
                @foreach ($errors->get('date') as $error)
                    <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
                @endforeach
        @endif
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
        
        <div class="md:flex md:items-center pt-5">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <x-button name="crear">Sign Up</x-button>
            </div>
        </div>
    </form>

</div>
</x-layouts.enterPage>
