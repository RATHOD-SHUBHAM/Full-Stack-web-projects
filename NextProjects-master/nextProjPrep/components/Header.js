import Head from 'next/head'
import React from 'react'
import Header from "../styles/Header.module.css"

const GlobalHeader = () => {
    return (
        <div>
            <h1 className={Header.title}>
                <span>Next.js is awesome</span>
            </h1>
            <p className={Header.description}>Lets get it going</p>
        </div>
    )
}

export default GlobalHeader
