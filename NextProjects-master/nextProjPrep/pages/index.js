// this is to add out head element
import Head from 'next/head'
import styles from '../styles/Home.module.css'
import ArticleList from "../components/ArticleList"
import server from '../config'

export default function Home({article}) {
  return (
    <div>
      {/* same code i have written in meta */}
      {/* <Head>
        <title>
          shubham shankar
        </title>
        <meta name='keywords' content='web development, programming'/>
      </Head> */}

      <ArticleList article = {article} />
    </div>
  )
}

// todo : this method is through api folder

// export const getStaticProps = async () => {
//   const res = await fetch(`${server}/api/articles`)
//   const article = await res.json()

//   // return a object with prop which further returns a object that we fetched
//   return{
//     props:{
//       article,
//     },
//   }
// }


//todo : this method is a direct request to json place holder
export const getStaticProps = async () => {
  const res = await fetch(`https://jsonplaceholder.typicode.com/posts?_limit=6`)
  const article = await res.json()

  // return a object with prop which further returns a object that we fetched
  return{
    props:{
      article,
    },
  }
}
