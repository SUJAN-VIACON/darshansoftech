<x-app-layout>
    {{-- task description --}}
    <x-alert>
        crud operation with Ajax method
    </x-alert>

    <div class="flex  flex-col justify-center items-center mt-10">

        <div id="alert-message"></div>

        <div class="w-[35rem] border border-gray-400 rounded-md p-10 flex flex-col gap-5">
            <p class="text-center text-xl font-bold">Update/Delete User With Ajax Method</p>

            <form id="user-update-form" class="flex flex-col gap-5" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- first name -->
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" type="text" name="first_name" required autofocus
                        autocomplete="username" value="{{ $user->first_name }}" />
                    <x-input-error class="mt-2" id="error_first_name" />
                </div>

                <!-- last name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" type="text" name="last_name" required autofocus
                        autocomplete="username" value="{{ $user->last_name }}" />
                    <x-input-error class="mt-2" id="error_last_name" />
                </div>

                <!-- email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="text" name="email" required autofocus
                        autocomplete="username" value="{{ $user->email }}" />
                    <x-input-error class="mt-2" id="error_email" />
                </div>

                <!-- phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Nnmber')" />
                    <x-text-input id="phone" type="text" name="phone" required autofocus
                        autocomplete="username" value="{{ $user->phone }}" />
                    <x-input-error class="mt-2" id="error_phone" />
                </div>

                <!-- file -->
                <div>
                    <x-input-label for="image" :value="__('Upload Image')" />
                    <x-file-input id="image" type="text" name="image" value="{{ $user->image }}" />
                    <x-input-error id="error_image" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-submit-button class="ml-3 w-full" id="update-button" form="user-update-form">
                        {{ __('Update') }}
                    </x-submit-button>
                </div>
            </form>

            <form method="POST" id="user-delete-form">
                @csrf
                @method('DELETE')
                <button form="user-delete-form" type="submit" id="delete-button"
                    class="btn btn-error w-full">Delete</button>
            </form>
        </div>
    </div>

    @once
        @push('bottom-stack')
            <x-ajax />

            <script type="text/javascript">
                //  update

                $("#user-update-form").submit(function(e) {
                    e.preventDefault();
                    data = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('api.users.update', $user->id) }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        beforeSend: function() {
                            $('#update-button').html('....Please wait');
                        },

                        success: function(response) {
                            var user = response.data;
                            addSuccessAlert("User data has been updated successfully");
                            resetErrors();
                        },

                        error: function(response) {
                            response = $.parseJSON(response.responseText);
                            errors = response.errors
                            $.each(errors, function(key, value) {
                                $('#error_' + key).html(value);
                            });
                        }
                    });

                    $('#update-button').html('Update');
                });

                // delete

                $("#user-delete-form").submit(function(e) {
                    e.preventDefault();
                    var data = new FormData(this);

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ route('api.users.destroy', $user->id) }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        beforeSend: function() {
                            $('#delete-button').html('....Please wait');
                        },

                        success: function(response) {
                            var is_ok = response.data;
                            window.location.href = "{{ route('users.index') }}";
                        },

                        error: function(response) {
                            response = $.parseJSON(response.responseText);
                        }
                    });
                });

                function addSuccessAlert(message) {
                    $("#alert-message").html(
                        `<div class="alert alert-success w-[35rem] mb-2 flex flex-col">
                        <p class="font-bold text-xl">${message}</p>
                       </div>`);
                }

                function resetErrors() {
                    $('#error_first_name').html('');
                    $('#error_last_name').html('');
                    $('#error_email').html('');
                    $('#error_phone').html('');
                    $('#error_image').html('');
                }
            </script>
        @endpush
    @endonce
</x-app-layout>
