import React, { FC } from 'react'

interface AppLayoutProps {
    children: React.ReactNode
}

const AppLayout: FC<AppLayoutProps> = ({ children }) => {
    return <div className="min-h-screen">
        <div className="navbar bg-base-100 border-b">
            <div className="navbar-center flex">
                <ul className="menu menu-horizontal px-1">
                    <li tabIndex={0}>
                        <details >
                            <summary>Task 1</summary>
                            <ul className='p-2 top-7 border'>
                                <li><a className='whitespace-nowrap'>Sub Task 1</a></li>
                                <li><a className='whitespace-nowrap'>Sub Task 2</a></li>
                                <li><a className='whitespace-nowrap'>Sub Task 3</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a>Task 2</a></li>
                </ul>
            </div>
        </div>

        <main>{children}</main>
    </div>
}

export default AppLayout