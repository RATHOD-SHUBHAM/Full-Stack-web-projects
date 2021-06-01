import React from 'react'
import Nav from '../components/Nav'
import GlobalHeader from '../components/Header'
import Meta from './meta'
import styles from '../styles/Home.module.css'

function Layout({children}) {
    return (
        <>  
            <Meta/>
            <Nav/>
            
            <div className={styles.container}>
                <main className={styles.main}>
                    <GlobalHeader/>
                    {children}
                </main>  
            </div>
        </>
    )
}

export default Layout
