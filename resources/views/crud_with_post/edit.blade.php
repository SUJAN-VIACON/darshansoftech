@props(['user' => null])

<x-app-layout>
    {{-- task description --}}
    <x-alert>
        crud operation perform by post method
    </x-alert>

    <div class="flex  flex-col justify-center items-center mt-10">

        <div class="w-[35rem] border border-gray-400 rounded-md p-10 flex flex-col gap-5">
            <p class="text-center text-xl font-bold">Update/Delete User With Post Method</p>
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data"
                class="flex flex-col gap-5">
                @csrf
                @method('PATCH')
                <!-- first name -->
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" type="text" name="first_name" required autofocus
                        value="{{ $user->first_name }}" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- last name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" type="text" name="last_name" required autofocus
                        value="{{ $user->last_name }}" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <!-- email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="text" name="email" required autofocus
                        value="{{ $user->email }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Nnmber')" />
                    <x-text-input id="phone" type="text" name="phone" required autofocus
                        value="{{ $user->phone }}" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- file -->

                <div>
                    <x-input-label for="image" :value="__('Upload Image')" />
                    <x-file-input id="image" type="text" name="image" autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-submit-button class="ml-3 w-full">
                        {{ __('Update') }}
                    </x-submit-button>
                </div>
            </form>

            <form method="POST" action="{{ route('users.destroy', $user->id) }}" id="delete-form">
                @csrf
                @method('DELETE')
                <button form="delete-form" type="submit" class="btn btn-error w-full">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
