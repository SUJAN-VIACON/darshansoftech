<x-app-layout>
    {{-- task description --}}
    <x-alert>
        crud operation perform by post method
    </x-alert>

    <div class="flex  flex-col justify-center items-center mt-10">

        <div id="alert-message"></div>

        <div class="w-[35rem] border border-gray-400 rounded-md p-10 flex flex-col gap-5">
            <p class="text-center text-xl font-bold">Add User With Ajax Method</p>
            <form method="POST" id="user-form" class="flex flex-col gap-5">
                @csrf

                <!-- first name -->
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')" required autofocus
                        autocomplete="username" />
                    <x-input-error class="mt-2" id="error_first_name" />
                </div>

                <!-- last name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" required autofocus
                        autocomplete="username" />
                    <x-input-error class="mt-2" id="error_last_name" />
                </div>

                <!-- email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="text" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    <x-input-error class="mt-2" id="error_email" />
                </div>

                <!-- phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Nnmber')" />
                    <x-text-input id="phone" type="text" name="phone" :value="old('phone')" required autofocus
                        autocomplete="username" />
                    <x-input-error class="mt-2" id="error_phone" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-submit-button class="ml-3" id="submit-button">
                        {{ __('Save') }}
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>

    @once
        @push('bottom-stack')
            </x-ajax>

            <script type="text/javascript">
                $("#user-form").submit(function(e) {
                    e.preventDefault();
                    var data = $('#user-form').serialize();

                    $.ajax({
                        type: 'post',
                        url: "{{ route('api.users.store') }}",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        beforeSend: function() {
                            $('#submit-button').html('....Please wait');
                        },

                        success: function(response) {
                            var user = response.data;

                            $("#alert-message").html(
                                `<div class="alert alert-success w-[35rem] mb-2 flex flex-col">
                        <p class="font-bold text-xl">User has been added to the database</p>
                        <small>First Name: ${user.first_name}</small>
                        <small>Last Name: ${user.last_name}</small>
                        <small>Email: ${user.email}</small>
                        <small>Phone Number: ${user.phone}</small></div>`
                            )

                            resetFrom();
                        },

                        error: function(response) {
                            response = $.parseJSON(response.responseText);
                            errors = response.errors
                            $.each(errors, function(key, value) {
                                $('#error_' + key).html(value);
                            });
                        }
                    });

                    $('#submit-button').html('save');
                });

                function resetFrom() {
                    document.getElementById("user-form").reset();
                    $('#error_first_name').html('');
                    $('#error_last_name').html('');
                    $('#error_email').html('');
                    $('#error_phone').html('');
                }
            </script>
        @endpush
    @endonce
</x-app-layout>
