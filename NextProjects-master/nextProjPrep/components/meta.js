import React from 'react'
import Head from 'next/head'

const meta = ({title,keywords,description}) => {
    return (
        <Head>
            <meta name='viewport' content='width=device-width, initial-scale=1' />
            <meta name='keywords' content={keywords} />
            <meta name='description' content={description} />
            <meta charSet='utf-8' />
            <link rel='icon' href='/favicon.ico' />
            <title>{title}</title>
        </Head>
    )
}

// Default props 
meta.defaultProps = {
    title: 'Shubham Shankar',
    keywords: 'web development, programming',
    description: 'Lets get going with next.js !!!',
}

export default meta
