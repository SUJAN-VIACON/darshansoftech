<div class="navbar bg-base-100 border-b">
    <div class="navbar-center flex">
        <ul class="menu menu-horizontal px-1">
            <li tabIndex={0}>
                <details>
                    <summary>Task 1</summary>
                    <ul class='p-2 top-7 border'>
                        <li><a href="{{ route('task_1.subtask_1') }}" class='whitespace-nowrap'>Sub Task 1</a></li>
                        <li><a href="{{ route('task_1.subtask_2') }}" class='whitespace-nowrap'>Sub Task 2</a></li>
                        <li><a href="{{ route('task_1.subtask_3') }}" class='whitespace-nowrap'>Sub Task 3</a></li>
                    </ul>
                </details>
            </li>
            <li><a href="{{route("task_2")}}">Task 2</a></li>
        </ul>
    </div>
</div>
