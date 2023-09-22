<div class="navbar bg-base-100 border-b">
    <div class="navbar-center flex">
        <ul class="menu menu-horizontal px-1">
            <li tabIndex={0} class="active">
                <details>
                    <summary class="{{ request()->is('task_1*') ? 'bg-gray-500 text-white' : '' }}">Task 1</summary>

                    <ul class='p-2 top-7 border'>
                        <li>
                            <a href="{{ route('task1.crudWithPost.create') }}"
                                class='whitespace-nowrap {{ request()->is('task_1/crud_with_post*') ? 'active' : '' }}'>
                                Add User With Post
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('task1.crudWithAjax.create') }}"
                                class='whitespace-nowrap {{ request()->is('task_1/crud_with_ajax*') ? 'active' : '' }}'>
                                Add User With Ajax
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}"
                                class='whitespace-nowrap {{ request()->is('users*') ? 'active' : '' }}'>
                                Users Table
                            </a>
                        </li>
                    </ul>
                </details>
            </li>

            <li><a href="{{ route('task2') }}">Task 2</a></li>
        </ul>
    </div>
</div>
