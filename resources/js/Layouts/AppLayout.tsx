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

            <div className='my-5 alert'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" className="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Created With React Js and Type Script</span>
            </div>

            <main>{props.children}</main>
        </div >
    })

AppLayout.displayName = "AppLayout"

export default AppLayout