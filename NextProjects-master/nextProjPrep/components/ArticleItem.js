import React from 'react'
import Link from "next/link"

import ArticleStyles from "../styles/Article.module.css"

const ArticleItem = ({articles}) => {
    return (
        <div className={ArticleStyles.grid}> 
            <Link href = "/articles/[id]" as={`/articles/${articles.id}`}>
                <a className={ArticleStyles.card}>
                    <h3>{articles.title} &rarr;</h3>
                    <p>{articles.body}</p>
                </a>
            </Link>
        </div>
    )
}

export default ArticleItem
