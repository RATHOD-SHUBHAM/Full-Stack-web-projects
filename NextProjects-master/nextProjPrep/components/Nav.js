import React from 'react'
import Link from 'next/link'
import navStyle from "../styles/Nav.module.css"

function Nav() {
    return (
        <nav className={navStyle.nav}>
            <ul>
                <li>
                    <Link href='/'>Home</Link>
                </li>
                <li>
                    <Link href='/about'>About</Link>
                </li>
            </ul>
            
        </nav>
    )
}

export default Nav
