@props(['user' => null])

<x-app-layout>
    {{-- task description --}}
    <x-alert>
        crud operation With file upload
    </x-alert>

    <div class="flex  flex-col justify-center items-center mt-10">

        <div class="w-[35rem] border border-gray-400 rounded-md p-10 flex flex-col gap-5">
            <p class="text-center text-xl font-bold">Add User With Post Method</p>
            <form method="POST" action="{{ route('users.store') }}" class="flex flex-col gap-5">
                @csrf
                <!-- first name -->
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- last name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <!-- email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="text" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Nnmber')" />
                    <x-text-input id="phone" type="text" name="phone" :value="old('phone')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone" :value="__('Upload Photo')" />
                    <x-text-input id="phone" type="file" name="phone" :value="old('phone')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-submit-button class="ml-3">
                        {{ __('Save') }}
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
