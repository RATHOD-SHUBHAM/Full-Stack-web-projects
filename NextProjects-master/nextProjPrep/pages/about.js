// this is to add out head element
import Head from 'next/head'
import React from 'react'

// if  i wanted different head 
import Meta from "../components/meta"

function about() {
    return (
        <div>
            {/* head is been written in  meta */}
            {/* <Head>
                <title>About</title>
            </Head> */}
            <Meta title="Shubham Shankar About"/>
            <h1> Yo i routed to about page </h1>
        </div>
    )
}

export default about
