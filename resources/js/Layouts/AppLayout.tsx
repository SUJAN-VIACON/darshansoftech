import React from 'react'
import { cn } from '@/lib/utils'

const AppLayout = React.forwardRef<HTMLDivElement, React.HTMLAttributes<HTMLDivElement>>(
    ({ className, ...props }, ref) => {

        return <div className={cn("min-h-screen", className)} {...props} ref={ref}>
            <div className="navbar bg-base-100 border-b">
                <div className="navbar-center flex">
                    <ul className="menu menu-horizontal px-1">
                        <li tabIndex={0}>
                            <details>
                                <summary>Task 1</summary>
                                <ul className='p-2 top-7 border'>
                                    <li>
                                        <a href={route('task1.crudWithPost.create')} className='whitespace-nowrap'>
                                            Add User With Post
                                        </a>
                                    </li>
                                    <li>
                                        <a href={route('task1.crudWithAjax.create')} className='whitespace-nowrap'>
                                            Add User With Ajax
                                        </a>
                                    </li>
                                    <li>
                                        <a href={route('users.index')} className='whitespace-nowrap'>
                                            Users Table
                                        </a>
                                    </li>
                                </ul>
                            </details>
                        </li>

                        <li>
                            <a href={route('task2')} className={`${route().current('task2') && "bg-gray-500 text-white"}`}>Task 2</a>
                        </li>
                    </ul>
                </div>
            </div>

            <main>{props.children}</main>
        </div >
    })

AppLayout.displayName = "AppLayout"

export default AppLayout