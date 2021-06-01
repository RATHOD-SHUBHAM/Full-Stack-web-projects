import React from 'react'
import {useRouter} from "next/router"
import Link from 'next/link'
import ArticleStyles from "../../../styles/Article.module.css"
import Meta from '../../../components/meta'

const articlepage = ({article}) => {
    // const router = useRouter()
    // const {id} = router.query
    // or fetch data using next js 
    return (
    <div className={ArticleStyles.grid}>
        <Meta title = {article.title}/>
        <h1>{article.title}</h1>
        <p> {article.body}</p>
        <br/>
        {/* link to go back to home page */}
        <bold><h3 className={ArticleStyles.h3}><Link href='/'>Go to home</Link></h3></bold>
    </div>
    )
}

//todo:  we can also use serverside props or combination of getstaticpath and get staticprop to dynamically generate the path with the data  

// using getServerSideProp
// export const getServerSideProps = async (context) => {
//     const res = await fetch(`https://jsonplaceholder.typicode.com/posts/${context.params.id}`)
    
//     const article = await res.json()
    
//     return {
//         props: {
//             article,
//         },
//     }
// }

export const getStaticProps = async (context) => {
    // fetching the specific article
    const res = await fetch(`https://jsonplaceholder.typicode.com/posts/${context.params.id}`)
    
    const article = await res.json()
    
    return {
        props: {
            article,
        },
    }
}


export const getStaticPaths = async () => {
    const res = await fetch(`https://jsonplaceholder.typicode.com/posts`)
    
    const article = await res.json()

    const ids = article.map((articles) => articles.id)

    const paths = ids.map((id) => ({params: {id:id.toString()}}))

    return {
        paths,
        fallback: false,
    }
}
export default articlepage
