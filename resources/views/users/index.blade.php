<x-app-layout>



    <h1 class="mb-3 font-bold">
        All USERS
    </h1>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Nuber</th>
                    <th>Action With Post</th>
                    <th>Action With Ajax</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            @if ($user->image)
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('images') }}/{{ $user->image }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class=" w-10 h-10 rounded-full bg-slate-500 flex items-center justify-center">
                                    <small>N/A</small>
                                </div>
                            @endif

                        </td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->phone }}
                        </td>
                        <td>
                            <a href="{{ route('task1.crudWithPost.edit', $user->id) }}" class="btn btn-primary">
                                Update/Delete
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('task1.crudWithAjax.edit', $user->id) }}" class="btn btn-primary">
                                Update/Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <x-alert> No User Data Found</x-alert>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
